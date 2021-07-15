@extends('shopify-app::layouts.default')
@section('content')


{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important" id="attribute-types">
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
                <a href="{{ route('attributestypes.create',['id'=> $attrTypeOfProducts[0]['product']->product_id??$id ]) }}" class="btn btn-info btn-md button-add border border-light float-right "> <i class="fas fa-plus"></i><span style="margin-left:10px !important">Attribute Type</span></a></div>
        </div>
       </div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Attribute Type Name</th>
    <th>Product Name</th>
    
    <th>Status</th>
    <th>Sizes of Product</th>
    <th colspan="3" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
           
    @forelse($attrTypeOfProducts as $attr)
    <tr>
            <td>{{ $attr->name }}</td>
            <td>{{ $attr->product->name }}</td>
            
            <td>{{ $attr->status }}</td>
            <td><select class="form-control btn" name="" id=""  required="required" readonly=""  >
            <option >
             Sizes of {{ $attr->name }}
            </option>
            <option >{{ $attr->size_one }}</option>
            <option >{{ $attr->size_second }}</option>
            <option >{{ $attr->size_third }}</option>
            </select></td>
            <td><a href="{{ route('sizechart.home',['id'=>$attrTypeOfProducts[0]['product']->product_id ]) }}"  class="">View Variants</a></td>
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

{{-- 
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
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
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
</div>
@include('scripts.index')
<script>
    var attributetypes = new Vue({
        el:'#attribute-types',
        data:{
            
        },
        methods:{
            viewAttributesOfAttributeTypes:function($id)
            {

                
                axios.get('sizechart/home/'+$id).then((res)=>{
                  window.location.href="/sizechart/home/"+$id;

                })

            }
        },
       
    })
</script>
<script>
  $(function(){
    $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            }); 
  })
</script>

@endsection