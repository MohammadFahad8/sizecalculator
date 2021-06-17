<template>

  <body >
    
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     
     
      <div class="box"><a class="button " id="popup-trigger" href="#popup1" style="left: 5px !important;border: none;">Find Fit</a></div><div id="popup1" class="overlay " ><div class="popup fit-advisor-popup-adjustments" ><div class="predict__sc-1a4an9n-7 fit-advisor-header-box"><div class="predict__sc-1a4an9n-0 fot-advisor-header"><div></div><div><svg v-if="firstTab" v-on:click="nextPrev(-1)" viewBox="0 0 512 512" height="24" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-5 dcvgeN" style="
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

<div class="tab custom-offset"><label class="adjust-label labels-tab1"  for="height_ft">Height</label> <div class="fit-advisor-custom_row"> <p><input type="number" id="height_ft" placeholder="Feet" class="fit-advisor-custom_input" v-model="form.heightfoot" name="heightfoot"></p><p><input type="number" id="height_in" placeholder="Inches" class="fit-advisor-custom_input fit-advisor-inch" v-model="form.heightinch"  name="heightinch"></p></div>
<label class="adjust-label labels-tab1" for="weight">Weight</label>
 <div class="fit-advisor-custom_row"> <p><input type="number" id="weight" placeholder="Lbs" class="fit-advisor-custom_input" v-model="form.weight" name="weight"></p><label for="age" class="fit-advisor-agelabel"><span class=" labels-tab1 fit-advisor-agelabel-span" >Age</span></label> <p><input type="number" id="age"  placeholder="age" class="fit-advisor-custom_input fit-advisor-age-input" v-model="form.age" name="Age"></p></div></div>
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
                                  
                                    
                                        <!-- <div class=" krijnu">
                                            <p class=" eVQudH">Size</p>
                                            <div class=" coSBSK">
                                                 <p class=" dZzOUn" style="opacity: 1;">best fit
                                                    <svg viewBox="0 0 16 16" height="14" width="14" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-3.97-3.03a.75.75 0 00-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 00-1.06 1.06L6.97 11.03a.75.75 0 001.079-.02l3.992-4.99a.75.75 0 00-.01-1.05z"></path>
                                                    </svg>
                                                    </p>
                                                    </div>
                                                    </div> -->
                                    <div class=" fit-advisor-selected-size-container fit-advisor-selected-size-arrow-box">
                                      <div class=" selected-product-arrow-left">
                                        <span size="10" class=" jjnwUS  selected-product-arrow-left-pointer next" @click="changesize()"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path></svg></span></div>  
                                                        
                                                        
                                                        
                                                        <!-- LIST OF ALL VARIANTS -->
<div class="listfit" >
 

      <div   id="fit-advisor-sizes-slider" font-size="40" v-for="(row,key,index) in product.variants" :key="row.id"  class=" fit-advisor-selected-size" style="opacity: 1;" ><span id="fsize"> 
<div v-if="is_loading"  class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
  <span class="sr-only">Loading...</span>
</div>

<h4 class="result-size">
  
<span v-if="showrecommended" class="recommendedbyus"  >{{recommended_size}}</span>
<span v-if="!showrecommended" >{{row.title.toUpperCase().charAt(0)}}</span>
</h4>
</span>
</div>
</div>

<div class=" dfOagu" style="z-index:30"><span size="10" class=" jjnwUS  hjNiUI arrow-next next"  @click="changesize()" ><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path></svg></span></div></div></div></div><p class=" fit-advisor-header-desc">Fit Size:<strong>Recommended</strong></p><p class=" fit-advisor-header-desc  fit-advisor-header-desc-mt ">The size we recommend is based on how we  intended this item to suit your body. <br><a target="_blank" rel="noopener noreferrer nofollow" href="https://getwair.com/blog/fit-advisor-learn-more/" class=" learn-text">Learn More</a></p></div></div></div><div style="overflow:auto;"><div class="custom-offset-lg" style="margin-top:8% !Important; display:none;"><button class="fit-advisor-custom_previous_btn" type="button" id="prevBtn" v-on:click="nextPrev(-1)">Previous</button></div></div></p><div id="steps-mark" style="text-align:center;margin-top:100px;"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
</form></div></div></div></div>
      
      
      </body>

</template>


