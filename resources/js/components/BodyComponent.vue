<template>

  <body >
     
      <div class="box"><a class="button " id="popup-trigger" href="#popup1" style="left: 5px !important;border: none;">Find Fit</a></div><div id="popup1" class="overlay " ><div class="popup fit-advisor-popup-adjustments" ><div class="predict__sc-1a4an9n-7 fit-advisor-header-box"><div class="predict__sc-1a4an9n-0 fot-advisor-header"><div></div><div><a href="https://getwair.com/" target="_blank" rel="noopener noreferrer nofollow" class="predict__sc-1a4an9n-2 lnWGiW fit-advisor-logo" ><img class="predict__sc-1a4an9n-1 ctuMzF" src="https://widget-frontend-5e4fikalk-wair.vercel.app/images/favicon-black.png" alt="image" style="opacity: 1;"><span class="predict__sc-1a4an9n-3 OSFBL">Fit Advisor</span></a></div></div><div class="predict__sc-1a4an9n-8 dCmgSk"><div width="0" class="predict__sc-1a4an9n-9 eygAJd"></div></div></div><a class="close" href="#">&times;</a><hr class="fit-advisor-hr"><div class="content" style="margin-top:-155px !important; margin-bottom: -100px !important;"><form id="regForm" ><p class="fit-advisor-intro">Enter your <span><b>details</b></span> below <br> to begin a size recommendation</p><div class="tab custom-offset"><label class="adjust-label labels-tab1"  for="height_ft">Height</label> <div class="fit-advisor-custom_row"> <p><input type="number" id="height_ft" placeholder="ft." class="fit-advisor-custom_input" name="height_ft"></p><p><input type="number" id="height_in" placeholder="in." class="fit-advisor-custom_input fit-advisor-inch"  name="height_in"></p></div><label class="adjust-label labels-tab1" for="weight">Weight</label> <div class="fit-advisor-custom_row"> <p><input type="number" id="weight" placeholder="Weight" class="fit-advisor-custom_input" name="weight"></p><label for="age" class="fit-advisor-agelabel"><span class=" labels-tab1 fit-advisor-agelabel-span" >Age</span></label> <p><input type="number" id="age"  placeholder="age" class="fit-advisor-custom_input fit-advisor-age-input"  name="age"></p></div></div><button class="continue-btn" style="position: absolute;right: 45%;bottom: 50px;" type="button" id="nextBtn" v-on:click="nextPrev(1)">Continue</button><div class="tab"><div><div class=" fit-advisor-chest-tab size-position" ><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest1" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-1.svg" v-on:click="nextPrev(1)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Narrower</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest2" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-2.svg" v-on:click="nextPrev(1)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest3"  v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Broader</p></div></div></div></div></div><div class="tab"> <div><div class=" fit-advisor-chest-tab size-position"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach1" v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach2" v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach3" v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div> <div class="tab"><div><div class=" fit-advisor-chest-tab size-position"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom1" v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom2"  v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom3"  v-on:click="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div><div class="tab"><div class=" fit-advisor-selected-product-grid"><div class=" fit-advisor-selected-product-image"><img id="featured_image" class=" fit-advisor-product-picture" v-bind:src=this.product.featured_image alt="image" style="opacity: 1;"></div><div><div class=" fit-advisor-product-size-box"><div class=" fit-advisor-fit-grid"><div class=" krijnu"><p class=" eVQudH">Size</p><div class=" coSBSK"><p class=" dZzOUn" style="opacity: 1;">best fit<svg viewBox="0 0 16 16" height="14" width="14" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class=""><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-3.97-3.03a.75.75 0 00-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 00-1.06 1.06L6.97 11.03a.75.75 0 001.079-.02l3.992-4.99a.75.75 0 00-.01-1.05z"></path></svg></p></div></div><div class=" fit-advisor-selected-size-container fit-advisor-selected-size-arrow-box"><div class=" selected-product-arrow-left"><span size="10" class=" jjnwUS  selected-product-arrow-left-pointer"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path></svg></span></div><div id="fit-advisor-sizes-slider" font-size="40"  class=" fit-advisor-selected-size" style="opacity: 1;" ><span id="fsize">M</span></div><div class=" dfOagu"><span size="10" class=" jjnwUS  hjNiUI"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path></svg></span></div></div></div></div><p class=" fit-advisor-header-desc">Our recommended size is based on how the designer intended this product to fit your body. <a target="_blank" rel="noopener noreferrer nofollow" href="https://getwair.com/blog/fit-advisor-learn-more/" class=" learn-text">Learn More</a></p></div></div></div><div style="overflow:auto;"><div class="custom-offset-lg" style="margin-top:8% !Important; display:none;"><button class="fit-advisor-custom_previous_btn" type="button" id="prevBtn" v-on:click="nextPrev(-1)">Previous</button></div></div></p><div id="steps-mark" style="text-align:center;margin-top:100px;"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div></form></div></div></div></div>
      
      
      </body>

