@extends('shopify-app::layouts.default')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important">
@include('partials_attributes.sidebar')
<div class="col-md-8" >
<div class="card">
    <div class="card-header "><span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Products') }}</span> </div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Sr #</th>
    <th>Name</th>
    <th>Permission</th>
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
    @forelse($products as $key=> $row)
    <tr>
            
            <td>{{ $key+1 }}</td>
            <td>{{ $row->name }}</td>
            <td id="{{ $row->id }}">{{ $row->status }}</td>
            
            <td>
                <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status==1) ? 'checked' : '' }}>
             </td>
            
                
            
           
            {{-- 
            <td><a href="{{ route('attributes.delete',['id'=>$attr->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td> --}}

    </tr>
    @empty
    @endforelse
 

    </tbody>
</table>
    </div>
</div>
</div>
</div>
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var product_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/product/edit/',
              data: {'status': status, 'id': product_id},
              success: function(data){
                  
                $('#'+data.id+'').text(data.status);
              }
          });
      })
    })
  </script>
@endsection