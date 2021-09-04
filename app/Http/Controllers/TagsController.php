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


foreach ($tags as $row)
{

    $tagsall = Tags::where('tagname','=',trim($row['node']))->first();
    if($tagsall == null)
    {
        $tag = new Tags();
        $tag->tagname = $row['node'];
        $tag->status = 0;
        $tag->save();
    }
    else{
        $tagsall->tagname = $row['node'];

        $tagsall->save();
    }
}
$tags = Tags::latest()->get();

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
            'empty_msg' => 'No products attached with this tag',
            );
        $data = array();


        $product = Products::where('tags', 'LIKE', '%' . trim($request['tagname']) . '%')->get();

    if($product == null || count($product)==0)
    {

        return $emptyContainer;
    }

        foreach ($product as $p) {



            $sizeChartCount = Sizechart::where('product_id', '=', trim($p->product_id))->get();
            $checkVariantExists = Variants::where('product_id', '=', trim($p->product_id))->get();


            if (count($sizeChartCount) == 0 || count($sizeChartCount) == null || isset($checkVariantExists[0]['size']) == false) {

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
}
