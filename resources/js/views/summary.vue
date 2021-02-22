<template>
  <v-app>
    <h1>SUMMARY</h1>
    <v-main>
      <v-card width="1300px" color="#fcfcfc">
        Category 1

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-icon>mdi-thumb-up</v-icon>
        </v-card-actions>
      </v-card>
      <v-card-text>
        Category 1 item description Lorem ipsum dolor sit, amet consectetur
        adipisicing elit. Asperiores consequatur deleniti facere sint molestiae
        ducimus non quasi excepturi et! Mollitia, illo? Culpa dignissimos,
        voluptatum incidunt pariatur amet minus dolorum harum.
      </v-card-text>
      <v-card width="1300px" color="#fcfcfc">
        Category 2
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-icon>mdi-thumb-up</v-icon>
        </v-card-actions>
      </v-card>
      <v-card-text>
        Category 2 item description Lorem ipsum dolor sit, amet consectetur
        adipisicing elit. Asperiores consequatur deleniti facere sint molestiae
        ducimus non quasi excepturi et! Mollitia, illo? Culpa dignissimos,
        voluptatum incidunt pariatur amet minus dolorum harum.
      </v-card-text>
    </v-main>
  </v-app>
</template>

<script>
import config from "../views/config.vue";
export default {
  components: {
    config,
  },
  methods: {
    getPool(pool) {
      console.log(pool);
    },
  },
};
</script>
