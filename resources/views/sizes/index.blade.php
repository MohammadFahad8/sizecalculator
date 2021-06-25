@extends('shopify-app::layouts.default')
@section('content')

<div class="row mt-5 p-5">
    @include('partials_sizes.sidebar')
    <div class="col-md-9">
<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3"> <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Sizes') }}</span> </div>
            <div class="col-md-9"><a
                href="{{ route('sizes.create') }}" class="btn btn-info btn-md button-add border border-light float-right "> <i class="fas fa-plus"></i><span style="margin-left:10px !important">Size</span></a></div>
        </div>
       </div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Size</th>
    <th>Alias</th>
    <th>Vaiant Selected</th>
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
    @forelse($sizes as $size)
    <tr>
            <td>{{ $size->name }}</td>
            <td>{{ $size->alias }}</td>
            <td>{{ $size->variant??'n/a' }}</td>
            
            <td><a href="{{ route('sizes.edit', ['id'=>$size->id]) }}" class="btn btn-info">Edit</a></td>
            <td><a href="{{ route('sizes.delete',['id'=>$size->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>

    </tr>
    @empty
    @endforelse
 

    </tbody>
</table>
{{-- {{ $sizes->render() }} --}}

    </div>
</div>
</div>
</div>
@endsection

