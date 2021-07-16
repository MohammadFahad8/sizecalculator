<template>
    
<div>
     <div class="tab">
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

                                                                <h4 class="result-size" v-if="showSelectedSizeSlider">

                                                                    <!-- <span v-if="!showrecommended" class="recommendedbyus big-size-margin-recommend-size">{{recommended_size}}</span> -->

                                                                    <span class="variant_title" :data-variant=" row.id ">
                                                                        <span v-if="row.option1.toUpperCase().substring(0, 2)=='XL' || row.option1.toUpperCase().substring(0, 2)=='XS'">
                                                                            <span >{{row.option1.toUpperCase()}}</span></span>
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
                                        <p class=" fit-advisor-header-desc size_descriptions" v-for="(row,key,index) in product.variants" :key="row.id" ><span v-if="!container.is_loading">Fit Size:<strong>{{ row.desc_title }}</strong></span> </p>
                                        <p class=" fit-advisor-header-desc  fit-advisor-header-desc-mt ">The size we recommend is based on how we intended this item to suit your body. <br><a target="_blank" rel="noopener noreferrer nofollow" href="javascript:void(0)" class=" learn-text">Learn More</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


<div id="steps-mark" style="text-align:center;margin-top:100px;" class="m-result float-right"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
</div>
</template>
<script>


export default ({
    data() {
        return{
            container:{
                is_loading:false,
            }
        }
    },
})
</script>
