@extends('shopify-app::layouts.default')
@section('content')

{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important">
@include('partials_attributes.sidebar')
<div class="col-md-8" >
<div class="card">
    <div class="card-header "><span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Attributes') }}</span> <a
        href="{{ route('attributes.create') }}" class="btn btn-info btn-md button-add border border-light offset-10 ">
        <i class="fas fa-plus"></i>Attribute
    </a></div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Attribute</th>
    <th>Type</th>
    <th>Required</th>
    <th>Status</th>
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
    @forelse($attributes as $attr)
    <tr>
            <td>{{ $attr->attribute_name }}</td>
            <td>{{ $attr->attributetype->name }}</td>
            <td>{{ $attr->is_required }}</td>
            <td>{{ $attr->status }}</td>
            <td><a href="{{ route('attributes.edit', ['id'=>$attr->id]) }}" class="btn btn-info">Edit</a></td>
            <td><a href="{{ route('attributes.delete',['id'=>$attr->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>

    </tr>
    @empty
    @endforelse
 

    </tbody>
</table>
    </div>
</div>
</div>
</div>
@endsection