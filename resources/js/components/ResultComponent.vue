<template>
<div>
    <p class="fit-advisor-intro text-center mt-n5">
        <span id="mark1">Drop-cut:LUX</span> <br /><span id="mark2"></span>
    </p>
    <div>
        <div class="x-row">
            <div class="col-md-12">
                <div > 
                    
                    <!-- <div class=" fit-advisor-selected-product-image"><img id="featured_image" class=" fit-advisor-product-picture" v-bind:src=this.product.featured_image alt="image" style="opacity: 1;"></div> -->
                    <div class="x-container">
                        <div class="x-row x-justify-content-center x-text-center" v-if="sizeLoaded">
                        <div class="x-col-md-12">
                                            <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                        </div>  
                        <div class="x-row x-justify-content-center resultant-all x-d-none">
                            
                                <div class="x-col-md-3 x-col-3">
                                    <div class="dfOagu x-float-left x-mt-4 x-mt-sm-6 x-mt-md-6 x-mt-lg-6 x-mt-xl-6" style="z-index: 30" v-if="!container.is_loading">
                                        <span size="10" id="arrow-left" class=" jjnwUS selected-product-arrow-left-pointer prev" @click="changesize(0)">
                                            <svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW">
                                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    
                                    </div>

                                    <!-- LIST OF ALL VARIANTS -->
                                    
                                    <div class="fit-advisor-custom_row center-force" v-if="container.is_loading">
                                        <div class="col-md-12">
                                            <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div class="fit-advisor-custom_row" v-if="container.is_loading">
                                            <div class="col" style="visibility: hidden">
                                                col
                                            </div>
                                            <div class="col" style="visibility: hidden">
                                                col
                                            </div>
                                        </div>
                                    </div>


                                    <div class="x-col-md-6 x-col-6">

                                    
                                        <div id="fit-advisor-sizes-slider" font-size="40" v-for="(row,
                                                key,
                                                index) in product.variants" :key="row.id" class="fit-advisor-selected-size" style="opacity: 1">
                                            <span id="fsize">
                                                <h4 class="result-size" v-if="
                                                            container.showSelectedSizeSlider
                                                        ">
                                                    <!-- <span v-if="!showrecommended" class="recommendedbyus big-size-margin-recommend-size">{{recommended_size}}</span> -->

                                                    <span class="variant_title" :data-variant="
                                                                row.id
                                                            ">
                                                        <span v-if="
                                                                    row.option1
                                                                        .toUpperCase()
                                                                        .substring(
                                                                            0,
                                                                            2
                                                                        ) ==
                                                                        'XL' ||
                                                                        row.option1
                                                                            .toUpperCase()
                                                                            .substring(
                                                                                0,
                                                                                2
                                                                            ) ==
                                                                            'XS'
                                                                ">
                                                            <span>{{
                                                                    row.option1.toUpperCase()
                                                                }}</span></span>
                                                        <span v-if="
                                                                    row.option1.toUpperCase() !=
                                                                        'XS' &&
                                                                        row.option1.toUpperCase() !=
                                                                            'XL'
                                                                ">{{
                                                                    row.option1
                                                                        .toUpperCase()
                                                                        .charAt(
                                                                            0
                                                                        )
                                                                }}</span></span>
                                                </h4>
                                            </span>
                                        </div>
                                    
                                    </div>
                                    <div class="x-col-md-3 x-col-3">

                                    <div class="dfOagu x-float-right x-mt-4 x-mt-sm-6 x-mt-md-6 x-mt-lg-6 x-mt-xl-6" style="z-index: 30" v-if="!container.is_loading">
                                        <span size="10" id="arrow-right" class="jjnwUS hjNiUI arrow-next next" @click="changesize(1)">
                                            <svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW">
                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path>
                                            </svg></span>
                                    </div>
                                    </div>
                                
                            
                        </div>
                        <div class="descriptions-all x-d-none">
                        <p class="fit-advisor-header-desc size_descriptions" v-for="(row, key, index) in product.variants" :key="row.id">
                            <span v-if="!container.is_loading">Fit Size:<strong>{{
                                        row.desc_title
                                    }}</strong></span>
                        </p>
                        </div>
                        <p class="fit-advisor-header-desc ">
                            The size we recommend is based on how we
                            intended this item to suit your body. <br /><a target="_blank" rel="noopener noreferrer nofollow" href="javascript:void(0)" class="learn-text">Learn More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="steps-mark" class="x-text-center x-mt-5">

            <span class="step " ></span>
          <span class="step" v-for="(row,key) in recordsLength" ></span>
            <span class="step active"></span>
        
    </div>
</div>
</template>

<script>
import EventBus from "../event-bus";

