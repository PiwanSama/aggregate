<template>
    <div class="container">
        <h2 class="my-5 main-heading">All Subjects</h2>
        <div v-if="subjects.length">
            <div v-for = "subject in subjects" v-bind:key="subject.id" class="card shadow p-4 mb-5 bg-body rounded ui-list">

                <h4 class="sub-heading mb-3">{{subject.name}}</h4>
                <p>Category : {{subject.category}}</p>
                <p class="subtitle">{{subject.field}}</p>

            </div>
        </div>
    </div>
</template>

<script>

import {axios} from 'axios'

export default{
    name : "subject-list",
    data : function() {
        return {
            subjects:[]
        }
    },
    created() {
        this.loadSubjects();
    },
    methods : {
        loadSubjects(){
            axios.get('v1/subjects')
            .then(res => {
                this.subjects = res.data;
            });
        }
    }
}

</script>
