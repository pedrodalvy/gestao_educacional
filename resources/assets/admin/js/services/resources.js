import 'vue-resource';
import ADMIN_CONFIG from './adminConfig';
import Vue from 'vue';

Vue.http.headers.common['X-CSRF-Token'] = $('meta[name=csrf-token]').attr('content');

let ClassStudent = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/classinformation/{classinformation}/students/{student}`);
let ClassTeaching = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/classinformation/{classinformation}/teachings/{teaching}`);

export {
    ClassStudent, ClassTeaching
}
