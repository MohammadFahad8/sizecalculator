<template>

  <div >
    
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     
    
      <div v-if="showBodyFitApp" class="box">
	<a class=" btn btn-outline-success" id="popup-trigger" href="#popup1"  style="margin-left: 1%  !important;margin-bottom: 20px  !important;border: none;">Find Fit</a>
		        <span id="finalsize" v-if="finalsize !=''"  class="final-size-heading">  <span  class="final-size-label">Your Fit Size : </span> {{finalsize}}</span>
	  
	  </div><div id="popup1" class="overlay" style="z-index:999 !important"><div class="popup fit-advisor-popup-adjustments" ><div class="predict__sc-1a4an9n-7 fit-advisor-header-box"><div class="predict__sc-1a4an9n-0 fot-advisor-header"><div></div><div><svg v-if="firstTab" v-on:click="nextPrev(-1)" viewBox="0 0 512 512" height="24" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-5 dcvgeN" style="
    display: inline-block;
    /* width: 59px; */
"><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" points="328 112 184 256 328 400"></polyline></svg>
<svg v-if="lastTab" v-on:click="restart" viewBox="0 0 512 512" height="24" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-6 HBqpi"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M320 146s24.36-12-64-12a160 160 0 10160 160"></path><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" points="256 58 336 138 256 218"></polyline></svg>


<span class="predict__sc-1a4an9n-3 OSFBL switch find-fit-header">FIND YOUR FIT</span></div></div><div class="predict__sc-1a4an9n-8 dCmgSk"><div width="0" class="predict__sc-1a4an9n-9 eygAJd"></div></div></div>
<!-- close modal btn -->
<a class="close" href="#">&times;</a>
<div class="content" style="margin-top:-155px !important; margin-bottom: -120px !important;">
  <form id="regForm" ><p class="fit-advisor-intro" id="intro1">
    <span id="mark1">To get a size recommendation,</span>  <br><span id="mark2">fill out the form below</span></p>
<p class="fit-advisor-intro" id="intro2"><span id="mark1">Choose the option that best</span>  <br><span id="mark2">describes your chest</span></p>
<p class="fit-advisor-intro" id="intro3"><span id="mark1">Choose the option that best</span>  <br><span id="mark2">describes your stomach</span></p>
<p class="fit-advisor-intro" id="intro4"><span id="mark1">Choose the option that best</span>  <br><span id="mark2">describes your bottom</span></p>
<p class="fit-advisor-intro" id="intro5"><span id="mark1">Drop-cut:LUX</span>  <br><span id="mark2"></span></p>


 <div class="tab fit-advisor-custom_row form-group offset-1"> 
   <div class="fit-advisor-custom_row">
     <div class="col-md-6"><label class="adjust-label labels-tab1"   for="height_ft">Height</label>
  <input type="number" id="height_ft" placeholder="Feet" class="form-control w-75 input-border" v-model="form.heightfoot" name="heightfoot">
  </div>
  <div class="col-md-6">
  <input type="number" id="height_in" placeholder="Inches" class="form-control mt-3  w-75 input-border" v-model="form.heightinch"  name="heightinch">
  </div>
  
  </div>
  

 <div class="fit-advisor-custom_row mtf-5">   
   <div class="col-md-6">
   <label class="adjust-label labels-tab1" for="weight">Weight</label>
   <input type="number" id="weight" placeholder="Lbs" class="form-control  w-75 input-border" v-model="form.weight" name="weight">
   </div>
   <div class="col-md-6">
   <label for="age"><span class="adjust-label-age labels-tab1 " >Age</span></label>
    <input type="number" id="age"  placeholder="Years" class="form-control  w-75 input-border mt-n1" v-model="form.age" name="Age">
    </div>
    
    </div>
    </div>
<div class="row" v-if="!onfirstTab" >
    <input  v-on:change="countryval()" class="countrycheck no-gutters"  type="checkbox" name="countrycheck" v-model="countrycheck" />
    
    

