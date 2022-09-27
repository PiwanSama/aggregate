<template>
    <div class="container">
        <div v-if="combinations.length">
            <h2 class="my-5 sub-heading">What combination did you do?</h2>
            <div v-for="combination in combinations" v-bind:key = "combinations.id" class="card shadow p-2 mb-5 bg-body col-sm-4">
                <div class="card-body text-center">
                    <p class="card-title">{{combination.combination}}</p>
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
        console.log('Loaded');
        this.loadCombinations();
        console.log('Finished');
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