export default {
    props: {
        product: Object,
        form: Object,
        recordsLength:Number,
        attrscall:Array,
        
    },
    data() {
        return {
            container: {
                is_loading: false,
                showSelectedSizeSlider: false,
                conversionCount: "",
                recommended_size: "",
                restarted: false,
                sizecheck: false,
                finalsize: "",

                sizeIndex: 0,
                size_descriptions: [{
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
                ]
            },
            showrecommended: false,
            $allSlides: "",
            $allSlidesSize: "",
            traverseDefault: "",
            actionDefault: "",
            otherSize: "",
            tabnumber: "",
            leng:0,
            formBody: {},
            formLocal: {},
            sizeLoaded:true,
        };
    },
    methods: {
        getAttributes: function () {
           
                    this.attributes = this.attrscall;

                    for (var i = 0; i < this.attrscall.length; i++) {
                        
                      
                        this.form.sz[i] = localStorage.getItem("sizechart_id_"+this.attrscall[i].name.toLowerCase());

                            

                        this.form.bodyMeasure[i] = localStorage.getItem(
                            this.attrscall[i].name.toLowerCase()
                            
                        );
                                        
                      
                    }
                    
                    this.form.conversionCount = this.product.id;
                   

                    
                    this.form.heightfoot = localStorage.getItem("foot");
                    this.form.heightinch = localStorage.getItem("inch");
                    this.form.heightcm = localStorage.getItem("cm");
                    this.form.age = localStorage.getItem("age");
                    this.form.weight = localStorage.getItem("weight");
                    
                    this.form.tags = JSON.parse(localStorage.getItem("tags"));
                    
                    // this.form.convertedMeasurements = localStorage.getItem("convertedMeasurements");
                    
                    this.getProductDetails(this.form)
                   
                    
                    
                     

                    
                
        },
        setupProduct: function () {
            this.product.variants = this.product.variants.map(v => ({
                ...v,
                desc_title: "Recommended"
            }));

            this.getAttributes();

            var tabnumber = 1;
            // EventBus.$on('resetSlides',tabnumber=>{
            //     this.restart();
            // })
        },
        setSlides: function (sizeposition) {
           
            $("div.fit-advisor-selected-size:gt(" + sizeposition + ")").hide();
            $("div.fit-advisor-selected-size:lt(" + sizeposition + ")").hide();
            $("p.size_descriptions:gt(" + sizeposition + ")").hide();
            $("p.size_descriptions:lt(" + sizeposition + ")").hide();
            
            //Hide all but the Predicted Size

            this.$allSlides = $("div.fit-advisor-selected-size"),
            this.$allSlidesSize = $("p.size_descriptions"),
            this.traverseDefault = "first", //set the defaults
            this.actionDefault = "next";
        },
        setSelectedSizeFromList: function (size, sizecheck) {
            this.product.variants.forEach((el, index) => {
                if (sizecheck == true) {
                    if (el.option1.toUpperCase() == size) {
                        
                        this.container.sizeIndex = index;
                        this.array_move(
                            this.container.size_descriptions,
                            2,
                            index
                        );
                        switch(size){
                            case "XS":
                            console.log(size +" " +this.container.sizeIndex)
                             for (
                                var i = 0; i <= this.product.variants.length; i++
                            ) {
                                if (i == this.container.sizeIndex) {

                                    this.product.variants[i].desc_title =
                                        "Recommended";
                                }

                                if (
                                    i > this.container.sizeIndex &&
                                    i < this.product.variants.length
                                ) {
                                    this.product.variants[i].desc_title =
                                        "Slightly Relaxed";
                                    if (
                                        i ==
                                        this.product.variants.indexOf(
                                            this.product.variants[
                                                this.product.variants.length - 3
                                            ]
                                        )
                                    ) {
                                        this.product.variants[i].desc_title =
                                            "Relaxed";
                                    }
                                    if (
                                        i ==
                                        this.product.variants.indexOf(
                                            this.product.variants[
                                                this.product.variants.length - 2
                                            ]
                                        )
                                    ) {
                                        this.product.variants[i].desc_title =
                                            "Relaxed";
                                    }
                                    if (
                                        i ==
                                        this.product.variants.indexOf(
                                            this.product.variants[
                                                this.product.variants.length - 1
                                            ]
                                        )
                                    ) {
                                        this.product.variants[i].desc_title =
                                            "Very Relaxed";
                                    }
                                }
                            }
                            break;

                            case "XL":
                            console.log(size +" " +this.container.sizeIndex)
                            var counter = 1;
                            for (
                                var i = 0; i <= this.product.variants.length; i++
                            ) {

                                //DEBUG FROM HERE
                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Very Snug";

                                    if (
                                        i < this.container.sizeIndex &&
                                        i >= counter
                                    ) {
                                        counter++;

                                        this.product.variants[i].desc_title =
                                            "Snug";
                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Recommended";
                                }
                                if (
                                    i ==
                                    this.product.variants.indexOf(
                                        this.product.variants[
                                            this.product.variants.length - 2
                                        ]
                                    )
                                ) {
                                    this.product.variants[i].desc_title =
                                        "Slightly Snugged";
                                }
                            }
                            break;
                            default:
                            console.log('Recommendations failed')

                        }
                        this.setSlides(this.container.sizeIndex);
                        localStorage.setItem(
                            "sizeindex",
                            this.container.sizeIndex
                        );

                        
                    }
                } else if (sizecheck == false) {
                    if (el.option1.toUpperCase().charAt(0) == size) {
                        
                        this.container.sizeIndex = index;

                        this.array_move(
                            this.container.size_descriptions,
                            2,
                            index
                        );

                        switch(size){
                                case "S":
                                console.log(size +" " +this.container.sizeIndex)
                                for ( var i = 0; i <= this.product.variants.length; i++) {
                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Very Snug";

                                    if (i < this.container.sizeIndex && i > 0) {
                                        this.product.variants[i].desc_title =
                                            "Snug";
                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Recommended";
                                }

                                if (
                                    i > this.container.sizeIndex &&
                                    i < this.product.variants.length
                                ) {
                                    this.product.variants[i].desc_title =
                                        "Relaxed";
                                    if (
                                        i ==
                                        this.product.variants.indexOf(
                                            this.product.variants[
                                                this.product.variants.length - 1
                                            ]
                                        )
                                    ) {
                                        this.product.variants[i].desc_title =
                                            "Very Relaxed";
                                    }
                                }
                            }
                                        break;
                                    case "M":
                                    console.log(size +" " +this.container.sizeIndex)
                                        for ( var i = 0; i <= this.product.variants.length; i++) {
                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Very Snug";

                                    if (i < this.container.sizeIndex && i > 0) {
                                        this.product.variants[i].desc_title =
                                            "Snug";
                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Recommended";
                                }

                                if (
                                    i > this.container.sizeIndex &&
                                    i < this.product.variants.length
                                ) {
                                    this.product.variants[i].desc_title =
                                        "Relaxed";
                                    if (
                                        i ==
                                        this.product.variants.indexOf(
                                            this.product.variants[
                                                this.product.variants.length - 1
                                            ]
                                        )
                                    ) {
                                        this.product.variants[i].desc_title =
                                            "Very Relaxed";
                                    }
                                }
                            }
    break;
    case "L":
    console.log(size +" " +this.container.sizeIndex)
    
                            for (
                                var i = 0; i <= this.product.variants.length; i++
                            ) {
                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Very Snug";

                                    if (i < this.container.sizeIndex && i > 0) {
                                        this.product.variants[i].desc_title =
                                            "Snug";
                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title =
                                        "Recommended";
                                }

                                if (
                                    i > this.container.sizeIndex &&
                                    i < this.product.variants.length
                                ) {
                                    this.product.variants[i].desc_title =
                                        "Very Relaxed";
                                }
                            }
                                        break;
                                        default:
                                        console.log('broke in single char conditions')
                                    }
                        this.setSlides(this.container.sizeIndex);

                        localStorage.setItem(
                            "sizeindex",
                            this.container.sizeIndex
                        );

                        
                    }
                }
            });
        },

        getProductDetails: function (form) {
        
            this.container.is_loading = true;
            var a = "";
            // if (this.container.restarted == false) {
            //     if (localStorage.getItem("sizeindex") != null) {
            //         this.setSlides(localStorage.getItem("sizeindex"));
            //     }
            // }
            this.container.showSelectedSizeSlider = false;
            this.container.conversionCount = this.product.id;

           axios
                .post(this.$appUrl + "/api/size-recommend", form)
                .then(res => {
                    if(res.data.length == 1)
                    {
                        res.data = res.data[0]

                    }else
                    {
                        

                           if(res.data[3]=== undefined)
                           {
                               res.data = res.data[6]

                           }
                           else
                           {
                               res.data = res.data[3]
                           }
                           
                          
                    

                    }
                    this.container.is_loading = false;

                    this.container.showSelectedSizeSlider = true;

                    if (
                        res.data == "XL" ||
                        res.data == "Xl" ||
                        res.data == "xL" ||
                        res.data == "xl" ||
                        res.data == "XS" ||
                        res.data == "Xs" ||
                        res.data == "xS" ||
                        res.data == "xs"
                    ) {
                        this.container.recommended_size = res.data
                            .toUpperCase()
                            .substr(0, 2);
                            EventBus.$emit('refreshSize',res.data
                            .toUpperCase()
                            .substr(0, 2))
                        this.container.sizecheck = true;
                        this.setSelectedSizeFromList(
                            res.data.toUpperCase().substr(0, 2),
                            this.container.sizecheck
                        );
                        a = this.container.recommended_size;
                        $(".fit-advisor-selected-size-arrow-box").addClass(
                            "bigsize"
                        );
                        $(".dfOagu").addClass("dfOagu-second");
                    } else {
                        this.container.recommended_size = res.data
                            .toUpperCase()
                            .charAt(0);
                             EventBus.$emit('refreshSize',res.data
                            .toUpperCase()
                            .charAt(0))
                        this.container.sizecheck = false;
                        this.setSelectedSizeFromList(
                            res.data.toUpperCase().charAt(0),
                            this.container.sizecheck
                        );

                        a = this.container.recommended_size;
                    }
                      this.sizeLoaded=false;
                    $('.resultant-all').removeClass('x-d-none')
                    $('.descriptions-all').removeClass('x-d-none')

                    localStorage.setItem(
                        "recommended_size",
                        this.container.recommended_size
                    );

                    this.container.finalsize = localStorage.getItem(
                        "recommended_size"
                    );
                });
        },
        changesize: function (trigger) {
            if (this.showrecommended == true) {
                this.showrecommended = false;

                // $('.dfOagu').addClass('dfOagu-second');
                // $('.listfit').removeClass('ml-5');
            }

            //slides size

            var $time = 1000;

            this.showrecommended = false;

            var traverse = this.traverseDefault,
                action = this.actionDefault;
                

            if (trigger == 0) {
                //if action is prev
                traverse = "last"; //set traverse to last in case nothing is available
                action = "prev"; //set action to prev
            }
            var $curr = this.$allSlides.filter(":visible"), //get the visible slide
                $nxtTarget = $curr[action](".fit-advisor-selected-size"); //get the next target based on the action.
            $nxtTarget.addClass("active");

            $curr
                .stop(true, true)
                .fadeIn($time)
                .removeClass("active")
                .hide(); //hide current one

            if (!$nxtTarget.length) {
                //if no next
                $time = 1;
                

                if (trigger == 0) {
                    
                    $nxtTarget = this.$allSlides["first"]();
                    
                } else {
                    
                    
                    
                    $nxtTarget = this.$allSlides["last"](); //based on traverse pick the next one
                    //added following line of code as when reached end it wasnt stoping at last size
                    $curr
                .stop(true, true)
                .fadeIn($time)
                .addClass("active")
                .show();
                    
                       
                }
            }

            $nxtTarget.stop(true, true).fadeIn($time).addClass("active"); //show the target

            //slides size end

            var $curr = this.$allSlidesSize.filter(":visible"), //get the visible slide
                $nxtTarget = $curr[action](".size_descriptions"); //get the next target based on the action.
            $nxtTarget.addClass("active");

            $curr
                .stop(true, true)
                .fadeIn($time)
                .removeClass("active")
                .hide(); //hide current one

            if (!$nxtTarget.length) {
                //if no next

                if (trigger == 0) {
                    $nxtTarget = this.$allSlidesSize["first"]();
                } else {
                    
                    $nxtTarget = this.$allSlidesSize["last"](); //based on traverse pick the next one
                    //added following line of code as when reached end it wasnt stoping at last size
                      $curr
                .stop(true, true)
                .fadeIn($time)
                .addClass("active")
                .show();
                    
                }
            }
//added show method to following line of code as when reached end it wasnt stoping at last size
            $nxtTarget
                .stop(true, true)
                .fadeIn($time)
                .addClass("active").show(); //show the target

            //slides size end
        },
        array_move: function (arr, old_index, new_index) {
            if (new_index >= arr.length) {
                var k = new_index - arr.length + 1;
                while (k--) {
                    arr.push(undefined);
                }
            }
            arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
            return arr; // for testing
        },
        restart: function () {
            // this.changesizetorecommended()

            //                $('.fit-advisor-selected-product-grid').css('display', 'none');

            this.tabnumber = 1;
            
            EventBus.$emit("home", this.tabnumber);
        }
    },
    mounted() {
        // console.log = function(){};
        this.is_loading=true;
        
            
            
        
     
     //   this.setupProduct();
        // this.getProductDetails();
        this.form.conversionCount = this.product.id;

        EventBus.$on("sizeCalculate", num => {
            
            var a = 1;
            this.sizeLoaded=true;
            $('.x-progress-bar').css('width','700px');
            $('.resultant-all').addClass('x-d-none');
            $('.descriptions-all').addClass('x-d-none');
            
            this.setupProduct();
            //this.getProductDetails();
            this.form.conversionCount = this.product.id;
            EventBus.$emit("mount", a);
            
            
           
        });
    },
     
};
</script>