<script>
    export default {
         props: {
      product:Object
    },
        data(){
            return{
                form:{
                    heightfoot:'',
                    heightinch:'',
                    weight:'',
                    age:'',
                    chest:0,
                    stomach:0,
                    bottom:0,
                    tags:[]
                    
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
                
                image_us:'https://24bbe8b8d790.ngrok.io/images/us.png',
                image_uk:'https://24bbe8b8d790.ngrok.io/images/uk.png',

            }
        },
      
        methods:{
            addOrUpdateProduct:function(){
                axios.post('https://24bbe8b8d790.ngrok.io/api/add-or-update-product',this.product)
                .then((res)=>{
                  
                })
            },
            getProductDetails:function(){
                this.is_loading = true;
                
               
                axios.post('https://24bbe8b8d790.ngrok.io/api/size-recommend/',this.form)
                .then((res)=>{
                  
                    this.is_loading = false;
                    
                     if((res.data == 'XL') || (res.data == 'XS' ))
                     {
                       this.recommended_size = res.data.toUpperCase().substr(0, 2)
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
                        if(this.showContinueBtn==true)
                      {
                        this.showContinueBtn = false;
                      }
                      
                     }
                     
                })
            },
            addToCart:function()
            {
              var formData='';
              var pickCharacter = 0;
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
                  
                     formData = {
                          'items': [{
                            'id': this.product.variants[i].id,
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
                          
                          
                         

                }  
                
              }
         

                          

            },
           changesize:function()
           {
             if(this.showrecommended==true)
             {
               this.showrecommended = false;
               $('.fit-advisor-selected-size-arrow-box').removeClass('bigsize');
               $('.dfOagu').removeClass('dfOagu-second');

             }
             


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
                this.nextPrev(1)
            },stomach:function(n)
            {
                this.form.stomach = n;
                this.nextPrev(1)
            },bottom:function(n)
            {
                this.form.bottom = n;
                this.form.tags= this.product.tags
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

 this.measureh = localStorage.getItem('height');
this.measurew = localStorage.getItem('weight');
if(  this.measurew == null){
  
   
  localStorage.setItem("weight", weight_lbs);
  

 }

 if( this.measureh == null){
   
  localStorage.setItem("height", height_cm);
  

 }

 
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
        },
        mounted() {
          
  
          //slides size
          $('div.fit-advisor-selected-size:gt(0)').hide(); //Hide all but the first one

var $allSlides = $('div.fit-advisor-selected-size'), 
    traverseDefault = "first", //set the defaults
    actionDefault ="next";

$('.next,.prev').click(function(){

 this.showrecommended = false;
  
    var traverse = traverseDefault,
        action = actionDefault;

    if($(this).is('.prev')){ //if action is prev
        traverse = "last"; //set traverse to last in case nothing is available
        action = "prev"; //set action to prev
    }

    var $curr = $allSlides.filter(':visible'), //get the visible slide
        $nxtTarget =  $curr[action](".fit-advisor-selected-size"); //get the next target based on the action.

    $curr.stop(true, true).fadeIn(1000).hide(); //hide current one

    if (!$nxtTarget.length){ //if no next
        $nxtTarget = $allSlides[traverse](); //based on traverse pick the next one
    }

    $nxtTarget.stop(true, true).fadeIn(1000); //show the target

});
          //slides size end
            //this.addOrUpdateProduct();
            
            this.dev_reset();
        
            
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
      
    }
</script>
<style>

.bigsize{
  
    grid-template-columns: 1fr 190px 1fr !important;
    
}

.fit-advisor-header-desc-mt
{
    
    margin-top: 40px !important;
}
.dfOagu
{
    margin-left:50px ;
    margin-top: -5px !important;
}
.dfOagu-second {
    margin-left: 10px;
    margin-top: -5px !important;
}
.result-size
{
    width:100%;
    font-family:karla;
    font-weight:900;
    font-size:133px;
}
.introfirst
{
    font-family: 'Montserrat';
    font-size: 19px;
    font-weight: 600;
    text-align: center !important;
    margin: 0 auto;
    display: block;
    margin-top: 15px !important;
    word-spacing: 5px !important;
}
#intro1
{
    display: block ;
}
#intro2
{
    display:none ;
    margin-top: 20px;
}
#intro3
{
    display:none ;
     margin-top: 20px;
}
#intro4
{
    display:none ;
     margin-top: 20px;
}
#intro5
{
       display:none ;
        margin-top: 20px;
}
.find-fit-header
{
       font-family: 'Montserrat';
    font-size: 19px;
    font-weight: 600;
    text-align: center !important;
    margin: 0 auto;
    display: block;
    margin-top: 40px !important;
    word-spacing:5px !important;
}

.fit-advisor-chest-tab-item:hover {
    /* display: grid; */
    /* justify-content: center; */
    /* align-items: center; */
    /* text-align: center; */
    /* cursor: pointer; */
    transform: scale(0.95) !important;
    transition: transform 0.2s ease-in-out 0s;
}
input[type="checkbox"]:checked {
    background: rgb(2, 2, 2);
}
.img_country
{
     width: 8% !important;
    margin: 0 auto !important;
    margin-left: -105px !important;
}
.countrycheck
{
     width:3% !important;
    margin:0 auto !important
}
.no-gutters {
  margin-right: 0;
  margin-left: 0;
}
.row {
          display: flex;
    flex-wrap: wrap;
    margin-right: 10px;
    margin-left: 57px;
    margin-top: 10px !important;
}

.col-xl,
.col-xl-auto, .col-xl-12, .col-xl-11, .col-xl-10, .col-xl-9, .col-xl-8, .col-xl-7, .col-xl-6, .col-xl-5, .col-xl-4, .col-xl-3, .col-xl-2, .col-xl-1, .col-lg,
.col-lg-auto, .col-lg-12, .col-lg-11, .col-lg-10, .col-lg-9, .col-lg-8, .col-lg-7, .col-lg-6, .col-lg-5, .col-lg-4, .col-lg-3, .col-lg-2, .col-lg-1, .col-md,
.col-md-auto, .col-md-12, .col-md-11, .col-md-10, .col-md-9, .col-md-8, .col-md-7, .col-md-6, .col-md-5, .col-md-4, .col-md-3, .col-md-2, .col-md-1, .col-sm,
.col-sm-auto, .col-sm-12, .col-sm-11, .col-sm-10, .col-sm-9, .col-sm-8, .col-sm-7, .col-sm-6, .col-sm-5, .col-sm-4, .col-sm-3, .col-sm-2, .col-sm-1, .col,
.col-auto, .col-12, .col-11, .col-10, .col-9, .col-8, .col-7, .col-6, .col-5, .col-4, .col-3, .col-2, .col-1 {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}
/* style for steps form */
input::-webkit-outer-spin-button,

  input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;

  }
* {
  box-sizing: border-box;
}
.size-position
{
    margin-left:-80px !important;
    margin-top: -44px !important;
}
body {
  background-color: #f1f1f1;
}

#regForm {
        background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
    margin-top: 135px !important;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  
    height: 10px;
    width: 10px;
    margin: 0px 7px;
    background-color: #000000;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #000000;
}
  /*   END STYLE FOR STEPS FORM */

/* .box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}
 */

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: normal;
  text-decoration: none;
  color: rgb(127,127,127);
}
.popup .close:hover {
  color: #020202;
}
.popup .content {
  max-height: 30%;
      overflow-x: hidden;
}

/* @media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
} */

.ctuMzF {
    width: 24px;
    vertical-align: middle;
    margin: -2px 6px 0px 0px;
}
.fit-advisor-header {
    position: relative;
    padding: 10px 5px;
    height: 50px;
    overflow: hidden;
    display: grid;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    justify-content: space-between;
    grid-template-columns: 1fr 1fr 1fr;
    border-bottom: 1px solid whitesmoke;
    user-select: none;
}
  .continue-btn {
      -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: auto;
    text-decoration: none;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 2px;
    padding: 8px 15px;
    background-color: #000000;
    color: var(--color-btn-primary-text);
    /* font-family: lato !important; */
    /* font-style: var(--font-style-header); */
    /* font-weight: var(--font-weight-header); */
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: normal;
    font-size: 15px !important;
    font-family: 'Karla';
}
  .fit-advisor-intro
  {
  text-align: center;
    margin-bottom: 50px !important;
    letter-spacing: 0.04em;
    color: rgb(0, 0, 0);
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-style: normal !important;
    font-weight: normal !important;
    font-size: 15px !important;
    line-height: 26px !important;
    margin-top: -22px;
    font-family:karla !important;

  }
.fit-advisor-header-box {
    position: relative;
    height: 50px;
}
  .lnWGiW.lnWGiW.lnWGiW {
    text-decoration: none;
    opacity: 1;
    transition: opacity 0.2s ease-in-out 0s;
    color: rgb(0, 0, 0) !important;
}
/* code for form */
  
  @import url(https://fonts.googleapis.com/css?family=Roboto);
body,
input,
select,
textarea,
body * {
  font-family: 'Roboto', sans-serif;
  box-sizing: border-box;
}
body::after, body::before,
input::after,
input::before,
select::after,
select::before,
textarea::after,
textarea::before,
body *::after,
body *::before {
  box-sizing: border-box;
}



h1 {
  font-size: 2rem;
  text-align: center;
  margin: 0 0 2em;
}

.container {
  position: relative;
  max-width: 40rem;
  margin: 5rem auto;
  background: #fff;
  width: 100%;
  padding: 3rem 5rem 0;
  border-radius: 1px;
}
.container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.2);
  -webkit-transform: scale(0.98);
          transform: scale(0.98);
  -webkit-transition: -webkit-transform 0.28s ease-in-out;
  transition: -webkit-transform 0.28s ease-in-out;
  transition: transform 0.28s ease-in-out;
  transition: transform 0.28s ease-in-out, -webkit-transform 0.28s ease-in-out;
  z-index: -1;
}
.container:hover::before {
  -webkit-transform: scale(1);
          transform: scale(1);
}

