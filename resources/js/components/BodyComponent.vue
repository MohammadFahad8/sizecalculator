<template>
<div>

    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <div v-if="showBodyFitApp" class="box">
        <a class=" btn btn-outline-success" id="popup-trigger" href="#popup1" style="margin-left: 1%  !important;margin-bottom: 20px  !important;border: none;">Find Fit</a>
        <span id="finalsize" v-if="finalsize !=''" class="final-size-heading"> <span class="final-size-label">Your Fit Size : </span> {{finalsize}}</span>

    </div>
    <div id="popup1" class="overlay" style="z-index:999 !important">
        <div class="popup fit-advisor-popup-adjustments" style="margin-top: 20px;">
            <div class="predict__sc-1a4an9n-7 fit-advisor-header-box">
                <div class="predict__sc-1a4an9n-0 fot-advisor-header">
                    <div></div>
                    <div><svg v-if="tabnumber >1 && tabnumber<5" v-on:click="back(tabnumber)" viewBox="0 0 512 512" height="24" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-5 dcvgeN" style="cursor:pointer
display: inline-block;
/* width: 59px; */
">
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" points="328 112 184 256 328 400"></polyline>
                        </svg>
                        <svg style="cursor:pointer" v-if="lastTab" v-on:click="restart" viewBox="0 0 512 512" height="24" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-6 HBqpi">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M320 146s24.36-12-64-12a160 160 0 10160 160"></path>
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" points="256 58 336 138 256 218"></polyline>
                        </svg>
                       </div>
                </div>
                <div class="predict__sc-1a4an9n-8 dCmgSk">
                    <div width="0" class="predict__sc-1a4an9n-9 eygAJd"></div>
                </div>
            </div>
            <!-- close modal btn -->
            <a class="close mt-n6" id="closeApp" href="#">&times;</a>
    <div>
         <div class="x-row ">
                            <div class="x-col"></div>
                            <div class="x-col"></div>
                            <div class="x-w-100"></div>
                            <div class="x-col"></div>
                            <div class="x-col"></div>
                            </div>
                        <span class="predict__sc-1a4an9n-3 OSFBL switch find-fit-header">FIND YOUR FIT</span>
    </div>
            <div class="content" style="margin-top:-155px !important; margin-bottom: -120px !important;">
                <form id="regForm">
                    <!-- <p class="fit-advisor-intro text-center" id="intro1">
                        <span id="mark1">To get a size recommendation,</span> <br><span id="mark2">fill out the form below</span></p> -->
                    
                    
                    
                  

                                <div v-switch="tabnumber">
                                        <div v-case="1"><form-component></form-component></div>    
                                        <div v-case="2"><attribute-one-component></attribute-one-component></div>    
                                        <div v-case="3"><attribute-two-component></attribute-two-component></div>    
                                        <div v-case="4"><attribute-three-component></attribute-three-component></div>    
                                        <div v-case="5"><result-component :product="this.product" :form="this.form"></result-component></div>    

                                </div>


                   <!-- //first tab into its component
                   //Second tab into its component
                  //Third tab into its Component
                 
                   //Result Tab into its Component -->
                    <div style="overflow:auto;">
                        <div class="custom-offset-lg" style="margin-top:8% !Important; display:none;"><button class="fit-advisor-custom_previous_btn" type="button" id="prevBtn" v-on:click="nextPrev(-1)">Previous</button></div>
                    </div>
                    <!-- </p> -->
                    <!-- Steps marks was here -->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- </div> -->
</template>


<script>
import EventBus from '../event-bus';

