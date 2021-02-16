<template>
  <v-app>
    <div>
      <v-app-bar
        height="120px"
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
      </v-app-bar>
    </div>
    <v-main>
      <div>
        <v-row no-gutters>
          <!-- This is the category column -->
          <div v-model="e6" class="category">
              <v-stepper-step :complete
            <v-card
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
            >
              <v-card-actions>
                <v-card-text @click="show = !show"
                  >LEGEN SIE IHR BUDGET FEST</v-card-text
                >
                <v-spacer></v-spacer>
                <v-btn
                  @click="show = !show;
                  "
                  depressed
                  color="#EFEFEF"
                >
                  <v-icon>
                    {{ show ? "mdi-chevron-up" : "mdi-chevron-down" }}
                  </v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
            <v-expand-transition>
              <div v-show="show">
                <v-divider></v-divider>

                <v-card-text> Budget Card </v-card-text>
              </div>
            </v-expand-transition>
            <v-card
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
            >
              <v-card-actions>
                <v-card-text @click="component = 'gardensize';showsize = !showsize"
                  >GRUNDFLÄCHE BESTIMMEN</v-card-text
                >
                <v-spacer></v-spacer>
                <v-btn
                  @click="
                    component = 'budget';
                    showsize = !showsize;
                  "
                  depressed
                  color="#EFEFEF"
                >
                  <v-icon>
                    {{ showsize ? "mdi-chevron-up" : "mdi-chevron-down" }}
                  </v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
            <v-expand-transition>
              <div v-show="showsize">
                <v-divider></v-divider>

                <v-card-text> Budget Card </v-card-text>
              </div>
            </v-expand-transition>
            <v-card
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
            >
              <v-card-actions>
                <v-card-text @click="showpool = !showpool"
                  >LEGEN SIE IHR BUDGET FEST</v-card-text
                >
                <v-spacer></v-spacer>
                <v-btn
                  @click="
                    component = 'addons';
                    showpool = !showpool;
                  "
                  depressed
                  color="#EFEFEF"
                >
                  <v-icon>
                    {{ showpool ? "mdi-chevron-up" : "mdi-chevron-down" }}
                  </v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
            <v-expand-transition>
              <div v-show="showpool">
                <v-divider></v-divider>

                <v-card-text> Budget Card </v-card-text>
              </div>
            </v-expand-transition>
          </div>
          <div class="item">
            <component :is="component"></component>
          </div>
        </v-row>
      </div>
    </v-main>
  </v-app>
</template>
<script>
import myheader from "../components/myheader.vue";
import gardensize from "../components/gardensize.vue";
import budget from "../components/budget.vue";
import addons from "../components/addons.vue";
export default {
  data() {
    return {
      e6: 1,
      show: false,
      showsize: false,
      showpool: false,
      toggle_exclusive: undefined,
      cardstyle: {
        color: "#EFEFEF",
        wdth: "40vw",
        ht: "8.4vh",
      },
      component: "gardensize",
    };
  },
  methods: {
    homepage() {
      this.$router.push("/home");
    },
  },
  components: {
    gardensize,
    myheader,
    budget,
    addons,
  },
};
</script>
<style scoped>
#app {
  background: white;
}
.cardstyle {
  color: #efefef;
}
.category {
  background-color: #fcfcfc;
  width: 40vw;
}
.item {
  height: fit-content;
  background-color: #ffffff;
}
</style>
