import Vue from 'vue'
import VueRouter from 'vue-router'
import Subjects from './components/SubjectListComponent.vue'
import Universities from './components/LocalUniversityComponent.vue'
import Homepage from './components/HomepageComponent.vue'
import Field from './components/FieldComponent.vue'
import Combination from './components/CombinationComponent.vue'

Vue.use(VueRouter);

const routes = [
    {
        path : '/',
        name : 'Home',
        component : Homepage
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
        path : '/field',
        name : 'Field',
        component :  Field
    },
    {
        path : '/combinations',
        name : 'Combination',
        component :  Combination
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
