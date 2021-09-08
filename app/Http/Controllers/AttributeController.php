<?php

namespace App\Http\Controllers;

use api;
use App\Models\Size;
use App\Models\Tags;
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
use Illuminate\Support\Facades\Storage;

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
        $request['id'] = trim($request['id']);
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


            } else {


                $product->product_id =  trim($row['id']);
                $product->name =   $row['title'];
                $product->image_link = ($row['image'] == null) ? null : $row['image']['src'];
                $product->tags = ($row['tags'] == null) ? null : $row['tags'];
                $product->website_name =  trim($shop_config['id']);

                $product->save();



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



        if ($products->status == 1 ) {

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
        $sizes = array();
        $p = Products::where('product_id','=',trim($data['conversionCount']))->first();
        $sizeChartList = Sizechart::with('bodyFeature')->where('product_id', '=', trim($p->tag_id))->where('status','=',1)->get();


        $height_cm = 0;
        if ($data['convertedMeasurements'] == true) {
            $data['weight'] = $data['weight'] * 2.2;
            $height_cm = $data['heightcm'];
        } else {
            $height_cm = intval(($data['heightfoot'] * 30.48) + ($data['heightinch'] * 2.54));
        }
        foreach ($sizeChartList as $s) {
                foreach ($s['bodyFeature'] as  $b) {

                    foreach ($data['bodyMeasure'] as $key=> $bm)
                    {

                        if ($bm >= $b['attr_measurement_start'] && $bm <= $b['attr_measurement_end'] && $data['sz'][$key] == $b['sizechart_id'])
                        {
                            //    return $b['predicted_size'];
                              //getting all results based upon calculations
                             $sizes[]= $b['predicted_size'];


                        }
                    }
                }

        }

        return array_unique($sizes);

    }

    public function getSizeCount($predictedSize)
    {
        $variants = Variants::where([['product_id', '=', trim(session('product'))], ['size', '=', strtolower($predictedSize)]])->pluck('size');
        $count = $variants->count();
        return $count;
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
    public function attributeType($id)
    {
        $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails','tags')
            ->where([['tag_id', '=', trim($id)], ['status', '>', 0]])
            ->get();


        return view('attribute_types.index', [
            'id' => $id,
            'attrTypeOfProducts' => $attributeTypeOfProducts
        ]);
    }
    public function attributeTypeFront($id)
    {
        $p = Products::where([['product_id', '=', trim($id)], ['status', '>', 0]])->first();
        if($p!=null){
            $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails','tags')->where([['tag_id', '=', trim($p->tag_id)], ['status', '>', 0]])->get();


            return $attributeTypeOfProducts;
        }

    }
    public function attributeTypeCreate(Request $request)

    {

        // $attributeTypeOfProducts = Attributetypes::with('product')->where('product_id','=',$request['id'])->get();
        //$attributeTypeOfProducts = Products::with('attributetypes')->where('product_id', '=', trim($request['id']))->get();
        $attributeTypeOfProducts =  Tags::with('attributetypes')->where('id','=',trim($request['id']))->get();

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

        $attr->tag_id = trim($request->get('tag_id'));

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
                $attrImg->tag_id = trim($attr->tag_id);
                $attrImg->save();
            }
        }
        return   redirect()->route('attributetypes.home', ['id' => trim($request->get('tag_id'))]);
    }
    public function storeAttributeEdit(Request $request)
    {
        $attributeTypeOfProducts = Attributetypes::with('product', 'attrDetails','tags')->find($request['id']);


        return view('attribute_types.edit', [
            'attrId' => trim($request['id']),
            'attrTypeOfProduct' => $attributeTypeOfProducts
        ]);
    }

    public function storeAttributeUpdate(Request $request)
    {

        $data = $request->all();

        $attr = AttributeTypes::find($data['tag_id']);
        $attr->name = $data['attribute_name'];

        $attr->status = (isset($data['is_required'])) ? 1 : 0;
        $attr->save();
        for ($j = 0; $j < count($request['attribut_size']); $j++) {
            $pid = $data['tag_id'];
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
                $attrImg[$j]->tag_id = trim($attr->tag_id);
                $attrImg[$j]->save();
            } else {

                $attrImg[$j]->attr_size_value = $request['attribut_size'][$j];
                // $attrImg->attr_image_src = env('APP_URL') . '/' . $path  . '_' . $image;
                //  $attrImg->attr_image_src = $path  . '_' . $image;
                $attrImg[$j]->attribute_size_name = $request['attribut_size_name'][$j];
                $attrImg[$j]->attribute_type_id = trim($attr->id);
                $attrImg[$j]->tag_id = trim($attr->tag_id);
                $attrImg[$j]->save();
            }
        }

        return   redirect()->route('attributetypes.home', ['id' => $attr->tag_id]);
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
        $p = Products::where('product_id','=',trim($data['productkey']))->first();
        $attributeTypeOfProducts = Attributetypes::with('attrDetails')->where([['tag_id', '=', trim($p->tag_id)], ['status', '=', 1]])
            ->get();

        $attributesjoined = Sizechart::with('bodyFeature', 'attributecsb')

            ->where('weight_start', '<=',  $w)
            ->where('weight_end', '>=',  $w)
            ->where('height_start', '<=',  $h)
            ->where('height_end', '>=',  $h)
            ->where('status','>',0)
            ->where('product_id', '=',  trim($p->tag_id))
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
           //took code which was used earlier to append to populate the $attributeTypeOfProducts array

    }
}
