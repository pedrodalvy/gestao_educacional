<template>
    <div>
        <teacher-menu></teacher-menu>
        <router-view></router-view>
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