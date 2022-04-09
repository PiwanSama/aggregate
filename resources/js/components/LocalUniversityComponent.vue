<template>
    <div class="container">
        <h2 class="my-5 main-heading">All Universities</h2>
        <div v-if="universities.length">
            <div class="row justify-content-around" v-for="group in groupedUniversities">
                <div v-for="university in group" v-bind:key = "university.id" class="card shadow p-4 mb-5 bg-body col-4">
                    <div class="card-body">
                        <h5 class="card-title sub-heading my-3">{{university.name}}</h5>
                        <h6 class="card-subtitle mb-2 subtitle"><font-awesome-icon icon="fa-solid fa-location-dot" /> {{university.district}}</h6>
                        <p class="card-text"><font-awesome-icon icon="fa-solid fa-university" /> {{university.name}} is a {{university.type}} institution in the {{university.region}} part of Uganda. 
                            It operates under the {{university.award}} award</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name : "local-universities",
    data : function(){
        return{
            universities : []
        }
    },
    created() {
        this.loadUniversities();
    },
    methods : {
        loadUniversities(){
            fetch('/v1/universities')
            .then(res => res.json())
            .then(res => {
                this.universities = res;
            });
        }
    },
    computed : {
        groupedUniversities(){
            return _.chunk(this.universities, 2)
        }
    }
}

</script>