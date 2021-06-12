<?php

namespace App\Http\Controllers;

use api;
use App\Models\Size;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Attributetypes;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sizes = Size::latest()->with('attribute')->get();
        
        return view('sizes.index',
        [
            'sizes'=>$sizes
            
        ]
    );

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
        return view('sizes.create',
        [
            'attributes'=>$attr
        ]);
    }

    public function searchProduct($query)
    {
        $shop = Auth::user();
        $product = $shop->api()->rest('GET','/admin/products.json?title='.$query)['body'];
        dd( $product);

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
            "size" => "required",
            "alias" => "required",
            "attribute_type" => "required",
            
            
        ], [
            "size.required" => "Please Enter Size",
            "alias.required" => "Please Select Alias",
            "attribute_type.required" => "Please Select one",
          
        ]);
    $attr = new Size();
    $attr->name = $request->get('size');
    $attr->alias = $request->get('alias');
    $attr->attr_id = $request->get('attribute_type');
    $attr->save();
    return $this->create();
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
    public function edit($id)
    {
        //
        $shop = Auth::user();
        
        $products = $shop->api()->rest('GET', '/admin/api/2021-01/products.json')['body']['container'];
       
        
        $sizes = Size::find($id);
        $attrtypes = Attributetypes::latest()->get();
        return view('sizes.edit',[
            'sizes'=>$sizes,
            'attributetypes'=>$attrtypes,
            'id'=>$id,
            'products'=>$products,


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
    public function update(Request $request, Size $size)
    {
        //
        $data = $request->all();
        $attr = Size::find($data['edit_id']);
        $attr->name = $data['size'];
        $attr->alias = $data['alias'];
        $attr->attr_id = $data['attribute_type'];
        $attr->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $attr = Size::find($id);
        $attr->delete();
        return $this->index();
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
}
