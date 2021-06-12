@extends('shopify-app::layouts.default')
@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-success" role="alert">
    {{ session('danger') }}
</div>
@endif
<div class="row mt-5" style="margin-left:10px !important" id="products">
    @include('partials_sizes.sidebar')
    <div class="col-md-9">
<div class="card w-75">
    <div class="card-header">@include('snippets.buttonback')Edit Sizes</div>
    <div class="card-body">
        <ul class="nav nav-tabs mb-5">
            <li class="active"><a data-toggle="pill" class="btn btn-default bg-white" id="hometab" href="#home">Edit
                    Size</a></li>
            <li class="ml-1"><a  data-toggle="pill" class="btn btn-default bg-white" href="#menu1">Add
                    Condition</a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane  active">
                <form method="POST" action="{{ route('sizes.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value={{ $id }} name="edit_id">
                    <div class="form-group row">
                        <label for="size"
                               class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>
                
                        <div class="col-md-6">
                            <input id="size" type="text"
                                   class="form-control @error('title') is-invalid @enderror" name="size"
                                   value="{{ $sizes->name }}" required autocomplete="off" autofocus>
                
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size"
                               class="col-md-4 col-form-label text-md-right">{{ __('Alias') }}</label>
                
                        <div class="col-md-6">
                            <input id="alias" type="text"
                                   class="form-control @error('title') is-invalid @enderror" name="alias"
                                   value="{{ $sizes->alias }}" required autocomplete="off" autofocus>
                
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row">
                    <label for="Role"
                           class="col-md-4 col-form-label text-md-right">{{ __('Select Attribute') }}</label>
                
                    <div class="col-md-6">
                        <select class="form-control @error('role') is-invalid @enderror role" name="attribute_type">
                
                            <option value=""> Select Attribute Type</option>
                
                            
                            @foreach($attributetypes as $type)
                
                
                                <option value="{{ $type['id'] }}"
                                        @if($type['id'] == $sizes->attr_id) selected @endif > {{ $type->name }}</option>
                            @endforeach
                        </select>
                
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                 
                  
                
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="form-group row">
                    <label for="size"
                           class="col-md-4 col-form-label text-md-right">{{ __('Select Product/Collection') }}</label>
            
                    <div class="col-md-6">
                       
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Select Products</button>
                        
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Condition</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                
        
                <div class="col-md-10">
                    
                        <div class="autocomplete" style="width:100%;">
                          <input v-model="search" autocomplete="off" style="width:100%" class="form-control" id="myInput" type="text" name="search" placeholder="Find Product...">
                         
                           <div  id="autocomplete-list" class="autocomplete-items checking" >
                      
                                <div  v-for="(row,key,index) in results" >
                                    
                            @{{row }}
                          </div> 

                          </div>
                         
                        </div>
                        
                    
                  
                </div>
                <div class="col-md-2">
                    <button type="button" 
                       class=" btn btn-primary  col-form-label text-md-right">{{ __('Search') }}</button>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
            <div class="card ">
                <div class="card-header">Select your products</div>
                <div class="card-body">
                     
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Sr. #</th>
    <th>Product</th>
    
    
    <th  > <span class="offset-5">Action</span></th>
</tr>
    </thead>
       <tbody>
           
    @forelse($products as $key=> $size)
    
        
            
            @forelse($size as $key=>$row)
            <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row['title'] }}</td>           
            <td><a href="{{ route('sizes.selectproduct', ['id'=>$row['id']??'n/a','name'=>$row['title']]) }}" @click="getSelectedProducts()" class="btn btn-info">Select</a></td>
           
            @empty
            <p>Nothing to show*</p>
        </tr>
            @endforelse
           


    @empty
    @endforelse
 

    </tbody>
