require('./bootstrap');
require('feather-icons/dist/feather.min')

const feather = require('feather-icons')
feather.replace();

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('class-student', require('./components/class_information/ClassStudent').default);

const admin = new Vue({
    el: '#app',
});
