<template>
     <div class="container">
        <h2 class="my-5 sub-heading">What's your field of study?</h2>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
            Arts
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            Sciences
        </label>
        </div>
        <div class="row my-2">
            <combinations></combinations>
        </div>
        <router-link tag = "button" class="btn btn-wrap" to = "/combination">Next</router-link>
    </div>
</template>

<script>

import Combinations from '../components/CombinationComponent.vue';

export default {
    name : "FieldComponent",
    components : {
        Combinations
    }
}
</script>

