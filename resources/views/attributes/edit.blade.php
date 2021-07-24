{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')
<div class="row mt-5 ml-3 ">
    @include('partials_attributes.sidebar')
    <div class="col-md-9 ">
<div class="card w-75 ">
    <div class="card-header">@include('snippets.buttonback')Edit Attribute</div>
    <div class="card-body">

        <form method="POST" action="{{ route('attributes.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value={{ $id }} name="edit_id">
            <div class="form-group row">
                <label for="attribute_name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
        
                <div class="col-md-6">
                    <input id="attribute_name" type="text"
                           class="form-control @error('title') is-invalid @enderror" name="attribute_name"
                           value="{{ $attr->attribute_name }}" required autocomplete="off" autofocus>
        
                    @error('title')
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
                <select class="form-control @error('role') is-invalid @enderror role" name="attribute_type">
        
                    <option value=""> Select Attribute Type</option>
        
                    
                    @foreach($attributetypes as $type)
        
        
                        <option value="{{ $type['id'] }}"
                                @if($type['id'] == $attr->attribute_type) selected @endif > {{ $type->name }}</option>
                    @endforeach
                </select>
        
                @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
         
           
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        
                        
                        <input class="form-check-input" type="checkbox" name="is_required" id="is_required"
                               {{ ($attr->is_required == 1)? 'Checked':'' }}  />
                        <label class="form-check-label" for="is_required">
                            {{ __('Required') }}
                        </label>
                    </div>
                </div>
            </div>
        
        
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form></div>
</div>
</div>
</div>
@endsection