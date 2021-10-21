<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\ByltLogs;
use App\Models\Products;
use App\Models\Settings;
use App\Models\Variants;
use App\Models\Sizechart;
use Illuminate\Http\Request;
use App\Services\TagsProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $shop_cfg = Auth::user()->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];

        $tags=Auth::user()->api()->graph('{
            shop{
              productTags(first:200){
                edges{
                  node
                }
              }
            }
          }')['body']['container']['data']['shop']['productTags']['edges'];


          if(count($tags)!=count(Tags::where('shop','=',Auth::user()->id)->get()))
          {


        $tp = new TagsProduct();
        $tp->getAllTags(Auth::user());


          }

        //doing to initialize the data
        if(Auth::user() && count(Products::where('website_name','=', trim($shop_cfg['shop']['id']))->get())==0){

        $tp = new TagsProduct();
        $tp->getAllProducts(Auth::user());
        }
        $tags = Tags::with('tagProducts')->where('shop','=',Auth::user()->id)->get();

        return view('tags.index', [
            'other' => $tags,


        ]);
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
    //HOOKS START
    public function productUpdateHook(Request $request)
    {
        $data = $request->all();
        ByltLogs::create(['payload'=>json_encode($data),'response_of'=>'Hooks']);
        $webhookUpdated = Products::where('product_id', '=', trim($data['id']))->first();
        $tg = explode(",", $data['tags']);
        $tf = Tags::where('tagname','=',trim($tg[0]))->with('tagUser')->first();
    ($tf!= null)? $st = Settings::where('name','=',trim($tf->tagUser->name))->first():'';

        if($webhookUpdated == null)
        {
            $p = Products::create([
                'product_id' => trim($data['id']),
                'name' =>   trim($data['title']),
                'image_link' => ($data['image'] == null) ? null : $data['image']['src'],
                'tags' => ($data['tags'] == null) ? null : trim($data['tags']),
                'website_name' => isset($st)?$st->shop_id:0,


            ]);
            if($data['variants']!=null)
            {
                foreach($data['variants'] as $dv){
            Variants::create([
                'variant_id' => trim($dv['id']),

                'size' => (strtolower($dv['option1']) == 'default title') ? 0 : strtolower($dv['option2']),
                'price' => ($dv['price'] == null) ? null : $dv['price'],
                'product_id' => trim($data['id']),

            ]);
                }
            }
        }
        $webhookUpdated->product_id =  trim($data['id']);
        $webhookUpdated->name =   $data['title'];
        $webhookUpdated->image_link = ($data['image'] == null) ? null : $data['image']['src'];
        $webhookUpdated->tags = ($data['tags'] == null) ? null : $data['tags'];

        if($data['tags'] == null)
        {
            $webhookUpdated->tag_id =  null;
            $webhookUpdated->status =  0;
        }else{

            $tg = explode(",", $data['tags']);
            $tf = Tags::where('tagname','=',trim($tg[0]))->with('tagUser')->first();
            $webhookUpdated->tag_id = $tf->id;
            $webhookUpdated->status = $tf->status;
            $st = Settings::where('name','=',trim($tf->tagUser->name))->first();
            $webhookUpdated->website_name = isset($st->shop_id)?$st->shop_id:0;

        }
        $webhookUpdated->save();
        $vars = Variants::where('product_id', '=', trim($data['id']))->get();


if($data['variants']!= null){

    foreach($data['variants'] as $hkey =>$hookvar){
Variants::updateOrCreate(
    [
'variant_id'=>trim($hookvar['id'])
    ],
[
'variant_id'=>trim($hookvar['id']),
'size'=> (strtolower($hookvar['option1']) == 'default title') ? 0 : strtolower($hookvar['option2']),
'price'=>($hookvar['price'] == null) ? null : $hookvar['price'],
'product_id'=>trim($hookvar['product_id']),
]
);
}
}
    }

    public function productDeleteHook(Request $request)
    {

        $data = $request->all();

        Storage::put(rand()."_deletehook.txt",$data);
        $webhookDelete = Products::where('product_id', '=', trim($data['id']))->first();
        if($webhookDelete != null){
            $webhookDelete->delete();
        }

        }

    // HOOKS END

    public function attachTagsToProducts($id)
    {

        $t = Tags::where([['shop','=',Auth::user()->id],['id','=',$id]])->first();
        $matchingProds = Products::where('tags', "LIKE",'%'.$t->tagname.'%')->get();
        foreach($matchingProds as $mp)
        {
            if(strpos($mp->tags,$t->tagname)==0)
            {
                $mp->tag_id = $id;
                $mp->save();

            }
        }
        return $response = array('status'=>1) ;
    }
    public function getAllProducts($tname,$tid,$shop)
    {



        $shop = $shop;


        $productsall = $shop->api()->rest('GET', '/admin/api/2021-07/products.json')['body']['container'];



        $prod = $productsall['products'];



        $shop_cfg = $shop->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];



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

                    $vari->size = (strtolower($variant['option1']) == 'default title') ? 0 : strtolower($variant['option2']);
                    $vari->price = ($variant['price'] == null) ? null : $variant['price'];
                    $vari->product_id = trim($variant['product_id']);
                    $vari->save();
                }
            } else {
                echo 'no variants';
            }
        }

        // DELETE PRODUCT FROM DATABASE IF IS DELETED FROM ADMIN STORE

        // $checkInApiResponse = Products::latest()->get();

        // foreach ($checkInApiResponse as $resp) {


        //     $productCheckIfDeletedFromStore = $shop->api()->rest('GET', '/admin/api/2021-04/products/' . trim($resp['product_id']) . '.json')['body'];


        //     if ($productCheckIfDeletedFromStore == "Not Found") {
        //         $product = Products::where('product_id', '=', trim($resp['product_id']))->first();

        //         $product->is_deleted =  1;
        //         $product->save();
        //     }
        // }

        // END DELETE PRODUCT FROM DATABASE IF IS DELETED FROM ADMIN STORE
        $products = Products::where([['website_name', '=', trim($shop_config['id'])], ['is_deleted', '=', 0]])->paginate(5);





