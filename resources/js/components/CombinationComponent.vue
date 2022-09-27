<template>
    <div class="container">
        <div v-if="combinations.length">
            <h2 class="my-5 sub-heading">What combination did you do?</h2>
            <div class="row justify-content-around" v-for="group in sortedCombinations">
                <div v-for="combination in group" v-bind:key = "combination.id" class="card shadow p-2 mb-5 bg-body col-sm-3">
                    <div class="card-body text-center">
                        <p class="card-title">{{combination.combination}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name : "combinations",
    data : function(){
        return{
            combinations : []
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