<template>
<div id="form-bodyfit">
    <p class="fit-advisor-intro text-center" id="intro1">
        <span id="mark1">To get a size recommendation,</span> <br><span id="mark2">fill out the form below</span></p>
    <div id="fields" class="tab fit-advisor-custom_row form-group offset-1">
        <div class="fit-advisor-custom_row" v-if="!container.countrycheck">
            <div class="col-md-6 x-text-lg-left x-text-center"><label class=" labels-tab1 height_weight" for="height_ft">Height</label>
                <input type="number" id="height_ft" placeholder="Feet" class="x-form-control  input-border x-border-left-0 x-border-right-0 x-border-top-0 x-rounded-0" v-model="container.form.heightfoot" name="heightfoot">
            </div>
            <div class="col-md-6 x-text-lg-left x-text-center">
                <input type="number" id="height_in" placeholder="Inches" class=" mtf-3 x-form-control  input-border x-border-left-0 x-border-right-0 x-border-top-0 x-rounded-0" v-model="container.form.heightinch" name="heightinch">
            </div>

        </div>
        <div class="fit-advisor-custom_row" v-if="container.countrycheck">
            <div class="col-md-12  x-text-lg-left x-text-center"><label class=" labels-tab1 height_weight " for="height_ft">Height</label>
                <input type="number" id="height_cm" placeholder="Cm" class="x-form-control x-w-100 input-border x-border-left-0 x-border-right-0 x-border-top-0 x-rounded-0" v-model="container.form.heightcm" name="heightcm">
            </div>
        </div>

        <div class="fit-advisor-custom_row mtf-5">
            <div class="col-md-6 x-text-lg-left x-text-center">
                <label class=" labels-tab1 height_weight " for="weight">Weight</label>
                <input type="number" id="weight" placeholder="Lbs" class="x-form-control  input-border x-border-left-0 x-border-right-0 x-border-top-0 x-rounded-0 x-mt-2" v-model="container.form.weight" name="weight">
            </div>
            <div class="col-md-6 x-text-lg-left x-text-center">
                <label for="age"><span class="text-center labels-tab1 " id="age-label-5s">Age</span></label>
                <input type="number" id="age" placeholder="Years" class="x-form-control  input-border x-border-left-0 x-border-right-0 x-border-top-0 x-rounded-0 mt-n1" v-model="container.form.age" name="Age">
            </div>

        </div>
    </div>
    <!-- v-if="!onfirstTab" removed it from the below div -->
    <div class="row">
        <input v-on:change="countryval()" class="countrycheck no-gutters" type="checkbox" name="countrycheck" v-model="container.countrycheck" />

   <img :src="countryimg" alt="">

    </div>

    <button class="continue-btn" style="position: absolute;right: 30%;width: 33%;bottom: -50px" type="button" id="nextBtn" v-on:click="nextStep(2)">Get Started</button>
    <!-- <button v-if="!showContinueBtn" class="continue-btn" style="position: absolute;right: 32%;width: 33%;bottom: 90px;display:none !important;" type="button" id="cartBtn" v-on:click="addToCart()">Add Size to Cart</button> -->
</div>
</template>

<script>
import EventBus from '../event-bus';

