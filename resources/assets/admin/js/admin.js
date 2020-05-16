require('./bootstrap');
require('feather-icons/dist/feather.min')

const feather = require('feather-icons')
feather.replace();

Toastr.options = {
    "progressBar": true,
    "positionClass": "toast-top-right",
    "showDuration": "500",
}

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('class-student', require('./components/class_information/ClassStudent').default);
Vue.component('class-teaching', require('./components/class_information/ClassTeaching').default);

const admin = new Vue({
    el: '#app',
});
