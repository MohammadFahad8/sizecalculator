<template>
<div>
    <p class="fit-advisor-intro text-center"><span id="mark1">Drop-cut:LUX</span> <br><span id="mark2"></span></p>
    <div>
        <div class="fit-advisor-custom_row">
            <div class="col-md-12">
                <div class=" fit-advisor-selected-product-grid">
                    <!-- <div class=" fit-advisor-selected-product-image"><img id="featured_image" class=" fit-advisor-product-picture" v-bind:src=this.product.featured_image alt="image" style="opacity: 1;"></div> -->
                    <div>
                        <div class=" fit-advisor-product-size-box">
                            <div class=" fit-advisor-fit-grid float-left">

                                <div class=" fit-advisor-selected-size-container fit-advisor-selected-size-arrow-box">
                                    <div class=" selected-product-arrow-left" v-if="!container.is_loading">
                                        <span size="10" id="arrow-left" class=" jjnwUS  selected-product-arrow-left-pointer prev" @click="changesize(0);">
                                            <svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW">
                                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z"></path>
                                            </svg>
                                        </span>
                                    </div>

                                    <!-- LIST OF ALL VARIANTS -->
                                    <div class="fit-advisor-custom_row center-force " v-if="container.is_loading">
                                        <div class="col-md-12">
                                            <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div class="fit-advisor-custom_row" v-if="container.is_loading">
                                            <div class="col" style="visibility:hidden">col</div>
                                            <div class="col" style="visibility:hidden">col</div>

                                        </div>
                                    </div>

                                    <div class="listfit ml-5">

                                        <div id="fit-advisor-sizes-slider" font-size="40" v-for="(row,key,index) in product.variants" :key="row.id" class=" fit-advisor-selected-size" style="opacity: 1;">
                                            <span id="fsize">

                                                <h4 class="result-size" v-if="container.showSelectedSizeSlider">

                                                    <!-- <span v-if="!showrecommended" class="recommendedbyus big-size-margin-recommend-size">{{recommended_size}}</span> -->

                                                    <span class="variant_title" :data-variant=" row.id ">
                                                        <span v-if="row.option1.toUpperCase().substring(0, 2)=='XL' || row.option1.toUpperCase().substring(0, 2)=='XS'">
                                                            <span>{{row.option1.toUpperCase()}}</span></span>
                                                        <span v-if="row.option1.toUpperCase()!='XS' && row.option1.toUpperCase()!='XL' ">{{row.option1.toUpperCase().charAt(0)}}</span></span>
                                                </h4>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="dfOagu" style="z-index:30" v-if="!container.is_loading">
                                        <span size="10" id="arrow-right" class=" jjnwUS  hjNiUI arrow-next next" @click="changesize(1)">
                                            <svg viewBox="0 0 16 16" height="10" width="10" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 jZGNBW">
                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z"></path>
                                            </svg></span></div>
                                </div>
                            </div>
                        </div>
                        <p class=" fit-advisor-header-desc size_descriptions" v-for="(row,key,index) in product.variants" :key="row.id"><span v-if="!container.is_loading">Fit Size:<strong>{{ row.desc_title }}</strong></span> </p>
                        <p class=" fit-advisor-header-desc  fit-advisor-header-desc-mt ">The size we recommend is based on how we intended this item to suit your body. <br><a target="_blank" rel="noopener noreferrer nofollow" href="javascript:void(0)" class=" learn-text">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="steps-mark" style="text-align:center;margin-top:100px;" class="m-result "><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
</div>
</template>

<script>
import EventBus from '../event-bus';

