@extends('shopify-app::layouts.default')
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
            <div class="col-md-3"> <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Attribute Types') }}</span> </div>
            <div class="col-md-9">
                <a href="{{ route('attributestypes.create',['id'=> $attrTypeOfProducts[0]['product']->product_id ]) }}" class="btn btn-info btn-md button-add border border-light float-right "> <i class="fas fa-plus"></i><span style="margin-left:10px !important">Attribute Type</span></a></div>
        </div>
       </div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Attribute Type Name</th>
    <th>Product Name</th>
    
    <th>Status</th>
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
    @forelse($attrTypeOfProducts as $attr)
    <tr>
            <td>{{ $attr->name }}</td>
            <td>{{ $attr->product->name }}</td>
            
            <td>{{ $attr->status }}</td>
            <td><a href="{{ route('attributesTypes.edit', ['id'=>$attr->id]) }}" class="btn btn-info">Edit</a></td>
            <td><a href="{{ route('attributesTypes.delete',['id'=>$attr->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>

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