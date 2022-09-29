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
            <div class="list-group col-sm-3" v-if = "isDefault" v-for="combination in filteredCombinations" v-bind:key = "combination.id">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="card-title">{{combination.combination}}</h5>
                    </div>
                    <p class="mb-1">{{combination.category}}</p>
                </a>
            </div>
            <div class="list-group col-sm-3" v-if = "isSciences" v-for="combination in artsCombinations" v-bind:key = "combination.id">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="card-title">{{combination.combination}}</h5>
                    </div>
                    <p class="mb-1">{{combination.category}}</p>
                </a>
            </div>
            <div class="list-group col-sm-3" v-if = "isArts" v-for="combination in scienceCombinations" v-bind:key = "combination.id">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="card-title">{{combination.combination}}</h5>
                    </div>
                    <p class="mb-1">{{combination.category}}</p>
                </a>
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
            activeIndex: undefined,
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
            return this.combinations;
        },
        artsCombinations(){
           return this.combinations.filter(combination => combination.category.indexOf('Arts'));
        },
        scienceCombinations(){
            return this.combinations.filter(combination => combination.category.indexOf('Sciences'));
        }
    }
}
</script>

