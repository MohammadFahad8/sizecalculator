{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5" style="margin-left:10px !important" id="products-all">
@include('partials_attributes.sidebar')
<div class="col-md-8">
<div class="card">
    <div class="card-header">
        <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Products') }}</span>
        <span class="float-right" >@include('snippets.refresh_products')</span> 
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
        @php
          $temp = 0;
          
        @endphp
        
    @forelse($other as $key=> $row)
    <tr>
            
            {{-- <td>{{ $key+1 }}</td> --}}
            <td>
              
              <div class="row"><div class="col-md-2">
                <img id="product-id-specific" v-on:click="productFix({{ $row->product_id }})" style="cursor: pointer" data-toggle="modal" data-target="#exampleModalCenter" src="{{ ($row->image_link == null) ?  env('APP_URL').'/images/download.png'  : $row->image_link}}" class="img-thumbnail" width="50">
              </div>
              <div class="col-md-10" style="cursor: pointer;">
              <a href="javascript:void(0)" class="text-dark" >{{ $row->name }}</a></div></div></td>
            <td>
            
            <label class="switch">

                <input data-id="{{$row->product_id}}" id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status==1) ? 'checked' : '' }}>
                <span class="slider round"></span>

            </label>
             </td>
            
                
            
           
           

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
        {{ $other->render('vendor.pagination.custom') }}
    </div>

    </div>

</div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          
          
            
              
           
<table class="table table-bordered table-responsive-lg " >
  <thead>
<tr>
  <th>Picture</th>
  <th>Name</th>
  <th :colspan="variant_count" class="text-center">variants</th>
  <th>Predicted Size</th>
  
</tr>
  </thead>
     <tbody>
     <tr v-if="isLoading"  > 
    <td><div class="text-center"><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
 </td>
         <td><div class="d-flex justify-content-center text-center">
<div class="spinner-grow spinner-grow-sm" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div></td> 
<td> <div class="text-center"><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="sr-only">Loading...</span>
</div></div></td>
<td><div class="text-center"> <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="sr-only">Loading...</span>
</div></div></td>
</tr>  
<tr v-if="!isLoading" >
  <td>
    
     <img id="single-product" :src="product.image_link" width="50" height="50"  alt="" class="img-thumbnail"> 
    </td>

  <td>@{{ product.name }}</td>
  
  <td v-for="(row,index) in product.variants" :key="row.id">
    
    @{{ row.size }}
  </td>
  
  <td> <a href="javascript:void(0)" v-on:click="viewAttributes(product.product_id)">View Attributes</a> </td>
</tr>


  </tbody>
    
</table>  

        
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
<!-- preloader
    ================================================== -->
    <div id="preloader">
      <div id="loader">
          <div class="line-scale">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
          </div>
      </div>
  </div>
@include('scripts.index')

<script>
  var v = new Vue({
    el:'#products-all',
    data: {
      variant_count:'',
        
        checkval:23123,
        isLoading:false,
        product:[],
        p_id:null,
        
        
    },
    methods:{

      viewAttributes:function($id)
      {
        window.location.href = "attributetypes-all/view/"+$id;
      },
      productFix:function($id)
      {
        this.p_id = $id;
        this.getProductDetails(this.p_id);
      },
       getProductDetails:function($id){
           this.isLoading = true;
           axios.get('product-details/'+$id)
           .then((res)=>{
             
               
               this.isLoading = false;
                this.product  = res.data
                
                this.variant_count = this.product.variants.length;
                
                 

           })
       },
          decodeHtml: function (html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }
    },
    mounted(){
      
      
      
     
    
      
    },
    watch:{}
  })
</script>

<script>


   /* Preloader
    * ----------------------------------------------------- */
 
   
   
  
    $(function() {
 $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            }); 
     
        
        $('#Capa_1').on('click',function(){
            window.location.reload();
         })
         $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var product_id = $(this).data('id'); 
          var tag_id = $(this).prop('id'); 
          
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/product/edit/',
              data: {'status': status, 'id': product_id},
              success: function(data){
                
                  
               if(data.error_msg)
               {
                toastr.info(data.error_msg)
                
                
                $("#"+tag_id).prop("checked", false);
               }
               else
               {
                 if(data.status==1)
               {
                 
                toastr.options.progressBar = true;
            
                   toastr.success('Widget Permission granted for this Product')
               }
               else{
                 
                toastr.warning('Widget removed for this Product')
                     }
               }
               
             
               
              }
          });
      })
    })
  </script>
@endsection