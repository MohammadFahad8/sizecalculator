<?php
namespace App\Helpers;
use api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


class Helpers {


  function ifScriptTag()
  {
      $shop = Auth::user();

      $scripttags = $shop->api()->rest('GET','/admin/api/2021-07/script_tags.json')['body']['container'];



      foreach($scripttags as $row)
      {


          if($row == null)
          {

              $this->addScriptTag();

              // echo '<script>console.log(" !! New  Body Fit Application !! ")</script> ';




          }else {
            foreach($row as $r)
            {

            $this->updateFrontScriptTag(trim($r['id']));
            }
            // echo '<script>console.log(" !! Welcome Body Fit Application !! ")</script>';


          }
          // foreach($row as $r)
          // {
          //     echo json_encode($r['src']);
          //     if($r['src'] == Config::get('constants.SHOPIFY_URL.SCRIPT_TAG_APP', 'default') )
          //     {
          //       $this->updateFrontScriptTag();
          //         echo '<script>console.log(" !! Welcome Body Fit Application !! ")</script>';

          //     }
          //     else {

          //         $this->addScriptTag();
          //         echo '<script>console.log(" !! New  Body Fit Application !! ")</script>';
          //     }
          // }
      }
  }
    function addScriptTag()
  {
      $shop = Auth::user();

    $scripttags = array("script_tag"=> [
      "event"=> "onload",
      "src"=>  Config::get('constants.SHOPIFY_URL.SCRIPT_TAG_APP', 'default')
    ]);
      $products = $shop->api()->rest('POST', '/admin/api/2021-07/script_tags.json',$scripttags)['body'];


  }
   function updateFrontScriptTag($id)
  {
      $shop = Auth::user();


    $scripttags = array("script_tag"=> [
      "id"=> $id,
      "src"=>  Config::get('constants.SHOPIFY_URL.SCRIPT_TAG_APP', 'default')
    ]);
      $products = $shop->api()->rest('PUT', '/admin/api/2021-07/script_tags/'.trim($id).'.json',$scripttags)['body'];


  }

  function getThemeData()
  {

    $shop = Auth::user();
    $theme = $shop->api()->rest('GET','/admin/api/2021-07/themes.json')['body']['container'];



    foreach($theme['themes'] as $key => $row)
    {

        if($row['role'] == 'main')
        {
            return trim($row['id']);
        }
    }
    // dd($the);
    // return  trim($theme['themes'][0]['id']);
  }
   function updateAsset()
  {


    $scripttags = array('asset' =>[
      "key"=>"snippets/body_fit.liquid",
      "value"=> '<bodyfit-component :product="{{product | json | escape}}"></bodyfit-component>'
    ]  );


    $shop = Auth::user();


    Config::set('constants.SHOPIFY_URL.THEME_ID',$this->getThemeData());


    $products = $shop->api()->rest('PUT', '/admin/api/2021-07/themes/'.Config::get('constants.SHOPIFY_URL.THEME_ID', 'default').'/assets.json',$scripttags)['body'];




  }



function addWidget()
{


$scripttags = array('asset' =>[
  "key"=>"sections/product-template.liquid",
  "value"=> $this->getProductPage(),
]  );


$shop = Auth::user();
Config::set('constants.SHOPIFY_URL.THEME_ID',$this->getThemeData());
$products = $shop->api()->rest('PUT', '/admin/api/2021-07/themes/'.Config::get('constants.SHOPIFY_URL.THEME_ID', 'default').'/assets.json',$scripttags)['body'];






}
function getProductPage()
{

$page = session()->get('page');
unset($page);
$shop = Auth::user();
Config::set('constants.SHOPIFY_URL.THEME_ID',$this->getThemeData());
try{
  $productpage = $shop->api()->rest('GET', '/admin/api/2021-07/themes/'.Config::get('constants.SHOPIFY_URL.THEME_ID', 'default').'/assets.json',['asset[key]'=>'sections/product-template.liquid'])['body']['container'];
}
catch(\Exception $e){
  $productpage = $shop->api()->rest('GET', '/admin/api/2021-07/themes/'.Config::get('constants.SHOPIFY_URL.THEME_ID', 'default').'/assets.json',['asset[key]'=>'sections/main-product.liquid'])['body']['container'];
}


session()->put('page',$productpage);
$page  = session()->get('page');

$pos = strpos($page['asset']['value'],"{% form 'product', product");
  if($pos == false)
  {

    $pos = strpos($page['asset']['value'],"{%- form 'product', product");


      return substr_replace($page['asset']['value'],"<!-- Body Fit auto installation start -->  <div id='app'>{%render 'body_fit'%}</div> <!-- Body Fit  auto installation end -->",5343,0);

  }
  else{
    return substr_replace($page['asset']['value'],"<!-- Body Fit auto installation start -->  <div id='app'>{%render 'body_fit'%}</div> <!-- Body Fit  auto installation end -->",10743,0);
  }






}

 function df($pay)
 {
   echo json_encode($pay);

 }

}