<svg class="img_country" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<rect y="85.331" style="fill:#F0F0F0;" width="512" height="341.337"/>
<g>
	<rect y="127.994" style="fill:#D80027;" width="512" height="42.663"/>
	<rect y="213.331" style="fill:#D80027;" width="512" height="42.663"/>
	<rect y="298.657" style="fill:#D80027;" width="512" height="42.663"/>
	<rect y="383.994" style="fill:#D80027;" width="512" height="42.663"/>
</g>
<rect y="85.331" style="fill:#2E52B2;" width="256" height="183.797"/>
<g>
	<polygon style="fill:#F0F0F0;" points="99.822,160.624 95.699,173.308 82.363,173.308 93.154,181.143 89.031,193.826 
		99.822,185.991 110.606,193.826 106.484,181.143 117.275,173.308 103.938,173.308 	"/>
	<polygon style="fill:#F0F0F0;" points="103.938,219.08 99.822,206.397 95.699,219.08 82.363,219.08 93.154,226.916 89.031,239.599 
		99.822,231.763 110.606,239.599 106.484,226.916 117.275,219.08 	"/>
	<polygon style="fill:#F0F0F0;" points="47.577,219.08 43.46,206.397 39.337,219.08 26.001,219.08 36.792,226.916 32.669,239.599 
		43.46,231.763 54.245,239.599 50.123,226.916 60.912,219.08 	"/>
	<polygon style="fill:#F0F0F0;" points="43.46,160.624 39.337,173.308 26.001,173.308 36.792,181.143 32.669,193.826 43.46,185.991 
		54.245,193.826 50.123,181.143 60.912,173.308 47.577,173.308 	"/>
	<polygon style="fill:#F0F0F0;" points="99.822,114.85 95.699,127.535 82.363,127.535 93.154,135.371 89.031,148.054 
		99.822,140.218 110.606,148.054 106.484,135.371 117.275,127.535 103.938,127.535 	"/>
	<polygon style="fill:#F0F0F0;" points="43.46,114.85 39.337,127.535 26.001,127.535 36.792,135.371 32.669,148.054 43.46,140.218 
		54.245,148.054 50.123,135.371 60.912,127.535 47.577,127.535 	"/>
	<polygon style="fill:#F0F0F0;" points="156.183,160.624 152.061,173.308 138.725,173.308 149.515,181.143 145.394,193.826 
		156.183,185.991 166.969,193.826 162.846,181.143 173.637,173.308 160.301,173.308 	"/>
	<polygon style="fill:#F0F0F0;" points="160.301,219.08 156.183,206.397 152.061,219.08 138.725,219.08 149.515,226.916 
		145.394,239.599 156.183,231.763 166.969,239.599 162.846,226.916 173.637,219.08 	"/>
	<polygon style="fill:#F0F0F0;" points="216.663,219.08 212.546,206.397 208.423,219.08 195.088,219.08 205.877,226.916 
		201.755,239.599 212.546,231.763 223.331,239.599 219.208,226.916 229.999,219.08 	"/>
	<polygon style="fill:#F0F0F0;" points="212.546,160.624 208.423,173.308 195.088,173.308 205.877,181.143 201.755,193.826 
		212.546,185.991 223.331,193.826 219.208,181.143 229.999,173.308 216.663,173.308 	"/>
	<polygon style="fill:#F0F0F0;" points="156.183,114.85 152.061,127.535 138.725,127.535 149.515,135.371 145.394,148.054 
		156.183,140.218 166.969,148.054 162.846,135.371 173.637,127.535 160.301,127.535 	"/>
	<polygon style="fill:#F0F0F0;" points="212.546,114.85 208.423,127.535 195.088,127.535 205.877,135.371 201.755,148.054 
		212.546,140.218 223.331,148.054 219.208,135.371 229.999,127.535 216.663,127.535 	"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

</div>


