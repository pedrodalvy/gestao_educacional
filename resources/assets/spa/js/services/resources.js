import 'vue-resource';
import SPA_CONFIG from './spaConfig';
import Vue from 'vue';

Vue.http.options.root = SPA_CONFIG.API_URL;

export class Jwt {
    static accessToken(username, password) {
        Vue.http.post('access_token', {username, password});
    }

    static logout() {
        Vue.http.post('logout');
    }
}

// export {
//
// };