.button-container {
  text-align: center;
}

fieldset {
  margin: 0 0 3rem;
  padding: 0;
  border: none;
}

.form-radio,
.form-group {
  position: relative;
  margin-top: 2.25rem;
  margin-bottom: 2.25rem;
}

.form-inline > .form-group,
.form-inline > .btn {
  display: inline-block;
  margin-bottom: 0;
}

.form-help {
  margin-top: 0.125rem;
  margin-left: 0.125rem;
  color: #b3b3b3;
  font-size: 0.8rem;
}
.checkbox .form-help, .form-radio .form-help, .form-group .form-help {
  position: absolute;
  width: 100%;
}
.checkbox .form-help {
  position: relative;
  margin-bottom: 1rem;
}
.form-radio .form-help {
  padding-top: 0.25rem;
  margin-top: -1rem;
}

.form-group input {
  height: 1.9rem;
}
.form-group textarea {
  resize: none;
}
.form-group select {
  width: 100%;
  font-size: 1rem;
  height: 1.6rem;
  padding: 0.125rem 0.125rem 0.0625rem;
  background: none;
  border: none;
  line-height: 1.6;
  box-shadow: none;
}
.form-group .control-label {
  position: absolute;
  top: 0.25rem;
  pointer-events: none;
  padding-left: 0.125rem;
  z-index: 1;
  color: #b3b3b3;
  font-size: 1rem;
  font-weight: normal;
  -webkit-transition: all 0.28s ease;
  transition: all 0.28s ease;
}
.form-group .bar {
  position: relative;
  border-bottom: 0.0625rem solid #999;
  display: block;
}
.form-group .bar::before {
  content: '';
  height: 0.125rem;
  width: 0;
  left: 50%;
  bottom: -0.0625rem;
  position: absolute;
  background: #337ab7;
  -webkit-transition: left 0.28s ease, width 0.28s ease;
  transition: left 0.28s ease, width 0.28s ease;
  z-index: 2;
}
.form-group input,
.form-group textarea {
  display: block;
  background: none;
  padding: 0.125rem 0.125rem 0.0625rem;
  font-size: 1rem;
  border-width: 0;
  border-color: transparent;
  line-height: 1.9;
  width: 100%;
  color: transparent;
  -webkit-transition: all 0.28s ease;
  transition: all 0.28s ease;
  box-shadow: none;
}
.form-group input[type="file"] {
  line-height: 1;
}
.form-group input[type="file"] ~ .bar {
  display: none;
}
.form-group select,
.form-group input:focus,
.form-group input:valid,
.form-group input.form-file,
.form-group input.has-value,
.form-group textarea:focus,
.form-group textarea:valid,
.form-group textarea.form-file,
.form-group textarea.has-value {
  color: #333;
}
.form-group select ~ .control-label,
.form-group input:focus ~ .control-label,
.form-group input:valid ~ .control-label,
.form-group input.form-file ~ .control-label,
.form-group input.has-value ~ .control-label,
.form-group textarea:focus ~ .control-label,
.form-group textarea:valid ~ .control-label,
.form-group textarea.form-file ~ .control-label,
.form-group textarea.has-value ~ .control-label {
  font-size: 0.8rem;
  color: gray;
  top: -1rem;
  left: 0;
}
.form-group select:focus,
.form-group input:focus,
.form-group textarea:focus {
  outline: none;
}
.form-group select:focus ~ .control-label,
.form-group input:focus ~ .control-label,
.form-group textarea:focus ~ .control-label {
  color: #337ab7;
}
.form-group select:focus ~ .bar::before,
.form-group input:focus ~ .bar::before,
.form-group textarea:focus ~ .bar::before {
  width: 100%;
  left: 0;
}

