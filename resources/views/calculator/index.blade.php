@extends('shopify-app::layouts.default')
@section('content')

<div class="card w-75 offset-2 mt-5">
  <div class="card-header">Find Fit</div>
  <div class="card-body">
    
<form style="margin-left:-150px!important">
  <div class="form-group row ">
    <label for="size"
           class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

    <div class="col-md-4">
        <input id="alias" type="text"
               class="form-control @error('title') is-invalid @enderror" name="feet"
               required autocomplete="off" autofocus>

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-4">
      <input id="alias" type="text"
             class="form-control @error('title') is-invalid @enderror" name="inch"
             required autocomplete="off" autofocus>

      @error('title')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
</div>
   
    <div class="form-group row">
      <label for="size"
      class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>
      <div class="col-md-8">
      <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    </div>
    <div class="form-group row">
      <label for="size"
      class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
      <div class="col-md-8">
      <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    </div>
    <div class="form-group row">
      <label for="size"
      class="col-md-4 col-form-label text-md-right">{{ __('Chest Size') }}</label>
      <div class="col-md-8">
      <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    </div>
   
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
              {{ __('Calculate') }}
          </button>
      </div>
  </div>
  </form>
  </div>
</div>
@endsection