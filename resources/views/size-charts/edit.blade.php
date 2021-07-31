{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')
<div class="row mt-5 " style="margin-left:10px !important">
    @include('partials_sizes.sidebar')
    <div class="col-md-9 ">
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Edit Size') }}</div>
    <div class="card-body">
        
        <form id="sizechartform" method="POST" action="{{ route('sizechart.update',['id'=>$id,'product_id'=> $current_product_id ]) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label for="weight_start"
                       class="col-md-4 col-form-label text-md-right">{{ __('Weight Start') }}</label>

                <div class="col-md-6">
                    <input id="weight" type="number"
                           class="form-control @error('weight_start') is-invalid @enderror" name="weight_start" min="0" max="500" placeholder="Enter Weight Start"
                            required autocomplete="off"
                            value="{{ $sizechart->weight_start }}"
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
                    <input id="weight_end" type="number"
                           class="form-control @error('weight_end') is-invalid @enderror" name="weight_end"
                            required autocomplete="off" min="0" max="500" placeholder="Enter Weight End"
                            value="{{ $sizechart->weight_end }}"
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
                    <input id="height_start" type="number"
                           class="form-control @error('height_start') is-invalid @enderror" name="height_start"
                            required autocomplete="off" min="0" max="500" placeholder="Enter Height Start"
                            value="{{ $sizechart->height_start }}"
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
                    <input id="height_end" type="number"
                           class="form-control @error('height_end') is-invalid @enderror" name="height_end"
                            required autocomplete="off" min="0" max="500" placeholder="Enter Height End"
                            value="{{ $sizechart->height_end }}"
                           >

                    @error('height_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
           
            @foreach($sizechart->bodyFeature as $attr)
            
            
    
            
            <div class="form-group row " >
                <input type="hidden" value="{{ $attr->id }}" name="attribute_type[]">
                <input for="body_measurement_start"
                       class="col-md-4 col-form-label text-md-right border-0 size-name" name="attribute_type_name[]" value="{{ $attr->attr_name }}" readonly/>
 
                <div class="col-3">
                    <input id="body_measurement_start" type="number" max="99999" step="1" min="0"
                           class="form-control @error('body_measurement_start') is-invalid @enderror"
                           name="body_measurement_start[]" placeholder="Enter Start..." value="{{ $attr->attr_measurement_start}}">

                    @error('body_measurement_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="col-3">
                    <input id="body_measurement_end" type="number" max="99999" step="1" min="0"
                           class="form-control @error('body_measurement_end') is-invalid @enderror"
                           name="body_measurement_end[]" placeholder="Enter End..." value="{{ $attr->attr_measurement_end}}" >

                    @error('body_measurement_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
           
            @endforeach
            {{-- checked --}}
            <div class="form-group row">
                <label for="predicted_size"
                class="col-md-4 col-form-label text-md-right">{{ __('Predicted Size') }}</label>

                <div class="col-md-6">
                    <select class="form-control @error('predicted_size') is-invalid @enderror role" name="predicted_size">

                        <option value=""> Please Select Size</option>

                        
                        @foreach($variants as $v)


                            <option value="{{ $v['size'] }}" @if(strtolower($v['size']) == strtolower($attr->predicted_size)) selected @endif > {{ $v->size }}</option>
                            {{-- <option value="{{ $v['size'] }}"  > {{ $v->size }}</option> --}}
                        @endforeach
                    </select>

                    @error('predicted_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- checled --}}
           
            {{-- <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Required') }}</label>


                <div class="col-md-6">
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_required"
                                   id="is_required" >

                           
                        </div>



                    
                </div>

            </div> --}}

           

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" >
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
$("#sizechartform").validate({
        rules: {
            "body_measurement_start[]": "required"
            "body_measurement_end[]": "required"
        },
        messages: {
            "body_measurement_start[]": "Please select Start Range",
            "body_measurement_end[]": "Please select End Range",
        }
    });
    $('.attributes-types').change(function () {
        var role = $(this).find('option:selected').text();
        
        $("input[name=body_measurement_start]").attr("placeholder",role+" Measurement Start");
        $("input[name=body_measurement_end]").attr("placeholder",role+" Measurement End");
    });
</script>

@endsection