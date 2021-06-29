@extends('shopify-app::layouts.default')
@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important">
@include('partials_attributes.sidebar')
<div class="col-md-8" >
<div class="card">
    <div class="card-header ">
        <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Products') }}</span><span class="float-right" >@include('snippets.refresh_products')</span> 
    </div>
    <div class="card-body">
        
<table class="table table-bordered" style="width:100% !important;">
    <thead>
<tr>
    {{-- <th>Sr #</th> --}}
    <th>Name</th>
    
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
        
    @forelse($other as $key=> $row)
    <tr>
            
            {{-- <td>{{ $key+1 }}</td> --}}
            <td><div class="row"><div class="col-md-2"><img src="{{ ($row->image_link == null) ? 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image-300x225.png' : $row->image_link}}" class="img-thumbnail" width="50"></div><div class="col-md-10">{{ $row->name }}</div></div></td>
            <td>
            {{-- <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status==1) ? 'checked' : '' }}> --}}
            <label class="switch">
                <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status==1) ? 'checked' : '' }}>
                <span class="slider round"></span>
              </label>
             </td>
            
                
            
           
            {{-- 
<td><a href="{{ route('attributes.delete',['id'=>$attr->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">
    Delete</a></td> --}}

    </tr>
    
    @empty
    
    <tr><td colspan="2">
    <div class="d-flex justify-content-center">
        'Nothing here'
    </div>
</td>
</tr>

    @endforelse
    
 

    </tbody>
</table>
    <div class="d-flex justify-content-center row">
        {{ $other->links('vendor.pagination.custom') }}
    </div>

    </div>

</div>
</div>
</div>

<script>
   
   
    $(function() {
        
        
        $('#Capa_1').on('click',function(){
            window.location.reload();
        })
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var product_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/product/edit/',
              data: {'status': status, 'id': product_id},
              success: function(data){
                  
               
               if(data.status==1)
               {
                toastr.options.progressBar = true;
            
                   toastr.success('Widget Permission granted for this Product')
               }
               else{
                toastr.warning('Widget removed for this Product')
                     }
             
               
              }
          });
      })
    })
  </script>
@endsection