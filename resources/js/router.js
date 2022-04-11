import Vue from 'vue'
import VueRouter from 'vue-router'
import Subjects from './components/SubjectListComponent.vue'
import Universities from './components/LocalUniversityComponent.vue'
import Combinations from './components/CombinationsComponent.vue'

Vue.use(VueRouter);

const routes = [
    {
        path : '/',
        name : 'Home',
        component : Combinations
    },
    {
        path : '/subjects',
        name : 'Subjects',
        component : Subjects
    },
    {
        path : '/universities',
        name : 'Universities',
        component :  Universities
    },
    {
        path : '/my-combination',
        name : 'Combinations',
        component :  Combinations
    }
]

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes : routes,
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "active" // active class for *exact* links.
})

export default router
