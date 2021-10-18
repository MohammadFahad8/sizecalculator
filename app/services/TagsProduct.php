<?php namespace App\Services;

use App\Models\Tags;
use App\Models\Products;
use App\Models\Variants;
use Illuminate\Support\Facades\Auth;

class TagsProduct
{


    public function getAllTags($data)
    {


        //OG $shop = Auth::user();
        $shop = $data;



        $tags=$shop->api()->graph('{
  shop{
    productTags(first:100){
      edges{
        node
      }
    }
  }
}')['body']['container']['data']['shop']['productTags']['edges'];


$tagsall = Tags::latest()->where('shop', '=',$shop->id)->get();



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

    return;
}else

{

  return  $this->tagsCreateOrUpdate($tags,$tagsall,$shop);
}
}else
{

    return $this->tagsCreateOrUpdate($tags,$tagsall,$shop);

}





    }
    public function tagsCreateOrUpdate($tags,$tagsall,$shop)
    {



                foreach ($tags as $row)
                {

                    $tagsall = Tags::where([['tagname','=',trim($row['node'])],['shop', '=',$shop->id]])->first();

                    if($tagsall == null)
                    {

                        $tag = new Tags();
                        $tag->tagname = $row['node'];
                        $tag->status = 0;
                        $tag->shop = $shop->id;
                        $tag->save();
                        // $this->getAllProducts(trim($row['node']),trim($tag->id),$shop);
                    }
                    // else{

                    //     $tagsall->tagname = $row['node'];

                    //     $tagsall->save();

                    //     // $this->getAllProducts(trim($row['node']),trim($tagsall->id),$shop);
                    // }
                }
                // $tags = Tags::latest()->with('tagProducts')->get();

                    // return redirect()->route('attributes.tags',[
                    //     'other' => $tags,
                    // ]);
                // return view('tags.index', [
                //     'other' => $tags,


                // ]);
    }

//getting product and variants

public function getAllProducts($shop)
{

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
            // $tagProduct = Products::where('product_id','=',$product->product_id)->first();
            // $tagProduct->tag_id = $tid;
            // $tagProduct->save();


        } else {


            $product->product_id =  trim($row['id']);
            $product->name =   $row['title'];
            $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
            $product->tags = ($row['tags'] == null) ? null : $row['tags'];

            $product->website_name =  trim($shop_config['id']);

            $product->save();

            // $tagProduct = Products::where('product_id','=',$product->product_id)->where('tags','=',trim($tname))->first();
            // if($tagProduct!=null)
            // {

            //     $tagProduct->tag_id = $tid;
            //     $tagProduct->save();

            // }



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
    // $products = Products::where([['website_name', '=', trim($shop_config['id'])], ['is_deleted', '=', 0]])->paginate(5);





//        return view('products.index', [
//            'other' => $products,
//
//        ]);
}
}
