<template>
  <v-app>
    <div>
      <v-app-bar
        height="100px"
        src="https://i.ibb.co/g9XQyF4/Adobe-Stock-872969-2x.jpg"
        alt="Adobe-Stock-872969-2x"
      >
        <template v-slot:img="{ props }">
          <v-img
            v-bind="props"
            gradient="to right, white,rgba(255,255,255,0.96),rgba(202, 231, 245, 0.8),transparent "
          ></v-img>
        </template>
        <div>
          <v-img
            @click="homepage()"
            height="12vh"
            width="9vw"
            contain
            src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg"
            alt="logo"
          />
        </div>
        <h4 class="title">Willkommen im Cranpool Konfigurator</h4>
        <v-spacer> </v-spacer>
        <v-btn rounded color="#EF7D01" class="white--text">
          <v-icon color="white">mdi-menu</v-icon>
          unsere Setempfehlungen</v-btn
        >
        <v-btn rounded color="#EF7D01" class="white--text">
          <v-icon color="white">mdi-help-circle-outline</v-icon>
          Benotigen Sie Hilfe?</v-btn
        >
      </v-app-bar>
    </div>
    <h1 class="summary">SUMMARY</h1>
    <v-main>
      <v-card width="1350px" color="#fcfcfc">
        <h4>Category 1</h4>

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
      <v-card width="1350px" color="#fcfcfc">
        <h4>Category 2</h4>
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
<style >
.summary {
  text-align: center;
  color: #ef7d01;
}
.title {
  color: #ef7d01;
  text-align: center;
}
</style>
