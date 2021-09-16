<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Settings;
use App\Models\Sizechart;
use App\Models\Tags;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tags $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tags)
    {
        //
    }
    public function getAllProducts($tname,$tid)
    {


        $shop = Auth::user();


        $productsall = $shop->api()->rest('GET', '/admin/api/2021-07/products.json')['body']['container'];



        $prod = $productsall['products'];



        $shop_cfg = Auth::user()->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];



        $shop_config = $shop_cfg['shop'];

        Variants::truncate();
        // Products::truncate();

        foreach ($prod as $row) {

            $product = Products::where('product_id', '=', trim($row['id']))->first();


            if ($product == null) {

                $product = new Products();
                $product->product_id =  trim($row['id']);
                $product->name =   $row['title'];
                $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
                $product->tags = ($row['tags'] == null) ? null : $row['tags'];

                $product->website_name = trim($shop_config['id']);

                $product->save();
                $tagProduct = Products::where('product_id','=',$product->product_id)->first();
                $tagProduct->tag_id = $tid;
                $tagProduct->save();


            } else {


                $product->product_id =  trim($row['id']);
                $product->name =   $row['title'];
                $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
                $product->tags = ($row['tags'] == null) ? null : $row['tags'];

                $product->website_name =  trim($shop_config['id']);

                $product->save();

                $tagProduct = Products::where('product_id','=',$product->product_id)->where('tags','=',trim($tname))->first();
                if($tagProduct!=null)
                {

                    $tagProduct->tag_id = $tid;
                    $tagProduct->save();

                }



                // Attributetypes::where('product_id','=',$product->product_id)->get();
            }


            if ($row['variants'] != null) {

                foreach ($row['variants'] as $variant) {


                    $vari = new Variants();
                    $vari->variant_id = trim($variant['id']);

                    $vari->size = (strtolower($variant['option1']) == 'default title') ? 0 : strtolower($variant['option1']);
                    $vari->price = ($variant['price'] == null) ? null : $variant['price'];
                    $vari->product_id = trim($variant['product_id']);
                    $vari->save();
                }
            } else {
                echo 'no variants';
            }
        }
        //DELETE PRODUCT FROM DATABASE IF IS DELETED FROM ADMIN STORE
        $checkInApiResponse = Products::latest()->get();

        foreach ($checkInApiResponse as $resp) {


            $productCheckIfDeletedFromStore = Auth::user()->api()->rest('GET', '/admin/api/2021-04/products/' . trim($resp['product_id']) . '.json')['body'];


            if ($productCheckIfDeletedFromStore == "Not Found") {
                $product = Products::where('product_id', '=', trim($resp['product_id']))->first();

                $product->is_deleted =  1;
                $product->save();
            }
        }

        //END DELETE PRODUCT FROM DATABASE IF IS DELETED FROM ADMIN STORE
        $products = Products::where([['website_name', '=', trim($shop_config['id'])], ['is_deleted', '=', 0]])->paginate(5);





//        return view('products.index', [
//            'other' => $products,
//
//        ]);
    }
    public function getAllTags()
    {


        $shop = Auth::user();



        $tags=$shop->api()->graph('{
  shop{
    productTags(first: 100){
      edges{
        node
      }
    }
  }
}')['body']['container']['data']['shop']['productTags']['edges'];

$tagsall = Tags::latest()->get();
try{if(count($tags)<count($tagsall)){
    Tags::truncate();
}}catch (\Exception $e){}

        foreach ($tags as $row)
        {

            $tagsall = Tags::where('tagname','=',trim($row['node']))->first();

            if($tagsall == null)
            {
                $tag = new Tags();
                $tag->tagname = $row['node'];
                $tag->status = 0;
                $tag->save();
                $this->getAllProducts(trim($row['node']),$tag->id);
            }
            else{
                $tagsall->tagname = $row['node'];

                $tagsall->save();
                $this->getAllProducts(trim($row['node']),$tagsall->id);
            }
        }
        $tags = Tags::latest()->with('tagProducts')->get();

        return view('tags.index', [
            'other' => $tags,


        ]);
    }
    public function editProductOnTags(Request $request)
    {
        //
        $request['tagname'] = trim($request['tagname']);
        $messageContainer = array(
            'error_msg' => 'Configure Product First Make Variants in Admin',
        );
        $emptyContainer = array(
            'empty_msg' => 'Attach separately with atleast one product from shopify store ',
        );
        $data = array();


//        $product = Products::where('tags', 'LIKE', '%' . trim($request['tagname']) . '%')->get();
        $product = Products::where('tag_id', '=',trim($request['tagname']))->get();

        if($product == null || count($product)==0)
        {

            return $emptyContainer;
        }

        foreach ($product as $p) {



            $sizeChartCount = Sizechart::where('product_id', '=', trim($p->tag_id))->get();
            $checkVariantExists = Variants::where('product_id', '=', trim($p->product_id))->get();


//            if (count($sizeChartCount) == 0 || count($sizeChartCount) == null || trim($checkVariantExists[0]['size']) == '0') {
            if (count($sizeChartCount) == 0 || count($sizeChartCount) == null) {
                $messageContainer['product']=$p;
                return $messageContainer;
            } else {

                $setting = Settings::where('name', '=', Auth::user()->name)->first();
                if ($setting->clear_logs == 1) {

                    $setting->clear_logs = 0;
                    $setting->save();
                }

                $p->status = $request['status'];
                $tagg = Tags::where('tagname','=',trim($request['tagname']))->first();
                if($tagg != null){
                    $tagg->status = $request['status'];
                    $tagg->save();
                }

                $p->save();

            }
        }
        $data['product'] = $product;
        $data['tagstatus'] = $tagg;
        return $data;
    }
    public function getSpecificProducts($id)
    {
        $product = Tags::with('tagProducts')->find($id);

        return $product;
    }
}
