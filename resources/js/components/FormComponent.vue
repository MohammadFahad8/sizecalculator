<template>
<div id="form-bodyfit">
     <p class="fit-advisor-intro text-center" id="intro1">
                        <span id="mark1">To get a size recommendation,</span> <br><span id="mark2">fill out the form below</span></p>
     <div id="fields" class="tab fit-advisor-custom_row form-group offset-1">
                        <div class="fit-advisor-custom_row" v-if="!container.countrycheck">
                            <div class="col-md-6 x-text-lg-left x-text-center"><label class=" labels-tab1 height_weight" for="height_ft">Height</label>
                                <input type="number" id="height_ft" placeholder="Feet" class="form-control  input-border" v-model="container.form.heightfoot" name="heightfoot">
                            </div>
                            <div class="col-md-6 x-text-lg-left x-text-center">
                                <input type="number" id="height_in" placeholder="Inches" class="form-control mtf-3   input-border" v-model="container.form.heightinch" name="heightinch">
                            </div>

                        </div>
                        <div class="fit-advisor-custom_row" v-if="container.countrycheck">
                            <div class="col-md-12  x-text-lg-left x-text-center"><label class=" labels-tab1 height_weight " for="height_ft">Height</label>
                                <input type="number" id="height_cm" placeholder="Cm" class="form-control w-100 input-border" v-model="container.form.heightcm" name="heightcm">
                            </div>
                        </div>

                        <div class="fit-advisor-custom_row mtf-5">
                            <div class="col-md-6 x-text-lg-left x-text-center">
                                <label class=" labels-tab1 height_weight " for="weight">Weight</label>
                                <input type="number" id="weight" placeholder="Lbs" class="form-control   input-border x-mt-2" v-model="container.form.weight" name="weight">
                            </div>
                            <div class="col-md-6 x-text-lg-left x-text-center">
                                <label for="age"><span class="text-center labels-tab1 " id="age-label-5s">Age</span></label>
                                <input type="number" id="age" placeholder="Years" class="form-control   input-border mt-n1" v-model="container.form.age" name="Age">
                            </div>

                        </div>
                    </div>
                    <!-- v-if="!onfirstTab" removed it from the below div -->
                    <div class="row" >
                        <input v-on:change="countryval()" class="countrycheck no-gutters" type="checkbox" name="countrycheck" v-model="container.countrycheck" />

                        <svg class="img_country" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <rect y="85.331" style="fill:#F0F0F0;" width="512" height="341.337" />
                            <g>
                                <rect y="127.994" style="fill:#D80027;" width="512" height="42.663" />
                                <rect y="213.331" style="fill:#D80027;" width="512" height="42.663" />
                                <rect y="298.657" style="fill:#D80027;" width="512" height="42.663" />
                                <rect y="383.994" style="fill:#D80027;" width="512" height="42.663" />
                            </g>
                            <rect y="85.331" style="fill:#2E52B2;" width="256" height="183.797" />
                            <g>
                                <polygon style="fill:#F0F0F0;" points="99.822,160.624 95.699,173.308 82.363,173.308 93.154,181.143 89.031,193.826 

99.822,185.991 110.606,193.826 106.484,181.143 117.275,173.308 103.938,173.308 	" />
                                <polygon style="fill:#F0F0F0;" points="103.938,219.08 99.822,206.397 95.699,219.08 82.363,219.08 93.154,226.916 89.031,239.599 

99.822,231.763 110.606,239.599 106.484,226.916 117.275,219.08 	" />
                                <polygon style="fill:#F0F0F0;" points="47.577,219.08 43.46,206.397 39.337,219.08 26.001,219.08 36.792,226.916 32.669,239.599 

43.46,231.763 54.245,239.599 50.123,226.916 60.912,219.08 	" />
                                <polygon style="fill:#F0F0F0;" points="43.46,160.624 39.337,173.308 26.001,173.308 36.792,181.143 32.669,193.826 43.46,185.991 

54.245,193.826 50.123,181.143 60.912,173.308 47.577,173.308 	" />
                                <polygon style="fill:#F0F0F0;" points="99.822,114.85 95.699,127.535 82.363,127.535 93.154,135.371 89.031,148.054 

