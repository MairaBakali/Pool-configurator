<template>
  <v-app>
    <div>
      <v-app-bar
        height="100%"
        src="https://i.ibb.co/g9XQyF4/Adobe-Stock-872969-2x.jpg"
        alt="Adobe-Stock-872969-2x"
      >
        <template v-slot:img="{ props }">
          <v-img
            v-bind="props"
            gradient="to right, white,rgba(255,255,255,0.96),rgba(202, 231, 245, 0.8),transparent "
          ></v-img>
        </template>

        <div class="appbar-img">
          <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg" />
        </div>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">
          <v-btn large rounded color="#EF7D01" class="white--text">
            <v-icon color="white">mdi-format-list-bulleted</v-icon>
            <span class="ml-2 mb-1 recommendation_button_text">
              Unsere Setempfehlungen
            </span>
          </v-btn>
          <v-btn large rounded color="#EF7D01" class="white--text mr-8 ml-6">
            <v-icon color="white">mdi-help-circle-outline</v-icon>
            <span class="ml-2 mb-1 recommendation_button_text">
              Benotigen Sie Hilfe?
            </span>
          </v-btn>
        </div>
      </v-app-bar>
    </div>
    <h1 class="summary">ZUSAMMENFASSUNG</h1>
    <v-main>
      <v-col v-for="item in summary" :key="item.name">
        <v-toolbar width="100%" color="#efefef">
          <div class="category">
            <h4>{{ item.name }}</h4>
          </div>
          <v-spacer></v-spacer>
          <v-icon large class="ml-12 hidden-xs-only" color="#ef7d01"
            >mdi-thumb-up</v-icon
          >
          <v-btn icon class="hidden-sm-and-up">
            <v-icon>mdi-chevron-down</v-icon>
            <v-expand-transition> </v-expand-transition>
          </v-btn>
        </v-toolbar>
        <div>
          <v-container class="container hidden-xs-only">
            <v-row>
              <v-col cols="3">
                <v-img :src="item.image"></v-img>
                <v-btn medium class="editbutton mt-5" rounded outlined>
                  <v-icon color="black">mdi-pencil</v-icon>
                  <h4>Ändern</h4>
                </v-btn>
              </v-col>
              <v-col>
                <v-card-text class="text">
                  Category 1 item description Lorem ipsum dolor sit, amet
                  consectetur adipisicing elit. Asperiores consequatur deleniti
                  facere sint molestiae ducimus non quasi excepturi et!
                  Mollitia, illo? Culpa dignissimos, voluptatum incidunt
                  pariatur amet minus dolorum harum.
                </v-card-text>
              </v-col>
            </v-row>
          </v-container>
        </div>
      </v-col>
      <v-col> </v-col>
    </v-main>
  </v-app>
</template>

<script>
import config from "../views/config.vue";
export default {
  data() {
    return {
      summary: [
        {
          name: "GRUNDFLÄCHE",
          image: "https://i.ibb.co/Jz9B63W/groundimage.png",
        },
        {
          name: "SCHWIMMBECKEN",
          image: "https://i.ibb.co/Jz9B63W/groundimage.png",
        },
        {
          name: "FILTER UND ZUBEHÖR",
          image: "https://i.ibb.co/Jz9B63W/groundimage.png",
        },
      ],
      cardstyles: {
        height: "7vh",
        color: "#efefef",
        width: "100%",
      },
    };
  },
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
<style scoped >
body {
  height: 100vh;
  width: 100vw;
}
.summary {
  font-size: 4vh;
  font-size: 4vw;
  text-align: center;
  color: #ef7d01;
  font-weight: bolder;
  font-family: system-ui;
  letter-spacing: 0;
  margin-top: 2%;
}
.category {
  width: 100%;
  text-align: center;
  position: absolute;
  /* left: 40%; */
  height: 100%;
  /* right: 40%; */
  font-size: larger;
}
.text {
  font-size: large;
}
.category h4 {
  margin-top: 2vh;
  font-weight: bold;
  color: #444444;
}
.title {
  color: #ef7d01;
  text-align: center;
}
.recommendation_button_text {
  text-transform: capitalize;
  font-weight: 600;
  font-size: 0.8rem;
}
.container {
  border: 2px solid black;
  width: 70%;
}

.appbar-img {
  margin-top: 15px;
  max-width: 120px;
  width: 100%;
}
.editbutton {
  border: 1px solid #807f7f;
}
.editbutton h4 {
  color: #707070;
  font-size: 15px;
  text-transform: capitalize;
}
</style>
