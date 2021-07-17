@extends('shopify-app::layouts.default')
@section('content')
@include('partials_attributes.style')
<div class="row mt-5 " style="margin-left:10px !important">
    @include('partials_sizes.sidebar')
    <div class="col-md-9 ">
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Size') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('sizes.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

                <div class="col-md-6">
                    <input id="size" type="text"
                           class="form-control @error('size') is-invalid @enderror" name="size"
                            required autocomplete="off"
                           >

                    @error('size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
             <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Alias') }}</label>

                <div class="col-md-6">
                    <input id="alias" type="text"
                           class="form-control @error('alias') is-invalid @enderror" name="alias"
                            required autocomplete="off"
                           >

                    @error('alias')
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
                    <select class="form-control @error('alias') is-invalid @enderror role"
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
@endsection