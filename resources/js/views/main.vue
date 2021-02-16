<template id="app">
  <div>
    <v-card
      class="mx-auto mt-4 mb-5"
      align="center"
      width="40vh"
      color="primary"
    >
      Budget Select
      <v-card-actions>
        <v-btn @click="showpool" color="primary"> View Items </v-btn>
      </v-card-actions>
    </v-card>
    <v-card
      class="mx-auto mt-4 mb-5"
      align="center"
      width="40vh"
      color="primary"
    >
      Garden size select
    </v-card>
    <v-card
      class="mx-auto mt-4 mb-5"
      align="center"
      width="40vh"
      color="primary"
      >Pool shape select</v-card
    >
    <v-card
      class="mx-auto mt-4 mb-5"
      align="center"
      width="40vh"
      color="primary"
    >
      Accessories select</v-card
    >
    <div v-show="show">
      <v-divider></v-divider>

      <v-card-text> Budget Additional Display </v-card-text>
      <v-container fluid>
        <p>{{ configure.pool }}</p>
        <v-checkbox v-model="configure.pool" value="John"> </v-checkbox>
        <v-checkbox v-model="configure.pool" value="Jacob"></v-checkbox>
      </v-container>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isActive: false,
      show: false,
      configure: {
        shape: "",
        pool: "",
        filters: [],
      },
    };
  },
  methods: {
    showpool() {
      if (!this.show) {
        this.show = true;
      } else {
        this.show = false;
      }
    },
    toggle() {
      this.isActive = !this.enable;
    },
    func() {
      return "your selected item is ", this.configure.pool;
    },
  },
};
</script>
<style >
</style>
