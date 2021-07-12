@extends('shopify-app::layouts.default')
@section('content')




{{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
<div class="row mt-5  " style="margin-left:10px !important" id="size-chart">
      
@include('partials_attributes.sidebar')
<div class="col-md-8" >
<div class="card">
    {{-- <div class="card-header "><span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Attributes') }}</span> <a
        href="{{ route('attributes.create') }}" class="btn btn-info btn-md button-add border border-light offset-10 ">
        <i class="fas fa-plus"></i>Attribute
    </a></div> --}}
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3"> <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Attributes') }}</span> </div>
            <div class="col-md-9"><a href="{{ route('sizechart.create',['id'=>$current_product_id ])}}" class="btn btn-info btn-md button-add border border-light float-right "> <i class="fas fa-plus"></i><span style="margin-left:10px !important">Attribute</span></a></div>
        </div>
       </div>
    <div class="card-body">
        
<table class="table table-bordered  " style="width:100% !important;">
  
    <thead>
<tr>
    <th colspan="2">Height (Cm.)</th>
    <th colspan="3">Weight (Lbs.)</th>
    
    
  
</tr><tr>
    <th>Start</th>
    <th>End</th>
    <th>Start</th>
    <th>End</th>
    <th>Product</th>
    <th colspan="2" > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
    @forelse($sizeChart as $attr)
    
     <tr>
            <td>{{ $attr->height_start }} </td>
            <td>{{ $attr->height_end }}</td>
            <td>{{ $attr->weight_start }} </td>
            <td>{{ $attr->weight_end }} </td>
          <div class="text-center"> <td class=" text-center"><span class="badge badge-pill badge-warning">{{$sizeChart[0]['product']['name']}} </span></td></div> 
            <td class="text-center">
              <div class="col">
              <a id="get-body-data" href="javascript:void(0)" v-on:click="setSizeChart({{$attr->id  }})"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm">Watch sizes</a>
              </div>
              <div class="col">
            <a id="get-body-data" href="{{ route('sizechart.delete',['id'=>$attr->id]) }}"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm mt-1">Delete</a>
              </div></td>
            {{-- <td><a href="{{ route('attributes.edit', ['id'=>$attr->id]) }}" class="btn btn-info">Edit</a></td>
            <td><a href="{{ route('attributes.delete',['id'=>$attr->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td> --}}

    </tr> 
    @empty
    @endforelse
 

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade overflow-auto" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Size Chart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
          <table class="table table-bordered  " style="width:100% !important;">
            <thead v-if="!isLoading" >
        <tr>
            <th>Attribute Name</th>
            <th>Attribute Measurement</th>
            
            <th>Predicted Size</th>
            
        </tr>
            </thead>
               <tbody>
               
          <tr v-if="!isLoading"  v-for="(row,index) in bodysizes" :key="row.id">
        
            <td>@{{ row.attr_name }}</td>
            <td>@{{ row.attr_measurement }}</td>
            
            <td>@{{ row.predicted_size }}</td>
          </tr>
             <div v-if="isLoading" class="d-flex justify-content-center">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        
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
</div>
</div>
</div>



@include('scripts.index')
<script>
  var sizechart = new Vue({
    el:'#size-chart',
   
    data:{
        
        bodysizes:[],
        isLoading:false,
        sizeChartId:'',
        
    },
    methods:{
      setSizeChart:function($id){
        this.sizeChartId=$id;
        this.getBodySize(this.sizeChartId);
      },
        onChangePage(bodysizes) {
            // update page of items
            this.bodysizes = bodysizes;
        },

        getBodySize:function(id)
        {
            this.isLoading = true;
            axios.get('/sizechart/bodysizes/'+id).then((res)=>{
              this.isLoading=false;
                this.bodysizes = res.data;
                console.log(this.bodysizes);
                

            })
        }
    },
    mounted(){
        
        
    }
    ,
    watch:{}
  })
</script>
<script>
    function getBody($id){
        localStorage.removeItem('bodyid');
        localStorage.setItem('bodyid',$id);
    }
</script>
@endsection