export default {
    props: {
        product: Object,
        form: Object,

    },
    data() {
        return {
            container: {
                is_loading: false,
                showSelectedSizeSlider: false,
                conversionCount: '',
                recommended_size: '',
                restarted: false,
                sizecheck: false,
                finalsize: '',

                sizeIndex: 0,
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

            },
            showrecommended: false,
            $allSlides: '',
            $allSlidesSize: '',
            traverseDefault: '',
            actionDefault: '',
            otherSize: '',
            tabnumber: '',
            formBody: {},
            formLocal:{},
        }
    },
    methods: {
        setupProduct: function () {
            this.product.variants = this.product.variants.map(v => ({
                ...v,
                desc_title: 'Recommended'
            }));
            this.formBody = this.form;
            var tabnumber = 1;
            // EventBus.$on('resetSlides',tabnumber=>{
            //     this.restart();
            // })

        },
        setSlides: function (sizeposition) {

            $('div.fit-advisor-selected-size:gt(' + sizeposition + ')').hide();
            $('div.fit-advisor-selected-size:lt(' + sizeposition + ')').hide();
            $('p.size_descriptions:gt(' + sizeposition + ')').hide();
            $('p.size_descriptions:lt(' + sizeposition + ')').hide();
            //Hide all but the Predicted Size

            this.$allSlides = $('div.fit-advisor-selected-size'),
                this.$allSlidesSize = $('p.size_descriptions'),
                this.traverseDefault = "first", //set the defaults
                this.actionDefault = "next";
        },
        setSelectedSizeFromList: function (size, sizecheck) {

            this.product.variants.forEach((el, index) => {

                if (sizecheck == true) {

                    if (el.option1.toUpperCase() == size) {
                        this.container.sizeIndex = index
                        this.array_move(this.container.size_descriptions, 2, index)
                        if (size == "XS") {

                            for (var i = 0; i <= this.product.variants.length; i++) {

                                if (i == this.sizeIndex) {
                                    this.product.variants[i].desc_title = "Recommended";
                                }

                                if ((i > this.sizeIndex) && (i < this.product.variants.length)) {

                                    this.product.variants[i].desc_title = "Slightly Relaxed";
                                    if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 3])) {
                                        this.product.variants[i].desc_title = "Relaxed";
                                    }
                                    if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 2])) {
                                        this.product.variants[i].desc_title = "Relaxed";
                                    }
                                    if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
                                        this.product.variants[i].desc_title = "Very Relaxed";
                                    }

                                }

                            }

                        } else if (size == "XL") {
                            var counter = 1;
                            for (var i = 0; i <= this.product.variants.length; i++) {

                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Very Snug";

                                    if ((i < this.container.sizeIndex) && (i >= counter)) {
                                        counter++;

                                        this.product.variants[i].desc_title = "Snug";

                                    }

                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Recommended";
                                }
                                if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 2])) {
                                    this.product.variants[i].desc_title = "Slightly Snugged";
                                }

                            }

                        }
                        localStorage.setItem('sizeindex', this.container.sizeIndex)

                        this.setSlides(this.container.sizeIndex);

                    }
                } else if (sizecheck == false) {

                    if (el.option1.toUpperCase().charAt(0) == size) {
                        this.container.sizeIndex = index

                        this.array_move(this.container.size_descriptions, 2, index)

                        if (size == "S") {

                            for (var i = 0; i <= this.product.variants.length; i++) {

                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Very Snug";

                                    if ((i < this.container.sizeIndex) && (i > 0)) {

                                        this.product.variants[i].desc_title = "Snug";

                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Recommended";
                                }

                                if ((i > this.container.sizeIndex) && (i < this.product.variants.length)) {

                                    this.product.variants[i].desc_title = "Relaxed";
                                    if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
                                        this.product.variants[i].desc_title = "Very Relaxed";
                                    }

                                }

                            }

                        } else if (size == 'M') {

                            for (var i = 0; i <= this.product.variants.length; i++) {

                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Very Snug";

                                    if ((i < this.container.sizeIndex) && (i > 0)) {

                                        this.product.variants[i].desc_title = "Snug";

                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Recommended";
                                }

                                if ((i > this.container.sizeIndex) && (i < this.product.variants.length)) {

                                    this.product.variants[i].desc_title = "Relaxed";
                                    if (i == this.product.variants.indexOf(this.product.variants[this.product.variants.length - 1])) {
                                        this.product.variants[i].desc_title = "Very Relaxed";
                                    }

                                }

                            }

                        } else if (size == 'L') {
                            for (var i = 0; i <= this.product.variants.length; i++) {

                                if (i < this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Very Snug";

                                    if ((i < this.container.sizeIndex) && (i > 0)) {

                                        this.product.variants[i].desc_title = "Snug";

                                    }
                                }

                                if (i == this.container.sizeIndex) {
                                    this.product.variants[i].desc_title = "Recommended";
                                }

                                if ((i > this.container.sizeIndex) && (i < this.product.variants.length)) {

                                    this.product.variants[i].desc_title = "Very Relaxed";

                                }

                            }

                        }

                        localStorage.setItem('sizeindex', this.container.sizeIndex)

                        this.setSlides(this.container.sizeIndex);

                    }

                }

            })

        },

        getProductDetails: function () {
            this.container.is_loading = true;
            var a = '';
            if (this.container.restarted == false) {

                if (localStorage.getItem("sizeindex") != null) {

                    this.setSlides(localStorage.getItem("sizeindex"));

                }
            }
            this.container.showSelectedSizeSlider = false;
            this.container.conversionCount = this.product.id
            this.formLocal = localStorage;
            console.log(this.formLocal);
            axios.post(this.$appUrl + '/api/size-recommend/', this.formLocal)
                .then((res) => {

                    this.container.is_loading = false;

                    this.container.showSelectedSizeSlider = true;

                    if (((res.data == 'XL') || (res.data == 'xl')) || ((res.data == 'XS') || (res.data == 'xs'))) {
                        this.container.recommended_size = res.data.toUpperCase().substr(0, 2)
                        this.container.sizecheck = true;
                        this.setSelectedSizeFromList(res.data.toUpperCase().substr(0, 2), this.container.sizecheck)
                        a = this.container.recommended_size;
                        $('.fit-advisor-selected-size-arrow-box').addClass('bigsize');
                        $('.dfOagu').addClass('dfOagu-second');

                    } else {
                        this.container.recommended_size = res.data.toUpperCase().charAt(0)
                        this.container.sizecheck = false;
                        this.setSelectedSizeFromList(res.data.toUpperCase().charAt(0), this.container.sizecheck)

                        a = this.container.recommended_size;

                    }

                    localStorage.setItem('recommended_size', this.container.recommended_size)

                    this.container.finalsize = localStorage.getItem('recommended_size');

                })
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

            if (trigger == 0) { //if action is prev
                traverse = "last"; //set traverse to last in case nothing is available
                action = "prev"; //set action to prev
            }

            var $curr = this.$allSlides.filter(':visible'), //get the visible slide

                $nxtTarget = $curr[action](".fit-advisor-selected-size"); //get the next target based on the action.
            $nxtTarget.addClass('active');

            $curr.stop(true, true).fadeIn($time).removeClass('active').hide(); //hide current one

            if (!$nxtTarget.length) { //if no next
                $time = 1;

                if (trigger == 0) {

                    $nxtTarget = this.$allSlides["first"]();

                } else {

                    $nxtTarget = this.$allSlides["last"](); //based on traverse pick the next one

                }

            }

            $nxtTarget.stop(true, true).fadeIn($time).addClass('active'); //show the target

            //slides size end

            var $curr = this.$allSlidesSize.filter(':visible'), //get the visible slide
                $nxtTarget = $curr[action](".size_descriptions"); //get the next target based on the action.
            $nxtTarget.addClass('active');

            $curr.stop(true, true).fadeIn($time).removeClass('active').hide(); //hide current one

            if (!$nxtTarget.length) { //if no next

                if (trigger == 0) {

                    $nxtTarget = this.$allSlidesSize["first"]();

                } else {

                    $nxtTarget = this.$allSlidesSize["last"](); //based on traverse pick the next one

                }

            }

            $nxtTarget.stop(true, true).fadeIn($time).addClass('active'); //show the target

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
            console.log(this.tabnumber)
            EventBus.$emit('home', this.tabnumber)

        },
    },
    mounted() {
        this.setupProduct();
        this.getProductDetails();
        
        EventBus.$on('sizeCalculate', num => {
            var a=1;
            Event.$emit('mount',a);
            this.setupProduct();
            this.getProductDetails();
        })
    }
}
</script>
