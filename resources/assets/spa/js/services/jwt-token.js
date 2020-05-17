import {Jwt} from './resources';
import localStorage from "./localstorage";

export default {
    get token() {
        return localStorage.get('token');
    },
    set token(value) {
        localStorage.set('token', value);
    },
    accessToken(username, password) {
        return Jwt.accessToken(username, password)
            .then(response => {
                this.token = response.data.token;
            });
    },
    revokeToken() {
        return Jwt.logout();
    }
};