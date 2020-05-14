<template>
    <div>
        <div class="form-group">
            <label class="control-label" for="students">Selecionar estudante</label>
            <select class="form-control" id="students" name="students"></select>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students">
                <td>Excluir</td>
                <td>{{ student.user.name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    import 'select2';

    export default {
        props: [
            'classInformation'
        ],
        computed: {
            students() {
                return store.state.classStudent.students
            }
        },
        mounted() {
            // Preenche a tabela com a lista de estudantes
            store.dispatch('classStudent/query', this.classInformation);

            // Cria o select2 para pesquisa de estudantes
            $("select[name=students]").select2({
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
                minimumInputLength: 1,
            });
        }
    }
</script>

<style scoped>

</style>