</table>
                </div>
            </div>
            </div>
            <div class="col-md-6">

                                                {{-- Selected Products Card --}}

                                                <div class="card ">
                                                    <div class="card-header">Select your products</div>
                                                    <div class="card-body">
                                                         
                                    <table class="table table-bordered  " style="width:100% !important;">
                                        <thead>
                                    <tr>
                                        <th>Sr. #</th>
                                        <th>Product</th>
                                        
                                        
                                        <th  > <span class="offset-5">Action</span></th>
                                    </tr>
                                        </thead>
                                           <tbody>
                                               
                                        
                                        <tr v-for="(row,key,index) in products" :key="row.id">
                                            {{-- <td>{{ $key+1 }}</td> --}}
                                                <td>@{{ index + 1 }}</td>           
                                                <td>@{{ row.name }}</td>           
                                                <td><a @click="removeProduct(row.id)" class="btn btn-danger">Delete</a></td>
                                               
                                    
                                        </tr>
                                        
                                     
                                    
                                        </tbody>
                                    </table>
                                                    </div>
                                                </div>

                                            </div>
                                                {{-- end Selected Products Card --}}
                                            </div>

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
       </div>
</div>
</div>

</div>
@endsection

 <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    window.onload = function () {
        var v = new Vue({
            el:'#products',
            data:{
                products:{},
                allProducts:{},
                message:'Hello Vue',
                search:'',
                searchExactMatch:{},
                suggestionHide:true,
                suggestion:false,
                results:[],

                     
            },
            methods:{

                 getSelectedProducts:function ()
                 {
                     
                     axios.get('/selected/products').then((res)=>{
                         this.products = res.data;
                         
                     })
                 },   getAllProducts:function ()
                 {
                     
                     axios.get('/all/products').then((res)=>{
                         this.allProducts = res.data;
                         
                     })
                 },
                 removeProduct:function($id)
                 {
                     var formd = new FormData();
                     formd.append('productid',$id);
                    axios.post('/remove/product',formd).then((res)=>{

                        this.getSelectedProducts();
                    })
                 },
                 showSuggestions:function($inp)
                 {
                     var val;
                    if($inp!='')
                    {
                        
                        $('#autocomplete-list').css({'display': 'block', 'background-color' : '#2ECC40'}); 
                        this.results=[];
                        for(var i = 0; i < this.allProducts.products.length; i++)
                            {
                                            
                                if(this.allProducts.products[i].title.toLowerCase().match($inp.toLowerCase()))
                                {
                                    
                                    
                                    this.suggestion=true
                                    
                                    this.results.push(this.allProducts.products[i].title);
                                    
                                    
                                }
                                else
                                {
                                    
                                    this.suggestion=false
                                }
                            }
                    console.log(this.results)


                     

                    }
                    else
                    {
                        $('#autocomplete-list').css({'display': 'none', 'background-color' : '#2ECC40'}); 

                    }
                   

                 },
                 
                       },

/*An array containing all the country names in the world:*/


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

            mounted(){
                this.getAllProducts();  
                 this.getSelectedProducts();
 
            },
            watch:
            {
                search:function(){
                    
                    this.showSuggestions(this.search)
                }
            }
            



        })
    }

</script>
<style>
    * {
      box-sizing: border-box;
    }
    
    
    /*the container must be positioned relative:*/
    .autocomplete {
      position: relative;
      display: inline-block;
    }
    
    .searchInp {
      border: 1px solid transparent;
      background-color: #f1f1f1;
      padding: 10px;
      font-size: 16px;
      
    }
    
    .searchInp {
      background-color: #f1f1f1;
      width: 100%;
    }
    
    .btsubmit {
      background-color: DodgerBlue;
      color: #fff;
      cursor: pointer;
    }
    
    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      /*position the autocomplete items to be the same width as the container:*/
      top: 100%;
      left: 0;
      right: 0;
      widows: 330%;
    }
    
    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff; 
      border-bottom: 1px solid #d4d4d4; 
    }
    
    /*when hovering an item:*/
    .autocomplete-items div:hover {
      background-color: #e9e9e9; 
    }
    
    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
      background-color: DodgerBlue !important; 
      color: #ffffff; 
    }
    </style>



