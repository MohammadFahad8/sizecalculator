<?php

namespace App\Http\Controllers;

use api;
use App\Helpers\Helpers;
use App\Models\Attribute;
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
    public function show()
    {
        //
        echo '<script>console.log("Hitting controller")</script>';
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
    
  public function calculateSize(Request $request)
  {
      $data = $request->all();
      
      $height_cm = ($data['heightfoot'] * 30.48) + ($data['heightinch'] * 2.54);
        
    $size='';
   
   
  if(($data['weight'] >= 103 && $data['weight']<=121) && ($height_cm  >=  134 && $height_cm <= 150)  )
  {
     //xxs
     return $size='XXS';

  }

  else if(($data['weight'] > 121 && $data['weight']<=139) && ($height_cm  >  150 && $height_cm <= 165))
  {
   //xs
   return $size='XS';
  }
  else  if(($data['weight'] > 139 && $data['weight']<=161) && ($height_cm  >=  165 && $height_cm <= 175))
  {

   //s
   return $size='S';

  }

  else if(($data['weight'] > 155 && $data['weight']<=175) && ($height_cm  >=  173 && $height_cm <= 185 ))
  {
   //M
   return $size='M';

  }
  else  if(($data['weight'] > 165 && $data['weight']<=198) && ($height_cm  >=  178 && $height_cm <= 190))
  {

   //ML
   return $size='ML';

  }
  else if(($data['weight'] > 187 && $data['weight']<=214) && ($height_cm  >=  185 && $height_cm <= 195 ))
  {

   //L
   return $size='L';

  }
  
  else if(($data['weight'] > 207 && $data['weight']<=242) && ($height_cm  >=  190 && $height_cm <= 205 ))
  {
   //XL
   return $size='XL';
  }
  else  if(($data['weight'] > 242) && ($height_cm  >  205 ))
  {
   //XXL
   return $size='XXL';
  }
  else {
    return $size='One peculiar person you are';
    
  }
  }
  public function measurements (){
//   {
      
// if(this.form.chest == 1 && this.form.stomach == 1 && bottom == 1)
// {
// document.getElementById("fsize").innerHTML = 'XS';
// }
// else if((this.form.chest == 1 && this.form.stomach == 1) || (this.form.chest == 1 && this.form.stomach == 2) || (this.form.chest == 2 && this.form.stomach == 1))
// {

// document.getElementById("fsize").innerHTML = 'S';
// }
// else if ((this.form.chest == 2 && this.form.stomach == 2) && (this.form.chest == 2 && this.form.stomach == 3) && (this.form.chest == 3 && this.form.stomach == 2))
// {
// document.getElementById("fsize").innerHTML = 'M';

// }
// else if((this.form.chest == 3 && this.form.stomach == 3) )
// {
// console.log('l');
// document.getElementById("fsize").innerHTML = 'L';

// }
// else if((this.form.chest == 3 && this.form.stomach == 3 && bottom == 3))
// {
// console.log('xl');
// document.getElementById("fsize").innerHTML = 'XL';


// }
  }
    

}
