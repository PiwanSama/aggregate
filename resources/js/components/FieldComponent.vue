<template>
     <div class="container">
        <h2 class="my-5 sub-heading">What's your field of study?</h2>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="field-radio" id="artsRadio" value="arts" v-on:click="showArts">
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
        <div class="row my-2">
            <h2 class="my-5 sub-heading">What combination did you do?</h2>
        <div class = "" v-if = "loading">
            <half-circle-spinner
                :animation-duration="1000"
                :size="60"
                :color="'#4F8FF7'"
            />
        </div>
        <div v-if="loaded">
            <div class="row justify-content-around" v-if ="isSciences" v-for="group in artsCombinations">
                <div v-for="combination in group" v-bind:key = "combination.id" class="card p-2 mb-5 bg-body col-sm-3">
                    <div class="card shadow card-body text-center">
                        <p class="card-title">{{combination.combination}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" v-if = "isArts" v-for="group in scienceCombinations">
                <div v-for="combination in group" v-bind:key = "combination.id" class="card p-2 mb-5 bg-body col-sm-3">
                    <div class="card shadow card-body text-center">
                        <p class="card-title">{{combination.combination}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" v-if = "isDefault" v-for="group in filteredCombinations">
                <div v-for="combination in group" v-bind:key = "combination.id" class="card p-2 mb-5 bg-body col-sm-3">
                    <div class="card shadow card-body text-center">
                        <p class="card-title">{{combination.combination}}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <router-link tag = "button" class="btn btn-wrap mb-5" to = "/combination">Next</router-link>
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
            artsData : [],
            sciencesData : [],
            loading : true,
            loaded : false,
            isDefault : true,
            isArts : false,
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
            this.isDefault = false;
            this.isSciences = false;
            this.isArts = true;
        },
        showSciences(){
            this.isDefault = false;
            this.isArts = false;
            this.isSciences = true;
        }
    },
    computed : {
        filteredCombinations(){
            return _.chunk(this.combinations, 3);
        },
        artsCombinations(){
            this.artsData = this.combinations.filter(combination => combination.category.indexOf('Arts'));
            return _.chunk(this.artsData, 3);
        },
        scienceCombinations(){
            this.sciencesData = this.combinations.filter(combination => combination.category.indexOf('Sciences'));
            return _.chunk(this.sciencesData, 3);
        }
    }
}
</script>

