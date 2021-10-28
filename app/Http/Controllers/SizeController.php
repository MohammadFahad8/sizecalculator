<?php

namespace App\Http\Controllers;

use api;
use App\Models\Size;
use App\Models\Products;
use App\Models\Variants;
use App\Models\Sizechart;
use App\Models\Bodyfeature;
use Illuminate\Http\Request;
use App\Models\Attributetypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function sizeChartIndex($id)
    {
        $sizeChart = Sizechart::with('product', 'bodyFeature')->where([['product_id', '=', trim($id)], ['status', '>', 0]])->get();

        return view('size-charts.index', [
            'current_product_id' => $id,
            'sizeChart' => $sizeChart

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSizeChart(Request $id)
    {
        $product = Products::where('tag_id','=',$id['total_tags'])->get();

        $variants = Variants::pluck('size');
        $variants = array_unique($variants->toArray());


        $variantsOfAttributes = Attributetypes::with('bodyFeatureOfType')->where([['tag_id', '=', trim($id['total_tags'])], ['status', '>', 0]])->get();



        return view('size-charts.create', [
            'product_id' => trim($id['total_tags']),
            'variantsOfAttributes' => $variantsOfAttributes,
            'variants' => $variants
        ]);
    }

    public function searchProduct($query)
    {
        $shop = Auth::user();

        $product = $shop->api()->rest('GET','/admin/api/2021-01/products/'.$query.'.json')['body'];
       return $product;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'predicted_size' => 'required|min:1|alpha',

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


            $sizeChartLastId = Sizechart::create($request->only(['weight_start','weight_end','height_start','height_end','product_id']));
            // $sizeChartLastId = Sizechart::create($request->all());


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
        catch (\Error $error) {
            Session::flash('error', '*Invalid form missing attribute');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function sizeChartEdit(Request $request)
    {


        $sizechart = Sizechart::with('bodyFeature', 'product')->find(trim($request->get('bylt_fit_token')));
//        $variants = Variants::where('product_id', '=', trim($request->get('product_id')))->get();
        $variants = Variants::pluck('size');
        $variants = array_unique($variants->toArray());


        $variantsOfAttributes = Attributetypes::with('bodyFeatureOfType')->where([['tag_id', '=',trim($request->get('total_tags')) ], ['status', '>', 0]])->get();
        //$variantsOfAttributes= Bodyfeature::where([['attr_id', '=', $request->get('id')], ['status', '>', 0]])->get();

        return view('size-charts.edit', [
            'sizechart' => $sizechart,
            'current_product_id' => trim($request->get('total_tags')),
            'id' => trim($request->get('bylt_fit_token')),
            'variantsOfAttributes' => $variantsOfAttributes,
            'variants' => $variants

        ]);
    }
    public function getAllProducts()
    {
        $shop = Auth::user();

        $products = $shop->api()->rest('GET', '/admin/api/2021-01/products.json')['body']['container'];
      return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function oldsizeChartDelete(Request $request)
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
    public function sizeChartDelete(Request $request)
    {

        $sizechart = Sizechart::find(trim($request->get('delete_opt')));
        $p_id = intval($sizechart->product_id);
        $sizechart->delete();

        $body = Bodyfeature::where('sizechart_id', '=', trim($request->get('delete_opt')))->get();
        foreach($body as $b)
        {
            $b->delete();
        }

        return   redirect()->route('sizechart.home', ['id' => trim($p_id)]);
    }

    public function selectProduct(Request $data)
    {

        $cart = session()->get('productBox');
          //If cart is totally new or totally empty
          if(!$cart){
            $cart =[
                    $data['id'] => [
                            'id'=>$data['id'],
                            'name' => $data['name'],


                    ]

                    ];
                    session()->put('productBox', $cart);
                    return back()->with('success','Product Added Successfully');

        }
            //If the selected product already exists in cart
        if(isset($cart[$data['id']])){


            return back()->with('success','Product already Added Successfully');

        }
        //If cart is not empty and is filled with  some other prooduct
            $cart[$data['id']] =[
                'id'=>$data['id'],
                'name'=>$data['name'],

            ];
            session()->put('productBox', $cart);
            return back()->with('success','Product Added Successfully');
    }
    public function removeProductFromBox(Request $request)
    {

        if($request->get('productid')) {

            $cart = session()->get('productBox');

            if(isset($cart[$request->get('productid')])) {

                unset($cart[$request->get('productid')]);

                session()->put('productBox', $cart);
            }

            return back()->with('danger','Product Removed Successfully');
        }
    }
    public function selectedProducts()
    {
        $products = session('productBox');
        return $products;
    }
    public function testpage()
    {
        return view('attributes.testpage');
    }
    public function sizeOfSpecificRange($id)
    {

        $bodySpecs = Bodyfeature::where('sizechart_id', '=',trim($id))->get();

        return $bodySpecs;
    }
}
