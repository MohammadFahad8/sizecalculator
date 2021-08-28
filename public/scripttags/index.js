
function addHeadTag(tag, options) {
    let item = document.createElement(tag);
    Object.assign(item, options, { async: false });
    document.querySelector("head").appendChild(item)
  }
  
//   function avoidFouc() {
//     document.body.style.opacity = 1;
//   }

  addHeadTag('link', {
    rel: 'stylesheet',
    href: 'http://127.0.0.1:8000/scripttags/app_style.css',

   });
//   addHeadTag('script', {
//     type: 'application/javascript',
//     src: 'https://unpkg.com/axios/dist/axios.min.js'
//   });
//   addHeadTag('script', {
//     type: 'application/javascript',
//     src: 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
//   });
//   addHeadTag('script', {
//     type: 'application/javascript',
//     src: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
//   });

var div = document.getElementById("ScriptApp")
var x,txt;

  var productcomplete = div.getAttribute("data-product");
  
  var product =  JSON.parse(productcomplete)
  console.log(product.variants)
                                                                        // loop work start

//   for(var i=0; i< product.variants.length;i++)
// {
// //creates option tag
// console.log(product.variants[i].title)
// document.getElementById('select-drop').innerHTML=product.variants[i].title;
//   $('#select-drop').text(product.variants[i].title); //appends to select if parent div has id dropdown
// }




                                                                        // loop works end
  
    
  
dev_reset()




div.innerHTML += '<head></head><body ><div class="box"><a class="button " id="popup-trigger" href="#popup1" style="left: 5px !important;border: none;">Find Fit</a></div><div id="popup1" class="overlay " ><div class="popup fit-advisor-popup-adjustments" ><div class="predict__sc-1a4an9n-7 fit-advisor-header-box"><div class="predict__sc-1a4an9n-0 fot-advisor-header"><div></div><div><a href="https://getwair.com/" target="_blank" rel="noopener noreferrer nofollow" class="predict__sc-1a4an9n-2 lnWGiW fit-advisor-logo" ><img class="predict__sc-1a4an9n-1 ctuMzF" src="https://widget-frontend-5e4fikalk-wair.vercel.app/images/favicon-black.png" alt="image" style="opacity: 1;"><span class="predict__sc-1a4an9n-3 OSFBL">Fit Advisor</span></a></div></div><div class="predict__sc-1a4an9n-8 dCmgSk"><div width="0" class="predict__sc-1a4an9n-9 eygAJd"></div></div></div><a class="close" href="#">&times;</a><hr style="margin-top:-15px !Important"><div class="content" style="margin-top:-51px !important"><form id="regForm" ><p class="fit-advisor-intro">Enter your <span><b>details</b></span> below <br> to begin a size recommendation</p><div class="tab custom-offset"><label class="adjust-label labels-tab1"  for="height_ft">Height</label> <div class="fit-advisor-custom_row"> <p><input type="number" id="height_ft" placeholder="ft." class="fit-advisor-custom_input" name="height_ft"></p><p><input type="number" id="height_in" placeholder="in." class="fit-advisor-custom_input fit-advisor-inch"  name="height_in"></p></div><label class="adjust-label labels-tab1" for="weight">Weight</label> <div class="fit-advisor-custom_row"> <p><input type="number" id="weight" placeholder="Weight" class="fit-advisor-custom_input" name="weight"></p><label for="age" class="fit-advisor-agelabel"><span class=" labels-tab1 fit-advisor-agelabel-span" >Age</span></label> <p><input type="number" id="age"  placeholder="age" class="fit-advisor-custom_input fit-advisor-age-input"  name="age"></p></div></div><button class="continue-btn" style="position: absolute;right: 45%;bottom: 47px;" type="button" id="nextBtn" onclick="nextPrev(1)">Continue</button><div class="tab"><div><div class=" fit-advisor-chest-tab"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest1" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-1.svg" onclick="nextPrev(1)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Narrower</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest2" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-2.svg" onclick="nextPrev(1)" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="chest3"  onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Broader</p></div></div></div></div></div><div class="tab"> <div><div class=" fit-advisor-chest-tab"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach1" onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach2" onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="stomach3" onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div> <div class="tab"><div><div class=" fit-advisor-chest-tab"><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom1" onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-1.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Flatter</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom2"  onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-2.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Average</p></div></div><div class=" fit-advisor-chest-tab-item"><div style="opacity: 1; transform: none;"><img id="bottom3"  onclick="nextPrev(1)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-3.svg" class=" fit-advisor-options-img"><p class=" fit-advisor-options-text">Rounder</p></div></div></div></div></div><div class="tab"><div class=" fit-advisor-selected-product-grid"><div class=" fit-advisor-selected-product-image"><img id="featured_image" class=" fit-advisor-product-picture" src="//cdn.shopify.com/s/files/1/0249/7784/products/Rhone_Feb_26_2019-_0116_x600.jpg?v=1618619873" alt="image" style="opacity: 1;"></div><div><div class=" fit-advisor-product-size-box"><div class=" fit-advisor-fit-grid"><div class=" krijnu"><p class=" eVQudH">Size</p><div class=" coSBSK"><p class=" dZzOUn" style="opacity: 1;">best fit<svg viewBox="0 0 16 16" height="14" width="14" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class=""><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-3.97-3.03a.75.75 0 00-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 00-1.06 1.06L6.97 11.03a.75.75 0 001.079-.02l3.992-4.99a.75.75 0 00-.01-1.05z"></path></svg></p></div></div><div class=" fit-advisor-selected-size-container fit-advisor-selected-size-arrow-box"><div class=" selected-product-arrow-left"><span size="10" class=" jjnwUS  selected-product-arrow-left-pointer"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path></svg></span></div><div id="fit-advisor-sizes-slider" font-size="40"  class=" fit-advisor-selected-size" style="opacity: 1;" ><span id="fsize">M</span></div><div class=" dfOagu"><span size="10" class=" jjnwUS  hjNiUI"><svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path></svg></span></div></div></div></div><p class=" fit-advisor-header-desc">Our recommended size is based on how the designer intended this product to fit your body. <a target="_blank" rel="noopener noreferrer nofollow" href="https://getwair.com/blog/fit-advisor-learn-more/" class=" learn-text">Learn More</a></p></div></div></div><div style="overflow:auto;"><div class="custom-offset-lg" style="margin-top:8% !Important; display:none;"><button class="fit-advisor-custom_previous_btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button></div></div></p><div id="steps-mark" style="text-align:center;margin-top:100px;"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div></form></div></div></div></div></body>'
//div.innerHTML+='<div id="size-steps"><h3>Keyboard</h3><section>  <p>Try the keyboard navigation by clicking arrow left or right!</p></section><h3>Effects</h3><section><p>Wonderful transition effects.</p></section><h3>Pager</h3><section><p>The next and previous buttons help you to navigate through your content.</p></section></div>'
 