.checkbox label,
.form-radio label {
  position: relative;
  cursor: pointer;
  padding-left: 2rem;
  text-align: left;
  color: #333;
  display: block;
}
.checkbox input,
.form-radio input {
  width: auto;
  opacity: 0.00000001;
  position: absolute;
  left: 0;
}

.radio {
  margin-bottom: 1rem;
}
.radio .helper {
  position: absolute;
  top: -0.25rem;
  left: -0.25rem;
  cursor: pointer;
  display: block;
  font-size: 1rem;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  color: #999;
}
.radio .helper::before, .radio .helper::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  margin: 0.25rem;
  width: 1rem;
  height: 1rem;
  -webkit-transition: -webkit-transform 0.28s ease;
  transition: -webkit-transform 0.28s ease;
  transition: transform 0.28s ease;
  transition: transform 0.28s ease, -webkit-transform 0.28s ease;
  border-radius: 50%;
  border: 0.125rem solid currentColor;
}
.radio .helper::after {
  -webkit-transform: scale(0);
          transform: scale(0);
  background-color: #337ab7;
  border-color: #337ab7;
}
.radio label:hover .helper {
  color: #337ab7;
}
.radio input:checked ~ .helper::after {
  -webkit-transform: scale(0.5);
          transform: scale(0.5);
}
.radio input:checked ~ .helper::before {
  color: #337ab7;
}

