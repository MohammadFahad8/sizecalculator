<template>
<div>
<div >
  
    

</div>
    <p class="fit-advisor-intro"><span id="mark1">Choose the option that best</span> <br><span id="mark2">describes your {{attributes.name}}</span></p>
    <div>
        <div>
            <div class=" fit-advisor-chest-tab size-position">
                <div class=" fit-advisor-chest-tab-item" v-for="(row) in attributes.attr_details" :key="row.id">
                    <div style="opacity: 1; transform: none;">
                        <img id="chest1" :src="row.attr_image_src"  v-on:click="chest(row.attr_size_value)" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">{{row.attribute_size_name}}</p>
                    </div>
                </div>
                <!-- <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="chest2" :src="attributes.img_second" v-on:click="chest(attributes.size_second)" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Average</p>
                    </div>
                </div>
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="chest3" v-on:click="chest(attributes.size_third)" :src="attributes.img_third"  class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Broader</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div id="steps-mark" style="text-align:center;margin-top:100px;" class="m-result "><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
</div>
</template>

<script>
import EventBus from '../event-bus';

export default {
    props:{
        attributes: Object,
        tabnum:Number,
        recordsLength:Number,
        currentRecord: Number,
        
    },
    data() {
        return {
            container: {
                tabnumber: '',
                attr_first: true,
                chestSizeOne: '1',
                chestSizeTwo: '2',
                chestSizeThree: '3',
                is_loading: false,
                chest: [
                   
                ],
                attributeDetails:[],
                arraytitle:{},
                arrayval:{}

            },
            
        }
    },
    methods: {
        nextStep: function (n) {

            this.container.tabnumber = n;
            EventBus.$emit('attributeone', this.container);
            if(this.currentRecord == this.recordsLength)
            {
                
                EventBus.$emit('sizeCalculate', n);
            }

        },
        chest: function (n) {
            
            
            

            if(localStorage.getItem(this.attributes.name)==null)
            {
                localStorage.setItem(this.attributes.name.toLowerCase(),n);
            }
           
           
            this.nextStep(this.tabnum+1)
        },

    },
    mounted() {
        
       

    }
}
</script>
