{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
    @include('partials_attributes.style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    {{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
    <div class="row mt-5" style="margin-left:10px !important" id="products-all">
        @include('partials_attributes.sidebar')

<div>
@include('partials_attributes.progress')

</div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Tags') }}</span>
                    {{-- <span class="float-right" >@include('snippets.refresh_products')</span> --}}
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
                                <td>
                                    <a href="javascript:void(0)" v-on:click="productFix({{ $row->id }})" style="cursor: pointer" data-toggle="modal" data-target="#exampleModalCenter"  class="badge  p-2 m-1 {{$row->status==1?'badge-success':'badge-secondary'}}" >{{ $row->tagname }}</a>
                                </td>
                                <td>
                                    @if(count($row->tagProducts)==0)
                                    <button type="button" class="btn btn-warning btn-sm" v-on:click="viewAttributes({{ $row->id }})">Attach products</button>
                                    @else
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target=".{{ 'bd-example-modal-sm'.$key }}">Products</button>

                                    <i class="bi bi-bootstrap-reboot" v-on:click="viewAttributes({{ $row->id }})" style="cursor: pointer"></i>
                                    @endif
                                    <div class="modal fade {{ 'bd-example-modal-sm'.$key }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  {{ (count($row->tagProducts)>1)?'modal-md':'modal-sm' }} modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header bg-dark text-white " >
                                                Products list
                                            </div>
                                              <ul class="list-group">

                                                  @forelse($row->tagProducts as $key=> $productOf)

                                                <li class="list-group-item list-unstyled"> <strong class="float-left">{{ $key+1 }}. </strong><span class="text-center ml-3"> {{$productOf->name}}</span></li>
                                                {{-- @if($key !=count($row->tagProducts)-1)<hr>@endif --}}

                                              @empty
                                              <li class="list-group-item"> *No Products with this tag</li>

                                              @endforelse
                                                </ul>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="dropdown">
                                        {{-- <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Products
                                        </button> --}}
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background:#F7F7F7 ">
                                            @forelse($row->tagProducts as $key=> $productOf)
                                                <button class="dropdown-item" type="button">{{$productOf->name}}</button>
                                                @if($key !=count($row->tagProducts)-1)<hr>@endif

                                            @empty
                                                <button class="dropdown-item" type="button"> *No Products with this tag</button>
                                            @endforelse

                                        </div>
                                    </div>



                                </td>


                                <td>

                                    <label class="switch">

                                        <input data-crrtagname="{{$row->tagname}}" data-id="{{$row->id}}" id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status!=0) ? 'checked' : '' }}>
                                        <span class="slider round"></span>

                                    </label>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="2">
                                    <div class="d-flex justify-content-center">
                                        'Nothing here'
                                    </div>
                                </td>
                            </tr>

                        @endforelse



                        </tbody>
                    </table>


                </div>

            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!isLoading" class="modal-title" id="exampleModalCenterTitle">Create Tags Attributes</h5>
                        <h5 v-if="isLoading" class="skeleton skeleton-heading" ></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">






                        <table class="table table-bordered table-responsive-lg " >
                            <thead>
                            <tr>

                                <th v-if="!isLoading">Tag Name</th>
                                <th v-if="isLoading"><div class="skeleton skeleton-text"></div></th >

                                <th v-if="!isLoading">Predicted Size</th>
                                <th v-if="isLoading"><div class="skeleton skeleton-text"></div></th >

                            </tr>
                            </thead>
                            <tbody>
                            <tr  >


                                <td v-if="!isLoading">@{{ product.tagname }}</td>
                                <td v-if="isLoading"><div class="skeleton skeleton-text"></div></td >



                                <td v-if="!isLoading"> <a href="javascript:void(0)" v-on:click="gotoAttributes(product.id)">View Details </a> </td>
                                <td v-if="isLoading"><div class="skeleton skeleton-text"></div></td >
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
                showProgressMessage:false,


            },
            methods:{
                zoomImage:function($img){
                    window.open($img,"_blank");
                },
                viewAttributes:function($id)
                {
                    $('#exampleModalCenter').modal("hide");

                $('#progressModal').modal("show");

                    axios.get("/attach-tags/"+$id).then((res)=>
                    {

                        if(res.data.status == 1)
                        {
                         window.location.href = "/get/all-tags";
                        }


                    })

                },

                gotoAttributes:function($id)
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

                            this.variant_count = this.product.variants?this.product.variants.length:0;



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
                var str  = "{{ Config::get('constants.SHOPIFY_URL.APP_URL') }}"
                window.location.href =str+"/refresh/products"
            })
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var tagname = $(this).data('id');
                var crrtagname = $(this).data('crrtagname');
                var tag_id = $(this).prop('id');
                $("#"+tag_id).parent().parent().siblings().children(".badge").addClass("badge-success");


                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/tags/edit/',
                    data: {'status': status, 'tagname': tagname},
                    success: function(data){
                        if(data.empty_msg)
                        {
                            toastr.warning(data.empty_msg)
                            $("#"+tag_id).prop("checked", false);
                            $("#"+tag_id).parent().parent().siblings().children(".badge").removeClass("badge-success");
                            $("#"+tag_id).parent().parent().siblings().children(".badge").addClass("badge-secondary");


                        }

                        if(data.error_msg)
                        {
                            toastr.info(data.error_msg)

                            {{--Swal.fire({--}}
                            {{--    title: 'Variants required in shopify admin!',--}}
                            {{--    text: 'Product "'+data.product.name.toUpperCase() +'"'+' needs to be configured.',--}}
                            {{--    imageUrl: data.product.image_link,--}}
                            {{--    imageHeight: 200,--}}
                            {{--    imageAlt: 'Custom image',--}}
                            {{--}).then((result)=>{--}}
                            {{--    if(result.isConfirmed){--}}
                            {{--    var link = "{{env("APP_URL")}}"--}}
                            {{--    // console.log(link)--}}
                            {{--    //--}}
                            {{--    // window.location.href=link+"/get/attributetypes-all/view/"+data.product.product_id--}}
                            {{--    }--}}
                            {{--})--}}

                            $("#"+tag_id).prop("checked", false);
                            $("#"+tag_id).parent().parent().siblings().children(".badge").removeClass("badge-success");
                            $("#"+tag_id).parent().parent().siblings().children(".badge").addClass("badge-secondary");

                        }

                        else
                        {
                                if(data.product!=undefined)
                                {
                            data.product.forEach((row,index)=>{
                             if(row.status==1)
                            {

                                toastr.options.progressBar = true;

                                toastr.success('Widget Permission granted for Product with TAG: '+crrtagname)


                            }
                            else{

                                toastr.warning('Widget removed for Product with TAG: '+crrtagname)
                                 $("#"+tag_id).parent().parent().siblings().children(".badge").removeClass("badge-success");
                                 $("#"+tag_id).parent().parent().siblings().children(".badge").addClass("badge-secondary");
                            }
                        })
                                    }

                        }




                    }
                });
            })
        })
    </script>
@endsection
