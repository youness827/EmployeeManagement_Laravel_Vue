require('./bootstrap');

window.Vue = require('vue').default;
//import and use vue Router
import VueRouter from 'vue-router';

//import the routes.js
import {routes} from './routes';

//use vue Router
Vue.use(VueRouter);

Vue.component('employees-index',
 require('./components/Employees/Index')
 .default);

const router = new VueRouter({
    mode:'history',
    routes:routes,
})

const app = new Vue({
    el: '#app',
    router: router
});
