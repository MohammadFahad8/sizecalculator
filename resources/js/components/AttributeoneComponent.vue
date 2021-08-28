<template>
    <div>
        <div></div>
       
        <p class="fit-advisor-intro">
            <span id="mark1">Choose the option that best</span> <br /><span
                id="mark2"
                >describes your {{ attributes.name }}</span
            >
        </p>

        <div class="x-container x-text-center x-mb-5">
           
            <div class="x-row x-p-5 loadspin " >
                  <div class="x-col-md-12 x-p-5">
                                            <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
            </div>
            <div class=" x-row x-justify-content-center allattr x-d-none x-pb-5 " v-if="attributes.attr_items.length==0 || typeof attributes.attr_items == 'undefined' && is_loading==false">
                <div
                    class="col-md-4  "
                    v-for="row in attributes.attr_details"
                    :key="row.id"
                    
                >
                    <img
                        id="chest1"
                        :src="$appUrl+'/'+row.attr_image_src"
                        v-on:click="chest(row.attr_size_value,row.sizechart_id)"
                        class="img_attr_get"
                    />
                    <p :title="row.attr_size_value" class=" fit-advisor-options-text">
                        {{ row.attribute_size_name }}
                    </p>
                </div>
            </div>
             <div class=" x-row x-justify-content-center queryattr x-d-none x-pb-5"  v-if=" typeof attributes.attr_items != 'undefined' || attributes.attr_items.length>0 && is_loading==false"> 
                <div
                    class="x-col-md-4  x-col x-mb-5 "
                    v-for="row in attributes.attr_items" v-if="attributes.id == row.attribute_type_id"
                        
                    
                >
                    <img
                    v-if="attributes.id == row.attribute_type_id"
                        id="chest1"
                        :src="$appUrl+'/'+row.attr_image_src"
                        v-on:click="chest(row.attr_size_value,row.sizechart_id)"
                        class="img_attr_get"
                        
                    />
                    <p v-if="attributes.id == row.attribute_type_id" :title="row.attr_size_value" class=" fit-advisor-options-text">
                        {{ row.attribute_size_name }}
                    </p>
                </div>
            </div>
        </div>

        <div
            id="steps-mark"
            
             class="x-text-center x-pt-5"
        >
        
          
            <span class="step" ></span>
          <span class="step" v-bind:class="tabnum.count==key+2?'active':''" v-for="(row,key) in recordsLength" ></span>
            <span class="step"></span>
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
        currentRecord: Number
    },
    data() {
        return {
            container: {
                tabnumber: "",
                attr_first: true,
                chestSizeOne: "1",
                chestSizeTwo: "2",
                chestSizeThree: "3",
                
                chest: [],
                attributeDetails: [],
                arraytitle: {},
                arrayval: {}
            },
            is_loading: true,
            
            leng:0,

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

       chest: function(n,scid) {
            
            if (localStorage.getItem(this.attributes.name) == null) {

                localStorage.setItem(this.attributes.name.toLowerCase(), n);
                localStorage.setItem("sizechart_id_"+this.attributes.name.toLowerCase(), scid);
                //change to commit just adding a text
                
            }
          
            
            this.nextStep(this.tabnum.count + 1);
        }
        },
    
    mounted() {
        
        
    setTimeout(function(){
 	
     $('.loadspin').addClass('x-d-none');
     $('.allattr').removeClass('x-d-none');
     $('.queryattr').removeClass('x-d-none');
}, 1000);

        
    }
};
</script>
