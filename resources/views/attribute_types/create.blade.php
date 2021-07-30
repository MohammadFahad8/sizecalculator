{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.app')
@section('content')
@include('partials_attributes.style')
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

<div class="row mt-5  " >
    @include('partials_attributes.sidebar')
    <div class="col-md-9">  
<div class="card  ">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Attribute Type') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('attributesTypes.add') }}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="product_id" value="{{($attrOfProduct[0]['product']['product_id'])??$product_id }}">
            <div class="form-group row">
                <label for="name"
                       class="col-md-3 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribute_name" type="text"
                           class="form-control @error('attribute_name') is-invalid @enderror" name="attribute_name"
                            required autocomplete="off"
                           >

                    @error('attribute_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- delete later --}}
            <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-3 col-form-label text-md-right">{{ __('size one') }}</label>

                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size_name" type="text" class="form-control " readonly value="Narrower" name="attribut_size_name[]" required="" autocomplete="off" placeholder="Enter Size Name">

                </div>
                <div class="col-md-5">
                    
                    
                        <input class="form-control-file attr-img ml-md-n2 ml-lg-n2 @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                               id="thumb"  required >
                                   
                               @error('thumb')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @else
                                <span>
                                <strong class="max-msg text text-danger d-none">Maximum 3 Allowed*</strong>
                           </span> 
                               @enderror

                       
                    



                
            </div>
            </div> 
            <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-3 col-form-label text-md-right">{{ __('size two') }}</label>

                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size_two" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size_name" type="text" class="form-control "  readonly value="Average" name="attribut_size_name[]" required="" autocomplete="off" placeholder="Enter Size Name">

                </div>
                <div class="col-md-5">
                    
                    
                    <input class="form-control-file attr-img ml-md-n2 ml-lg-n2 @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                           id="thumb"  required >
                               
                           @error('thumb')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @else
                            <span>
                            <strong class="max-msg text text-danger d-none">Maximum 3 Allowed*</strong>
                       </span> 
                           @enderror

                   
                



            
        </div>
            </div> 
            <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-3 col-form-label text-md-right">{{ __('size three') }}</label>

                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size_three" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <input tabindex="1" id="attribut_size_name" type="text" class="form-control " readonly value="Broader" name="attribut_size_name[]" required="" autocomplete="off" placeholder="Enter Size Name">

                </div>
                <div class="col-md-5">
                    
                    
                    <input class="form-control-file attr-img ml-md-n2 ml-lg-n2 @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                           id="thumb"  required >
                               
                           @error('thumb')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @else
                            <span>
                            <strong class="max-msg text text-danger d-none">Maximum 3 Allowed*</strong>
                       </span> 
                           @enderror

                   
                



            
        </div>
            </div>
            
            {{-- delte later --}}
            
            
            <div class="form-group row">
                <label for="name"
                       class="col-md-3 col-form-label text-md-right">{{ __('Product Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="2" id="product_name" type="text"
                           class="form-control @error('product_name') is-invalid @enderror" value="{{$attrOfProduct[0]['name']}}"
                            required autocomplete="off" readonly disabled
                           >
                        

                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
             
            </div>
           
            {{-- <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>


                <div class="col-md-4">
                    
                        <div class="form-check">
                            <input class="form-control-file @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                                   id="thumb" multiple required >
                                       
                                   @error('thumb')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @else
                                    <span>
                                    <strong class="max-msg text text-danger d-none">Maximum 3 Allowed*</strong>
                               </span> 
                                   @enderror

                           
                        </div>



                    
                </div>
                <div class="col-md-4">
                    <label class="text text-danger">(i.e min 3)</label>
                </div>


            </div> --}}

            <div class="form-group row">
                <label for="Role"
                       class="col-md-3 col-form-label text-md-right">{{ __('Status') }}</label>


                <div class="col-md-6">
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_required"
                                   id="is_required" >

                           
                        </div>



                    
                </div>

            </div>


           

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button return onclick="checkValidation(event)"  type="submit" class="btn btn-primary" >
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
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
</div>
<script>
    function checkValidation(event){
        
        
        if($("#attribut_size").val().length >0 && $("#attribut_size_two").val().length >0 && $("#attribut_size_three").val().length >0 ){

            if(($("#attribut_size").val()==$("#attribut_size_two").val()) || ($("#attribut_size").val()==$("#attribut_size_three").val())|| ($("#attribut_size_two").val()==$("#attribut_size_three").val()))
            {
                toastr.warning(" Value cannot be same")
                event.preventDefault();
                return false;
                

            }
        
            else if(($("#attribut_size").val()>=$("#attribut_size_two").val()) || ($("#attribut_size").val()>=$("#attribut_size_three").val()))
            {
                toastr.warning($("#attribut_size").val()+" Value must be less than next")
                event.preventDefault();
                return false;
            

            }
            else if($("#attribut_size_two").val() > $("#attribut_size_three").val())
            {
                toastr.warning($("#attribut_size_two").val()+" Value must be less than next")
                event.preventDefault();
                return false;
           

            }
           
            else  if(($("#attribut_size_three").val()<=$("#attribut_size_two").val()) || ($("#attribut_size_three").val()<=$("#attribut_size").val()))
            {
                toastr.warning($("#attribut_size_three").val()+" Value must be greater than previous")
                event.preventDefault();
                return false;
               

            }
            else {
                
                // $(this).val
            
            return true;
        }

           
         
         }else
            {
                toastr.info("Enter Value")

            }
    }
       $("button[type = 'submit']").click(function(e){
               var $fileUpload = $("input[type='file']");
               if (parseInt($fileUpload.get(0).files.length) > 3){
                  $('.max-msg').removeClass('d-none');
                  e.preventDefault();
               }else
               {
                $('.max-msg').removeClass('d-none');
                $('.max-msg').addClass('d-none');

               }
            });
    $(function(){
        $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            }); 
        
    })
</script>
@endsection