<template>
     <div class="container">
        <h2 class="my-5 sub-heading">What's your field of study?</h2>
        <div class="row my-2">
            <div class="col-md-6">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label radio-text" for="customRadioInline1">Arts</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label radio-text" for="customRadioInline2">Sciences</label>
                </div>
            </div>
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

