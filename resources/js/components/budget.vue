<template>
  <v-app>
    <v-col align="center" justify="center">
      Product or category information display
      <h4>Your selected Item is {{ pool }}</h4>
    </v-col>
    <v-divider></v-divider>
    <v-row class="ml-5">
      <v-card
        v-for="item in productsaccessories"
        :key="item"
        class="mx-5 mt-7"
        max-width="30vh"
        max-height="30vh"
        min-width="30vh"
      >
        {{ item.name }}
        <v-img :src="item.media" />
        <v-checkbox :value="item.id" @click="disabledbutton" v-model="pool">
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
const axios = require("axios");
export default {
  data() {
    return {
      productsaccessories: [],
      pool: "",
      enabled: false,
    };
  },
  methods: {
    disabledbutton() {
      this.enabled = false;
      if (this.pool) {
        return (this.enabled = true);
      }
    },
    checkinput() {
      if (this.pool) {
        console.log(this.pool);
      }
    },
    getProducts() {
      axios.get("./api/product/accessories").then((response) => {
        this.productsaccessories = response.data;
      });
    },
  },
  mounted() {
    this.getProducts();
  },
};
</script>

