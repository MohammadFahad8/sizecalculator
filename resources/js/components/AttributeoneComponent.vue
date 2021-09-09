<template>
    <div>
        <div></div>

        <p class="fit-advisor-intro" v-if="txt.length!=0" >
            <span id="mark1">Choose the option that best</span> <br /><span
                id="mark2"
                >describes your {{ attributes.name }}</span
            >
        </p>

<placeholder-text v-if="txt.length==0" ></placeholder-text>



        <div class="x-container x-text-center x-mb-5">

            <div class="x-row x-p-5 loadspin fade-out "  >
                  <div class="x-col-md-12 x-p-5">
                                            <div class="spinner-border spinner-position" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
            </div>

            <dummy-result v-if="txt.length==0"></dummy-result>

            <div class="x-row x-justify-content-center x-text-center" v-if="txt.length==0">
                <div class="x-col-12 x-col-md-12">
                    <a href="javascript:void(0)" @click="home"  class="continue-btn backbtnattr">Back</a>
                </div>
            </div>

             <div class=" x-row x-justify-content-center queryattr x-d-none "  v-if=" typeof attributes.attr_items != 'undefined' || attributes.attr_items.length>0 && is_loading==false">
                <div
                    class="x-col-md-4  x-col-12 x-mb-5 x-mb-sm-0 x-mb-md-0 x-mb-lg-0 x-mb-lg-0"
                    v-for="row in attritemsarr"


                >
                    <span v-show="txt=='show'">{{ attributes.id == row.attribute_type_id ?txt="List of available sizes":txt="showerror"}}</span>
                    <img

                        id="chest1"
                        :src="$appUrl+'/'+row.attr_image_src"
                        v-on:click="chest(row.attr_size_value,row.sizechart_id)"
                        class="img_attr_get"

                    />
                    <p :title="row.attr_size_value" class=" fit-advisor-options-text" :data-atname="row.attribute_size_name">
                        {{ row.attribute_size_name }}

                    </p>
                </div>

            </div>
        </div>

        <div id="steps-mark" class="x-text-center x-pt-5">
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
        currentRecord: Number,
        spinit:Boolean,
        attritems:Array,


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
            showPlaceholder:false,
            attrcountinc:1,
            txt:'',

        };
    },
computed:{
        attritemsarr:function()
{
        return this.attritems.filter(row=> this.attributes.id == row.attribute_type_id )
}

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
        },
        checkForData:function(check){
             if(check == true)
        {

     $('.loadspin').addClass('x-d-none');
     $('.allattr').addClass('x-d-none');
     $('.queryattr').addClass('x-d-none');


        }
        else
        {

            $('.loadspin').removeClass('x-d-none');
             setTimeout(()=>{

     $('.loadspin').addClass('x-d-none');
     $('.allattr').removeClass('x-d-none');
     $('.queryattr').removeClass('x-d-none');


}, 1000);

        }

        },
        home:function ()
        {
            this.currentAttrHide=false;
            this.attrcountinc=0;
            EventBus.$emit('hometab',2)
        },

        resetText:function ()
        {
            this.txt=''
            EventBus.$on('resettext',val=>{
                this.txt = '';

            })
        }


        },

    mounted() {

    this.resetText()

        this.checkForData(this.spinit)

    }, watch:{
        'spinit':function(){

            this.checkForData(this.spinit)

        },
    }
};
</script>
