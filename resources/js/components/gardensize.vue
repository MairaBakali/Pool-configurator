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
        <v-checkbox value="item1" @click="disabledbutton" v-model="pool">
        </v-checkbox>
      </v-card>
      <v-card class="mx-2 mt-7" max-width="30vh" max-height="30vh">
        first card
        <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg " />
        <v-checkbox value="item2" @click="disabledbutton" v-model="pool">
        </v-checkbox>
      </v-card>
      <v-card class="mx-2 mt-7" max-width="30vh" max-height="30vh">
        first card
        <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg" />
        <v-checkbox @click="disabledbutton" value="item3" v-model="pool">
        </v-checkbox>
      </v-card>
      {{ pool }}
    </v-row>
    <v-row class="mx-5 mb-3">
      <v-btn> Previous Step </v-btn>
      <v-spacer></v-spacer>
      <v-btn @click="checkinput" :disabled="!enabled"> Next Step </v-btn>
    </v-row>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      pool: "item1",
      enabled: false,
    };
  },
  methods: {
    disabledbutton() {
      this.enabled = false;
      if (this.pool.length > 0) {
        return (this.enabled = true);
      }
    },
    checkinput() {
      if (this.pool) {
        console.log(this.pool);
      }
    },
  },
};
</script>
<style scoped>
#app {
  background-color: white;
}
</style>
