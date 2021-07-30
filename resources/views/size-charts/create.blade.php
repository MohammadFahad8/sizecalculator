{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')
<style>

  .atttname:focus-visible
  {
    border:1px solid transparent !important;

  }
</style>
<div class="row mt-5 " style="margin-left:10px !important">
    @include('partials_sizes.sidebar')
    <div class="col-md-9 ">
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Size') }}</div>
    <div class="card-body">
        
        <form id="sizechartform" method="POST" action="{{ route('sizechart.add',['product_id'=> $product_id ]) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label for="weight_start"
                       class="col-md-4 col-form-label text-md-right">{{ __('Weight Start') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="weight" type="number"
                           class="form-control @error('weight_start') is-invalid @enderror" name="weight_start" min="1" max="500" placeholder="Enter Weight Start (Lbs.)"
                            required autocomplete="off"
                           >

                    @error('weight_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
             <div class="form-group row">
                <label for="weight_end"
                       class="col-md-4 col-form-label text-md-right">{{ __('Weight End') }}</label>

                <div class="col-md-6">
                    <input tabindex="2" id="weight_end" type="number"
                           class="form-control @error('weight_end') is-invalid @enderror" name="weight_end"
                            required autocomplete="off" min="1" max="500" placeholder="Enter Weight End (Lbs.)"
                           >

                    @error('weight_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
             <div class="form-group row">
                <label for="height_start"
                       class="col-md-4 col-form-label text-md-right">{{ __('Height Start') }}</label>

                <div class="col-md-6">
                    <input tabindex="3" id="height_start" type="number"
                           class="form-control @error('height_start') is-invalid @enderror" name="height_start"
                            required autocomplete="off" min="1" max="272" placeholder="Enter Height Start (Cm.)"
                           >

                    @error('height_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
              <div class="form-group row">
                <label for="height_end"
                       class="col-md-4 col-form-label text-md-right">{{ __('Height End') }}</label>

                <div class="col-md-6">
                    <input tabindex="4" id="height_end" type="number"
                           class="form-control @error('height_end') is-invalid @enderror" name="height_end"
                            required autocomplete="off" min="1" max="272" placeholder="Enter Height End  (Cm.)"
                           >

                    @error('height_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

           
           
            @foreach($variantsOfAttributes as $key => $attr)
                          
            @foreach ($attr->attrDetails as $ad )
                
            
            
    
            
            <div class="form-group row " >
                <input type="hidden" value="{{ $attr->id }}" name="attribute_type[]">
                <input for="body_measurement_start"
                       class="col-md-2 col-form-label text-md-right border-0 size-name "    name="attribute_type_name[]" value="{{ $attr->name }}" readonly/>
                       <div class="col-2">
                       <span>{{ $ad->attribute_size_name }}</span>
                    </div>
 
                <div class="col-3">
                    <input tabindex="{{ $key + 5 }}"  type="number"  step="1"
                           class="inp my form-control @error('body_measurement_start') is-invalid @enderror start_from_{{ $attr->id }}" id="start_from_{{ $attr->id }}" a
                           name="body_measurement_start[]" placeholder="Enter Start..." data-fname="{{ $attr->name }}" data-bodyfit="{{ $attr->id }}" data-bylt="{{ $attr->id }}" data-min="{{ $attr->attrDetails[0]->attr_size_value}}" data-max="{{ $attr->attrDetails[2]->attr_size_value}}"  >

                    @error('body_measurement_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="col-3">
                    <input tabindex="{{ $key + 6 }}"  type="number" step="1" 
                           class="inp form-control @error('body_measurement_end') is-invalid @enderror ends_to_{{ $attr->id }}"
                           name="body_measurement_end[]" placeholder="Enter End..."  data-bylt="{{ $attr->id }}" data-min="{{ $attr->attrDetails[0]->attr_size_value}}" id="ends_to_{{ $attr->id }}" data-max="{{ $attr->attrDetails[2]->attr_size_value}}"     >

                    @error('body_measurement_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            @endforeach
            @endforeach
            
             <div class="form-group row " >
                <label for="predicted_size"
                       class="col-md-4 col-form-label text-md-right">{{ __('Predicted Size') }}</label>

                <div class="col-md-6">
                    <input id="predicted_size" type="text" required
                           class="form-control @error('predicted_size') is-invalid @enderror"
                           name="predicted_size" placeholder="Relatable Size" >

                    @error('predicted_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
           
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button onclick="return formValidation(event)" type="submit" class="btn btn-primary" >
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript">

$(".inp").on('keyup', function(){

    $(this).removeClass('input-btn-outline-danger');
})

function formValidation(event)
{
    $('.my').each(function(e){

        sizeChartValid($(this).data('bodyfit'),$(this).data('fname'))
        
    })
   

   

}
function sizeChartValid(id,name){
    
    
    var fval = $('#start_from_'+id).val();
    
    var eval = $('#ends_to_'+id).val();
    if(fval > eval){

        toastr.error(toTitleCase(name) + ' start value should be less than end')
        $('#start_from_'+id).addClass('input-btn-outline-danger')
        event.preventDefault();
    return false;
        
    }else if(fval.length == 0 || eval.length == 0)
    {
        toastr.error(toTitleCase(name) + ' cannot be empty')
        $('#start_from_'+id).addClass('input-btn-outline-danger')
        event.preventDefault();
    return false;
    }
   else
    {
        return true;
    }
   
    
   
}


</script>

@endsection