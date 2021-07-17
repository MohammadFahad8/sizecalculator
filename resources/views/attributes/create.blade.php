@extends('shopify-app::layouts.default')
@section('content')
@include('partials_attributes.style')

<div class="row mt-5 offset-3 ml-5 " style="10px !important">
    @include('partials_attributes.sidebar')
    <div class="col-md-9">  
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Attribute') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('attributes.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

                <div class="col-md-6">
                    <input id="attribute_name" type="text"
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
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Attribute Type') }}</label>

                <div class="col-md-6">
                    <select class="form-control @error('attribute_type') is-invalid @enderror role"
                            name="attribute_type" required>

                        <option value=""> Attribute Type</option>
                        @foreach($attributes as $attr)
                            <option
                                value="{{ $attr->id }}"> {{ $attr->name }} </option>
                        @endforeach
                    </select>

                    @error('licensetype')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Required') }}</label>


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
</div>
@endsection