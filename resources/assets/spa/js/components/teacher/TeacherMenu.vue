<template src="../templates/menu.htm"></template>

<script>

    export default {
        data() {
            return {
                menus: [
                    {name: "Minhas Turmas", routeName: 'class_informations.list'}
                ],
                brandRouteName: 'class_informations.list'
            }
        }
    };
</script>