<button v-if="showContinueBtn" class="continue-btn" style="position: absolute;right: 30%;width: 33%;bottom: 90px;" type="button" id="nextBtn" v-on:click="nextPrev(1)">Get Started</button>
<button v-if="!showContinueBtn" class="continue-btn" style="position: absolute;right: 32%;width: 33%;bottom: 90px;display:block !important;" type="button" id="cartBtn" v-on:click="addToCart()">Add Size to Cart</button>
<div class="tab"><div><div class=" fit-advisor-chest-tab size-position" ><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
    <img id="chest1" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-1.svg" v-on:click="chest(1)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Narrower</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
        <img id="chest2" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-2.svg" v-on:click="chest(2)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
            <img id="chest3"  v-on:click="chest(3)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Broader</p></div></div></div></div></div><div class="tab"> <div><div class=" fit-advisor-chest-tab size-position"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                <img id="stomach1" v-on:click="stomach(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                    <img id="stomach2" v-on:click="stomach(2)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                        <img id="stomach3" v-on:click="stomach(3)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div> <div class="tab"><div><div class=" fit-advisor-chest-tab size-position"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                            <img id="bottom1" v-on:click="bottom(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                                <img id="bottom2"  v-on:click="bottom(2)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;">
                                    <img id="bottom3"  v-on:click="bottom(3)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div><div class="tab"><div class=" fit-advisor-selected-product-grid">
                                        <!-- <div class=" fit-advisor-selected-product-image"><img id="featured_image" class=" fit-advisor-product-picture" v-bind:src=this.product.featured_image alt="image" style="opacity: 1;"></div> -->
                                    <div><div class=" fit-advisor-product-size-box"><div class=" fit-advisor-fit-grid">
                                  
                                  
                                    <div class=" fit-advisor-selected-size-container fit-advisor-selected-size-arrow-box">
                                      <div class=" selected-product-arrow-left">
                                             <span size="10" class=" jjnwUS  selected-product-arrow-left-pointer next" @click="changesize();"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path></svg></span></div>  
                                                        
                                                        
                                                        
                                                    <!-- LIST OF ALL VARIANTS -->
<div class="listfit" >
 

<div   id="fit-advisor-sizes-slider" font-size="40" v-for="(row,key,index) in product.variants" :key="row.id"  class=" fit-advisor-selected-size" style="opacity: 1;" >
        <span id="fsize"> 
<div v-if="is_loading"  class="spinner-border" style="width:3rem;height:3rem;margin-top:70px !important;" role="status"> 
  <span class="sr-only">Loading...</span>
</div>

<h4 class="result-size" >
  
  
<span v-if="showrecommended" class="recommendedbyus big-size-margin-recommend-size"  >{{recommended_size}}</span>

<span v-if="!showrecommended " class="variant_title" :data-variant=" row.id " :data-title=" row.title ">
  <span v-if="row.title.toUpperCase().substring(0, 2)=='XL' || row.title.toUpperCase().substring(0, 2)=='XS'">
    <span class="big-size-margin">{{row.title.toUpperCase()}}</span></span>
    <span v-if="row.title.toUpperCase()!='XS' && row.title.toUpperCase()!='XL' ">{{row.title.toUpperCase().charAt(0)}}</span></span>   
</h4>
</span>
</div>
</div>

<div class=" dfOagu" style="z-index:30">
  <span size="10" class=" jjnwUS  hjNiUI arrow-next next"  @click="changesize()" >
  <svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path></svg></span></div></div></div></div><p class=" fit-advisor-header-desc">Fit Size:<strong v-if="showrecommended">Recommended</strong><strong id ="allSizeTextHeading" v-else>{{this.allSizeText}}</strong> <strong v-if="this.otherSize">{{this.otherSize}}</strong>  </p><p class=" fit-advisor-header-desc  fit-advisor-header-desc-mt ">The size we recommend is based on how we  intended this item to suit your body. <br><a target="_blank" rel="noopener noreferrer nofollow" href="https://getwair.com/blog/fit-advisor-learn-more/" class=" learn-text">Learn More</a></p></div></div></div><div style="overflow:auto;"><div class="custom-offset-lg" style="margin-top:8% !Important; display:none;"><button class="fit-advisor-custom_previous_btn" type="button" id="prevBtn" v-on:click="nextPrev(-1)">Previous</button></div></div></p><div id="steps-mark" style="text-align:center;margin-top:100px;"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
</form>
</div>
</div>
</div>
<!-- </div> -->
      
      
      </div>

</template>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    export default {
         props: {
      product:Object,
      
    }, 
        data(){
            return{
                form:{
                    heightfoot:localStorage.getItem('foot'),
                    heightinch:localStorage.getItem('inch'),
                    weight:localStorage.getItem('weight'),
                    age:localStorage.getItem('age'),
                    chest:localStorage.getItem('chest'),
                    stomach:localStorage.getItem('stomach'),
                    bottom:localStorage.getItem('bottom'),
                    tags:JSON.parse(localStorage.getItem('tags')),
            
                },
                countrycheck:'',
                checked:false,
                currentTab : 0,
                height_cm:0,
                weightf:0,
                weight_lbs:0,
                measurew:0,
                firstTab:true,
                onfirstTab:true,
                lastTab:false,
                measureh:0,
                message:"Jello",
                recommended_size:'',
                is_loading:false,
                showlist:false,
                showContinueBtn:true,
                showrecommended:true,
                variantselected:0,
				        finalsize:'',
        				showBodyFitApp:false,
                allSizeText:'Recommended',
                $allSlides:'',
                traverseDefault:'',
                actionDefault:'',
                otherSize:'',


                image_us:'https://24bbe8b8d790.ngrok.io/images/us.png',
                image_uk:'https://24bbe8b8d790.ngrok.io/images/uk.png',
                

            }
        },
      
        methods:{
			showBodyFit:function(){
				var id = new FormData();
        var shop_name = window.location.hostname;
				id.append('id',this.product.id);
				id.append('shop_name',shop_name);
        
				axios.post(this.$appUrl+'/api/permission-to-show',id).then((res)=>{
          console.log(res.data)
					if(res.data.display == true)
					{
            if(res.data.clearLog==true)
            {
              this.dev_reset();
            }
            
						this.showBodyFitApp = true;
					}
					else
					{
             if(res.data.clearLog==true)
            {
              this.dev_reset();
            }
						this.showBodyFitApp = false;

					}

				})
			},
		
            addOrUpdateProduct:function(){
                axios.post(this.$appUrl+'/api/add-or-update-product',this.product)
                .then((res)=>{
                  
                })
            },
            getLocalData:function(){
				  
			 if(localStorage.getItem('recommended_size')!=null)
		{
			this.finalsize = localStorage.getItem('recommended_size');
		}
		else
		{
			this.finalsize = '';

		}
	  
            },
            setSlides:function(){
          $('div.fit-advisor-selected-size:gt(0)').hide(); //Hide all but the first one

        this.$allSlides = $('div.fit-advisor-selected-size'), 
            this.traverseDefault = "first", //set the defaults
            this.actionDefault ="next";
            },
            getProductDetails:function(){
                this.is_loading = true;
                var a ='';
                      
              this.setSlides();
                axios.post(this.$appUrl+'/api/size-recommend/',this.form)
                .then((res)=>{
                  
                    this.is_loading = false;
                    
                     if((res.data == 'XL') || (res.data == 'XS' ))
                     {
                       this.recommended_size = res.data.toUpperCase().substr(0, 2)
					               a=this.recommended_size;
                       $('.fit-advisor-selected-size-arrow-box').addClass('bigsize');
                       $('.dfOagu').addClass('dfOagu-second');
                      if(this.showContinueBtn==true)
                      {
                        this.showContinueBtn = false;
                        
                      }
                      
                     
                     }
                     else
                     {
                       this.recommended_size = res.data.toUpperCase().charAt(0)
					             a=this.recommended_size;
                        if(this.showContinueBtn==true)
                      {
                        this.showContinueBtn = false;
                      }
                      
                     }
				
            
						localStorage.setItem('recommended_size',this.recommended_size)
					
					

					this.finalsize = localStorage.getItem('recommended_size');
					
					 

                     
                })
            },
            addToCart:function()
            {

              
              var pickCharacter = 0;
              
                if(!this.showrecommended)
              {
               var var_id =  $('.active > span> h4 > span').attr('data-variant')
              
               this.cartRequest(var_id);


                }else
              {
                
              for(var i=0;i<=this.product.variants.length;i++)
              {
                   if((this.recommended_size.toLowerCase() == 'xl') || (this.recommended_size.toLowerCase() == 'xs' ))
                     {
                       pickCharacter = 1;

                     }
                     else
                     {
                       pickCharacter = 0;

                     }
                if(this.product.variants[i].title.toLowerCase().charAt(pickCharacter)==this.recommended_size.toLowerCase().charAt(0))
                {
                  this.cartRequest(this.product.variants[i].id)
                          
                }
                          
                         

                }  
                
              }
         

                          

            },
            cartRequest:function(id){
              
                  var formData='';
                     formData = {
                          'items': [{
                            'id': id,
                            'quantity':1,
                            
                            }]
                          };
                          
                          fetch('/cart/add.js', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/json'
                            },
                          body: JSON.stringify(formData)
                          })
                          .then(response => {
                            if(confirm("Do you want to add this size to cart?"))
                          {
                           window.location.reload();
                          }
                            return response.json();
                          })
                          .catch((error) => {
                            console.error('Error:', error);
                          });
            },
            setSize:function(id)
            {
              this.variantselected=id
              
              


            },
           changesize:function()
           {
             if(this.showrecommended==true)
             {
               this.showrecommended = false;
//    orignial           $('.fit-advisor-selected-size-arrow-box').removeClass('bigsize');
              //original $('.dfOagu').removeClass('dfOagu-second');
                 $('.fit-advisor-selected-size-arrow-box').addClass('bigsize');
                  $('.dfOagu').addClass('dfOagu-second');

             }
             
  
          //slides size
   
        //


 this.showrecommended = false;
  
    var traverse =this.traverseDefault,
        action = this.actionDefault;

    if($(this).is('.prev')){ //if action is prev
        traverse = "last"; //set traverse to last in case nothing is available
        action = "prev"; //set action to prev
    }

    var $curr = this.$allSlides.filter(':visible'), //get the visible slide
        $nxtTarget =  $curr[action](".fit-advisor-selected-size"); //get the next target based on the action.
        $nxtTarget.addClass('active');
       
          
        
                   
                
    $curr.stop(true, true).fadeIn(1000).removeClass('active').hide(); //hide current one

    if (!$nxtTarget.length){ //if no next
        $nxtTarget = this.$allSlides[traverse](); //based on traverse pick the next one
        
    }

    $nxtTarget.stop(true, true).fadeIn(1000).addClass('active'); //show the target



          //slides size end
             


           },
            changesizetorecommended:function()
           {
             if(this.showrecommended==false)
             {
               this.showrecommended = true;

             }
             


           },
            chest:function(n)
            {
                this.form.chest = n;
                localStorage.setItem('chest',n)
                this.nextPrev(1)
            },stomach:function(n)
            {
                this.form.stomach = n;
                localStorage.setItem('stomach',n)
                this.nextPrev(1)
            },bottom:function(n)
            {
                this.form.bottom = n;
                localStorage.setItem('bottom',n)
                
                this.form.tags= this.product.tags
                localStorage.setItem('tags',JSON.stringify(this.product.tags))
                this.nextPrev(1)
              
                
            },
            countryval:function(){
                
                
                if(this.countrycheck == false)
                {
                    
                    $('input[name="weight"]').attr('placeholder','Lbs');
                    $('input[name="countrycheck"]').attr('value',0);
                    this.countrycheck == 0;
                    
                    this.weightconvert(this.form.weight,false);
                    

                }
                else if(this.countrycheck == true)
                {
                    
                     $('input[name="weight"]').attr('placeholder','Kg');
                     $('input[name="countrycheck"]').attr('value',1);
                        this.countrycheck == 1
                     this.weightconvert(this.form.weight,true);
                     

                }
                

            },
            weightconvert:function(w,c)
                    {
                        if((c == true) && (w!='') )
                        {
                        this.form.weight = w/2.2 //pound to kg
                        }
                        else if((c == false) && (w!='') )
                        {
                            this.form.weight = w*2.2 //kg to pound
                        }
                        
                        

              },

            showTab:function(n)
            {
				if(localStorage.getItem('recommended_size')!=null)
				{
					n=4;
				}
                if(n==0)
                {   
                    $('#intro1').css('display', 'block');
                    $('.switch').removeClass('introfirst');
                    $('.switch').addClass('find-fit-header');                   
                    $('#intro2').css('display', 'none');
                    $('#intro3').css('display', 'none');
                    $('#intro4').css('display', 'none');
                    $('#intro5').css('display', 'none');
                }
                if(n==1)
                {
                    
             $('#intro1').css('display', 'none');
             $('#intro2').css('display', 'block');
             $('#intro3').css('display', 'none');
             $('#intro4').css('display', 'none');
             $('#intro5').css('display', 'none');
             $('.switch').addClass('introfirst');
             $('.switch').removeClass('find-fit-header');
            
                }
                if(n==2)
                {
                    $('#intro1').css('display', 'none');
                    $('#intro2').css('display', 'none');
                    $('#intro3').css('display', 'block');
                    $('#intro4').css('display', 'none');
                    $('#intro5').css('display', 'none');
                    $('.switch').addClass('introfirst');
                    $('.switch').removeClass('find-fit-header');
                }
                if(n==3)
                {
                        $('#intro1').css('display', 'none');
                        $('#intro2').css('display', 'none');
                        $('#intro3').css('display', 'none');
                        $('#intro4').css('display', 'block');
                        $('#intro5').css('display', 'none');
                        $('.switch').addClass('introfirst');
                        $('.switch').removeClass('find-fit-header');

                }
                if(n==4)
                {
                      $('.fit-advisor-selected-product-grid').css('display', 'inline');
                      $('#intro1').css('display', 'none');
                      $('#intro2').css('display', 'none');
                      $('#intro3').css('display', 'none');
                      $('#intro4').css('display', 'none');
                      $('#intro5').css('display', 'block');
                      $('.switch').addClass('introfirst');
                      $('.switch').removeClass('find-fit-header');
             
                }
  //document.getElementById('tabnumber').innerHTML=n;

  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
      

    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("steps-mark").style.visibility = "hidden";
    this.firstTab = false;
    this.onfirstTab = false;
    this.lastTab = false;
    
  } else {
    document.getElementById("steps-mark").style.visibility = "visible";
    document.getElementById("prevBtn").style.display = "inline";
    //$('.fit-advisor-intro').text('Find Your Fit');
    this.firstTab = true;
    this.onfirstTab = true,
    this.lastTab = false;
    
  }
  if(n==1){
    $('#popup1').css('overflow','scroll');
  }
  if ( n == 4) {
      
      this.firstTab = false;
      this.onfirstTab = true,
      this.lastTab = true;
    
   
     
      this.showContinueBtn = false;
     
    
    //document.getElementById("nextBtn").style.display = "none";
   // document.getElementById("nextBtn").innerHTML = "Add Size to Cart";
    document.getElementById("steps-mark").style.visibility = "inline";
    
    
    

    //document.getElementById("nextBtn").classList.add('fit-advisor-product-btn-to-cart');
    
 this.getProductDetails();
  }
   else {
    document.getElementById("nextBtn").style.display = "inline";
    
  }
  if((n >= 1) && (n <4))
  {
    document.getElementById("nextBtn").style.display = "none";

  }
 

  //... and run a function that will display the correct step indicator:
  this.fixStepIndicator(n)
            },
         
            nextPrev:function(n)
            {
                
         
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !this.validateForm()) return false;
  // Hide the current tab:

  x[this.currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  this.currentTab = this.currentTab + n;
  
var ft = $('#height_ft').val();
var inch = $('#height_in').val();
var weightf = $('#weight').val();

var weight_lbs = parseInt(weightf) * 2.205;
var heightf = ft*12;
var heighti = heightf+ parseInt(inch);
var height_cm  = heighti* 2.54;

//  this.measureh = localStorage.getItem('height');
// this.measurew = localStorage.getItem('weight');
// if(  this.measurew == null){
  
   
//   localStorage.setItem("weight", weight_lbs);
  

//  }

//  if( this.measureh == null){
   
//   localStorage.setItem("height", height_cm);
  

//  }

 
  // if you have reached the end of the form...
 // if (this.currentTab >= x.length) {
    // ... the form gets submitted:
    //document.getElementById("regForm").submit();
    //return false;
  //}
  // Otherwise, display the correct tab:
  this.showTab(this.currentTab);

            },
            validateForm:function()
            {
              
             
                
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[this.currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  
               
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[this.currentTab].className += " finish";
  }
  return valid; // return the valid status

            },
            validateHeight:function(event)
            {
              $('#height_ft').removeClass('invalid')
              
              if(this.form.heightfoot >9)
                    { 
                $("#height_ft").attr("placeholder", "Must be less than 9");
                $("#height_ft").addClass("warning-place");
                    this.form.heightfoot='';
                      
                      
                    }
              else if(this.form.heightfoot<= 0)
              {
                this.form.heightfoot='';
                      

              }
              else
              {
                localStorage.setItem('foot',this.form.heightfoot)
              }

            },
            validateInches: function()
            {
              $('#height_in').removeClass('invalid')
              
                    if(this.form.heightinch >11)
                    {
                $("#height_in").attr("placeholder", "Must be less than 11");
                $("#height_in").addClass("warning-place");
                      this.form.heightinch='';
                      

                    }
              else if(this.form.heightinch <= 0)
              {
                this.form.heightinch='';
                        
              }
              else
              {
                localStorage.setItem('inch',this.form.heightinch)
              }
            },
            validateWeight: function(){
              $('#weight').removeClass('invalid')
                    if(this.form.weight > 500)
                    {
                $("#weight").attr("placeholder", "Limit is 500 Lbs");
                $("#weight").addClass("warning-place");
                this.form.weight= ''
                      
                      

                    }
              else if(this.form.weight <= 0)
                    {
                
                      this.form.weight =  ''
                      

                    }
                    else
              {
                localStorage.setItem('weight',this.form.weight)
              }
            },
            validateAge:function(){
              $('#age').removeClass('invalid')
              if(this.form.age >100)
                    {
                  $("#age").attr("placeholder", "Limit for Age is 100");
                $("#age").addClass("warning-place");
                      this.form.age=''
                      

                    }
              else if(this.form.age <= 0)
                    {
                      this.form.age = ''
                      

                    }
                    else
              {
                localStorage.setItem('age',this.form.age)
              }
            },
            fixStepIndicator:function(n)
            {
                
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
            },
            dev_reset:function()
            {
            
            window.localStorage.clear();
            },
            restart:function()
            {   
            
            this.changesizetorecommended()
            this.form.heightfoot='';
            this.form.heightinch='';
            this.form.weight='';
            this.form.age='';
            this.form.chest='';
            this.form.stomach='';
            this.form.bottom='';
            this.recommended_size='',
            
            this.currentTab = 0;
            this.showContinueBtn=true,
            
            $('.fit-advisor-selected-product-grid').css('display', 'none');
                this.dev_reset();
                this.showTab(this.currentTab);
                this.nextPrev(-4)
                
            },
            nextprevslide:function()
            {
              

            }
        },
        mounted() {
		 
	  console.log(this.shop)
    this.getLocalData();
		this.showBodyFit();

			

            //this.addOrUpdateProduct();
            
           // this.dev_reset();
        
            
    $('input[name="countrycheck"]').click(function(){
        var $radio = $(this);

        // if this was previously checked
        if ($radio.data('waschecked') == true)
        {
            $radio.prop('checked', false);
            $radio.data('waschecked', false);
        }
        else
            $radio.data('waschecked', true);

        // remove was checked from other radios
        
    });
            // Current tab is set to be the first tab (0)
this.showTab(this.currentTab);
// $("#featured_image").attr("src",this.product.featured_image);

$('#popup-trigger').on('click',function(){

  $('.product-card').css('z-index','-1');
  
  //$('body').css('overflow','hidden');
  $('#popup1').css('overflow','scroll');
})


//size decider happens
//formula to caluclate height into centimeters


$('.bvHnuU').on('click',function(){
  var measureh = localStorage.getItem('height');
  var measurew = localStorage.getItem('weight');

})




        },
      watch:
	{
		'form.heightfoot':function()
		{
			this.validateHeight();
		},	
			'form.heightinch':function()
		{
			this.validateInches();
		},	
			'form.weight':function()
		{
			this.validateWeight();
		},
				'form.age':function()
		{
			this.validateAge();
		},
	}
    }
	

</script>
<style>
@import '../assets/styles/body-fit.css';
</style>
