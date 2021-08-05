<template>
    <div>
    
        <link
            href="https://fonts.googleapis.com/css?family=Karla"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
       

        <div v-if="showBodyFitApp" class="box">
            <a
                class="x-btn x-btn-dark"
                id="popup-trigger"
                href="#popup1"
                style="margin-left: 1% !important; margin-bottom: 20px !important; border: none"
                >Find Fit</a
            >
            <span
                id="finalsize"
                v-if="finalsize != ''"
                class="final-size-heading"
            >
                <span class="final-size-label">Your Fit Size : </span>
                {{ finalsize }}</span
            >
        </div>
        <div id="popup1" class="overlay" style="z-index: 999 !important">
            <div
                class="popup fit-advisor-popup-adjustments"
                style="margin-top: 20px"
            >
                <div class="x-row x-mb-5" >
                    
                        
                        <div class="x-col-md-6 mt-2 x-col-6">
                            <svg
                                v-if="tabnumber > 1 && lastTab != true"
                                v-on:click="back(tabnumber)"
                                viewBox="0 0 512 512"
                                height="24"
                                width="24"
                                aria-hidden="true"
                                focusable="false"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-5 dcvgeN"
                                style="cursor:pointer
display: inline-block;
/* width: 59px; */
"
                            >
                                <polyline
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="48"
                                    points="328 112 184 256 328 400"
                                ></polyline>
                            </svg>
                            <svg
                                style="cursor: pointer"
                                v-if="lastTab"
                                v-on:click="restart"
                                viewBox="0 0 512 512"
                                height="24"
                                width="24"
                                aria-hidden="true"
                                focusable="false"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                class="StyledIconBase-ea9ulj-0 jZGNBW predict__sc-1a4an9n-6 HBqpi"
                            >
                                <path
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-miterlimit="10"
                                    stroke-width="32"
                                    d="M320 146s24.36-12-64-12a160 160 0 10160 160"
                                ></path>
                                <polyline
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="32"
                                    points="256 58 336 138 256 218"
                                ></polyline>
                            </svg></div>
                            <div class="x-col-md-6 x-col-6">
                            <a class="x-float-right close-custom mt-n2" id="closeApp" href="#">&times;</a>
                            </div>
                        
                    
                    <!-- <div class="predict__sc-1a4an9n-8 dCmgSk">
                        <div
                            width="0"
                            class="predict__sc-1a4an9n-9 eygAJd"
                        ></div>
                    </div> -->
                </div>
                <!-- close modal btn -->
                
                <div>
                    <div class="x-row">
                        <div class="x-col"></div>
                        <div class="x-col"></div>
                        <div class="x-w-100"></div>
                        <div class="x-col"></div>
                        <div class="x-col"></div>
                    </div>
                    <span
                        class="predict__sc-1a4an9n-3 OSFBL switch find-fit-header"
                        >FIND YOUR FIT</span
                    >
                </div>
                <div
                    class="content"
                    style="margin-top: -155px !important; margin-bottom: -120px !important"
                >
                    <form id="regForm">
                        <!-- <p class="fit-advisor-intro text-center" id="intro1">
                        <span id="mark1">To get a size recommendation,</span> <br><span id="mark2">fill out the form below</span></p> -->

                        <div v-switch="tabnumber">
                            <div v-case="1">
                                <form-component></form-component>
                            </div>

                            <div
                                v-for="(row, key) in attributesToShow"
                                :key="row.id"
                                v-case="key + 2"
                            >
                                <attribute-one-component
                                    :attributes="row"
                                    :tabnum="{
                                        count: n
                                    }"
                                    :recordsLength="attributes.length"
                                    :currentRecord="key + 1"
                                ></attribute-one-component>
                            </div>

                            <div v-case="attributes.length + 2">
                                <result-component
                                    :product="product"
                                    :form="form"
                                    :recordsLength="attributes.length"
                                ></result-component>
                            </div>
                        </div>
                        <div style="overflow: auto">
                            <div
                                class="custom-offset-lg"
                                style="margin-top: 8% !important; display: none"
                            >
                                <button
                                    class="fit-advisor-custom_previous_btn"
                                    type="button"
                                    id="prevBtn"
                                    v-on:click="nextPrev(-1)"
                                >
                                    Previous
                                </button>
                            </div>
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
import EventBus from "../event-bus";