</template>

<script>
    export default {
         props: {
      product:Object
    },
        data(){
            return{
                currentTab : 0,
                 height_cm:0,
                 weightf:0,
                 weight_lbs:0,
                  measurew:0,
                measureh:0,
                message:"Jello",
                chest:0,
stomach:0,
bottom:0,
            }
        },
        methods:{
            getProductDetails:function()
            {
                axios.get('https://24bbe8b8d790.ngrok.io/get/products/'+this.product.id).then((res)=>{
                    alert('check console');
                })
            },
            showTab:function(n)
            {

  //document.getElementById('tabnumber').innerHTML=n;

  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {

    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("steps-mark").style.visibility = "hidden";
  } else {
    document.getElementById("steps-mark").style.visibility = "visible";
    document.getElementById("prevBtn").style.display = "inline";
  }
  if(n==1){
    $('#popup1').css('overflow','scroll');
  }
  if ( n == 4) {
    
    document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("nextBtn").innerHTML = "Add Size to Cart";
    
    
    

  if((this.measurew >= 130 && this.measurew<=150) && (this.measureh  >=  165.1 && this.measureh <= 175.26)  )
  {
     
    this.measurements()

  }

  else if((this.measurew >= 150 && this.measurew<=160) && (this.measureh  >=  165.1 && this.measureh <= 177.8))
  {
    this.measurements()
  }
  else  if((this.measurew >= 160 && this.measurew<=170) && (this.measureh  >=  165.1 && this.measureh <= 180.34))
  {

    this.measurements()

  }

  else if((this.measurew >= 170 && this.measurew<=180) && (this.measureh  >=  167.64 && this.measureh <= 172.72 ))
  {
    this.measurements()

  }
  else  if((this.measurew >= 170 && this.measurew<=180) && (this.measureh  >=  175.26 && this.measureh <= 182.88 ))
  {

    this.measurements()

  }
  else if((this.measurew >= 180 && this.measurew<=190) && (this.measureh  >=  172.72 && this.measureh <= 187.96 ))
  {

    this.measurements()

  }
  
  else if((this.measurew >= 190 && this.measurew<=200) && (this.measureh  >=  172.72 && this.measureh <= 175.26 ))
  {
    this.measurements()

  }
  else  if((this.measurew >= 190 && this.measurew<=200) && (this.measureh  >=  177.8  && this.measureh <= 187.96 ))
  {
    this.measurements()

  }
  else {

    document.getElementById("fsize").innerHTML = 'No Match';
  }
    document.getElementById("nextBtn").classList.add('fit-advisor-product-btn-to-cart');

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
            measurements:function()
            {
                
  if(chest == 1 && stomach == 1 && bottom == 1)
  {
    document.getElementById("fsize").innerHTML = 'XS';
  }
  else if((chest == 1 && stomach == 1) || (chest == 1 && stomach == 2) || (chest == 2 && stomach == 1))
    {

    document.getElementById("fsize").innerHTML = 'S';
    }
    else if ((chest == 2 && stomach == 2) && (chest == 2 && stomach == 3) && (chest == 3 && stomach == 2))
    {
      document.getElementById("fsize").innerHTML = 'M';

    }
    else if((chest == 3 && stomach == 3) )
    {
      console.log('l')
    document.getElementById("fsize").innerHTML = 'L';

    }
    else if((chest == 3 && stomach == 3 && bottom == 3))
    {
      console.log('xl')
    document.getElementById("fsize").innerHTML = 'XL';


    }
            },
            nextPrev:function(n)
            {
                
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !this.validateForm()) return false;
  // Hide the current tab:
console.log(x)
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
  if (this.currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
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
            console.log(' !! Begin Your Experience with us !! ')
            window.localStorage.clear();
            },
        },
        mounted() {
            this.getProductDetails();
            this.dev_reset();
            console.log(this.product.featured_image);
            // Current tab is set to be the first tab (0)
this.showTab(this.currentTab);
// $("#featured_image").attr("src",this.product.featured_image);

$('#popup-trigger').on('click',function(){

  $('.product-card').css('z-index','-1');
  
  //$('body').css('overflow','hidden');
  $('#popup1').css('overflow','scroll');
})


//narrower
$('#chest1').click(function(){

  this.chest = 1;
})
//Average/
$('#chest2').click(function(){

  this.chest = 2;
})
//Broader
$('#chest3').click(function(){

  this.chest = 3;
})
$('#stomach1').click(function(){

  this.stomach = 1;
})
$('#stomach2').click(function(){

  this.stomach = 2;
})
$('#stomach3').click(function(){

  this.stomach = 3;
})
$('#bottom1').click(function(){

  this.bottom = 1;
})
$('#bottom2').click(function(){

  this.bottom = 2;
})
$('#bottom3').click(function(){

  this.bottom = 3;
})

//size decider happens
//formula to caluclate height into centimeters


$('.bvHnuU').on('click',function(){
  var measureh = localStorage.getItem('height');
  var measurew = localStorage.getItem('weight');



  
  
console.log("weight:"+measurew);
 console.log("Height:"+measureh);
console.log("chest:"+chest);
console.log("stomach:"+stomach);
console.log("bottom:"+bottom);
})




        }
    }
</script>
<style>



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
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
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
  background-color: #04AA6D;
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
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
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
    visibility: visible;
    
    font-size: 16px;
    font-weight: 400;
    display: inline-block;
    padding: 10px 30px;
    color: black;
    background: rgba(255, 255, 255, 0.5);
    border: 1px solid rgb(170, 170, 170);
    border-radius: 35px;
    box-shadow: none;
    cursor: pointer;
    transition: border 0.2s ease-in-out 0s, background 0.2s ease-in-out 0s;
    user-select: none;
    opacity: 1;
}
  .fit-advisor-intro
  {
  text-align: center;
    margin-bottom: 50px !important;
    letter-spacing: 0.04em;
    color: rgb(101, 101, 101);
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-style: normal !important;
    font-weight: normal !important;
    font-size: 15px !important;
    line-height: 26px !important;
    margin-top: -22px;

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
    border-bottom-color: rgb(221, 221, 221);
    transition: border 0.2s ease-in-out 0s;
    font-family: Lato !important;
    font-size: 20px !important;
    line-height: 24px !important;}
  .custom-offset
  {
    margin-left: 75px !Important;
  }
  .labels-tab1 {
    text-transform: capitalize;
    display: block;
    width: 100%;
    color: rgba(0, 0, 0, 0.9);
    letter-spacing: 0.04em;
    margin: 0px;
    font-family: Lato !important;
        font-size: 12px !important;
    line-height: 18px !important;
    font-weight: 400 !important;
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
    width: 222.667px;
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
}
  .fit-advisor-selected-product-image {
    padding: 0px;
    align-self: flex-start;
}
  .fit-advisor-fit-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    text-align: center;
    background: white;
    border: 1px solid rgb(221, 221, 221);
    border-radius: 2px;
    margin-bottom: 15px;
    padding: 10px 20px;
    box-shadow: rgb(0 0 0 / 4%) 3px 3px 0px 0px;
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
    color: rgb(101, 101, 101);
    font-style: normal !important;
    font-weight: normal !important;
    font-size: 14px !important;
    line-height: 20px !important;
    letter-spacing: 0.04em !important;
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
    visibility: visible;
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
    opacity: 1;
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
    border-bottom-color: rgb(221, 221, 221);
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
    margin-top: -65px !important;}
    .custom-offset {
    margin-left: 8%;
}
    .fit-advisor-agelabel-span {
    margin-left: 0% !important;
}
    .fit-advisor-logo
    
    {
    margin-left: 30% !important;
    }
    .continue-btn
    
    {
      left: 25% !important;
    }
    .fit-advisor-chest-tab {
    display: block;
    gap: 5px;
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



</style>
