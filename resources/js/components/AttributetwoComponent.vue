<template>
<div>
    <p class="fit-advisor-intro"><span id="mark1">Choose the option that best</span> <br><span id="mark2">describes your stomach</span></p>
    <div v-if="container.attr_second">
        <div>
            <div class=" fit-advisor-chest-tab size-position">
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="stomach1" v-on:click="stomach(container.stomachSizeOne)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-1.svg" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Flatter</p>
                    </div>
                </div>
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="stomach2" v-on:click="stomach(container.stomachSizeTwo)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-2.svg" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Average</p>
                    </div>
                </div>
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="stomach3" v-on:click="stomach(container.stomachSizeThree)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-stomach-3.svg" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Rounder</p>
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
    data() {
        return {
            container: {
                tabnumber: '',
                attr_second: true,
                stomachSizeOne: '1',
                stomachSizeTwo: '2',
                stomachSizeThree: '3',
                is_loading: false,
                stomach: {
                    title: 'stomach',
                    other: localStorage.getItem('stomach')
                },

            }
        }
    },
    methods: {
        nextStep: function (n) {

            this.container.tabnumber = n;
            EventBus.$emit('attributetwo', this.container);

        },
        stomach: function (n) {
            this.container.stomach.other = n;
            localStorage.setItem('stomach', n)
            this.nextStep(4)
        },
    },
    mounted() {}
}
</script>
