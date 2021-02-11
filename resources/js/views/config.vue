<template>
    <v-app config>
        <myheader/>
        <v-main>

        </v-main>
    </v-app>
</template>
<script>
import myheader from '../components/myheader.vue'
export default {
    name: 'config',
    components: {
        myheader
    }
}
</script>
<style scoped>
#config{
    background-color:antiquewhite;
}
</style>
