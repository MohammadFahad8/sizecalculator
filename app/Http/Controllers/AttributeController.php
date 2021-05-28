<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Attributetypes;
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
        
        
        $attr = Attribute::latest()->with('attributetype')->get();
        
        
        return view('attributes.index',[
            'attributes'=>$attr]);
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
        return view('attributes.create',
        [
            'attributes'=>$attr
        ]);
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
    $attr->is_required = ($request->get('is_required') == 'on'? 1 : 0);
    $attr->save();
    return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
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
        $attrtypes = Attributetypes::latest()->get();
        return view('attributes.edit',[
            'attr'=>$attr,
            'attributetypes'=>$attrtypes,
            'id'=>$id


        ]);
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
        $attr->is_required = (isset($data['is_required']))?1:0;
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
}
