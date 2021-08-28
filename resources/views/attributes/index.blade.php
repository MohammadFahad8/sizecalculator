{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')



{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important">
@include('partials_attributes.sidebar')
<div class="col-md-8" >
<div class="card">
    {{-- <div class="card-header "><span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Attributes') }}</span> <a
        href="{{ route('attributes.create') }}" class="btn btn-info btn-md button-add border border-light offset-10 ">
        <i class="fas fa-plus"></i>Attribute
    </a></div> --}}
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3"> <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Dashboard') }}</span> </div>
            {{-- <div class="col-md-9"><a  href="{{ route('attributes.create') }}" class="btn btn-info btn-md button-add border border-light float-right "> <i class="fas fa-plus"></i><span style="margin-left:10px !important">Attribute</span></a></div> --}}
        </div>
       </div>
    <div class="card-body">
        
        <div class="text-left">
             <p>Welcome to Body Fit Application</p>
             
             
        </div>
       
    </div>
</div>
</div>

</div>
@endsection