<template>
<div>

    <p class="fit-advisor-intro"><span id="mark1">Choose the option that best</span> <br><span id="mark2">describes your bottom</span></p>
    <div v-if="container.attr_third">
        <div>
            <div class=" fit-advisor-chest-tab size-position">
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="bottom1" v-on:click="bottom(container.bottomSizeOne)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-1.svg" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Flatter</p>
                    </div>
                </div>
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="bottom2" v-on:click="bottom(container.bottomSizeOne)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-2.svg" class=" fit-advisor-options-img">
                        <p class=" fit-advisor-options-text">Average</p>
                    </div>
                </div>
                <div class=" fit-advisor-chest-tab-item">
                    <div style="opacity: 1; transform: none;">
                        <img id="bottom3" v-on:click="bottom(container.bottomSizeOne)" src="https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-seat-3.svg" class=" fit-advisor-options-img">
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

                attr_third: true,
                bottomSizeOne: '1',
                bottomSizeTwo: '2',
                bottomSizeThree: '3',
                is_loading: false,
                bottom: {
                    title: 'bottom',
                    other: localStorage.getItem('bottom')
                },
                tags: JSON.parse(localStorage.getItem('tags')),
            }
        }
    },
    methods: {
        nextStep: function (n) {

            this.container.tabnumber = n;
            EventBus.$emit('attributethree', this.container);

            EventBus.$emit('sizeCalculate', n);

        },
        bottom: function (n) {
            this.container.bottom.other = n;
            localStorage.setItem('bottom', n)

            this.nextStep(5)

        },
    },
    mounted() {

    }
}
</script>
