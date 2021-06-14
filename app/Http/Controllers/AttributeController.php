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
use App\Models\Size;

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
    public function addOrUpdateProduct(Request $request)
    {
        foreach ($request['variants'] as $key => $value) {
            

            Size::updateOrCreate([
                'id' =>$request->id
            ],
            [
                    'id' =>$request->id,
                    'name' =>$value['title'],
                    'alias' =>$value['title'],
                    'attr_id'=>$request->id,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    
            ]);
    
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
        
    
   
   
  if(($data['weight'] >= 103 && $data['weight']<=121) && ($height_cm  >=  134 && $height_cm <= 150)  )
  {
     //xxs
     return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);
     


  }

  else if(($data['weight'] > 121 && $data['weight']<=139) && ($height_cm  >  150 && $height_cm <= 165))
  {
   //xs
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);
  }
  else  if(($data['weight'] > 139 && $data['weight']<=161) && ($height_cm  >=  165 && $height_cm <= 175))
  {

   //s
   return $this->measurements($data['chest'],$data['stomach'],$data['bottom']);
   

  }

  else if(($data['weight'] > 155 && $data['weight']<=175) && ($height_cm  >=  173 && $height_cm <= 185 ))
  {
   //M
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);

  }
  else  if(($data['weight'] > 165 && $data['weight']<=198) && ($height_cm  >=  178 && $height_cm <= 190))
  {

   //ML
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);

  }
  else if(($data['weight'] > 187 && $data['weight']<=214) && ($height_cm  >=  185 && $height_cm <= 195 ))
  {

   //L
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);

  }
  
  else if(($data['weight'] > 207 && $data['weight']<=242) && ($height_cm  >=  190 && $height_cm <= 205 ))
  {
   //XL
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);
  }
  else  if(($data['weight'] > 242) && ($height_cm  >  205 ))
  {
   //XXL
   return  $this->measurements($data['chest'],$data['stomach'],$data['bottom']);
  }
  else {
    return $size='M';
    
  }
  }
  public function measurements ($c,$s,$b){
$sum = $c + $s +$b;
$size='';
        $sizes = Size::latest()->get();
        
    // echo $sizes[0]->alias;
    // echo $sizes[1]->alias;
    // echo $sizes[2]->alias;
    // exit;
    switch($sum)
    {

        case 3:
            return $size='Small';
            break;
        case 4:
            return $size='Medium';
            break;
        case 5:
            return $size ="Large";
            break;
        case 6:
            return $size = 'Large';
            break;
        case 7:
            return   $size ='Large';
            break;
        case 8:
            return  $size='Large';
            break; 
        case 9:
            return $size='Large';
                    break;
        default:
        return  $size = 'Not in wardrobe';
            
      }

      



  }
    

}
