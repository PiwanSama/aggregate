<template>
     <div class="container">
        <div class="row">
            <div class="col-5 my-3 ">
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
                <div class = "" v-if = "loading">
                    <half-circle-spinner
                        :animation-duration="1000"
                        :size="60"
                        :color="'#4F8FF7'"
                    />
                </div>
                <div v-if="loaded">
                    <div class = "form-group col-md-4">
                        <select class="form-control-sm" v-if = "isSciences">
                            <option selected>Select your Sciences combination</option>
                            <option v-for="(combination, index) in artsCombinations" :key="index" :value="combination">
                                {{combination.combination}}
                            </option> 
                        </select>
                    </div>
                    <div class = "form-group col-md-4">
                        <select class="form-control-sm" v-if = "isArts">
                            <option selected>Select your Arts combination</option>
                            <option v-for="(combination, index) in scienceCombinations" :key="index" :value="combination">
                                {{combination.combination}}
                            </option> 
                        </select>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-7 my-3">
            <div class="row my-3">
                <h2 class="sub-heading">What's were your grades in ?</h2>
                <form>
                    <div class="form-row">
                        <div class="form-group mx-sm-2 mb-2">
                        <input type="text" class="form-controls-sm" placeholder="B">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                        <input type="text" class="form-controls-sm" placeholder="C">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                        <input type="text" class="form-controls-sm" placeholder="M">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                        <input type="text" class="form-controls-sm" placeholder="IT">
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary float-right">Calculate my grades!</button>
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
            selected: null,
            loading : true,
            loaded : false,
            isArts : true,
            isSciences : false
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
        },
        showSciences(){
            this.isArts = false;
            this.isSciences = true;
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