.checkbox {
  margin-top: 3rem;
  margin-bottom: 1rem;
}
.checkbox .helper {
  color: #999;
  position: absolute;
  top: 0;
  left: 0;
  width: 1rem;
  height: 1rem;
  z-index: 0;
  border: 0.125rem solid currentColor;
  border-radius: 0.0625rem;
  -webkit-transition: border-color 0.28s ease;
  transition: border-color 0.28s ease;
}
.checkbox .helper::before, .checkbox .helper::after {
  position: absolute;
  height: 0;
  width: 0.2rem;
  background-color: #337ab7;
  display: block;
  -webkit-transform-origin: left top;
          transform-origin: left top;
  border-radius: 0.25rem;
  content: '';
  -webkit-transition: opacity 0.28s ease, height 0s linear 0.28s;
  transition: opacity 0.28s ease, height 0s linear 0.28s;
  opacity: 0;
}
.checkbox .helper::before {
  top: 0.65rem;
  left: 0.38rem;
  -webkit-transform: rotate(-135deg);
          transform: rotate(-135deg);
  box-shadow: 0 0 0 0.0625rem #fff;
}
.checkbox .helper::after {
  top: 0.3rem;
  left: 0;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.checkbox label:hover .helper {
  color: #337ab7;
}
.checkbox input:checked ~ .helper {
  color: #337ab7;
}
.checkbox input:checked ~ .helper::after, .checkbox input:checked ~ .helper::before {
  opacity: 1;
  -webkit-transition: height 0.28s ease;
  transition: height 0.28s ease;
}
.checkbox input:checked ~ .helper::after {
  height: 0.5rem;
}
.checkbox input:checked ~ .helper::before {
  height: 1.2rem;
  -webkit-transition-delay: 0.28s;
          transition-delay: 0.28s;
}

.radio + .radio,
.checkbox + .checkbox {
  margin-top: 1rem;
}

.has-error .legend.legend, .has-error.form-group .control-label.control-label {
  color: #d9534f;
}
.has-error.form-group .form-help,
.has-error.form-group .helper, .has-error.checkbox .form-help,
.has-error.checkbox .helper, .has-error.radio .form-help,
.has-error.radio .helper, .has-error.form-radio .form-help,
.has-error.form-radio .helper {
  color: #d9534f;
}
.has-error .bar::before {
  background: #d9534f;
  left: 0;
  width: 100%;
}

.button {
  position: relative;
  
  border: 1px solid currentColor;
  font-size: 1.1rem;
  color: #000;
  margin: 3rem 0;
  padding: 0.75rem 3rem;
  cursor: pointer;
  -webkit-transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  overflow: hidden;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.button span {
  color: #fff;
  position: relative;
  z-index: 1;
}
.button::before {
  content: '';
  position: absolute;
  background: #071017;
  border: 50vh solid #1d4567;
  width: 30vh;
  height: 30vh;
  border-radius: 50%;
  display: block;
  top: 50%;
  left: 50%;
  z-index: 0;
  opacity: 1;
  -webkit-transform: translate(-50%, -50%) scale(0);
          transform: translate(-50%, -50%) scale(0);
}
.button:hover {
  color: #337ab7;
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
}
.button:active::before, .button:focus::before {
  -webkit-transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
  opacity: 0;
}
.button:focus {
  outline: none;
}

.fit-advisor-hr
{
    margin-top:-15px !important;
}

/* input field design */
  ::-webkit-input-placeholder {
  font-family:karla !important; 
  font-weight:normal !important;
  font-size: 19px !important;
}
::-moz-placeholder {
  font-family:karla !important;
  font-weight:normal !important;
  font-size: 19px !important;
}
:-ms-input-placeholder {
  font-family:karla !important;
  font-weight:normal !important;
  font-size: 19px !important;
}
::placeholder {
  font-family:karla !important;
  font-weight:normal !important;
  font-size: 19px !important;
}

.fit-advisor-custom_row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}
  .fit-advisor-custom_input{
    display: block;
    width: 60%;
    margin: 0px;
    padding: 10px 0px;
    background: 0px center;
    border-radius: 0px;
    border-width: 0px 0px 1px;
    border-top-style: initial;
    border-right-style: initial;
    border-left-style: initial;
    border-top-color: initial;
    border-right-color: initial;
    border-left-color: initial;
    border-image: initial;
    border-bottom-style: solid;
    border-bottom-color: rgb(175, 175, 175);
    transition: border 0.2s ease-in-out 0s;
    font-family: Lato !important;
    font-size: 20px !important;
    line-height: 24px !important;}
  .custom-offset
  {
    margin-left: 43px !important;
  }
  .labels-tab1 {
    text-transform: capitalize;
    display: block;
    width: 100%;
    color: rgba(0, 0, 0, 0.9);
    letter-spacing: 0.04em;
    margin: 0px;
    font-family: karla !important;
    line-height: 18px !important;
    font-weight: 400 !important;
    font-style: normal;
}
  .custom-offset-lg
  {
    margin-left: 44%;
  }
  .adjust-label{
  margin-left:-5%!important;
  }
  input::placeholder {
  font-size:12px !important
}
textarea:focus, input:focus{
    outline: none;
    border-bottom: 1px solid rgb(138, 171, 255);
}
  .fit-advisor-custom_previous_btn{
    visibility: visible;
    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 10px 30px;
    color: black;
    background: rgba(255, 255, 255, 0.5);
    border: 1px solid rgb(170, 170, 170);
    border-radius: 35px;
    box-shadow: none;
    cursor: auto;
    transition: border 0.2s ease-in-out 0s, background 0.2s ease-in-out 0s;
    user-select: none;
    opacity: 0.5;
}
  .fit-advisor-chest-tab {
    display: grid;
    margin-left: -80px important;
    width: 150% !important;
    gap: 5px;
    grid-template-columns: 1fr 1fr 1fr;
    padding: 0px 10px 40px;
}
  .fit-advisor-chest-tab-item {
    display: grid;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    text-align: center;
    cursor: pointer;
    transform: scale(0.95);
    transition: transform 0.2s ease-in-out 0s;
}
  .fit-advisor-options-img {
    width:  265.667px;
    height: 222.667px;
}
  .fit-advisor-options-text {
    letter-spacing: 0.04em;
    color: black;
    cursor: pointer;
    padding: 0px 0px 5px;
    display: inline-block;
    opacity: 0.7;
    transition: opacity 0.2s ease-in-out 0s, border 0.2s ease-in-out 0s;
    font-style: normal !important;
    font-weight: 400 !important;
    font-size: 18px !important;
    line-height: 22px !important;
}
  .product-card
  {
        position: relative;
    z-index: -1;
  }
  .fit-advisor-selected-product-grid {
    display: grid;
    grid-template-columns: 2fr 3fr;
    gap: 50px;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    padding: 0px 50px;
    margin-left:35px !important;
}
  .fit-advisor-selected-product-image {
    padding: 0px;
    align-self: flex-start;
}
  .fit-advisor-fit-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    justify-content: center;
    align-items: center;
    text-align: center;
    background: white;
    /* border: 1px solid rgb(221, 221, 221); */
    border-radius: 2px;
    margin-bottom: 15px;
        margin-left: -30px;
    padding: 10px 20px;
    /* box-shadow: rgb(0 0 0 / 4%) 3px 3px 0px 0px; */
}
.next
{
  margin-top: -10px !important;
}
  .fit-advisor-product-picture
  {
      margin: 0px auto 20px;
    display: block;
    border: 1px solid rgb(221, 221, 221);
    border-radius: 2px;
    box-shadow: rgb(0 0 0 / 4%) 3px 3px 0px 0px;
    width: 100% !important;
  }
  .fit-advisor-popup-adjustments
  {
  width:50% !important;
  overflow:none;
  }
  .gIdEkK p {
    margin: unset;
}
  .learn-text.learn-text.learn-text {
    text-decoration: underline;
    transition: color 0.2s ease-in-out 0s;
    color: rgb(0, 0, 0) !important;
}
  .fit-advisor-header-desc {
   padding: 10px;
    text-align: center;
    color: rgb(0 0 0);
    font-style: normal !important;
    font-weight: normal !important;
    font-size: 14px !important;
    line-height: 20px !important;
    letter-spacing: 0.04em !important;
    font-family:karla !important;
}
  .gIdEkK p {
    margin: unset;
}
 

