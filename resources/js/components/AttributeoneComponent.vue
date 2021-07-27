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
            <div class=" x-row">
                <div
                    class="col-md-4 parent "
                    v-for="row in attributes.attr_details"
                    :key="row.id"
                >
                    <img
                        id="chest1"
                        :src="$appUrl+'/'+row.attr_image_src"
                        v-on:click="chest(row.attr_size_value)"
                    />
                    <p class=" fit-advisor-options-text">
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
            <span class="step"></span>
            <span class="step active" ></span>
            <span class="step"></span>
            <span class="step"></span>
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
                is_loading: false,
                chest: [],
                attributeDetails: [],
                arraytitle: {},
                arrayval: {}
            }
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
        }
    },
    mounted() {}
};
</script>
