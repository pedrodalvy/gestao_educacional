<template>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <form class="form-signin" method="post" @submit.prevent="login()">
                            <div class="text-center mb-4">
                                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                            </div>

                            <div class="form-label-group mb-2">
                                <label for="username">Usuário</label>
                                <input class="form-control" id="username" required type="text"
                                        name="username" v-model="user.username">
                            </div>

                            <div class="form-label-group">
                                <label for="password">Senha</label>
                                <input class="form-control" id="password" required type="password"
                                        name="password" v-model="user.password">
                            </div>

                            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import store from "../store/store";

    export default {
        data() {
            return {
                user: {
                    username: '',
                    password: ''
                }
            }
        },
        methods: {
            login() {
                store.dispatch('auth/login', this.user)
                    .then( () => {
                        this.$router.push({name: 'class_informations.list'});
                    })
            }
        }
    }
</script>

<style scoped>

</style>