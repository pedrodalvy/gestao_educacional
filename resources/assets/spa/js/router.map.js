export default [
    {
        name: 'class_informations.list',
        path: '/classes',
        components: require('./components/teacher/TeacherClassInformationList')
    },
    {
        name: 'login',
        path: '/login',
        components: require('./components/Login')
    },
    {
        path: '*',
        redirect: '/login'
    }
]