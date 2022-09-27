<template>
    <div class="container">
        <h2 class="my-5 sub-heading">All Universities</h2>
        <div class="input-group shadow col-md-6 mb-5">
            <input type="text" class="form-control" placeholder="Type to search" aria-label="Search" v-model="searchQuery" ref="searchQuery">
            <div class="input-group-append">
                <span class="input-group-text"><font-awesome-icon icon="fa-solid fa-search" /></span>
            </div>
        </div>
        <div v-if="universities.length">
            <div class="row justify-content-around" v-for="group in filteredUniversities">
                <div v-for="university in group" v-bind:key = "university.id" class="card shadow p-4 mb-5 bg-body col-sm-4">
                    <div class="card-body">
                        <h5 class="card-title sub-heading my-3">{{university.university}}</h5>
                        <h6 class="card-subtitle mb-2 subtitle"><font-awesome-icon icon="fa-solid fa-location-dot" /> {{university.district}}</h6>
                        <p class="card-text"><font-awesome-icon icon="fa-solid fa-university" /> {{university.university}} is a {{university.type.toLowerCase()}} institution in the {{university.region}} part of Uganda. 
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
            universities : [],
            searchQuery : ""
        };
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
        filteredUniversities(){
            const dataFilter = university => university.university.toLowerCase().match(this.searchQuery.toLowerCase()) && true;
            return _.chunk(this.universities.filter(dataFilter), 2); 
        }
    }
}

</script>