<template>
    <div>
        <div class="form-group form-group-lg">
            <label class="control-label" for="students">Selecione um estudante</label>
            <select class="form-control select2-single" id="students" name="students"></select>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th class="delete_column"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students">
                <td>{{ student.user.name }}</td>
                <td>
                    <button @click="destroy(student)" class="btn btn-danger btn-sm ml-auto btn-icon-split"
                            type="button">
                        <span class="icon"><trash-2-icon class="custom-class" size="1x"></trash-2-icon></span>
                        <span class="text d-none d-md-block">Remover</span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    import 'select2';
    import 'select2/dist/js/i18n/pt-BR';
    import {Trash2Icon} from 'vue-feather-icons';

    export default {
        props: [
            'classInformation'
        ],
        components: {
            Trash2Icon
        },
        computed: {
            students() {
                return store.state.classStudent.students
            }
        },
        mounted() {
            // Preenche a tabela com a lista de estudantes
            store.dispatch('classStudent/query', this.classInformation);

            // Cria o select2 para pesquisa de estudantes
            $(".select2-single").select2({
                ajax: {
                    url: `${ADMIN_CONFIG.API_URL}/students`,
                    dataType: 'json',
                    delay: 250,
                    data(params) {
                        return {
                            q: params.term
                        }
                    },
                    processResults(data) {
                        return {
                            results: data.map(student => {
                                return {id: student.id, text: student.user.name}
                            })
                        }
                    }
                },
                // configs do select2
                theme: "bootstrap4",
                minimumInputLength: 1,
                language: "pt-BR",
                width: 'resolve',
            });

            // Insere o aluno na turma
            let self = this;
            $(".select2-single").on('select2:select', event => {
                store.dispatch('classStudent/store', {
                    studentId: event.params.data.id,
                    classInformationId: self.classInformation
                }).then(() => {
                    Toastr["success"]("Aluno adicionado com sucesso");
                }).catch(error => {
                    Toastr["error"](error.data.errors.student_id[0]);
                })
            });
        },
        methods: {
            destroy(student) {
                if (confirm('Deseja excluir este aluno?')) {
                    store.dispatch('classStudent/destroy', {
                        studentId: student.id,
                        classInformationId: this.classInformation
                    }).then(() => {
                        Toastr["success"]("Aluno removido com sucesso")
                    });
                }
            }
        }
    }
</script>

<style scoped>
    .delete_column {
        width: 11%;
    }
</style>