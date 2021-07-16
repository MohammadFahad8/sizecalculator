<template>
    <div>
        <p class="fit-advisor-intro" id="intro2"><span id="mark1">Choose the option that best</span> <br><span id="mark2">describes your chest</span></p>
         <div class="tab" v-if="container.attr_first">
                        <div>
                            <div class=" fit-advisor-chest-tab size-position">
                                <div class=" fit-advisor-chest-tab-item">
                                    <div style="opacity: 1; transform: none;">
                                        <img id="chest1" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-1.svg" v-on:click="chest(container.chestSizeOne)" class=" fit-advisor-options-img">
                                        <p class=" fit-advisor-options-text">Narrower</p>
                                    </div>
                                </div>
                                <div class=" fit-advisor-chest-tab-item">
                                    <div style="opacity: 1; transform: none;">
                                        <img id="chest2" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-2.svg" v-on:click="chest(container.chestSizeTwo)" class=" fit-advisor-options-img">
                                        <p class=" fit-advisor-options-text">Average</p>
                                    </div>
                                </div>
                                <div class=" fit-advisor-chest-tab-item">
                                    <div style="opacity: 1; transform: none;">
                                        <img id="chest3" v-on:click="chest(container.chestSizeThree)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-3.svg" class=" fit-advisor-options-img">
                                        <p class=" fit-advisor-options-text">Broader</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="steps-mark" style="text-align:center;margin-top:100px;" class="m-result float-right"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
    </div>
</template>
<script>
import EventBus from '../event-bus';

export default {
    data() {
        return{
            container:{
             attr_first:false,
                 chestSizeOne:'1',
            chestSizeTwo:'2',
            chestSizeThree:'3', 
            is_loading:false,
            }
        }
    },
}
</script>