.jjnwUS {
    display: grid;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    background: white;
    color: black;
    border: 1px solid rgb(170, 170, 170);
    border-radius: 50%;
    cursor: pointer;
    width: 22px;
    height: 22px;
    transition: opacity 0.2s ease-in-out 0s;
    margin-left: 50px;
}
.fit-advisor-product-size-box {
    padding: 0px;
}.fit-advisor-selected-size {
    text-align: center;
    font-weight: 700;
    font-size: 40px;
    line-height: 1.2em;
    background: rgba(255, 255, 255, 0.5);
    z-index: 30;
    margin:0 auto ;
    margin-left:35px;
    display:block;
}
  .fit-advisor-selected-size-arrow-box {
    position: relative;
    z-index: 40;
    padding: 5px 0px;
    grid-template-columns: 1fr 120px 1fr;
    justify-self: flex-end;
}
  .selected-product-arrow-left {
    background: rgba(255, 255, 255, 0.5);
    z-index: 30;
    margin-right:50px !important;
}
  .selected-product-arrow-left-pointer {
    opacity: 1;
    cursor: pointer;
}
  .fit-advisor-selected-size-container {
    display: grid;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
}
  .fit-advisor-product-btn-to-cart {
      -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: auto;
    text-decoration: none;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 2px;
    padding: 8px 15px;
    background-color: #000000;
    color: var(--color-btn-primary-text);
    /* font-family: lato !important; */
    /* font-style: var(--font-style-header); */
    /* font-weight: var(--font-weight-header); */
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: normal;
    font-size: calc(((var(--font-size-base) - 2) / (var(--font-size-base))) * 1em);
    /* visibility: visible;
    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 10px 30px;
    color: white;
    background: black;
    border: 1px solid rgb(170, 170, 170);
    border-radius: 35px;
    box-shadow: none;
    cursor: pointer;
  	left:41%!important;
    transition: border 0.2s ease-in-out 0s, background 0.2s ease-in-out 0s;
    user-select: none;
    opacity: 1; */
}
  .fit-advisor-inch
    {
margin-left: 73% !important;
    margin-top: -27% !important;
    
    }
  .fit-advisor-agelabel
    {
        margin-top: -26px !important;
       
    
    }
  .fit-advisor-agelabel-span
    {
        
       margin-left:-68px !important;
       margin-top:6px !important;
    
    }
   .fit-advisor-age-input
    {
        margin-left: 17.5rem !important;
    margin-top: -64px;
    width: 150px !important;
    }
  .fit-advisor-logo
    
    {
    margin-left: 43% !important;
    }
