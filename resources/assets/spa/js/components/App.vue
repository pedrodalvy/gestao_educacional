<template>
    <div>
        <teacher-menu class="mb-2"></teacher-menu>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import TeacherMenuComponent from './teacher/TeacherMenu.vue';

    export default {
        components: {
            'teacher-menu': TeacherMenuComponent,
        }
    }
</script>

<style scoped>

</style>