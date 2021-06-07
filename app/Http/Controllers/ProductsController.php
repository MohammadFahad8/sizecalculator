<?php

namespace App\Http\Controllers;

use api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Auth::user();
      
      $scripttags = array("script_tag"=> [
        "event"=> "onload",
        "src"=> "https://d4033ca7af0a.ngrok.io/scripttags/index.js"
      ]);
        $products = $shop->api()->rest('POST', '/admin/api/2021-01/script_tags.json',$scripttags)['body'];
        dd($products);
        
    }
    public  function deleteTag(){
       
        
        $shop = Auth::user();
      
        $scripttags = array("script_tag"=> [
          "event"=> "onload",
          "src"=> "https://d4033ca7af0a.ngrok.io/scripttags/index.js"
        ]);
          $products = $shop->api()->rest('DELETE', '/admin/api/2021-01/script_tags/173357760696.json')['body'];
          dd($products);
        
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://wdtcv.myshopify.com/admin/api/2021-01/products.json',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     //CURLOPT_HTTPHEADER => $header,
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $shop = Auth::user();
      
       
          $products = $shop->api()->rest('GET', '/admin/api/2021-01/script_tags.json')['body'];
          dd($products);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createSizeCalculation(Request $request)
    {
            Storage::put('productcalculate.txt', $request);
            dd(1);
    }
    public function metacreate()
    {
      $shop = Auth::user();
      
      
      $scripttags = array("metafield"=> [
        "namespace"=> "inventory",
        "key"=> "warehouse",
        "value"=> 25,
        "value_type"=> "integer"
      ]);
        $products = $shop->api()->rest('POST', '/admin/api/2021-01/metafields.json',$scripttags)['body'];
        dd($products);
    }
    public function metatags()
    {
      
      $shop = Auth::user();
      
  
        $products = $shop->api()->rest('GET', '/admin/api/2021-01/metafields.json')['body'];
        dd($products);
    }
    
    public  function deletemeta(){
       
        
      $shop = Auth::user();
    
     
        $products = $shop->api()->rest('DELETE', '/admin/api/2021-01/metafields/19385405767864.json')['body'];
        dd($products);
      
      // $curl = curl_init();

      // curl_setopt_array($curl, array(
      //     CURLOPT_URL => 'https://wdtcv.myshopify.com/admin/api/2021-01/products.json',
      //     CURLOPT_RETURNTRANSFER => true,
      //     CURLOPT_ENCODING => "",
      //     CURLOPT_MAXREDIRS => 10,
      //     CURLOPT_TIMEOUT => 0,
      //     CURLOPT_FOLLOWLOCATION => true,
      //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      //     CURLOPT_CUSTOMREQUEST => "GET",
      //     //CURLOPT_HTTPHEADER => $header,
      // ));

      // $response = curl_exec($curl);

      // curl_close($curl);
      // return json_encode($response);
  }
  public function updateScriptTag()
  {
    
  
    $scripttags = array('script_tag' =>[
      "id"=> 173289111736,
      "src"=> "https://24bbe8b8d790.ngrok.io/scripttags/index.js"
    ]  );
    $shop = Auth::user();
    $products = $shop->api()->rest('PUT', '/admin/api/2021-01/script_tags/173289111736.json',$scripttags)['body'];
    dd($products);


  }
}