export default {
    props: {
        product: Object,

    },
    data() {
        return {
            form: {
                heightfoot: localStorage.getItem('foot'),
                heightinch: localStorage.getItem('inch'),
                heightcm: parseInt(localStorage.getItem('cm')),
                weight: parseFloat(localStorage.getItem('weight')).toFixed(0),
                age: localStorage.getItem('age'),
                chest:{
                    title:'chest', 
                    other:localStorage.getItem('chest'),
                } ,
                stomach:{
                    title:'stomach',
                   other:localStorage.getItem('stomach')
                   },

                bottom:{ 
                    title:'bottom',
                    other:localStorage.getItem('bottom')
                },
                tags: JSON.parse(localStorage.getItem('tags')),
                convertedMeasurements: false,
                conversionCount: '',

            },
            size_descriptions: [{
                    title: 'Very Snugged',
                },
                {
                    title: ' Snugged',
                },
                {
                    title: 'Recommended',
                },
                {
                    title: 'Relaxed',
                },
                {
                    title: 'Very Relaxed',
                },

            ],
            attributes:{},

            countrycheck: '',
            checked: false,
            currentTab: 0,
            height_cm: 0,
            weightf: 0,
            weight_lbs: 0,
            measurew: 0,
            firstTab: true,
            onfirstTab: true,
            lastTab: false,
            measureh: 0,
            message: "Jello",
            recommended_size: '',
            is_loading: false,
            showlist: false,
            showContinueBtn: true,
            showrecommended: true,
            variantselected: 0,
            finalsize: '',
            showBodyFitApp: false,
            allSizeText: 'Recommended',
            $allSlides: '',
            $allSlidesSize: '',
            traverseDefault: '',
            actionDefault: '',
            otherSize: '',
            sizeIndex: 0,
            showSelectedSizeSlider: false,
            restarted: false,
            sizecheck: false,
            allow: true,
            chestSizeOne:'1',
            chestSizeTwo:'2',
            chestSizeThree:'3', 
            stomachSizeOne:'1',
            stomachSizeTwo:'2',
            stomachSizeThree:'3',
            bottomSizeOne:'1',
            bottomSizeTwo:'2',
            bottomSizeThree:'3',
            attr_first:false,
            attr_second:false,
            attr_third:false,
            tabnumber:1,

            image_us: this.$appUrl+'/images/us.png',
            image_uk: this.$appUrl+'/images/uk.png',

        }
    },

    methods: {

        formSubmit:function(){
            EventBus.$on('formsubmit',container=>{
                
                this.form.heightfoot = container.form.heightfoot;
                this.form.heightinch = container.form.heightinch;
                this.form.heightcm = container.form.heightcm;
                this.form.weight = container.form.weight;
                this.form.age = container.form.age;
                this.tabnumber = container.form.tabnumber;
                
                this.form.convertedMeasurements = container.form.convertedMeasurements
                this.conversionCount = container.form.conversionCount;
                this.firstTab = container.firstTab;
            })
            EventBus.$on('attributeone',container=>{
                this.form.chest.other = container.chest.other
                this.lastTab =false;
                this.tabnumber = container.tabnumber
            }) 
             EventBus.$on('attributetwo',container=>{
                 this.lastTab =false;
                this.form.stomach.other = container.stomach.other
                this.tabnumber = container.tabnumber
                
            })
              EventBus.$on('attributethree',container=>{
                this.form.bottom.other = container.bottom.other
                this.tabnumber = container.tabnumber
                this.lastTab =true;
            })
            EventBus.$on('resetForm',tabnum=>{
                this.lastTab =false;
                this.tabnumber = tabnum
                this.restart();
            })
            

        },
         nextStep: function (n){
            this.tabnumber  = n;
            

        },
        back:function(num)
        {
            this.tabnumber = num-1
        },
           restart: function () {

            $('div.fit-advisor-selected-size:gt(' + localStorage.getItem('sizeindex') + ')').show();
            $('div.fit-advisor-selected-size:lt(' + localStorage.getItem('sizeindex') + ')').show();
            $('p.size_descriptions:gt(' + localStorage.getItem('sizeindex') + ')').show();
            $('p.size_descriptions:lt(' + localStorage.getItem('sizeindex') + ')').show();

            this.restarted = true;
            this.form.heightfoot = '';
            this.form.heightinch = '';
            this.form.weight = '';
            this.form.age = '';
            this.form.chest.name = '';
            this.form.chest.other = '';
            this.form.stomach.name = '';
            this.form.stomach.other = '';
            this.form.bottom.name = '';
            this.form.bottom.other = '';
            this.recommended_size = '',
            this.lastTab=false;
            
            this.dev_reset();
            this.nextStep(1)

            
        

        },
        showBodyFit: function () {
            var id = new FormData();
            var shop_name = window.location.hostname;
            id.append('id', this.product.id);
            id.append('shop_name', shop_name);

            axios.post(this.$appUrl + '/api/permission-to-show', id).then((res) => {

                if (res.data.display == true) {
                    if (res.data.clearLog == true) {
                        this.dev_reset();
                    }
                    for (var k = 0; k <= this.product.options.length; k++) {
                        if (this.allow) {
                            if (this.product.options[k].toLowerCase() == "size") {
                                this.allow = false;
                                this.showBodyFitApp = true;
                            }
                        } else {
                            break;
                        }

                    }

                } else {
                    if (res.data.clearLog == true) {
                        this.dev_reset();
                    }
                    this.showBodyFitApp = false;

                }

            })
        },

        addOrUpdateProduct: function () {
            axios.post(this.$appUrl + '/api/add-or-update-product', this.product)
                .then((res) => {

                })
        },
        getLocalData: function () {

            if (localStorage.getItem('recommended_size') != null) {
                this.finalsize = localStorage.getItem('recommended_size');
            } else {
                this.finalsize = '';

            }

        },
        // setSlides: function (sizeposition) {

        //     $('div.fit-advisor-selected-size:gt(' + sizeposition + ')').hide();
        //     $('div.fit-advisor-selected-size:lt(' + sizeposition + ')').hide();
        //     $('p.size_descriptions:gt(' + sizeposition + ')').hide();
        //     $('p.size_descriptions:lt(' + sizeposition + ')').hide();
        //     //Hide all but the Predicted Size

        //     this.$allSlides = $('div.fit-advisor-selected-size'),
        //         this.$allSlidesSize = $('p.size_descriptions'),
        //         this.traverseDefault = "first", //set the defaults
        //         this.actionDefault = "next";
        // },
        // setSelectedSizeFromList: function (size, sizecheck) {

        //     this.product.variants.forEach((el, index) => {

        //         if (sizecheck == true) {

        //             if (el.option1.toUpperCase() == size) {
        //                 this.sizeIndex = index
        //                 this.array_move(this.size_descriptions, 2, index)
        //                 if (size == "XS") {

        //                     for (var i = 0; i <= this.product.variants.length; i++) {

        //                         if (i == this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Recommended";
        //                         }

        //                         if ((i > this.sizeIndex) && (i < this.product.variants.length)) {

        //                             this.product.variants[i].desc_title = "Slightly Relaxed";
        //                             if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 3])) {
        //                                 this.product.variants[i].desc_title = "Relaxed";
        //                             }
        //                             if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 2])) {
        //                                 this.product.variants[i].desc_title = "Relaxed";
        //                             }
        //                             if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
        //                                 this.product.variants[i].desc_title = "Very Relaxed";
        //                             }

        //                         }

        //                     }

        //                 } else if (size == "XL") {
        //                     var counter = 1;
        //                     for (var i = 0; i <= this.product.variants.length; i++) {

        //                         if (i < this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Very Snug";

        //                             if ((i < this.sizeIndex) && (i >= counter)) {
        //                                 counter++;

        //                                 this.product.variants[i].desc_title = "Snug";

        //                             }

        //                         }

        //                         if (i == this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Recommended";
        //                         }
        //                         if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 2])) {
        //                             this.product.variants[i].desc_title = "Slightly Snugged";
        //                         }

        //                     }

        //                 }
        //                 localStorage.setItem('sizeindex', this.sizeIndex)

        //                 this.setSlides(this.sizeIndex);

        //             }
        //         } else if (sizecheck == false) {

        //             if (el.option1.toUpperCase().charAt(0) == size) {
        //                 this.sizeIndex = index

        //                 this.array_move(this.size_descriptions, 2, index)

        //                 if (size == "S") {

        //                     for (var i = 0; i <= this.product.variants.length; i++) {

        //                         if (i < this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Very Snug";

        //                             if ((i < this.sizeIndex) && (i > 0)) {

        //                                 this.product.variants[i].desc_title = "Snug";

        //                             }
        //                         }

        //                         if (i == this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Recommended";
        //                         }

        //                         if ((i > this.sizeIndex) && (i < this.product.variants.length)) {

        //                             this.product.variants[i].desc_title = "Relaxed";
        //                             if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
        //                                 this.product.variants[i].desc_title = "Very Relaxed";
        //                             }

        //                         }

        //                     }

        //                 } else if (size == 'M') {

        //                     for (var i = 0; i <= this.product.variants.length; i++) {

        //                         if (i < this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Very Snug";

        //                             if ((i < this.sizeIndex) && (i > 0)) {

        //                                 this.product.variants[i].desc_title = "Snug";

        //                             }
        //                         }

        //                         if (i == this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Recommended";
        //                         }

        //                         if ((i > this.sizeIndex) && (i < this.product.variants.length)) {

        //                             this.product.variants[i].desc_title = "Relaxed";
        //                             if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
        //                                 this.product.variants[i].desc_title = "Very Relaxed";
        //                             }

        //                         }

        //                     }

        //                 } else if (size == 'L') {
        //                     for (var i = 0; i <= this.product.variants.length; i++) {

        //                         if (i < this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Very Snug";

        //                             if ((i < this.sizeIndex) && (i > 0)) {

        //                                 this.product.variants[i].desc_title = "Snug";

        //                             }
        //                         }

        //                         if (i == this.sizeIndex) {
        //                             this.product.variants[i].desc_title = "Recommended";
        //                         }

        //                         if ((i > this.sizeIndex) && (i < this.product.variants.length)) {

        //                             this.product.variants[i].desc_title = "Very Relaxed";

        //                         }

        //                     }

        //                 }

        //                 localStorage.setItem('sizeindex', this.sizeIndex)

        //                 this.setSlides(this.sizeIndex);

        //             }

        //         }

        //     })

        // },

        // getProductDetails: function () {
        //     this.is_loading = true;
        //     var a = '';
        //     if (this.restarted == false) {

        //         if (localStorage.getItem("sizeindex") != null) {

        //             this.setSlides(localStorage.getItem("sizeindex"));

        //         }
        //     }
        //     this.showSelectedSizeSlider = false;
        //     this.form.conversionCount = this.product.id
        //     axios.post(this.$appUrl + '/api/size-recommend/', this.form)
        //         .then((res) => {

        //             this.is_loading = false;

        //             this.showSelectedSizeSlider = true;

        //             if (((res.data == 'XL') || (res.data == 'xl')) || ((res.data == 'XS') || (res.data == 'xs'))) {
        //                 this.recommended_size = res.data.toUpperCase().substr(0, 2)
        //                 this.sizecheck = true;
        //                 this.setSelectedSizeFromList(res.data.toUpperCase().substr(0, 2), this.sizecheck)
        //                 a = this.recommended_size;
        //                 $('.fit-advisor-selected-size-arrow-box').addClass('bigsize');
        //                 $('.dfOagu').addClass('dfOagu-second');
        //                 if (this.showContinueBtn == true) {
        //                     this.showContinueBtn = false;

        //                 }

        //             } else {
        //                 this.recommended_size = res.data.toUpperCase().charAt(0)
        //                 this.sizecheck = false;
        //                 this.setSelectedSizeFromList(res.data.toUpperCase().charAt(0), this.sizecheck)

        //                 a = this.recommended_size;
        //                 if (this.showContinueBtn == true) {
        //                     this.showContinueBtn = false;
        //                 }

        //             }

        //             localStorage.setItem('recommended_size', this.recommended_size)

        //             this.finalsize = localStorage.getItem('recommended_size');

        //         })
        // },
        addToCart: function () {

            var pickCharacter = 0;

            if (!this.showrecommended) {
                var var_id = $('.active > span> h4 > span').attr('data-variant')

                this.cartRequest(var_id);

            } else {

                for (var i = 0; i <= this.product.variants.length; i++) {
                    if ((this.recommended_size.toLowerCase() == 'xl') || (this.recommended_size.toLowerCase() == 'xs')) {
                        pickCharacter = 1;

                    } else {
                        pickCharacter = 0;

                    }
                    if (this.product.variants[i].title.toLowerCase().charAt(pickCharacter) == this.recommended_size.toLowerCase().charAt(0)) {
                        this.cartRequest(this.product.variants[i].id)

                    }

                }

            }

        },
        cartRequest: function (id) {

            var formData = '';
            formData = {
                'items': [{
                    'id': id,
                    'quantity': 1,

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
                    if (confirm("Do you want to add this size to cart?")) {
                        window.location.reload();
                    }
                    return response.json();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        },
        setSize: function (id) {
            this.variantselected = id

        },
        // changesize: function (trigger) {

        //     if (this.showrecommended == true) {
        //         this.showrecommended = false;

        //         // $('.dfOagu').addClass('dfOagu-second');
        //         // $('.listfit').removeClass('ml-5');

        //     }

        //     //slides size

        //     var $time = 1000;

        //     this.showrecommended = false;

        //     var traverse = this.traverseDefault,
        //         action = this.actionDefault;

        //     if (trigger == 0) { //if action is prev
        //         traverse = "last"; //set traverse to last in case nothing is available
        //         action = "prev"; //set action to prev
        //     }

        //     var $curr = this.$allSlides.filter(':visible'), //get the visible slide

        //         $nxtTarget = $curr[action](".fit-advisor-selected-size"); //get the next target based on the action.
        //     $nxtTarget.addClass('active');

        //     $curr.stop(true, true).fadeIn($time).removeClass('active').hide(); //hide current one

        //     if (!$nxtTarget.length) { //if no next
        //         $time = 1;

        //         if (trigger == 0) {

        //             $nxtTarget = this.$allSlides["first"]();

        //         } else {

        //             $nxtTarget = this.$allSlides["last"](); //based on traverse pick the next one

        //         }

        //     }

        //     $nxtTarget.stop(true, true).fadeIn($time).addClass('active'); //show the target

        //     //slides size end

        //     var $curr = this.$allSlidesSize.filter(':visible'), //get the visible slide
        //         $nxtTarget = $curr[action](".size_descriptions"); //get the next target based on the action.
        //     $nxtTarget.addClass('active');

        //     $curr.stop(true, true).fadeIn($time).removeClass('active').hide(); //hide current one

        //     if (!$nxtTarget.length) { //if no next

        //         if (trigger == 0) {

        //             $nxtTarget = this.$allSlidesSize["first"]();

        //         } else {

        //             $nxtTarget = this.$allSlidesSize["last"](); //based on traverse pick the next one

        //         }

        //     }

        //     $nxtTarget.stop(true, true).fadeIn($time).addClass('active'); //show the target

        //     //slides size end

        // },
        changesizetorecommended: function () {
            if (this.showrecommended == false) {
                this.showrecommended = true;

            }

        },
        //took 3 chest function for second component
     //took country val function from here for form-component
       //took weight convert and height convert  funcitons from here for Form Component

        // showTab: function (n) {

        //     if (localStorage.getItem('recommended_size') != null) {
        //         n = 4;

        //     }

        //     if (n == 0) {
        //         $('#closeApp').addClass('mtf-n6')
        //         $('#closeApp').removeClass('mt-n6')
        //         $('#intro1').css('display', 'block');
        //         $("#steps-mark").css('visibility', 'hidden');

        //         $('.switch').removeClass('introfirst');
        //         $('.switch').addClass('find-fit-header');
        //         $('#intro2').css('display', 'none');
        //         $('#intro3').css('display', 'none');
        //         $('#intro4').css('display', 'none');
        //         $('#intro5').css('display', 'none');
        //         $('#nextBtn').css('display', 'inline-block');
        //     }
        //     if (n == 1) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')

        //         $('#intro1').css('display', 'none');
        //         $('#intro2').css('display', 'block');
        //         $('#intro3').css('display', 'none');
        //         $('#intro4').css('display', 'none');
        //         $('#intro5').css('display', 'none');
        //         $('.switch').addClass('introfirst');
        //         $('.switch').removeClass('find-fit-header');

        //     }
        //     if (n == 2) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')
        //         $('#intro1').css('display', 'none');
        //         $('#intro2').css('display', 'none');
        //         $('#intro3').css('display', 'block');
        //         $('#intro4').css('display', 'none');
        //         $('#intro5').css('display', 'none');
        //         $('.switch').addClass('introfirst');
        //         $('.switch').removeClass('find-fit-header');
        //     }
        //     if (n == 3) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')
        //         $('#intro1').css('display', 'none');
        //         $('#intro2').css('display', 'none');
        //         $('#intro3').css('display', 'none');
        //         $('#intro4').css('display', 'block');
        //         $('#intro5').css('display', 'none');
        //         $('.switch').addClass('introfirst');
        //         $('.switch').removeClass('find-fit-header');

        //     }
        //     if (n == 4) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')

        //         $('.fit-advisor-selected-product-grid').css('display', 'inline');
        //         $('#intro1').css('display', 'none');
        //         $('#intro2').css('display', 'none');
        //         $('#intro3').css('display', 'none');
        //         $('#intro4').css('display', 'none');
        //         $('#intro5').css('display', 'block');
        //         $('.switch').addClass('introfirst');
        //         $('.switch').removeClass('find-fit-header');
        //         $('#fields').css('display', 'none');

        //     }
    

        //     // This function will display the specified tab of the form...
        //     var x = document.getElementsByClassName("tab");

        //     x[n].style.display = "block";

        //     //... and fix the Previous/Next buttons:
        //     if (n == 0) {
        //         $('#closeApp').removeClass('mt-n6')
        //         $('.fit-advisor-selected-product-grid').css('display', 'none');
        //         $('#closeApp').addClass('mtf-n6')
        //         document.getElementById("prevBtn").style.display = "none";
        //         //  document.getElementById("nextBtn").style.display = "inline";
        //         document.getElementById("steps-mark").style.visibility = "hidden";
        //         this.firstTab = false;
        //         this.onfirstTab = false;
        //         this.lastTab = false;

        //     } else {
        //         document.getElementById("steps-mark").style.visibility = "visible";
        //         document.getElementById("prevBtn").style.display = "inline";
        //         //$('.fit-advisor-intro').text('Find Your Fit');
        //         this.firstTab = true;
        //         this.onfirstTab = true,
        //             this.lastTab = false;

        //     }
        //     if (n == 1) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')
        //         $('#popup1').css('overflow', 'scroll');
        //     }
        //     if (n == 4) {
        //         $('#closeApp').removeClass('mtf-n6')
        //         $('#closeApp').addClass('mt-n6')

        //         this.firstTab = false;
        //         this.onfirstTab = true,
        //             this.lastTab = true;

        //         this.showContinueBtn = false;

        //         //document.getElementById("nextBtn").style.display = "none";
        //         // document.getElementById("nextBtn").innerHTML = "Add Size to Cart";
        //         document.getElementById("steps-mark").style.visibility = "inline";

        //         //document.getElementById("nextBtn").classList.add('fit-advisor-product-btn-to-cart');

        //         this.getProductDetails();
        //     }
        //     if ((n >= 1) && (n < 4)) {
        //         document.getElementById("nextBtn").style.display = "none";

        //     }

        //     //... and run a function that will display the correct step indicator:
        //     this.fixStepIndicator(n)
        // },

        // nextPrev: function (n) {

        //     // This function will figure out which tab to display
        //     var x = document.getElementsByClassName("tab");
        //     // Exit the function if any field in the current tab is invalid:
        //     if (n == 1 && !this.validateForm()) return false;
        //     // Hide the current tab:

        //     x[this.currentTab].style.display = "none";
        //     // Increase or decrease the current tab by 1:
        //     this.currentTab = this.currentTab + n;

        //     var ft = $('#height_ft').val();
        //     var inch = $('#height_in').val();
        //     var weightf = $('#weight').val();

        //     var weight_lbs = parseInt(weightf) * 2.205;
        //     var heightf = ft * 12;
        //     var heighti = heightf + parseInt(inch);
        //     var height_cm = heighti * 2.54;

        //     //  this.measureh = localStorage.getItem('height');
        //     // this.measurew = localStorage.getItem('weight');
        //     // if(  this.measurew == null){

        //     //   localStorage.setItem("weight", weight_lbs);

        //     //  }

        //     //  if( this.measureh == null){

        //     //   localStorage.setItem("height", height_cm);

        //     //  }

        //     // if you have reached the end of the form...
        //     // if (this.currentTab >= x.length) {
        //     // ... the form gets submitted:
        //     //document.getElementById("regForm").submit();
        //     //return false;
        //     //}
        //     // Otherwise, display the correct tab:

        //     this.showTab(this.currentTab);

        // },
        //took validate form fucntion from here for form component
       //took validate height ,weight, age,sm, inch function from here
        // fixStepIndicator: function (n) {

        //     // This function removes the "active" class of all steps...
        //     var i, x = document.getElementsByClassName("step");
        //     for (i = 0; i < x.length; i++) {
        //         x[i].className = x[i].className.replace(" active", "");
        //     }
        //     //... and adds the "active" class on the current step:
        //     x[n].className += " active";
        // },
        dev_reset: function () {

            window.localStorage.clear();
        },
       //took restart function for last component
        nextprevslide: function () {

        },
        responsiveness: function () {

            $(document).ready(function ($) {
                var alterClass = function () {
                    var ww = document.body.clientWidth;
                    if (ww == 320) {

                        $('.height_weight').addClass('text-center');
                        $('.height_weight').removeClass('text-left');
                        $('#age-label-5s').removeClass('text-left');
                        $('#age-label-5s').addClass('text-center');
                        $('#intro5').removeClass('ml-n4');
                        $('.fit-advisor-header-desc').addClass('text-center');

                        $('.fit-advisor-header-desc-mt').removeClass('fit-advisor-header-desc-mt');

                        $('.fit-advisor-product-size-box').addClass('ml-n6');

                        $('#fields').removeClass('offset-1');
                        $('#fields').removeClass('ml-n5');
                        $('#fields').addClass('ml-n4');

                        $('.fit-advisor-selected-product-grid > div').removeClass('mr-3')
                        $('.fit-advisor-fit-grid').removeClass('fit-advisor-fit-grid-s5');
                        $('.listfit').removeClass('ml-5')

                    } else if (ww == 411) {

                        $('.fit-advisor-selected-product-grid > div').removeClass('mr-3')
                        $('#intro1').removeClass('ml-n6');
                        $('.fit-advisor-product-size-box').removeClass('ml-n6');
                        $('#fields').removeClass('ml-n5');
                        $('#fields').removeClass('offset-1');
                        $('#steps-mark').removeClass('float-right')
                        $('.dfOagu').addClass('dfOagu-411w')

                        $('.fit-advisor-fit-grid').removeClass('fit-advisor-fit-grid-s5');
                        $('.listfit').removeClass('ml-5')
                        $('.listfit').addClass('ml-4')

                    } else if ((ww >= 412 && ww <= 480) || (ww >= 321 && ww < 411)) {

                        $('.fit-advisor-product-size-box').removeClass('ml-n6');
                        $('#intro1').removeClass('ml-n6');
                        $('#fields').addClass('ml-n5');
                        $('#fields').removeClass('offset-1');
                        $('#steps-mark').removeClass('float-right')

                        $('.fit-advisor-selected-product-grid > div').addClass('mr-3')
                        $('.fit-advisor-fit-grid').removeClass('fit-advisor-fit-grid-s5');
                        $('.fit-advisor-sizes-slider').addClass('ml-4')
                        $('.listfit').removeClass('ml-5')
                        $('.listfit').addClass('ml-4')
                        $('.fit-advisor-fit-grid').removeClass('float-left')
                        $('.fit-advisor-fit-grid').addClass('ml-1')
                        $('.fit-advisor-selected-size-arrow-box').removeClass('bigsize');

                        if (ww == 360) {

                            $('.fit-advisor-product-size-box').removeClass('ml-n6');
                            $('#intro5').addClass('ml-n4');
                            $('#fields').removeClass('ml-n4');
                            $('#fields').addClass('ml-n5');
                            $('.fit-advisor-selected-product-grid > div').removeClass('mr-3')
                            $('.fit-advisor-fit-grid').addClass('fit-advisor-fit-grid-s5');
                            $('.fit-advisor-selected-size-arrow-box').addClass('ml-n3')
                            $('.listfit').removeClass('ml-5')
                            $('.listfit').addClass('ml-4')
                            $('.dfOagu').css('margin-top', '0px !important')

                        }
                    } else if (ww >= 641 && ww <= 960) {
                        $('.fit-advisor-selected-size-container').removeClass('bigsize')
                        $('.listfit').removeClass('ml-5')
                        $('.listfit').addClass('ml-n2')
                        $('.m-result').removeClass('float-right')
                    } else {

                        $('#intro1').removeClass('ml-n6');
                        $('#fields').removeClass('ml-n5');
                        $('#fields').addClass('offset-1');
                        $('.height_weight').removeClass('text-center');
                        $('.height_weight').addClass('text-left');
                        $('#age-label-5s').addClass('text-left');
                        $('#age-label-5s').removeClass('text-center');

                        $('.fit-advisor-selected-product-grid > div').removeClass('mr-3')
                        $('#steps-mark').removeClass('float-right')
                        $('.fit-advisor-fit-grid ').removeClass('float-left')
                    };
                };
                $(window).resize(function () {
                    alterClass();
                });
                //Fire it when the page first loads:
                alterClass();
            });

        },
       //toook array move function from 
        setupProduct: function () {
            this.product.variants = this.product.variants.map(v => ({
                ...v,
                desc_title: 'Recommended'
            }));

            
        },
        getAttributes:function(){
            axios.get(this.$appUrl +'/api/get-attrbutes/'+this.product.id).then((res)=>
            {
               
                this.attributes = res.data;
                
                 this.attributes.forEach((el,index)=>{
                     

                    if(el.name.toLowerCase() == this.form.chest.title.toLowerCase())
                    {
                        this.form.chest.title = el.name.toLowerCase();
                        this.attr_first = true;
                        this.chestSizeOne=el.size_one
                        this.chestSizeTwo=el.size_second
                        this.chestSizeThree=el.size_third

                    }else if(el.name.toLowerCase() == this.form.stomach.title.toLowerCase())
                    {
                        
                            this.form.stomach.title = el.name.toLowerCase();
                            this.attr_second = true;
                            this.stomachSizeOne=el.size_one
                            this.stomachSizeTwo=el.size_second
                            this.stomachSizeThree=el.size_third
                    }else if(el.name.toLowerCase() == this.form.bottom.title.toLowerCase())
                    {
                        this.form.bottom.title = el.name.toLowerCase();
                        this.attr_third = true;
                        this.bottomSizeOne=el.size_one
                        this.bottomSizeTwo=el.size_second
                        this.bottomSizeThree=el.size_third


                    }
                })
             
                
             
              
                
               


            })
        }
    },
    mounted() {
        
        this.form.tags = this.product.tags
        localStorage.setItem('tags', JSON.stringify(this.product.tags))
        
        
        var x = document.getElementsByClassName("tab")
        this.formSubmit();
     //   this.setupProduct();
        this.responsiveness();
        this.getLocalData();
        this.showBodyFit();
        //this.getAttributes();
        
        
        if (localStorage.getItem('recommended_size') != null) {
            
            
            this.tabnumber = 5;
            this.lastTab=true;
        }
        

        $('#popup-trigger').on('click', function () {

            $('.product-card').css('z-index', '-1');
            $('#popup1').css('overflow', 'scroll');
        })

      

    },
//    Took watch from here
}
</script>

<style>
@import '../assets/styles/body-fit.css';
@import '../assets/styles/bootstrap-body-fit.css';
</style>
``
