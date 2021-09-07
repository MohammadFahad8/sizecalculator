{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')

<div class="row mt-5  " >
    @include('partials_attributes.sidebar')
    <div class="col-md-9">
<div class="card ">
    <div class="card-header">@include('snippets.buttonback'){{ __('Edit Attribute Type') }}</div>
    <div class="card-body">

        <form method="POST" action="{{ route('attributesTypes.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tag_id" value="{{ $attrId }}">
            <div class="form-group row">
                <label for="name"
                       class="col-md-3 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

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
            @foreach ( $attrTypeOfProduct->attrDetails as $at)

            <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-3 col-form-label text-md-right">{{ __('size ') }}</label>

                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off" value="{{ $at->attr_size_value}}"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size" type="text" class="form-control " readonly value="{{ $at->attribute_size_name }}" name="attribut_size_name[]" required="" autocomplete="off" >

                </div>
                <div class="col-md-5">


                    <input class="form-control-file attr-img ml-md-n2 ml-lg-n2 @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                           id="thumb"   >

                           @error('thumb')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @else
                            <span>
                            <strong class="max-msg text text-danger d-none">Maximum 3 Allowed*</strong>
                       </span>
                           @enderror







        </div>
            </div>

            @endforeach
            <div class="form-group row">
                <label for="name"
                       class="col-md-3 col-form-label text-md-right">{{ __('Tag Name') }}</label>

                <div class="col-md-6">
                    <input id="product_name" type="text"
                           class="form-control @error('product_name') is-invalid @enderror" value="{{$attrTypeOfProduct->tags->tagname}}"
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
                       class="col-md-3 col-form-label text-md-right">{{ __('Status') }}</label>


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
