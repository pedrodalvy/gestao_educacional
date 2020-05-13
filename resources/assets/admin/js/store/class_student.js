import 'vue-resource';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    students: []
};

const mutations = {
    set(state, students){
        state.students = students;
    }
};

const actions = {
    query(context, classInformationId) {
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/classinformation/${classInformationId}/students`)
            .then( response => {
                context.commit('set', response.data);
            })
    }
};

const module = {
    namespaced: true,
    state, mutations, actions
}

export default module;