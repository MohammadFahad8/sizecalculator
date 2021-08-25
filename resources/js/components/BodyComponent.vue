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
       
<!-- Button trigger modal -->
<button  v-if="showBodyFitApp" type="button" @click="fixHeader" class="x-btn x-btn-dark openModalApp" data-toggle="modal" data-target="#exampleModalCenter">
  Find fit
</button>
  <span
                id="finalsize"
                v-if="finalsize != '' && showBodyFitApp"
                class="final-size-heading"
            >
                <span class="final-size-label">Your Fit Size : </span>
                {{ finalsize }} </span
            >   

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5); " aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-mdlg" role="document">
    <div class="modal-content">
      <div class="modal-header x-border-0">
         <div class="x-col-md-6 mt-2 x-col-6 modal-title">
                          <!-- backbtn svg -->
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
                            <!-- restart tbn svg -->
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
                            </svg> 
        
        </div>
        <button type="button" class="close" data-dismiss="modal" style="color:black !important;background-color:#0f8c5e00 !important;font-size:23px " aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="x-progress x-rounded-0 x-mb-5" style="height:1px;opacity:0.4;"  >
    <div id="pb" class="x-progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0px;background-color:black">
      <span class="sr-only">70% Complete</span>
    </div>
  </div>
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
      <div class="modal-body">
             <form id="regForm">
                 
                        <!-- <p class="fit-advisor-intro text-center" id="intro1">
                        <span id="mark1">To get a size recommendation,</span> <br><span id="mark2">fill out the form below</span></p> -->
                                                            <!-- REMOVED 'n' and placed 'tabnumber' in :tabnum property -->
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
                                        count: tabnumber
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
                                    :attrscall="attributes"
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

                                                                    <!-- OLD MODAL CODE BELOW ME -->
                                                                    <!-- OLD MODAL CODE WAS ABOVE ME -->
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
                sz: [],
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
            attributes: [],
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
        fixHeader:function(){
         
          
            $("sticky-header").addClass("bylt-header");
            $("#shopify-section-announcement-bar").addClass("bylt-header");
            
        
        },
      
       
        getAttributesToHeightWeight: function(form,num)
        {
            form.productkey =  this.product.id
         
         
           
            axios.post(this.$appUrl+'/api/get-attributes-to-height-weight',form)
            .then((res)=>{
             
               this.ogLength = res.data.length;

               this.ogArray = res.data.ogArray;
              // to change screen
              this.tabnumber =  num
              //end to change screen
            this.attributesToShow = res.data;
            
            var obt = this.attributes.length+parseInt(2);
            var total = 700;
            var result=total/obt;
            
            $('.x-progress-bar').css('width',result+'px');
 

            
            })
        },
        
       

        formSubmit: function() {
            EventBus.$on("formsubmit", container => {
                this.form.heightfoot = container.form.heightfoot;
                this.form.heightinch = container.form.heightinch;
                this.form.heightcm = container.form.heightcm;
                this.form.weight = container.form.weight;
                this.form.age = container.form.age;
                // this.tabnumber = container.form.tabnumber;
                this.n = container.form.tabnumber;

                this.form.convertedMeasurements =
                    container.form.convertedMeasurements;
                this.conversionCount = container.form.conversionCount;
                this.firstTab = container.firstTab;
                this.getAttributesToHeightWeight(this.form, container.form.tabnumber);
            });
            EventBus.$on("attributeone", container => {
              
                this.chest = container;
                this.lastTab = false;
                
                 var obt = this.attributes.length+parseInt(2);
            var total = 700;
            var result=total/obt;
            
            var cw = $('.x-progress-bar').width();
            var ww = cw+parseInt(result)
            
            $('.x-progress-bar').css('width',ww+'px');
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
            EventBus.$emit("hideloader",'ok')
            this.tabnumber = num - 1;
            
            
            var obt = this.attributes.length+parseInt(2);
            var total = 700;
            var result=total/obt;
            
            var cw = $('.x-progress-bar').width();
            var ww = cw - parseInt(result)
            
            $('.x-progress-bar').css('width',ww+'px');
        },
        restart: function() {
            EventBus.$emit("hideloader",'ok')
             var w = $('.x-progress-bar').width()
            var c = 0;
            $('.x-progress-bar').css('width',c+'%')
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
         
            this.lastTab = false;

           EventBus.$emit('refreshform',1)
            

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
        },
        
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
        $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
        $("sticky-header").removeClass("bylt-header", "1"); 
        $("#shopify-section-announcement-bar").removeClass("bylt-header", "1");
})
      
      

        EventBus.$on('refreshSize',size=>{
            this.finalsize = size
        })
    },
    //    Took watch from here
    
};
</script>

<style>
@import "../assets/styles/body-fit.css";
@import "../assets/styles/bootstrap-body-fit.css";
</style>
``
