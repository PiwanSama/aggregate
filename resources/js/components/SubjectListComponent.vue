<template>
    <div class="container">
        <h3>All Subjects</h3>
        <div v-if = "subjects.lenght = 0">
            <h1>Nothing yet!</h1>
        </div>
        <div>
            <ul>
                <li v-for = "subject in subjects" v-bind:key="subject.id">{{subject.name}}</li>
            </ul>
        </div>
    </div>
</template>

<script>

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
            fetch('v1/subjects')
            .then(res => res.json())
            .then(res => {
                this.subjects = res;
            });
        }
    }
}

</script>
