<template>
    <v-app>
         <myheader/>
        <mainsheet />
    </v-app>
</template>
<script>
import myheader from '../components/myheader.vue'
import configurator from '../components/configurator.vue'
import Mainsheet from '../components/mainsheet.vue'
export default {
    components : {
        myheader,
        configurator,
        Mainsheet
    }

}
</script>
