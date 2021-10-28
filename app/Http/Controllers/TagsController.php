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



   

    //HOOKS START
public function productCreateHook(Request $request)
{
$data = $request->all();
    ByltLogs::create(['payload'=>json_encode($data),'response_of'=>'create Hooks']);

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
    public function productUpdateHook(Request $request)
    {
        $data = $request->all();
        ByltLogs::create(['payload'=>json_encode($data),'response_of'=>'update Hooks']);
        $webhookUpdated = Products::where('product_id', '=', trim($data['id']))->first();
        $tg = explode(",", $data['tags']);
        $tf = Tags::where('tagname','=',trim($tg[0]))->with('tagUser')->first();
    ($tf!= null)? $st = Settings::where('name','=',trim($tf->tagUser->name))->first():'';


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
        ByltLogs::create(['payload'=>json_encode($data),'response_of'=>'Deleted Hooks']);


        $webhookDelete = Products::where('product_id', '=', trim($data['id']))->with('variants')->first();

        if($webhookDelete != null){

            $webhookDelete->delete();


        }
        $vdel = Variants::where('product_id', '=', trim($data['id']))->get();
        foreach($vdel as $vd)
        {
        $vd->delete();

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

    public function editProductOnTags(Request $request)
    {



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


}
