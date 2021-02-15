<template>
  <v-app>
    <v-col align="center" justify="center">
      Product or category information display
    </v-col>
    <v-divider></v-divider>
    <v-row class="ml-5">
      <v-card class="mx-5 mt-7" max-width="30vh" max-height="30vh">
        first card
        <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg" />
      </v-card>
      <v-card class="mx-2 mt-7" max-width="30vh" max-height="30vh">
        first card
        <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg " />
      </v-card>
      <v-card class="mx-2 mt-7" max-width="30vh" max-height="30vh">
        first card
        <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg" />
        <v-checkbox v-model="enabled"> </v-checkbox>
      </v-card>
    </v-row>
    <v-row class="mx-5 mb-3">
      <v-btn> Previous Step </v-btn>
      <v-spacer></v-spacer>
      <v-btn @click="showpool" :disabled="!enabled"> Next Step </v-btn>
    </v-row>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      enabled: false,
    };
  },
};
</script>
<style scoped>
#app {
  background-color: white;
}
</style>