/*   //responsiveness of modal */
  @media (min-width:320px) and (max-width:480px)  { /* smartphones, iPhone, portrait 480x320 phones */
    .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -27px;
    margin-left: -32px;
    margin-top: 10px !important;
        margin-bottom: 50px;
}
.adjust-label {
    margin-left: 10%!important;
}
.fit-advisor-intro
  {
  text-align: center;
    margin-bottom: 50px !important;
    letter-spacing: 0.04em;
    color: rgb(0, 0, 0);
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-style: normal !important;
    font-weight: normal !important;
    font-size: 14px !important;
    line-height: 26px !important;
    margin-top: -22px;
    font-family:karla !important;

  }
    .fit-advisor-popup-adjustments
  {
  width:100% !important;
    overflow:none;
  }
    
    .fit-advisor-custom_input{
    display: block;
    width: 50%;
    margin: 0px;
    padding: 10px 0px;
    background: 0px center;
    border-radius: 0px;
    border-width: 0px 0px 1px;
    border-top-style: initial;
    border-right-style: initial;
    border-left-style: initial;
    border-top-color: initial;
    border-right-color: initial;
    border-left-color: initial;
    border-image: initial;
    border-bottom-style: solid;
    border-bottom-color: rgb(175, 175, 175);
    transition: border 0.2s ease-in-out 0s;
    font-family: Lato !important;
    font-size: 20px !important;
    line-height: 24px !important;}
    .row-feet-inch {
    display: grid;
    gap: 30px;
    grid-template-columns: 1fr 1fr;
}
    .fit-advisor-inch
    {
    margin-left: 143px !important;
    margin-top: -64px!important;
    }
    .fit-advisor-agelabel
    {
        margin-top: -83px !important;
    margin-left: 148px;
    }
    .fit-advisor-age-input
    {
    margin-left: 14.5rem !important;
    margin-top: -65px !important;
        width: 50% !important;
        }