99.822,140.218 110.606,148.054 106.484,135.371 117.275,127.535 103.938,127.535 	" />
                                <polygon style="fill:#F0F0F0;" points="43.46,114.85 39.337,127.535 26.001,127.535 36.792,135.371 32.669,148.054 43.46,140.218 

54.245,148.054 50.123,135.371 60.912,127.535 47.577,127.535 	" />
                                <polygon style="fill:#F0F0F0;" points="156.183,160.624 152.061,173.308 138.725,173.308 149.515,181.143 145.394,193.826 

156.183,185.991 166.969,193.826 162.846,181.143 173.637,173.308 160.301,173.308 	" />
                                <polygon style="fill:#F0F0F0;" points="160.301,219.08 156.183,206.397 152.061,219.08 138.725,219.08 149.515,226.916 

145.394,239.599 156.183,231.763 166.969,239.599 162.846,226.916 173.637,219.08 	" />
                                <polygon style="fill:#F0F0F0;" points="216.663,219.08 212.546,206.397 208.423,219.08 195.088,219.08 205.877,226.916 

201.755,239.599 212.546,231.763 223.331,239.599 219.208,226.916 229.999,219.08 	" />
                                <polygon style="fill:#F0F0F0;" points="212.546,160.624 208.423,173.308 195.088,173.308 205.877,181.143 201.755,193.826 

212.546,185.991 223.331,193.826 219.208,181.143 229.999,173.308 216.663,173.308 	" />
                                <polygon style="fill:#F0F0F0;" points="156.183,114.85 152.061,127.535 138.725,127.535 149.515,135.371 145.394,148.054 

156.183,140.218 166.969,148.054 162.846,135.371 173.637,127.535 160.301,127.535 	" />
                                <polygon style="fill:#F0F0F0;" points="212.546,114.85 208.423,127.535 195.088,127.535 205.877,135.371 201.755,148.054 

212.546,140.218 223.331,148.054 219.208,135.371 229.999,127.535 216.663,127.535 	" />
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>

                    </div>

                    <button class="continue-btn" style="position: absolute;right: 30%;width: 33%;bottom: -50px" type="button" id="nextBtn" v-on:click="nextStep(2)">Get Started</button>
                    <!-- <button v-if="!showContinueBtn" class="continue-btn" style="position: absolute;right: 32%;width: 33%;bottom: 90px;display:none !important;" type="button" id="cartBtn" v-on:click="addToCart()">Add Size to Cart</button> -->
</div>
    
</template>
<script>
import EventBus from '../event-bus';

export default {
    data() {
        return{
            container:{
            form: {
                heightfoot: localStorage.getItem('foot'),
                heightinch: localStorage.getItem('inch'),
                heightcm: parseInt(localStorage.getItem('cm')),
                weight: parseFloat(localStorage.getItem('weight')).toFixed(0),
                age: localStorage.getItem('age'),
                convertedMeasurements: false,
                conversionCount: '',
              

            },
            countrycheck: '',
            is_loading:false,
            valid: true,
            firstTab:false,

        }
        }
    },
    methods:{
        nextStep: function (n){
            this.validateForm();
            if(this.container.valid == true)
            {
                this.container.form.tabnumber  = n;
            EventBus.$emit('formsubmit',this.container);
            }
            
            
            

        },
        validateForm: function () {
            if(this.container.countrycheck == false || this.container.countrycheck == '')
            {
           if($('#height_ft').val().length == 0){

               $('#height_ft').addClass('invalid')
               this.container.valid = false;

           } else if($('#height_in').val().length == 0){
               $('#height_in').addClass('invalid')
               this.container.valid = false;

           }
            else if($('#weight').val().length == 0){
               $('#weight').addClass('invalid')
               this.container.valid = false;
           }
           else if($('#age').val().length == 0){
               $('#age').addClass('invalid')
               this.container.valid = false;
           }
           
           }

           if(this.container.countrycheck == true)
           {
                if($('#height_cm').val().length == 0){
               $('#height_cm').addClass('invalid')
               this.container.valid = false;
                                                }
                 if($('#weight').val().length == 0)
                 {
                        $('#weight').addClass('invalid')
                        this.container.valid = false;
                }
                        if($('#age').val().length == 0){
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
    mounted()
    {},
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