$("#featured_image").attr("src",product.featured_image);

$('#popup-trigger').on('click',function(){

  $('.product-card').css('z-index','-1');
  
  $('body').css('overflow','hidden');
})

// Turning off the loop that populates the variants(small,medium,large)


//$("#fit-advisor-sizes-slider").empty();
//     $.each(product.variants, function() {
//         $("<span id='fsize' />").text(this.title).appendTo("#fit-advisor-sizes-slider");
//     });
var height_cm,weightf,weight_lbs=0;
var measurew=0;
var measureh=0;
function sendData() {
  }

$('#btn-done').on('click',function(){

    console.log('clicked')
    event.preventDefault();
    
  sendData();
})
window.addEventListener( "load", function () {
 
    // Access the form element...
    
  
    // ...and take over its submit event.


  } );
   

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
function measurements()
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

}
function showTab(n) {
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
    
    
    

  if((measurew >= 130 && measurew<=150) && (measureh  >=  165.1 && measureh <= 175.26)  )
  {
     
    measurements()

  }

  else if((measurew >= 150 && measurew<=160) && (measureh  >=  165.1 && measureh <= 177.8))
  {
    measurements()
  }
  else  if((measurew >= 160 && measurew<=170) && (measureh  >=  165.1 && measureh <= 180.34))
  {

    measurements()

  }

  else if((measurew >= 170 && measurew<=180) && (measureh  >=  167.64 && measureh <= 172.72 ))
  {
    measurements()

  }
  else  if((measurew >= 170 && measurew<=180) && (measureh  >=  175.26 && measureh <= 182.88 ))
  {

    measurements()

  }
  else if((measurew >= 180 && measurew<=190) && (measureh  >=  172.72 && measureh <= 187.96 ))
  {

    measurements()

  }
  
  else if((measurew >= 190 && measurew<=200) && (measureh  >=  172.72 && measureh <= 175.26 ))
  {
    measurements()

  }
  else  if((measurew >= 190 && measurew<=200) && (measureh  >=  177.8  && measureh <= 187.96 ))
  {
    measurements()

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
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  
var ft = $('#height_ft').val();
var inch = $('#height_in').val();
var weightf = $('#weight').val();

var weight_lbs = parseInt(weightf) * 2.205;
var heightf = ft*12;
var heighti = heightf+ parseInt(inch);
var height_cm  = heighti* 2.54;

 measureh = localStorage.getItem('height');
measurew = localStorage.getItem('weight');
if(  measurew == null){
  
   
  localStorage.setItem("weight", weight_lbs);
  

 }

 if( measureh == null){
   
  localStorage.setItem("height", height_cm);
  

 }

 
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
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
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

var chest=0;
var stomach=0;
var bottom=0;
//narrower
$('#chest1').click(function(){

  chest = 1;
})
//Average/
$('#chest2').click(function(){

  chest = 2;
})
//Broader
$('#chest3').click(function(){

  chest = 3;
})
$('#stomach1').click(function(){

  stomach = 1;
})
$('#stomach2').click(function(){

  stomach = 2;
})
$('#stomach3').click(function(){

  stomach = 3;
})
$('#bottom1').click(function(){

  bottom = 1;
})
$('#bottom2').click(function(){

  bottom = 2;
})
$('#bottom3').click(function(){

  bottom = 3;
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



$('.fit-advisor-product-btn-to-cart').on('click', function(){


  
})
function calculate()
{
  // var product_size_selected = $('#fsize').text();
  // alert(product_size_selected)
//   const todo = {
//     title: 'Some really important work to finish'
// };

// fetch('https://wdtcv.myshopify.com/products/test-new-product?variant=39648526336184#popup1', {
//         method: 'POST',
//         body: JSON.stringify(todo),
//         headers: {
//             'Content-type': 'application/json; charset=UTF-8'
//         }
//     })
//     .then(response => response.json())
//     .then(json => {
//         console.log(json);
//     });


    }
function dev_reset()
{
  console.log('restored')
  window.localStorage.clear();
}


/////////////////////////////////////////////////////////////////////