input {
  text-align: center;
}  
::-webkit-input-placeholder {
  text-align: center;
}
.jjnwUS {
    display: grid;
    justify-content: center;
    align-items: center;
    background: white;
    color: black;
    border: 1px solid rgb(170, 170, 170);
    border-radius: 50%;
    cursor: pointer;
    width: 22px;
    height: 22px;
    transition: opacity 0.2s ease-in-out 0s;
    margin-left: 30px;
}
.selected-product-arrow-left {
    background: rgba(255, 255, 255, 0.5);
    z-index: 30;
    margin-right: 30px !important;
}
:-moz-placeholder {
  text-align: center;
}
    .custom-offset {
        margin-left: -8% !important;
}
    .fit-advisor-agelabel-span {
    margin-left: 52px !important;
    margin-top: 0px !important;
}
    .fit-advisor-logo
    
    {
    margin-left: 30% !important;
    }
    .continue-btn
    
    {
     
    -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: auto;
    text-decoration: none;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 2px;
    padding: 8px 15px;
    background-color: #000000;
    color: var(--color-btn-primary-text);
    /* font-family: lato !important; */
    /* font-style: var(--font-style-header); */
    /* font-weight: var(--font-weight-header); */
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: normal;
    font-size: 15px !important;
    font-family: 'Karla';
        right: 25% !important;
    width: 50% !important;

    }
    
  .fit-advisor-product-btn-to-cart {
      -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: auto;
    text-decoration: none;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 2px;
    padding: 8px 15px;
    background-color: #000000;
    color: var(--color-btn-primary-text);
    /* font-family: lato !important; */
    /* font-style: var(--font-style-header); */
    /* font-weight: var(--font-weight-header); */
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: normal;
    font-size: calc(((var(--font-size-base) - 2) / (var(--font-size-base))) * 1em);
    /* visibility: visible;
    font-family: Lato;
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 10px 30px;
    color: white;
    background: black;
    border: 1px solid rgb(170, 170, 170);
    border-radius: 35px;
    box-shadow: none;
    cursor: pointer;
  	left:41%!important;
    transition: border 0.2s ease-in-out 0s, background 0.2s ease-in-out 0s;
    user-select: none;
    opacity: 1; */
}
    .fit-advisor-chest-tab {
    display: block;
    gap: 5px;
    margin-left: -65px !important;
    grid-template-columns: 1fr 1fr 1fr;
    padding: 0px 10px 40px;
}
    .fit-advisor-selected-product-grid {
    /* display: block; */
    grid-template-columns: 2fr 3fr;
    gap: 50px;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    padding: 0px 50px;
          margin-left: 50px !important;
    /* display: none; */
}
    .fit-advisor-selected-product-image {
    padding: 0px;
    align-self: flex-start;
    display: none;
}
    .fit-advisor-fit-grid {
    display:block;
    grid-template-columns: 1fr 1fr;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    text-align: center;
    background: white;
    border:none;
    margin-bottom: 15px;
        margin-left: -50px;
    padding: 10px 20px;
      box-shadow:none;
    
}
  
  }
  
@media (min-width:481px)  and (max-width:640px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
@media (min-width:641px) and (max-width:960px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
@media (min-width:961px) and (max-width:1024px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ }
@media (min-width:1025px) and (max-width:1280px) { /* big landscape tablets, laptops, and desktops */ }
/* /* @media (min-width:1281px) { /* hi-res laptops and desktops */
/*   } / / */

/* STYLE FOR LOADER */
@-webkit-keyframes spinner-border {
  to {
    transform: rotate(360deg);
  }
}

@keyframes spinner-border {
  to {
    transform: rotate(360deg);
  }
}

.spinner-border {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  border: 0.25em solid currentColor;
  border-right-color: transparent;
  border-radius: 50%;
  -webkit-animation: 0.75s linear infinite spinner-border;
          animation: 0.75s linear infinite spinner-border;
          border-width:2px !important;
}

.spinner-border-sm {
  width: 1rem;
  height: 1rem;
  border-width: 0.2em;
}
@media (prefers-reduced-motion: reduce) {
  .spinner-border,
.spinner-grow {
    -webkit-animation-duration: 1.5s;
            animation-duration: 1.5s;
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}
.sr-only-focusable:active, .sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  overflow: visible;
  clip: auto;
  white-space: normal;
}

</style>
