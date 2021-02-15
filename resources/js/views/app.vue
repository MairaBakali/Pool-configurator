<template>
  <v-app>
    <myheader />
    <v-main> </v-main>
  </v-app>
</template>
<script>
import myheader from "../components/myheader.vue";
import configurator from "../components/configurator.vue";
import Mainsheet from "../components/mainsheet.vue";
export default {
  components: {
    myheader,
    configurator,
    Mainsheet,
  },
};
</script>
<style >
@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap");
</style>
