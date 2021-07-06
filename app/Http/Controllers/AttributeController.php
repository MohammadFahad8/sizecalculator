<?php

namespace App\Http\Controllers;

use api;
use App\Models\Size;
use App\Helpers\Helpers;
use App\Models\Products;
use App\Models\Settings;
use App\Models\Variants;
use App\Models\Attribute;
use App\Models\Selectedsize;
use Illuminate\Http\Request;
use App\Http\Helpers\Apihooks;
use App\Models\Attributetypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $helpers = new Helpers();
        $helpers->ifScriptTag();
        $helpers->updateAsset();
        $helpers->addWidget();

        $attr = Attribute::latest()->with('attributetype')->get();

        if (count(Settings::where('name', '=', Auth::user()->name)->get()) == 0) {

            $settings = new Settings();
            $shop_cfg = Auth::user()->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];
            $shop_config = $shop_cfg['shop'];
            $settings->name = $shop_config['domain'];
            $settings->email = $shop_config['email'];
            $settings->shop_id = $shop_config['id'];
            $settings->save();
        }



        return view('attributes.index', [
            'attributes' => $attr
        ]);
    }
    public function addOrUpdateProduct(Request $request)
    {
        foreach ($request['variants'] as $key => $value) {


            Size::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'id' => $request->id,
                    'name' => $value['title'],
                    'alias' => $value['title'],
                    'attr_id' => $request->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ]
            );
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $attr = Attributetypes::latest()->get();
        return view(
            'attributes.create',
            [
                'attributes' => $attr
            ]
        );
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

        $this->validate($request, [
            "attribute_name" => "required",
            "attribute_type" => "required",


        ], [
            "attribute_name.required" => "Please Enter Attribute name",
            "attribute_type.required" => "Please Select Attribute name",

        ]);
        $attr = new Attribute();
        $attr->attribute_name = $request->get('attribute_name');
        $attr->attribute_type = $request->get('attribute_type');
        $attr->is_required = ($request->get('is_required') == 'on' ? 1 : 0);
        $attr->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return '<script>console.log("Hitting controller")</script>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $attr = Attribute::find($id);
        $attrtypes = Attributetypes::latest()->get();
        return view('attributes.edit', [
            'attr' => $attr,
            'attributetypes' => $attrtypes,
            'id' => $id


        ]);
    }
    public function editProduct(Request $request)
    {
        //

        $product = Products::find($request['id']);
        $setting = Settings::where('name', '=', Auth::user()->name)->first();
        if ($setting->clear_logs == 1) {

            $setting->clear_logs = 0;
            $setting->save();
        }

        $product->status = $request['status'];

        $product->save();
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = $request->all();
        $attr = Attribute::find($data['edit_id']);
        $attr->attribute_name = $data['attribute_name'];
        $attr->attribute_type = $data['attribute_type'];
        $attr->is_required = (isset($data['is_required'])) ? 1 : 0;
        $attr->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $attr = Attribute::find($id);
        $attr->delete();
        return $this->index();
    }
    public function getAllProducts()
    {

        $shop = Auth::user();


        $productsall = $shop->api()->rest('GET', '/admin/api/2021-07/products.json')['body']['container'];
        $prod = $productsall['products'];
        $shop_cfg = Auth::user()->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];
        $shop_config = $shop_cfg['shop'];
    
        foreach ($prod as $row) {



        
    
            Products::updateOrCreate(
                ['product_id' => $row['id']],

                [
                    'name' => $row['title'],
                    'image_link' => ($row['image'] == null) ? null : $row['image']['src'],
                    'website_name' => $shop_config['id'],
                    
                ]
            );
            if($row['variants'] != null){
            foreach($row['variants'] as $variant){
                
                Variants::updateOrCreate(
                    ['variant_id' => $variant['id']],
    
                    [
                        'size' => strtolower($variant['option1']),
                        'price' => ($variant['price'] == null) ? null :$variant['price'] ,
                        'product_id' => $variant['product_id'],
                        
                    ]
                );

            }
          }
        }
        $products = Products::where('website_name', '=', $shop_config['id'])->paginate(5);

        return view('products.index', [
            'other' => $products
        ]);
    }
    public function permissionToShowBodyFit(Request $request)
    {

        $products = Products::where('product_id', '=', $request['id'])->first();

        $setting = Settings::where('name', '=', $request['shop_name'])->first();

        if ($products->status == 1) {

            if ($setting->clear_logs == 0) {

                $permission = array('display' => true, 'clearLog' => true);
                $setting->clear_logs = 2;
                $setting->save();
                return $permission;
            }
            $permission = array('display' => true, 'clearLog' => false);
            return $permission;
        } else {
            if ($setting->clear_logs == 2) {

                $permission = array('display' => false, 'clearLog' => false);
                return $permission;
            }
        }
    }

    public function calculateSize(Request $request)
    {
        
        $data = $request->all();
        $productid = $data['conversionCount'];
        
        $product = session()->get('product');
        unset($product);
        session()->put('product',$productid);

        $height_cm = 0;

        if ($data['convertedMeasurements'] == true) {

            $data['weight'] = $data['weight'] * 2.2;

            $height_cm = $data['heightcm'];
        } else {
            $height_cm = ($data['heightfoot'] * 30.48) + ($data['heightinch'] * 2.54);
        }



        $tags = array_map('strtolower', $data['tags']);


        if (in_array(strtolower("male"), $tags) || in_array(strtolower("m"), $tags) || in_array(strtolower("men"), $tags)  || in_array(strtolower("man"), $tags)) {


            //Man  Adult


            if (($data['weight'] >= 103 && $data['weight'] <= 121) && ($height_cm  >=  134 && $height_cm <= 150)) {
                //xxs
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
            } else if (($data['weight'] > 121 && $data['weight'] <= 139) && ($height_cm  >  150 && $height_cm <= 165)) {
                //xs
                return  $this->measurements($xs = 'xs', $data['chest'], $data['stomach'], $data['bottom'], null);
            } else  if (($data['weight'] > 139 && $data['weight'] <= 161) && ($height_cm  >=  165 && $height_cm <= 175)) {

                //s
                return $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
            } else if (($data['weight'] > 155 && $data['weight'] <= 175) && ($height_cm  >=  173 && $height_cm <= 185)) {
                //M
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
            } else  if (($data['weight'] > 165 && $data['weight'] <= 198) && ($height_cm  >=  178 && $height_cm <= 190)) {

                //ML
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
            } else if (($data['weight'] > 187 && $data['weight'] <= 214) && ($height_cm  >=  185 && $height_cm <= 195)) {

                //L
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
            } else if (($data['weight'] > 207 && $data['weight'] <= 242) && ($height_cm  >=  190 && $height_cm <= 205)) {
                //XL
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], $xl = 'xl');
            } else  if (($data['weight'] > 242) && ($height_cm  >  205)) {
                //XXL
                return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], $xl = 'xxl');
            } else {
                return $size = 'M';
            }
        } else {

            return  $this->calculateSizeFemale($data, $height_cm);
        }
        //end man adult
    }
    public function calculateSizeFemale($data, $height_cm)
    {
        //Female  Adult


        if (($data['weight'] <= 100) && ($height_cm  >=  137 && $height_cm <= 145)) {
            //xxs
            return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
        } else if (($data['weight'] > 100 && $data['weight'] <= 115) && ($height_cm  >  145 && $height_cm <= 155)) {
            //xs
            return  $this->measurements($xs = 'xs', $data['chest'], $data['stomach'], $data['bottom'], null);
        } else  if (($data['weight'] > 110 && $data['weight'] <= 125) && ($height_cm  >=  155 && $height_cm <= 165)) {

            //s
            return $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
        } else if (($data['weight'] > 120 && $data['weight'] <= 145) && ($height_cm  >=  165 && $height_cm <= 175)) {
            //M

            return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
        } else  if (($data['weight'] > 140 && $data['weight'] <= 165) && ($height_cm  >=  173 && $height_cm <= 185)) {

            //L
            return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
        } else if (($data['weight'] > 165) && ($height_cm  >  185)) {

            //XL
            return  $this->measurements(null, $data['chest'], $data['stomach'], $data['bottom'], null);
        } else {
            return $size = 'M';
        }
        //end female adult


    }public function checkVariantIFExists($predictedSize)
    {
        $size ='';
        $variants = Variants::where('product_id','=',session('product'))->pluck('size');
      
            
        if(!in_array(strtolower($predictedSize), json_decode($variants)) ){

            
             if(strtolower(substr($predictedSize,0,2))=='xs'){
                 
                 
                 $size='small';
                 if(in_array(strtolower($size), json_decode($variants))==false)
                 {
                    
                        $size='medium';
                        
                        if(in_array(strtolower($size), json_decode($variants))==false)
                 {
                    

                    $size='large';
                    if(in_array(strtolower($size), json_decode($variants))==false)
                    {
                        $size='XL';
                        
                    }


                 }
                 }

            }
            else if(strtolower($predictedSize)=='small'){
                $size='Medium';
                if(in_array(strtolower($size), json_decode($variants))==false)
                {
                       $size='Large';
                       if(in_array(strtolower($size), json_decode($variants))==false)
                {
                   $size='XL';
                   if(in_array(strtolower($size), json_decode($variants))==false)
                   {
                       $size='none';
                       
                   }


                }
                }


            }else if(strtolower(substr($predictedSize,0,2))=='m'){
                 $size='L';
                 if(in_array(strtolower($size), json_decode($variants))==false)
                 {
                        $size='XL';
                        if(in_array(strtolower($size), json_decode($variants))==false)
                 {
                    $size='none';
                   


                 }
                 }

            }
            else if(strtolower(substr($predictedSize,0,2))=='l'){
                $size='XL';
                
                if(in_array(strtolower($size), json_decode($variants))==false)
                {
                       $size='none';
                  
                }

           }
           else if(strtolower(substr($predictedSize,0,2))=='xl'){
            $size='XL';
            if(in_array(strtolower($size), json_decode($variants))==false)
            {
                   $size='l';
                   if(in_array(strtolower($size), json_decode($variants))==false)
                   {
                       $size='m';
                       if(in_array(strtolower($size), json_decode($variants))==false)
                       {
                        $size='s';
                       }
                   }
              
            }

       }
            return $size;
            

        }
        
       

    }
    public function measurements($xs = null, $c, $s, $b, $xl = null)
    {
        $sum = $c + $s + $b;

        $size = '';
        $sizes = Size::latest()->get();



        if ($c == 1 && $s  == 1 && $b == 1) {

            if (isset($xs) && $xs == 'xs') {
                  $size = 'XS';
                return $this->checkVariantIFExists($size);
            }
            
           
             $size = "Small";
            return $this->checkVariantIFExists($size);

        } else if ($c == 2 && $s  == 2 && $b == 2) {
            //medium
            
            $size = "Medium";
            return $this->checkVariantIFExists($size);
        } else if ($c == 3 && $s == 3 && $b == 3) {
            if (isset($xl) && $xl == 'xl') {
                return $size = 'XL';
            }
            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 3 && $s == 3 && $b == 3) {

            if (isset($xl) && $xl == 'xxl') {
                return $size = 'XXL';
            }
            $size = "Large";
            return $this->checkVariantIFExists($size);
        }
        //wide chest
        else if ($c == 3 && $s == 1 && $b == 1) {

            return $size = 'Large';
        } else if ($c == 3 && $s == 2 && $b == 1) {

            return $size = 'XL';
        } else if ($c == 3 && $s == 2 && $b == 2) {

            return $size = 'XXL';
        } else if ($c == 3 && $s == 2 && $b == 3) {

            return $size = 'XL';
        } else if ($c == 3 && $s == 1 && $b == 2) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 1 && $s == 2 && $b == 3) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 1 && $s == 3 && $b == 3) {

            return $size = 'XL';
        } else if ($c == 1 && $s == 1 && $b == 2) {

            $size = "Medium";
            return $this->checkVariantIFExists($size);
        } else if ($c == 1 && $s == 1 && $b == 3) {

            $size = "Medium";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 1 && $b == 1) {

            $size = "Medium";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 1 && $b == 2) {

            return $size = 'Medium';
        } else if ($c == 2 && $s == 1 && $b == 3) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 2 && $b == 1) {

            $size = "Medium";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 2 && $b == 3) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 3 && $b == 1) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 3 && $b == 2) {

            $size = "Large";
            return $this->checkVariantIFExists($size);
        } else if ($c == 2 && $s == 3 && $b == 3) {

            return $size = 'XL';
        } else {
            $size = "Medium";
            return $this->checkVariantIFExists($size);
        }
    }
    
    public function  addProductFromSelection(Request $request)
    {
        $message = array();
        $data = $request->all();



        foreach ($data['variants'] as $row) {
            $variants_count =  Variants::where('variant_id', '=', $row['id'])->count();
            $variant = new Variants();
            if ($variants_count == 0) {

                $variant->variant_id = $row['id'];
                $variant->size = $row['option1'];
                $variant->price = $row['price'];
                $variant->product_id = $row['product_id'];
            } else {
                $message['message'] = 'Variant Duplicate';
                $message['status'] = 0;
                return $message;
            }
            $variant->save();
        }




        $product =  Selectedsize::where('id', '=', $data['id'])->count();
        if ($product == 0) {
            $product = new Selectedsize();
            $product->title = $data['title'];
            $product->product_id = $data['id'];
            $product->image_link = $data['image']['src'];
            $product->vendor = $data['vendor'];
            $product->admin_graphql_api_id = $data['admin_graphql_api_id'];
            $product->save();

            $message['message'] = 'Product Stored For Comparison';
            $message['status'] = 1;
            return $message;
        } else {
            $message['message'] = 'Size Duplicate';
            $message['status'] = 0;
            return $message;
        }
    }
    public function shopConfiguration()
    {
        $shop = Auth::user();
        $shop_config = $shop->api()->rest('GET', '/admin/api/2021-07/shop.json')['body']['container'];
        dd($shop_config);
    }
}
