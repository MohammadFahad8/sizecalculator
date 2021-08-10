<?php

namespace App\Http\Controllers;

use api;
use App\Models\Size;
use App\Models\User;
use App\Helpers\Helpers;
use App\Models\Products;
use App\Models\Settings;
use App\Models\Variants;
use App\Models\Attribute;

use App\Models\Sizechart;
use App\Models\Bodyfeature;
use Illuminate\Support\Str;
use App\Models\Selectedsize;
use Illuminate\Http\Request;
use App\Http\Helpers\Apihooks;
use App\Models\Attributetypes;
use App\Models\Attributeimages;
use Illuminate\Support\Facades\DB;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginshop(Request $request)
    {
        $this->validate($request, [
            'shop-name' => 'required|min:10|max:999',
        ], [
            'shop-name.required' => 'Shop Name is Required'
        ]);

        return  redirect(env('APP_URL') . '?shop=' . $request['shop-name']);
    }
    public function index()
    {
        //
        // $db = new DatabaseSeeder();
        // $db->run('fahad');

    
        

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
            $settings->shop_id = trim($shop_config['id']);
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
                    'id' => trim($request->id),
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
        $attr = Attributetypes::latest()->where('status', '>', '0')->get();
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
        $attrtypes = Attributetypes::latest()->where('status', '>', '0')->get();
        return view('attributes.edit', [
            'attr' => $attr,
            'attributetypes' => $attrtypes,
            'id' => trim($id)


        ]);
    }
    public function editProduct(Request $request)
    {
        //
        $messageContainer = array('error_msg' => 'Configure Product First Make Variants in Admin');

        $product = Products::where('product_id', '=', trim($request['id']))->first();

        $sizeChartCount = Sizechart::where('product_id', '=', trim($request['id']))->get();
        $checkVariantExists = Variants::where('product_id', '=', trim($request['id']))->get();



        if (count($sizeChartCount) == 0 || count($sizeChartCount) == null || isset($checkVariantExists[0]['size'] )== false) {

            return $messageContainer;
        } else {

            $setting = Settings::where('name', '=', Auth::user()->name)->first();
            if ($setting->clear_logs == 1) {

                $setting->clear_logs = 0;
                $setting->save();
            }

            $product->status = $request['status'];

            $product->save();
            return $product;
        }
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
        $attr = Attribute::find(trim($data['edit_id']));
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
        $attr = Attribute::find(trim($id));
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
        // $connection = config('database.default');

        // $driver = config("database.connections.{$connection}.driver");
        // dd($driver);

        Variants::truncate();
        // Products::truncate();
        foreach ($prod as $row) {

            $product = Products::where('product_id', '=', trim($row['id']))->first();
            if ($product == null) {

                $product = new Products();
                $product->product_id =  trim($row['id']);
                $product->name =   $row['title'];
                $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
                $product->website_name = trim($shop_config['id']);
                $product->save();
            } else {


                $product->product_id =  trim($row['id']);
                $product->name =   $row['title'];
                $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
                $product->website_name =  trim($shop_config['id']);

                $product->save();
                // Attributetypes::where('product_id','=',$product->product_id)->get();
            }



            // Products::updateOrCreate(
            //     ['product_id' => $row['id']],

            //     [
            //         'name' => $row['title'],
            //         'image_link' => ($row['image'] == null) ? null : $row['image']['src'],
            //         'website_name' => $shop_config['id'],

            //     ]
            // );

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

        // dd($products);

        return view('products.index', [
            'other' => $products,

        ]);
    }
    public function getSpecificProducts($id)
    {
        $product = Products::with('variants')->where('product_id', '=', trim($id))->first();

        return $product;
    }
    public function permissionToShowBodyFit(Request $request)
    {
        

        $products = Products::where('product_id', '=', trim($request['id']))->first();


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
        
        $sizeChartList = Sizechart::with('bodyFeature')->where('product_id', '=', $data['conversionCount'])->get();
        $height_cm = 0;
        if ($data['convertedMeasurements'] == true) {
            $data['weight'] = $data['weight'] * 2.2;
            $height_cm = $data['heightcm'];
        } else {
            $height_cm = intval(($data['heightfoot'] * 30.48) + ($data['heightinch'] * 2.54));
        }
        foreach ($sizeChartList as $s) {
                foreach ($s['bodyFeature'] as $b) {
                    foreach ($data['bodyMeasure'] as $bm) {  if ($bm >= $b['attr_measurement_start'] && $bm <= $b['attr_measurement_end'] && $data['szid'] == $b['sizechart_id']) {return $b['predicted_size'];
                        }                   
                    }
                }
            
        }
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


    }
    public function getSizeCount($predictedSize)
    {
        $variants = Variants::where([['product_id', '=', trim(session('product'))], ['size', '=', strtolower($predictedSize)]])->pluck('size');
        $count = $variants->count();
        return $count;
    }
    public function checkVariantIFExists($predictedSize)
    {
        $size = '';


        if ($this->getSizeCount($predictedSize) == 0 || $this->getSizeCount($predictedSize) == null) {


            if (strtolower($predictedSize) == 'xs') {


                $size = 'small';
                if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {

                    $size = 'medium';

                    if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {


                        $size = 'large';
                        if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                            $size = 'XL';
                        }
                    }
                }
            } else if (strtolower($predictedSize) == 'small') {
                $size = 'medium';
                if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                    $size = 'large';
                    if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                        $size = 'XL';
                        if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                            $size = 'medium';
                        }
                    }
                }
            } else if (strtolower($predictedSize) == 'medium') {

                $size = 'L';
                if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                    $size = 'XL';
                    if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                        $size = 'medium';
                    }
                }
            } else if (strtolower($predictedSize) == 'large') {
                $size = 'XL';

                if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                    $size = 'medium';
                }
            } else if (strtolower($predictedSize) == 'xl') {
                $size = 'XL';
                if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                    $size = 'l';
                    if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                        $size = 'm';
                        if ($this->getSizeCount($size) == 0 || $this->getSizeCount($size) == null) {
                            $size = 's';
                        }
                    }
                }
            }
            return $size;
        } else {

            $size = $predictedSize;
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
            $variants_count =  Variants::where('variant_id', '=', trim($row['id']))->count();
            $variant = new Variants();
            if ($variants_count == 0) {

                $variant->variant_id = trim($row['id']);
                $variant->size = $row['option1'];
                $variant->price = $row['price'];
                $variant->product_id = trim($row['product_id']);
            } else {
                $message['message'] = 'Variant Duplicate';
                $message['status'] = 0;
                return $message;
            }
            $variant->save();
        }




        $product =  Selectedsize::where('id', '=', trim($data['id']))->count();
        if ($product == 0) {
            $product = new Selectedsize();
            $product->title = $data['title'];
            $product->product_id = trim($data['id']);
            $product->image_link = $data['image']['src'];
            $product->vendor = $data['vendor'];
            $product->admin_graphql_api_id = trim($data['admin_graphql_api_id']);
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
    //Size Chart

    public function sizeChartIndex($id)
    {
        $sizeChart = Sizechart::with('product', 'bodyFeature')->where([['product_id', '=', trim($id)], ['status', '>', 0]])->get();

        return view('size-charts.index', [
            'current_product_id' => $id,
            'sizeChart' => $sizeChart

        ]);
    }
    public function sizeOfSpecificRange($id)
    {

        $bodySpecs = Bodyfeature::where('sizechart_id', '=',trim($id))->get();

        return $bodySpecs;
    }
    public function sizeChartDelete(Request $request)
    {

        $sizechart = Sizechart::find(trim($request->get('id')));
        $p_id = intval($sizechart->product_id);
        $sizechart->status = 0;
        $sizechart->save();

        $body = Bodyfeature::where('sizechart_id', '=', trim($request->get('id')))->first();
        if ($body) {

            $body->status = 0;
            $body->save();
        }
        return   redirect()->route('sizechart.home', ['id' => trim($p_id)]);
    }
    public function sizeChartEdit(Request $request)
    {


        $sizechart = Sizechart::with('bodyFeature', 'product')->find(trim($request->get('id')));
        $variants = Variants::where('product_id', '=', trim($request->get('product_id')))->get();



        $variantsOfAttributes = Attributetypes::with('bodyFeatureOfType')->where([['product_id', '=',trim($request->get('product_id')) ], ['status', '>', 0]])->get();
        //$variantsOfAttributes= Bodyfeature::where([['attr_id', '=', $request->get('id')], ['status', '>', 0]])->get();

        return view('size-charts.edit', [
            'sizechart' => $sizechart,
            'current_product_id' => trim($request->get('product_id')),
            'id' => trim($request->get('id')),
            'variantsOfAttributes' => $variantsOfAttributes,
            'variants' => $variants

        ]);
    }
    public function createSizeChart($id)
    {
        $variants = Variants::where([['product_id', '=', trim($id)]])->get();
        $variantsOfAttributes = Attributetypes::with('bodyFeatureOfType')->where([['product_id', '=', trim($id)], ['status', '>', 0]])->get();


        return view('size-charts.create', [
            'product_id' => trim($id),
            'variantsOfAttributes' => $variantsOfAttributes,
            'variants' => $variants
        ]);
    }
    public function sizeChartPost(Request $request)
    {

        try {
            $this->validate($request, [
                'weight_start' => 'required|min:10|max:999|numeric',
                'weight_end' => 'required|min:10|max:999|numeric',
                'height_start' => 'required|min:10|max:999|numeric',
                'height_end' => 'required|min:10|max:999|numeric',
                // 'body_measurement_start.*'=>'required|array|numeric',
                // 'body_measurement_end.*'=>'required|array|numeric',
                'predicted_size' => 'required|min:2|alpha',

            ], [
                'weight_start.required' => "Enter Value for Weight Start Range",
                'weight_end.required' => "Enter Value for Weight End Range",
                'height_start.required' => "Enter Value for Height Start Range",
                'height_end.required' => "Enter Value for Height End Range",
                // 'body_measurement_start.required'=>"Enter Value for Attribute Start Range",
                // 'body_measurement_end.required'=>"Enter Value for Attribute End Range",
                'predicted_size.required' => "Enter Value for Predicted Size",
                'predicted_size.alpha' => "Input must be Letters i.e (A-Z,a-z)",
                'weight_start.numeric' => "Entered Value must be Numeric",
                'weight_end.numeric' => "Entered Value must be Numeric",
                'height_start.numeric' => "Entered Value must be Numeric",
                'height_end.numeric' => "Entered Value must be Numeric",
                // 'body_measurement_start.numeric'=>"Entered Value must be Numeric",
                // 'body_measurement_end.numeric'=>"Entered Value must be Numeric",


            ]);


            $sizeChartLastId = Sizechart::create($request->all());


            for ($i = 0; $i <= count($request->get('body_measurement_start')) - 1; $i++) {



                $attrBody = Attributetypes::find($request->get('attribute_type')[$i]);
                $body = new Bodyfeature();
                $body->sizechart_id = trim($sizeChartLastId->id);
                $body->attr_measurement_start = $request->get('body_measurement_start')[$i];
                $body->attr_measurement_end = $request->get('body_measurement_end')[$i];
                $body->predicted_size = $request->get('predicted_size');
                $body->attr_id = trim($attrBody->id);
                $body->attr_name = strtolower($request->get('attribute_type_name')[$i]);
                $body->save();
            }
            Session::flash('success', 'Added Successfully');

            return   redirect()->route('sizechart.home', ['id' => $request->get('product_id')]);
        } catch (\Exception $e) {
            Session::flash('error', '*Invalid form missing attribute');
            return back();
        }
    }
    public function sizeChartUpdatePost(Request $request)
    {
        try {
            $this->validate($request, [
                'weight_start' => 'required|min:10|max:999|numeric',
                'weight_end' => 'required|min:10|max:999|numeric',
                'height_start' => 'required|min:10|max:999|numeric',
                'height_end' => 'required|min:10|max:999|numeric',
                // 'body_measurement_start'=>'required|min:10|max:999|numeric',
                // 'body_measurement_end'=>'required|min:10|max:999|numeric',
                'predicted_size' => 'required|min:2|alpha',

            ], [
                'weight_start.required' => "Enter Value for Weight Start Range",
                'weight_end.required' => "Enter Value for Weight End Range",
                'height_start.required' => "Enter Value for Height Start Range",
                'height_end.required' => "Enter Value for Height End Range",
                // 'body_measurement_start.required'=>"Enter Value for Attribute Start Range",
                // 'body_measurement_end.required'=>"Enter Value for Attribute End Range",
                'predicted_size.required' => "Enter Value for Predicted Size",
                'predicted_size.alpha' => "Input must be Letters i.e (A-Z,a-z)",
                'weight_start.numeric' => "Entered Value must be Numeric",
                'weight_end.numeric' => "Entered Value must be Numeric",
                'height_start.numeric' => "Entered Value must be Numeric",
                'height_end.numeric' => "Entered Value must be Numeric",
                // 'body_measurement_start.numeric'=>"Entered Value must be Numeric",
                // 'body_measurement_end.numeric'=>"Entered Value must be Numeric",


            ]);


            $sizeChart = Sizechart::find(trim($request->get('id')));

            $sizeChart->weight_start = $request->get('weight_start');
            $sizeChart->weight_end = $request->get('weight_end');
            $sizeChart->height_start = $request->get('height_start');
            $sizeChart->height_end = $request->get('height_end');
            $sizeChart->product_id = $request->get('product_id');
            $sizeChart->save();

            for ($i = 0; $i <= count($request->get('body_measurement_start')) - 1; $i++) {
                
                $b = Bodyfeature::where('sizechart_id', '=', trim($request->get('id')) )->get();
                $b[$i]['sizechart_id'] = trim($sizeChart->id);
                $b[$i]['attr_measurement_start'] = $request->get('body_measurement_start')[$i];
                $b[$i]['attr_measurement_end'] = $request->get('body_measurement_end')[$i];
                $b[$i]['predicted_size'] = $request->get('predicted_size');
                // commented as the attr_id was to be store id of attribute_Types folder but it was storing id of body_feature table
                // $b[$i]['attr_id'] = $request->get('attribute_type')[$i];
                $b[$i]['attr_name'] = strtolower($request->get('attribute_type_name')[$i]);
                $b[$i]->save();
            }
            Session::flash('success', 'Updated Successfully');
            return   redirect()->route('sizechart.home', ['id' => trim($request->get('product_id'))]);
        } catch (\Exception $e) {
            Session::flash('error', '*Invalid form missing attribute');
            return back();
        }
    }
    public function attributeType($id)
    {
        $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails')->where([['product_id', '=', trim($id)], ['status', '>', 0]])->get();


        return view('attribute_types.index', [
            'id' => $id,
            'attrTypeOfProducts' => $attributeTypeOfProducts
        ]);
    }
    public function attributeTypeFront($id)
    {
        $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails')->where([['product_id', '=', trim($id)], ['status', '>', 0]])->get();


        return $attributeTypeOfProducts;
    }
    public function attributeTypeCreate(Request $request)

    {

        // $attributeTypeOfProducts = Attributetypes::with('product')->where('product_id','=',$request['id'])->get();
        $attributeTypeOfProducts = Products::with('attributetypes')->where('product_id', '=', trim($request['id']))->get();


        return view(
            'attribute_types.create',
            [
                'product_id' => trim($request['id']),
                'attrOfProduct' => $attributeTypeOfProducts
            ]
        );
    }
    public function storeAttributeType(Request $request)
    {


        if (count($request['thumb']) > 3) {
            Session::flash('error', "Image Selection Limit is 3");
            return back();
        }

        $this->validate($request, [
            "attribute_name" => "required",
            "attribut_size.*"  => "required|numeric|distinct|min:2",



        ], [
            "attribute_name.required" => "Please Enter Attribute name",



        ]);
        $attr = new AttributeTypes();
        $attr->name = $request->get('attribute_name');
        $attr->product_id = trim($request->get('product_id'));

        $attr->status = ($request->get('is_required') == 'on' ? 1 : 0);
        $attr->save();
        for ($j = 0; $j < count($request['attribut_size']); $j++) {
            $attrImg = new Attributeimages();
            if ($request->file('thumb')[$j]) {
                $this->validate($request, [
                    'thumb.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                // if (File::exists($attr->thumb)) {
                //     File::delete($attr->thumb);
                // }

                $path = 'files/upload/admin/';


                $thumb = $request->file('thumb')[$j];
                $image = Str::slug($attr->name) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
                if (!file_exists($path)) {
                    mkdir($path, 666, true);
                }
                Image::make($thumb)->resize(300, 300)->save($path . '_' . $image);

                $attrImg->attr_size_value = $request['attribut_size'][$j];
                // $attrImg->attr_image_src = env('APP_URL') . '/' . $path  . '_' . $image;
                $attrImg->attr_image_src = $path  . '_' . $image;
                $attrImg->attribute_size_name = $request['attribut_size_name'][$j];
                $attrImg->attribute_type_id = trim($attr->id);
                $attrImg->product_id = trim($attr->product_id);
                $attrImg->save();
            }
        }
        return   redirect()->route('attributetypes.home', ['id' => $request->get('product_id')]);
    }
    public function storeAttributeEdit(Request $request)
    {
        $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails')->find($request['id']);


        return view('attribute_types.edit', [
            'attrId' => trim($request['id']),
            'attrTypeOfProduct' => $attributeTypeOfProducts
        ]);
    }

    public function storeAttributeUpdate(Request $request)
    {
       
        $data = $request->all();
        $attr = AttributeTypes::find($data['product_id']);
        $attr->name = $data['attribute_name'];

        $attr->status = (isset($data['is_required'])) ? 1 : 0;
        $attr->save();
        for ($j = 0; $j < count($request['attribut_size']); $j++) {
            $pid = $data['product_id'];
            $attrImg = Attributeimages::where('attribute_type_id', '=', $pid)->get();

            if (isset($request->file('thumb')[$j])) {
                $this->validate($request, [
                    'thumb.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
               
                $path = 'files/upload/admin/';


                $thumb = $request->file('thumb')[$j];
                $image = Str::slug($attr->name) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
                if (!file_exists($path)) {
                    mkdir($path, 666, true);
                }
                Image::make($thumb)->resize(300, 300)->save($path . '_' . $image);

                $attrImg[$j]->attr_size_value = $request['attribut_size'][$j];
                // $attrImg[$j]->attr_image_src = env('APP_URL') . '/' . $path  . '_' . $image;
                $attrImg[$j]->attr_image_src = $path  . '_' . $image;
                $attrImg[$j]->attribute_size_name = $request['attribut_size_name'][$j];
                $attrImg[$j]->attribute_type_id = trim($attr->id);
                $attrImg[$j]->product_id = trim($attr->product_id);
                $attrImg[$j]->save();
            } else {

                $attrImg[$j]->attr_size_value = $request['attribut_size'][$j];
                // $attrImg->attr_image_src = env('APP_URL') . '/' . $path  . '_' . $image;
                //  $attrImg->attr_image_src = $path  . '_' . $image;
                $attrImg[$j]->attribute_size_name = $request['attribut_size_name'][$j];
                $attrImg[$j]->attribute_type_id = trim($attr->id);
                $attrImg[$j]->product_id = trim($attr->product_id);
                $attrImg[$j]->save();
            }
        }

        return   redirect()->route('attributetypes.home', ['id' => $attr->product_id]);
    }
    public function disableAttributeType(Request $request)
    {
        $attr = AttributeTypes::find(trim($request->get('id')));
        $attr->status = 0;
        $attr->save();
        return   redirect()->route('attributetypes.home', ['id' => $attr->product_id]);
    }

    public function getAttributesOnHeightWeight(Request $request)
    {
        
         $data = $request->all();
         
        //$data['productkey'] = '6925368524956';
        $h = 0;
        $w = 0;
        
        $response = array();
        $container = array();

            if ($data['convertedMeasurements'] == true) {

                $w = intval($data['weight'] * 2.2);

                $h = intval($data['heightcm']);
            } else {
                $h = intval(($data['heightfoot'] * 30.48) + ($data['heightinch'] * 2.54));
                $w = intval($data['weight']);
            }

        $attributeTypeOfProducts = Attributetypes::with('attrDetails')->where([['product_id', '=', trim($data['productkey'])], ['status', '=', 1]])
            ->get();

        $attributesjoined = Sizechart::with('bodyFeature', 'attributecsb')

            ->where('weight_start', '<=',  $w)
            ->where('weight_end', '>=',  $w)
            ->where('height_start', '<=',  $h)
            ->where('height_end', '>=',  $h)
            ->where('status','>',0)
            ->where('product_id', '=',  trim($data['productkey']))
            ->get();

            foreach($attributesjoined as $key => $aj) {
                
                foreach($aj['bodyFeature'] as $i => $aj_bf){

                foreach ($aj['attributecsb'] as $j=> $aj_csb) {

                    if ($aj_bf->attr_measurement_start <= $aj_csb->attr_size_value && $aj_bf->attr_measurement_end >= $aj_csb->attr_size_value) {



                        if ($aj_bf->attr_id == $aj_csb->attribute_type_id) {

                            //this check is to ensure whether to enter the second matching record in same object or next object
                            $aj_csb['sizechart_id'] = $aj->id;
                            $container[] = $aj_csb;
                        }
                    }
                }
            }
        }

            foreach ($attributeTypeOfProducts as $at) {
                $at['attr_items'] = $container;
            }

            return $attributeTypeOfProducts;
            
            $res = array('ogArray' => $attributeTypeOfProducts, 'scArray' => $attributeTypeOfProducts);
            return $res;
        
            //return following in case of any error
            // return     $attributeTypeOfProducts = Attributetypes::with('attrDetails', 'attrItems')->where([['product_id', '=', $data['productkey']], ['status', '>', 0]])
            //     ->get();
        

        $count = 0;
        $bcount = 0;
        $scount = 0;
        $nfcount = 0;
        for ($i = 0; $i < count($attributeTypeOfProducts); $i++) {

            if ($i == 0) {

                for ($k = 0; $k < count($attributeTypeOfProducts[$i]['attr_items']); $k++) {
                    $fcount = count($attributeTypeOfProducts[$i]['attr_items']);

                    if ($attributeTypeOfProducts[$i]->id == $attributeTypeOfProducts[$i]->attr_items[$k]->attribute_type_id) {
                        $count = $count + intval(1);
                        $popcount = count($attributeTypeOfProducts[$i]['attr_items']) - $count;
                    }
                }

                for ($pc = 0; $pc < $popcount; $pc++) {


                    array_pop($attributeTypeOfProducts[$i]['attr_items']);
                }
            } else if ($i == 1) {
                for ($s = 0; $s < count($attributeTypeOfProducts[$i]['attr_items']); $s++) {


                    if ($attributeTypeOfProducts[$i]->id == $attributeTypeOfProducts[$i]->attr_items[$s]->attribute_type_id) {

                        for ($sc = $s; $sc < $s + 1; $sc--) {

                            array_splice($attributeTypeOfProducts[$i]['attr_items'], $sc - 1, 1);
                            array_splice($attributeTypeOfProducts[$i]['attr_items'], $sc + 1, 1);
                            // $attributeTypeOfProducts[$i].attr_items.pop();
                        }
                    }
                }
            } else {
                for ($b = 0; $b < count($attributeTypeOfProducts[$i]['attr_items']); $b++) {

                    if ($attributeTypeOfProducts[$i]->id == $attributeTypeOfProducts[$i]->attr_items[$b]->attribute_type_id) {
                        $bcount = $bcount + intval(1);
                        $shiftcount = count($attributeTypeOfProducts[$i]['attr_items']) - $bcount;
                    }
                }

                for ($sc = 0; $sc < $shiftcount; $sc++) {
                    array_shift($attributeTypeOfProducts[$i]['attr_items']);
                }
            }
        }

        //  return $attributeTypeOfProducts;

        // $size = Sizechart::with('attributecsb','bodyFeature')
        // ->where([['weight_start','<=',$w],['weight_end','>=',$w],['height_start','<=',$h],['height_end','>=',$h]])




    }
}