export default {
    props: {
        product: Object
    },
    data() {
        return {
            form: {
                // heightfoot: localStorage.getItem("foot"),
                // heightinch: localStorage.getItem("inch"),
                // heightcm: parseInt(localStorage.getItem("cm")),
                // weight: parseFloat(localStorage.getItem("weight")).toFixed(0),
                // age: localStorage.getItem("age"),
                bodyMeasure: [],
                heightfoot: "",
                heightinch: "",
                heightcm: "",
                weight: "",
                age: "",
                // chest: {

                // },
                // stomach: {
                //   title: "stomach",
                //   other: localStorage.getItem("stomach"),
                // },

                // bottom: {
                //   title: "bottom",
                //   other: localStorage.getItem("bottom"),
                // },
                tags: JSON.parse(localStorage.getItem("tags")),
                convertedMeasurements: false,
                conversionCount: ""
            },
            size_descriptions: [
                {
                    title: "Very Snugged"
                },
                {
                    title: " Snugged"
                },
                {
                    title: "Recommended"
                },
                {
                    title: "Relaxed"
                },
                {
                    title: "Very Relaxed"
                }
            ],
            attributes: {},
            n: "",

            countrycheck: "",
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
            recommended_size: "",
            is_loading: false,
            showlist: false,
            showContinueBtn: true,
            showrecommended: true,
            variantselected: 0,
            finalsize: "",
            showBodyFitApp: false,
            allSizeText: "Recommended",
            $allSlides: "",
            $allSlidesSize: "",
            traverseDefault: "",
            actionDefault: "",
            otherSize: "",
            sizeIndex: 0,
            showSelectedSizeSlider: false,
            restarted: false,
            sizecheck: false,
            allow: true,
            chestSizeOne: "1",
            chestSizeTwo: "2",
            chestSizeThree: "3",
            stomachSizeOne: "1",
            stomachSizeTwo: "2",
            stomachSizeThree: "3",
            bottomSizeOne: "1",
            bottomSizeTwo: "2",
            bottomSizeThree: "3",
            attr_first: false,
            attr_second: false,
            attr_third: false,
            tabnumber: 1,
            newapp:false,

            image_us: this.$appUrl + "/images/us.png",
            image_uk: this.$appUrl + "/images/uk.png",
            attributesToShow:{},
            fcount:0,
            lcount:0,
            fscount:0,
            sscount:0,
            lscount:0,
            ogLength: 0,
            nextcount: 0,
            ogArray:{},
            
        };
    },

    methods: {
       
        getAttributesToHeightWeight: function(form)
        {
            form.productkey =  this.product.id
         
         
           
            axios.post(this.$appUrl+'/api/get-attributes-to-height-weight',form)
            .then((res)=>{
             
               this.ogLength = res.data.length;

               this.ogArray = res.data.ogArray;
              // console.log(res.data)
 this.attributesToShow = res.data;
// if(res.data.scArray!=null || typeof res.data.scArray != 'undefined')
// {


// if(res.data.scArray.length == 2)
// {
//    // console.log("first")
//     this.getResultTwo(res.data.scArray)
// }else if(res.data.scArray.length >3)
// {
//    // console.log("second")
//      this.getResultMultiple(res.data.scArray)
// }else
// {
//    // console.log("third")
//     this.getResult(res.data.scArray)
// }
// }else
// {
    
// this.attributesToShow = res.data
// }
            
            })
        },
         getResult: function(at){
               
    
    
              var count = 0;
           var bcount = 0;
           var scount = 0;
           var nfcount = 0;
                for( var i = 0; i < at.length; i++){ 
    
         if ( i == 0) {
            
             for(var k=0; k < at[i].attr_items.length; k++)
             {
                 this.fcount =at[i].attr_items.length;
                
                 if(at[i].id == at[i].attr_items[k].attribute_type_id )
                 {
                     count = count+parseInt(1);
                     var popcount = at[i].attr_items.length - count;
                    
                 }
            
             }
            
             for(var pc=0; pc<popcount; pc++)
             {
                 at[i].attr_items.pop();
             }
             this.fscount = at[i].attr_items.length;
             
            
         }
         else if(i == 1)
            {  var counte = 1
                var bcou = 0;
                for(var b=0; b < at[at.length-1].attr_items.length; b++)
             {
                 
                 if(at[i].id == at[at.length-1].attr_items[b].attribute_type_id )
                 {
                       bcou = bcou+parseInt(1);
                      
                     var shiftcount = at[at.length-1].attr_items.length - bcou;
   
                 }
            
             }
             

             for(var sc=0; sc<shiftcount; sc++)
             {
                 at[at.length-1].attr_items.shift();
             }
             
             var countOfLastScreen = at[at.length-1].attr_items.length + parseInt(1);
            // console.log("countOfLastScreen"+countOfLastScreen)
              
              for(var se=0; se < this.fscount; se++)
              {
              at[i].attr_items.shift();
              }
              
              for(var se=0; se < countOfLastScreen; se++)
              {
              at[i].attr_items.pop();
              }
                this.sscount = at[i].attr_items.length;
                this.nextcount = this.fscount + parseInt(this.sscount);
              
              
            
        
         }
             else if(i == at.length-1)
         {
             var bcou = 0;
             var shiftcount=0;
             //console.log("length of last screen after edited in second"+ this.ogArray[i])
              for(var b=0; b < this.ogArray[i].attr_items.length; b++)
             {
               //  console.log("inside f0r")
                 
                 if(at[i].id == this.ogArray[i].attr_items[b].attribute_type_id )
                 {
                       bcou = bcou+parseInt(1);
                      
                      shiftcount = this.ogArray[i].attr_items.length - bcou;
                   //   console.log("shiftcount"+shiftcount)
  
  
                 }
            
             }
             
  
             for(var sc=0; sc<shiftcount; sc++)
             {
                // console.log("shiftcount"+sc)
                 this.ogArray[i].attr_items.shift();
             }
             
             this.lscount = this.ogArray[i].attr_items.length;
             
             EventBus.$emit("lastcount",this.lscount);
             
              

         }
        
        
    
     }
     
     this.attributesToShow = at;
     
  
        },
        getResultMultiple: function(at){
               
    
    
              var count = 0;
           var bcount = 0;
           var scount = 0;
           var nfcount = 0;
                for( var i = 0; i < at.length; i++){ 
    
         if ( i == 0) {
            
             for(var k=0; k < at[i].attr_items.length; k++)
             {
                 this.fcount =at[i].attr_items.length;
                
                 if(at[i].id == at[i].attr_items[k].attribute_type_id )
                 {
                     count = count+parseInt(1);
                     var popcount = at[i].attr_items.length - count;
                    
                 }
            
             }
            
             for(var pc=0; pc<popcount; pc++)
             {
                 at[i].attr_items.pop();
             }
             this.fscount = at[i].attr_items.length;
             
            
         }
         else if(i == 1)
         {var counte = 1

              
              for(var s=0; s < at[i].attr_items.length; s++)
             {
                if(at[i].id < at[i].attr_items[s].attribute_type_id )
             {
                 
                 for(var pop=0; pop <at.length-1;pop++)
                 {
                      at[i].attr_items.pop();
                   
                 }
                   
             }
                 
                else if( at[i].id > at[i].attr_items[s].attribute_type_id)
                    {
                    
                        // console.log(s)
                                at[i].attr_items.splice(s,1);
                 
                    }
                  else if(at[i].id == at[i].attr_items[s].attribute_type_id)
                 {
                    
                        // console.log(s)
                                at[i].attr_items.shift(s-1,1);
                                
                                
                                // at[i].attr_items.splice(s+1,1);
                    
             }  
              
              
          
           
         }
         this.sscount = at[i].attr_items.length;
       //  console.log("Length after editing:"+at[i].attr_items.length);
         }
             else if(i == at.length-1)
         {
             var bcou = 0;
              for(var b=0; b < at[i].attr_items.length; b++)
             {
                 
                 if(at[i].id == at[i].attr_items[b].attribute_type_id )
                 {
                       bcou = bcou+parseInt(1);
                      
                     var shiftcount = at[i].attr_items.length - bcou;
   
                 }
            
             }
             

             for(var sc=0; sc<shiftcount; sc++)
             {
                 at[i].attr_items.shift();
             }
             
             this.lscount = at[i].attr_items.length;
             
              

         }
         else
         {
              var bcou = 0;
              for(var b=0; b < at[at.length-1].attr_items.length; b++)
             {
                 
                 if(at[i].id == at[at.length-1].attr_items[b].attribute_type_id )
                 {
                       bcou = bcou+parseInt(1);
                      
                     var shiftcount = at[at.length-1].attr_items.length - bcou;
   
                 }
            
             }
             

             for(var sc=0; sc<shiftcount; sc++)
             {
                 at[at.length-1].attr_items.shift();
             }
             
             this.lscount = at[at.length-1].attr_items.length;
            // console.log("Last count edit:"+this.lscount);
             //test

              
              for(var s=0; s < this.fscount + parseInt(this.sscount); s++)
             {
                 at[i].attr_items.shift();
                 
         }
         
         //"Last count edit inside:"+at[at.length-1].attr_items.length);
             for(var m=0; m < this.lscount;m++)
             {
                 at[i].attr_items.pop();
                 
         }

         }
        
    
     }
     
     this.attributesToShow = at;
    // console.log(this.attributesToShow);
  
        },
         getResultTwo: function(at){
               
    
    
              var count = 0;
           var bcount = 0;
           var scount = 0;
           var nfcount = 0;
                for( var i = 0; i < at.length; i++){ 
    
         if ( i == 0) {
            
             for(var k=0; k < at[i].attr_items.length; k++)
             {
                 this.fcount =at[i].attr_items.length;
                
                 if(at[i].id == at[i].attr_items[k].attribute_type_id )
                 {
                     count = count+parseInt(1);
                     var popcount = at[i].attr_items.length - count;
                    
                 }
            
             }
            
             for(var pc=0; pc<popcount; pc++)
             {
                 at[i].attr_items.pop();
             }
            
         } else
         {
              for(var b=0; b < at[i].attr_items.length; b++)
             {
                 
                 if(at[i].id == at[i].attr_items[b].attribute_type_id )
                 {
                      bcount = bcount+parseInt(1);
                     var shiftcount = at[i].attr_items.length - bcount;
   
                 }
            
             }

             for(var sc=0; sc<shiftcount; sc++)
             {
                 at[i].attr_items.shift();
             }

         }
        
    
     }
     
     this.attributesToShow = at;
  
        },
       

        formSubmit: function() {
            EventBus.$on("formsubmit", container => {
                this.form.heightfoot = container.form.heightfoot;
                this.form.heightinch = container.form.heightinch;
                this.form.heightcm = container.form.heightcm;
                this.form.weight = container.form.weight;
                this.form.age = container.form.age;
                this.tabnumber = container.form.tabnumber;
                this.n = container.form.tabnumber;

                this.form.convertedMeasurements =
                    container.form.convertedMeasurements;
                this.conversionCount = container.form.conversionCount;
                this.firstTab = container.firstTab;
                this.getAttributesToHeightWeight(this.form);
            });
            EventBus.$on("attributeone", container => {
                this.chest = container;
                this.lastTab = false;
                this.tabnumber = container.tabnumber;
                this.n = container.tabnumber;
            });

            EventBus.$on("resetForm", tabnum => {
                this.lastTab = false;
                this.tabnumber = tabnum;
                this.restart();
            });
        },
        nextStep: function(n) {
            this.tabnumber = n;
        },
        back: function(num) {
            this.tabnumber = num - 1;
        },
        restart: function() {
            $(
                "div.fit-advisor-selected-size:gt(" +
                    localStorage.getItem("sizeindex") +
                    ")"
            ).show();
            $(
                "div.fit-advisor-selected-size:lt(" +
                    localStorage.getItem("sizeindex") +
                    ")"
            ).show();
            $(
                "p.size_descriptions:gt(" +
                    localStorage.getItem("sizeindex") +
                    ")"
            ).show();
            $(
                "p.size_descriptions:lt(" +
                    localStorage.getItem("sizeindex") +
                    ")"
            ).show();

            this.restarted = true;
          
            // this.form.chest.name = "";
            // this.form.chest.other = "";
            // this.form.stomach.name = "";
            // this.form.stomach.other = "";
            // this.form.bottom.name = "";
            // this.form.bottom.other = "";
            this.lastTab = false;
            

            this.dev_reset();
            this.nextStep(1);
        },
        showBodyFit: function() {
            var id = new FormData();
            var shop_name = window.location.hostname;
            id.append("id", this.product.id);
            id.append("shop_name", shop_name);

            axios
                .post(this.$appUrl + "/api/permission-to-show", id)
                .then(res => {
                    if (res.data.display == true) {
                        if (res.data.clearLog == true) {
                            this.newapp = true;
                            this.dev_reset();
                        }else
                        {
                                                        this.newapp = false;

                        }
                        for (var k = 0; k <= this.product.options.length; k++) {
                            if (this.allow) {
                                if (
                                    this.product.options[k].toLowerCase() ==
                                    "size"
                                ) {
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
                            this.newapp = true;

                        }else
                        {
                                                        this.newapp = false;

                        }
                        this.showBodyFitApp = false;
                    }
                });
        },

        addOrUpdateProduct: function() {
            axios
                .post(this.$appUrl + "/api/add-or-update-product", this.product)
                .then(res => {});
        },
        getLocalData: function() {
            if (localStorage.getItem("recommended_size") != null) {
                this.finalsize = localStorage.getItem("recommended_size");
            } else {
                this.finalsize = "";
            }
        },
        setSize: function(id) {
            this.variantselected = id;
        },
        changesizetorecommended: function() {
            if (this.showrecommended == false) {
                this.showrecommended = true;
            }
        },
        dev_reset: function() {
            window.localStorage.clear();
        },
        //took restart function for last component
        // nextprevslide: function () {},
        //took responsienss function from here
        //toook array move function from
        setupProduct: function() {
            this.product.variants = this.product.variants.map(v => ({
                ...v,
                desc_title: "Recommended"
            }));
        },
        getAttributes: function() {
            axios
                .get(this.$appUrl + "/api/get-attrbutes/" + this.product.id)
                .then(res => {
                    this.attributes = res.data;

                    EventBus.$on("mount", num => {
                        this.lastTab = true;
                    });
//Start removed part that loads last screen if session is set
//End removed part that loads last screen if session is set
                });
        }
    },
    mounted() {
        this.form.tags = this.product.tags;
        localStorage.setItem("tags", JSON.stringify(this.product.tags));

        var x = document.getElementsByClassName("tab");
        this.formSubmit();
        //   this.setupProduct();
        // this.responsiveness();
        this.getLocalData();
        this.showBodyFit();
        this.getAttributes();

        $("#popup-trigger").on("click", function() {
            $(".product-card").css("z-index", "-1");
            $("#popup1").css("overflow", "scroll");
        });
    }
    //    Took watch from here
};
</script>

<style>
@import "../assets/styles/body-fit.css";
@import "../assets/styles/bootstrap-body-fit.css";
</style>
``
