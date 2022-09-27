<template>
    <div class="container">
        <div v-if="combinations.length">
            <div v-for="combination in combinations" v-bind:key = "combination.id" class="card shadow p-4 mb-5 bg-body col-sm-4">
                <div class="card-body">
                    <h5 class="card-title sub-heading my-3">{{combination.combination}}</h5>
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
        this.loadCombinations
    },
    methods : {
        loadCombinations(){
            fetch('/v1/combinations')
            .then(res => res.json())
            .then(res => {
                this.combinations = res;
            });
        }
    }
}

</script>