<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-lg">
                    <label class="control-label" for="teachers">Selecione um professor</label>
                    <select class="form-control" id="teachers" name="teachers"></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-lg">
                    <label class="control-label" for="subjects">Selecione uma disciplina</label>
                    <select class="form-control" id="subjects" name="subjects"></select>
                </div>
            </div>
        </div>

        <button @click="store()" class="btn btn-primary btn-icon-split mb-3"
                type="button">
            <span class="icon"><plus-circle-icon class="custom-class" size="1.5x"></plus-circle-icon></span>
            <span class="text d-none d-md-block">Adicionar</span>
        </button>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Professor</th>
                <th>Disciplina</th>
                <th class="delete_column"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="teaching in teachings">
                <td>{{ teaching.teacher.user.name }}</td>
                <td>{{ teaching.subject.name }}</td>
                <td>
                    <button @click="destroy(teaching)" class="btn btn-danger btn-sm ml-auto btn-icon-split"
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
    import {Trash2Icon, PlusCircleIcon} from 'vue-feather-icons';

    export default {
        props: [
            'classInformation'
        ],
        components: {
            Trash2Icon,
            PlusCircleIcon
        },
        computed: {
            teachings() {
                return store.state.classTeaching.teachings
            }
        },
        mounted() {
            // Preenche a tabela com a lista de ensinos
            store.dispatch('classTeaching/query', this.classInformation);


            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/teachers`,
                    selector: "select[name=teachers]",
                    processResults(data) {
                        return {
                            results: data.map(teacher => {
                                return {id: teacher.id, text: teacher.user.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/subjects`,
                    selector: "select[name=subjects]",
                    processResults(data) {
                        return {
                            results: data.map(subject => {
                                return {id: subject.id, text: subject.name}
                            })
                        }
                    }
                }
            ];

            // Cria os selects de dentro do array selects
            for(let select of selects) {
                $(select.selector).select2({
                    ajax: {
                        url: select.url,
                        dataType: 'json',
                        delay: 250,
                        data(params) {
                            return {
                                q: params.term
                            }
                        },
                        processResults: select.processResults
                    },
                    // configs do select2
                    theme: "bootstrap4",
                    minimumInputLength: 1,
                    language: "pt-BR",
                    width: 'resolve',
                });
            }
        },
        methods: {
            destroy(teaching) {
                if (confirm('Deseja excluir este ensino?')) {
                    store.dispatch('classTeaching/destroy', {
                        teachingId: teaching.id,
                        classInformationId: this.classInformation
                    }).then(() => {
                        Toastr["success"]("Ensino removido com sucesso")
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