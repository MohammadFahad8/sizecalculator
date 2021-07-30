<template>
    <div>
        <div></div>
        <p class="fit-advisor-intro">
            <span id="mark1">Choose the option that best</span> <br /><span
                id="mark2"
                >describes your {{ attributes.name }}</span
            >
        </p>

        <div class="x-custom-container x-text-center x-mb-5">
          <div class="x-col-12" v-if="container.is_loading">
                    <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                    </div>

                </div>
            <div class=" x-row"  v-if="!container.is_loading">
                
                <div
                    class="col-md-4 parent"
                    v-for="row in attributesToShow"
                    :key="row.id"
                >
                
                    <img
                        id="chest1"
                        :src="$appUrl+'/'+row.attr_image_src"
                        v-on:click="chest(row.attr_size_value)"
                    />
                    <p :title="row.attr_size_value" class=" fit-advisor-options-text">
                        {{ row.attribute_size_name }}
                    </p>
                </div>
            </div>
        </div>

        <div
            id="steps-mark"
            style="position:fixed"
            class="m-result  x-offset-2 x-offset-sm-1 x-offset-md-1 x-offset-lg-1 x-offset-xl-1"
        >
            <span class="step" v-for="(row) in parseInt(recordsLength) + parseInt(2)" :key="row.id"></span>
            <!-- <span class="step active" ></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span> -->
        </div>
    </div>
</template>

<script>
import EventBus from "../event-bus";

export default {
    props: {
        attributes: Object,
        tabnum: Object,
        recordsLength: Number,
        currentRecord: Number,
        // sizechart:Object,
    },
    data() {
        return {
            container: {
                tabnumber: "",
                attr_first: true,
                chestSizeOne: "1",
                chestSizeTwo: "2",
                chestSizeThree: "3",
                is_loading: false,
                chest: [],
                attributeDetails: [],
                arraytitle: {},
                arrayval: {},
                
            },
            attributesToShow:{},
        };
    },
    methods: {
        nextStep: function(n) {
            this.container.tabnumber = n;
            EventBus.$emit("attributeone", this.container);
            if (this.currentRecord == this.recordsLength) {
                EventBus.$emit("sizeCalculate", n);
            }
        },
        chest: function(n) {
            if (localStorage.getItem(this.attributes.name) == null) {
                localStorage.setItem(this.attributes.name.toLowerCase(), n);
            }

            this.nextStep(this.tabnum.count + 1);
        },
        sizeToShow: function(id,sizeId,sizeValue)
        {
            var formd = new FormData();
            formd.append('sizechartid',id)
            formd.append('attr_id',sizeId)
            formd.append('sizevalue',sizeValue)
            

            axios.post(this.$appUrl+'/api/size-to-show',formd).then((res)=>{
                    this.container.is_loading=false;
                this.attributesToShow = res.data;

            })

        },
        showAttributeSizes:function(sizeChartId,attr_id,attrDetails)
        {
            
            for(var $i=0;$i<=attrDetails.length-1;$i++)
            {
                this.sizeToShow(sizeChartId,attr_id,attrDetails[$i].attr_size_value)

            }

        }
    },
    mounted(){
        this.container.is_loading=true;
        EventBus.$on('checkAttributeSizes',(sizeChartId)=>{

            this.showAttributeSizes(sizeChartId,this.attributes.id,this.attributes.attr_details)
          
        })
    }
};
</script>
