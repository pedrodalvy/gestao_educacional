import 'vue-resource';
import SPA_CONFIG from './spaConfig';
import Vue from 'vue';
import JwtToken from './jwt-token.js';

Vue.http.options.root = SPA_CONFIG.API_URL;
Vue.http.interceptors.push((request, next) => {
    if (JwtToken.token) {
        request.headers.set('Authorization', JwtToken.getAuthorizationHeader());
    }
    next();
});

export class Jwt {
    static accessToken(username, password) {
        return Vue.http.post('access_token', {username, password});
    }

    static logout() {
        return Vue.http.post('logout');
    }
}

// export {
//
// };