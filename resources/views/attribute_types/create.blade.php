@extends('shopify-app::layouts.default')
@section('content')

<div class="row mt-5 offset-3 ml-5 " style="10px !important">
    @include('partials_attributes.sidebar')
    <div class="col-md-9">  
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Attribute Type') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('attributesTypes.add') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{($attrOfProduct[0]['product']['product_id'])??$product_id }}">
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribute_name" type="text"
                           class="form-control @error('attribute_name') is-invalid @enderror" name="attribute_name"
                            required autocomplete="off"
                           >

                    @error('attribute_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="2" id="product_name" type="text"
                           class="form-control @error('product_name') is-invalid @enderror" value="{{$attrOfProduct[0]['name']}}"
                            required autocomplete="off" readonly disabled
                           >

                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
           

            <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>


                <div class="col-md-6">
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_required"
                                   id="is_required" >

                           
                        </div>



                    
                </div>

            </div>

           

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
 <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            }); 
    })
</script>
@endsection