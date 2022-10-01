require('./bootstrap');
import router from './router';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faLocationDot, faUniversity, faSearch, faCircleRight } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faLocationDot, faUniversity, faSearch, faCircleRight)

window.Vue = require('vue').default;

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('navbar', require('./components/NavbarComponent.vue').default);
Vue.component('subject-list', require('./components/SubjectListComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
