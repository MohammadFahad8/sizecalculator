{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')

<div class="row mt-5 offset-3 ml-5 " style="10px !important">
    @include('partials_attributes.sidebar')
    <div class="col-md-9">  
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Attribute Type') }}</div>
    <div class="card-body">
        
        <form method="POST" action="{{ route('attributesTypes.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $attrId }}">
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

                <div class="col-md-6">
                    <input id="attribute_name" type="text"
                           class="form-control  @error('attribute_name') is-invalid @enderror" value="{{ $attrTypeOfProduct->name }}"name="attribute_name"
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
                    <input id="product_name" type="text"
                           class="form-control @error('product_name') is-invalid @enderror" value="{{$attrTypeOfProduct->product->name}}"
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
                                   id="is_required" {{ ($attrTypeOfProduct->status == 1)?'Checked':'' }}  >

                           
                        </div>



                    
                </div>

            </div>

           

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" >
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection