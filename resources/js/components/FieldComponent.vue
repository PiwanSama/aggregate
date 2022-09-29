<template>
     <div class="container">
        <h2 class="my-5 sub-heading">What's your field of study?</h2>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="field-radio" id="artsRadio" value="arts" @clicked="showArts">
        <label class="form-check-label" for="artsRadio">
            Arts
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="field-radio" id="sciencesRadio" value="sciences" @clicked="showSciences">
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
            <div class="row justify-content-around" v-for="group in sortedCombinations">
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
            loading : true,
            loaded : false,
            category : ''
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
        }
    },
    computed : {
        sortedCombinations(){
            return _.chunk(this.combinations, 3); 
        }
    }
}
</script>

