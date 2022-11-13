<template>
    <div class="container">
        <h2 class="my-5 sub-heading">All Universities</h2>
        <div class="input-group shadow col-md-6 mb-5">
            <input type="text" class="form-control" placeholder="Type to search" aria-label="Search" v-model="searchQuery" ref="searchQuery">
            <!--div class="input-group-append">
                <span class="input-group-text"><font-awesome-icon icon="fa-solid fa-search" /></span>
            </div-->
        </div>
        <div v-if="universities.length">
            <div class="row justify-content-around" v-for="group in filteredUniversities">
                <div v-for="university in group" v-bind:key = "university.id" class="card shadow p-4 mb-5 col-sm-4">
                    <!--img v-bind:src = "badge" class="card-img-top" alt="..."/-->
                    <div class="card-body">
                        <h5 class="card-title sub-heading my-3">{{university.university}}</h5>
                        <h6 class="card-subtitle mb-2 subtitle">{{university.district.name}}</h6>
                        <p class="card-text">{{university.university}} is a {{university.type.toLowerCase()}} institution in the {{university.region}} part of Uganda. 
                            It operates under the {{university.award}} award</p>
                        <button type="button" class="btn btn-primary-custom shadow col-12 my-3">See more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import img_badge from '../../../public/images/badge.jpg';

export default {
    name : "local-universities",
    data : function(){
        return{
            universities : [],
            searchQuery : "",
            badge : img_badge
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