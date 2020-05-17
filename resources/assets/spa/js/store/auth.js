import {Jwt} from '../services/resources';

const state = {
    user: null,
    check: null
}

const mutations = {
    authenticated(state) {

    },
    unauthenticated(state) {

    }
}

const actions = {
    login(context, {username, password}) {
        return Jwt.accessToken(username, password);
    },
    logout() {
        return Jwt.logout();
    }
}

const module = {
    namespaced: true,
    state, mutations, actions
}

export default module;