//        return view('products.index', [
//            'other' => $products,
//
//        ]);
    }
    public function getAllTags($data)
    {


        //OG $shop = Auth::user();
        $shop = $data;



        $tags=$shop->api()->graph('{
  shop{
    productTags(first:200){
      edges{
        node
      }
    }
  }
}')['body']['container']['data']['shop']['productTags']['edges'];


$tagsall = Tags::latest()->where('shop', '=',Auth::user()->id)->get();



//checking if old payload then just refresh page dont update
$count=0;

if(count($tags) == count($tagsall)){

foreach ($tags as $key=>$row)
{

    foreach($tagsall as $tkey=> $tag)
    {

        if($row['node'] == $tag->tagname)
        {

            $count =$count + 1;

        }
    }

}

if( count($tags) == $count)
{

    $tags = Tags::latest()->with('tagProducts')->where('shop', '=',Auth::user()->id)->get();

        return view('tags.index', [
            'other' => $tags,


        ]);
}else

{

  return  $this->tagsCreateOrUpdate($tags,$tagsall,$shop);
}
}else
{

    return $this->tagsCreateOrUpdate($tags,$tagsall,$shop);

}





    }

    public function editProductOnTags(Request $request){


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

                $tagg = Tags::where('id','=',trim($request['tagname']))->where('shop', '=',Auth::user()->id)->first();
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
        $product = Tags::with('tagProducts')->where([['shop', '=',Auth::user()->id],['id','=',$id]])->first();

        return $product;
    }
    public function tagsCreateOrUpdate($tags,$tagsall,$shop)
    {

        try{if(count($tags)<count($tagsall)){
            Tags::truncate();
        }}catch (\Exception $e){}

                foreach ($tags as $row)
                {

                    $tagsall = Tags::where([['tagname','=',trim($row['node'])],['shop', '=',Auth::user()->id]])->first();

                    if($tagsall == null)
                    {

                        $tag = new Tags();
                        $tag->tagname = $row['node'];
                        $tag->status = 0;
                        $tag->shop = Auth::user()->id;

                        $tag->save();
                        // $this->getAllProducts(trim($row['node']),trim($tag->id),$shop);
                    }
                    else{

                        $tagsall->tagname = $row['node'];

                        $tagsall->save();

                        // $this->getAllProducts(trim($row['node']),trim($tagsall->id),$shop);
                    }
                }
                $tags = Tags::latest()->with('tagProducts')->where('shop', '=',Auth::user()->id)->get();

                    // return redirect()->route('attributes.tags',[
                    //     'other' => $tags,
                    // ]);
                // return view('tags.index', [
                //     'other' => $tags,


                // ]);
    }

    public function refreshProducts()
    {
        $shop = Auth::user();



        $tags=$shop->api()->graph('{
  shop{
    productTags(first: 200){
      edges{
        node
      }
    }
  }
}')['body']['container']['data']['shop']['productTags']['edges'];

$tagsall = Tags::latest()->where('shop', '=',Auth::user()->id)->get();
        return  $this->tagsCreateOrUpdate($tags,$tagsall);
    }
}
