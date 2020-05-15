import {ClassStudent} from "../services/resources";
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    students: []
};

const mutations = {
    add(state, student) {
        state.students.push(student);
    },
    set(state, students) {
        state.students = students;
    }
};

const actions = {
    query(context, classInformationId) {
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/classinformation/${classInformationId}/students`)
            .then(response => {
                context.commit('set', response.data);
            })
    },
    store(context, {studentId, classInformationId}) {
        return ClassStudent.save({classinformation: classInformationId}, {student_id: studentId})
            .then(response => {
                context.commit('add', response.data)
            })
    },
};

const module = {
    namespaced: true,
    state, mutations, actions
}

export default module;