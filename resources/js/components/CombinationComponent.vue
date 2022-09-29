<template>
     <div class="container">
        <div class="row my-3">
            <div>
            <h2 class="sub-heading">What's your field of study?</h2>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="field-radio" id="artsRadio" value="arts" v-on:click="showArts" checked>
                    <label class="form-check-label" for="artsRadio">
                        Arts
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="field-radio" id="sciencesRadio" value="sciences" v-on:click="showSciences">
                    <label class="form-check-label" for="sciencesRadio">
                        Sciences
                    </label>
                </div>
                <div class="row my-3">
                    <h2 class="sub-heading">What combination did you do?</h2>
                    <div v-if = "loading">
                        <half-circle-spinner
                            :animation-duration="1000"
                            :size="60"
                            :color="'#4F8FF7'"
                        />
                    </div>
                    <div v-if="loaded">
                        <div v-if = "isArts" class = "form-group col-md-4">
                            <small id="passwordHelpBlock1" class="form-text text-muted">
                                Select your Arts combination
                            </small><br>
                            <select class="form-control-sm" v-model = "selected">
                                <option v-for="(combination, index) in scienceCombinations" :key="index" :value="combination">
                                    {{combination.combination}}
                                </option> 
                            </select>
                        </div>
                        <div v-if = "isSciences" class = "form-group col-md-4">
                            <small id="passwordHelpBlock2" class="form-text text-muted">
                                Select your Sciences combination
                            </small><br>
                            <select class="form-control-sm" v-model = "selected">
                                <option v-for="(combination, index) in artsCombinations" :key="index" :value="combination">
                                    {{combination.combination}}
                                </option> 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-3" v-if= "selected">
                    <h2 class="sub-heading">What's were your grades in {{selected.combination}}?</h2>
                    <form>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{selected.principal_one}} : </label>
                            <div class="col-sm-10">
                                <select class="form-control-sm" v-model="principal_one">
                                    <option disabled value="">Please select one</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>O</option>
                                    <option>F</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{selected.principal_two}} : </label>
                            <div class="col-sm-10">
                                <select class="form-control-sm" v-model="principal_two">
                                    <option disabled value="">Please select one</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>O</option>
                                    <option>F</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{selected.principal_three}} : </label>
                            <div class="col-sm-10">
                                <select class="form-control-sm" v-model="principal_three">
                                    <option disabled value="">Please select one</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>O</option>
                                    <option>F</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{selected.subsidiary}} : </label>
                            <div class="col-sm-10">
                                <select class="form-control-sm" v-model="subsidiary">
                                    <option disabled value="">Please select one</option>
                                    <option>1</option>
                                    <option>0</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-primary mt-5" type="submit" value="Calculate my grades!"/>
                    </form>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

import { HalfCircleSpinner } from 'epic-spinners'

export default {
    name : "FieldComponent",
    components : {
        HalfCircleSpinner
    },
    data : function(){
        return{
            combinations : [],
            msg: [],
            selected: null,
            loading : true,
            loaded : false,
            isArts : true,
            isSciences : false,
            principal_one : '',
            principal_two : '',
            principal_three : '',
            subsidiary : ''
        }
    },
    created(){
        this.loadCombinations();
    },
    methods : {
        loadCombinations(){
            fetch('/v1/combinations')
            .then(res => res.json())
            .then(res => {
                this.combinations = res;
                this.loaded = true;
                this.loading = false;
            });
        },
        showArts(){
            this.isSciences = false;
            this.isArts = true;
            if(this.selected != null) this.selected = null;
        },
        showSciences(){
            this.isArts = false;
            this.isSciences = true;
            if(this.selected != null) this.selected = null;
        }
    },
    computed : {
        artsCombinations(){
           return this.combinations.filter(combination => combination.category.indexOf('Arts'));
        },
        scienceCombinations(){
            return this.combinations.filter(combination => combination.category.indexOf('Sciences'));
        }
    }
  }
</script>

