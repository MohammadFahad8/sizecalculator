{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
    @include('partials_attributes.style')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <a href="{{ route('calculator.start') }}" class="badge badge-pill">Find Fit</a> --}}
    <div class="row mt-5" style="margin-left:10px !important" id="products-all">
        @include('partials_attributes.sidebar')



        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="custom-card-header-span">@include('snippets.buttonback'){{ __('Tags') }}</span>
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
                                <td>
                                    <span class="badge badge-dark p-2 m-1">{{$row->tagname}}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </td>


                                <td>

                                    <label class="switch">

                                        <input data-id="{{$row->tagname}}" id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($row->status!=0) ? 'checked' : '' }}>
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

                                    <img id="single-product" v-on:click="zoomImage(product.image_link)" :src="product.image_link" width="50" height="50"  alt="" class="img-thumbnail">
                                </td>

                                <td>@{{ product.name }}</td>

                                <td v-for="(row,index) in product.variants" :key="row.id">

                                    @{{ row.size }}
                                </td>

                                <td> <a href="javascript:void(0)" v-on:click="viewAttributes(product.product_id)">View Details</a> </td>
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
                zoomImage:function($img){
                    window.open($img,"_blank");
                },
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
                var tagname = $(this).data('id');
                var tag_id = $(this).prop('id');


                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/tags/edit/',
                    data: {'status': status, 'tagname': tagname},
                    success: function(data){
                        if(data.empty_msg)
                        {
                            toastr.info(data.empty_msg)
                            $("#"+tag_id).prop("checked", false);

                        }

                        if(data.error_msg)
                        {
                            toastr.info(data.error_msg)

                            Swal.fire({
                                title: 'Not Configured!',
                                text: 'Product "'+data.product.name.toUpperCase() +'"'+' needs to be configured.',
                                imageUrl: data.product.image_link,
                                imageHeight: 200,
                                imageAlt: 'Custom image',
                            }).then((result)=>{
                                var link = "{{env("APP_URL")}}"
                                console.log(link)

                                window.location.href=link+"/get/attributetypes-all/view/"+data.product.product_id
                            })

                            $("#"+tag_id).prop("checked", false);
                        }

                        else
                        { data.product.forEach((row,index)=>{
                             if(row.status==1)
                            {

                                toastr.options.progressBar = true;

                                toastr.success('Widget Permission granted for Product with TAG: '+tagname)
                            }
                            else{

                                toastr.warning('Widget removed for Product with TAG: '+tagname)
                            }
                        })

                        }




                    }
                });
            })
        })
    </script>
@endsection