export default {
    data() {
        return {
            container: {
                form: {
                    heightfoot: '',
                    heightinch: '',
                    heightcm: '',
                    weight: '',
                    age: '',
                    convertedMeasurements: false,
                    conversionCount: '',

                },
                countrycheck: '',
                is_loading: false,
                valid: true,
                firstTab: false,

            },
            countryimg:'',
            
        }
    },
    methods: {
        nextStep: function (n) {
            this.validateForm();
            if (this.container.valid == true) {
                
                this.container.form.tabnumber = n;
                EventBus.$emit('formsubmit', this.container);
            }

        },
        validateForm: function () {
            if (this.container.countrycheck == false || this.container.countrycheck == '') {
                if ($('#height_ft').val().length == 0) {

                    $('#height_ft').addClass('invalid')
                    this.container.valid = false;

                } else if ($('#height_in').val().length == 0) {
                    $('#height_in').addClass('invalid')
                    this.container.valid = false;

                } else if ($('#weight').val().length == 0) {
                    $('#weight').addClass('invalid')
                    this.container.valid = false;
                } else if ($('#age').val().length == 0) {
                    $('#age').addClass('invalid')
                    this.container.valid = false;
                }

            }

            if (this.container.countrycheck == true) {
                if ($('#height_cm').val().length == 0) {
                    $('#height_cm').addClass('invalid')
                    this.container.valid = false;
                }
                if ($('#weight').val().length == 0) {
                    $('#weight').addClass('invalid')
                    this.container.valid = false;
                }
                if ($('#age').val().length == 0) {
                    $('#age').addClass('invalid')

                }

            }

        },
        countryval: function () {

            if (this.container.countrycheck == false) {

                $('input[name="weight"]').attr('placeholder', 'Lbs');
                $('input[name="heightfoot"]').attr('placeholder', 'Feet');
                $('input[name="heightinch"]').attr('placeholder', 'Inches');
                $('input[name="countrycheck"]').attr('value', 0);
                this.container.countrycheck == 0;
                this.container.form.convertedMeasurements = false;
                this.weightconvert(this.container.form.weight, false);
                this.heightconvert(localStorage.getItem('foot'), localStorage.getItem('inch'), parseFloat(localStorage.getItem('cm')).toFixed(0), false);

            } else if (this.container.countrycheck == true) {

                $('input[name="weight"]').attr('placeholder', 'Kg');
                $('input[name="heightcm"]').attr('placeholder', 'Cm');
                $('input[name="countrycheck"]').attr('value', 1);
                this.container.countrycheck == 1
                this.container.form.convertedMeasurements = true;
                this.weightconvert(this.container.form.weight, true);
                this.heightconvert(localStorage.getItem('foot'), localStorage.getItem('inch'), parseFloat(localStorage.getItem('cm')).toFixed(0), true);

            }

        },
        validateHeight: function (event) {
            $('#height_ft').keydown(function (e) {
                if (e.keyCode === 190 || e.keyCode === 110) {
                    e.preventDefault();
                }
            });
            $('#height_ft').removeClass('invalid')

            this.container.valid = true;

            if (this.container.form.heightfoot > 9) {
                $("#height_ft").attr("placeholder", "Limit is 9");
                $("#height_ft").addClass("warning-place");
                this.container.form.heightfoot = '';

            } else if (this.container.form.heightfoot <= 0) {
                this.container.form.heightfoot = '';

            } else {
                localStorage.setItem('foot', this.container.form.heightfoot)
            }

        },
        validateInches: function () {
            $('#height_in').keydown(function (e) {
                if (e.keyCode === 190 || e.keyCode === 110) {
                    e.preventDefault();
                }
            });
            $('#height_in').removeClass('invalid')
            this.container.valid = true;

            if (this.container.form.heightinch > 11) {
                $("#height_in").attr("placeholder", "Limit is 11");
                $("#height_in").addClass("warning-place");
                this.container.form.heightinch = '';

            } else if (this.container.form.heightinch < 0) {
                this.container.form.heightinch = '';

            } else {
                localStorage.setItem('inch', this.container.form.heightinch)
            }
        },
        validateWeight: function () {
            $('#weight').keydown(function (e) {
                if (e.keyCode === 190 || e.keyCode === 110) {
                    e.preventDefault();
                }
            });
            $('#weight').removeClass('invalid')
            this.container.valid = true;

            if (this.container.form.weight > 500) {
                $("#weight").attr("placeholder", "Limit is 500 Lbs");
                if (this.countrycheck == true) {
                    $("#weight").attr("placeholder", "Limit is 227 Kg");
                }

                $("#weight").addClass("warning-place");
                this.container.form.weight = ''

            } else if (this.container.form.weight <= 0) {

                this.container.form.weight = ''

            } else {

                localStorage.setItem('weight', parseFloat(this.container.form.weight).toFixed(0))
            }
        },
        validateAge: function () {
            $('#height_in').keydown(function (e) {
                if (e.keyCode === 190 || e.keyCode === 110) {
                    e.preventDefault();
                }
            });
            $('#age').removeClass('invalid')
            this.container.valid = true;
            if (this.container.form.age > 100) {
                $("#age").attr("placeholder", "Limit is 100");
                $("#age").addClass("warning-place");
                this.container.form.age = ''

            } else if (this.container.form.age <= 0) {
                this.container.form.age = ''

            } else {
                localStorage.setItem('age', this.container.form.age)
            }
        },
        validateCm: function () {
            $('#height_cm').keydown(function (e) {
                if (e.keyCode === 190 || e.keyCode === 110) {
                    e.preventDefault();
                }
            });

            $('#height_cm').removeClass('invalid')
            this.container.valid = true;

            if (this.container.form.heightcm > 302) {
                $("#height_cm").attr("placeholder", "Limit is 300");
                $("#height_cm").addClass("warning-place");
                this.container.form.heightcm = ''

            } else if (this.container.form.heightcm <= 0) {
                this.container.form.heightcm = ''

            } else {
                var heightincm = parseFloat(this.container.form.heightcm).toFixed(0)

                localStorage.setItem('cm', heightincm)
                this.container.form.heightcm = localStorage.getItem('cm')

            }

        },
        weightconvert: function (w, c) {
            if ((c == true) && (w != '')) {
                this.container.form.weight = parseFloat(w / 2.2).toFixed(0) //pound to kg
            } else if ((c == false) && (w != '')) {
                this.container.form.weight = parseFloat(w * 2.2).toFixed(0) //kg to pound
            }

        },
        heightconvert: function (f, i, cm, c) {

            if ((c == true)) {
                if (isNaN(f)) {
                    return;
                } else {
                    this.container.form.heightcm = (f * 30.48) + (parseInt(i) * 2.54);
                    var heightcm = parseFloat(this.container.form.heightcm).toFixed(0);

                    localStorage.setItem('cm', heightcm);
                    this.container.form.heightcm = localStorage.getItem('cm')

                    // this.form.heightinch = f * 30.48 + parsetInt($data['heightinch']) * 2.54;}

                }
            } else if ((c == false)) {
                if (isNaN(cm)) {
                    return;

                } else {

                    var length, feet, inch = 0;
                    length = cm / 2.54; //cm to ft and inches
                    feet = Math.floor(length / 12);
                    inch = length - 12 * feet;
                    this.container.form.heightfoot = feet
                    if (inch >= 5) {

                    } else if (inch < 5) {
                        this.container.form.heightinch = parseInt(Math.floor(inch))

                    }

                    localStorage.setItem('foot', this.container.form.heightfoot)
                    localStorage.setItem('inch', this.container.form.heightinch)
                }

            }

        },
    },
    mounted() {
        this.countryimg =this.$appUrl +"/images/us.png";
      
    
    },
    watch: {
        'container.form.heightfoot': function () {
            this.validateHeight();
        },
        'container.form.heightinch': function () {
            this.validateInches();
        },
        'container.form.weight': function () {

            this.validateWeight();
        },
        'container.form.age': function () {
            this.validateAge();
        },
        'container.form.heightcm': function () {
            this.validateCm();
        },
    }
}
</script>
