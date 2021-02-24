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
      </v-app-bar>
    </div>
    <v-main>
      <div>
        <v-row no-gutters>
          <!-- This is the category column -->
          <div class="category">
            <v-card
              flat
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
            >
              <v-card-actions>
                <v-card-text @click="show = !show">Budget </v-card-text>
                <v-spacer></v-spacer>
                <v-btn @click="show = !show" depressed color="#EFEFEF">
                  <v-icon>
                    {{ show ? "mdi-chevron-up" : "mdi-chevron-down" }}
                  </v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
            <v-expand-transition>
              <div v-show="show">
                <v-divider></v-divider>

                <v-range-slider
                  v-model="range"
                  :max="max"
                  :min="min"
                  hide-details
                  class="align-center"
                >
                  <template v-slot:prepend>
                    <v-text-field
                      :value="range[0]"
                      class="mt-0 pt-0"
                      hide-details
                      single-line
                      type="number"
                      style="width: 60px"
                      @change="$set(range, 0, $event)"
                    ></v-text-field>
                  </template>
                  <template v-slot:append>
                    <v-text-field
                      :value="range[1]"
                      class="mt-0 pt-0"
                      hide-details
                      single-line
                      type="number"
                      style="width: 60px"
                      @change="$set(range, 1, $event)"
                    ></v-text-field>
                  </template>
                </v-range-slider>
                <br />
                <v-spacer></v-spacer>
                <v-btn
                  @click="
                    enablesecondstep();
                    show = !show;
                    showsize = !showsize;
                  "
                  >Next</v-btn
                >
              </div>
            </v-expand-transition>
            <v-card
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
              :disabled="!budgetcomplete"
            >
              <v-card-actions>
                <v-card-text
                  @click="
                    component = 'gardensize';
                    showsize = !showsize;
                  "
                  >CATEGORY 2</v-card-text
                >
                <v-spacer></v-spacer>
                <v-btn
                  @click="
                    component = 'gardensize';
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

                <v-card-text> Category display will be here </v-card-text>
              </div>
            </v-expand-transition>
            <v-card
              :height="cardstyle.ht"
              :width="cardstyle.wdth"
              :color="cardstyle.color"
              :disabled="!step2complete"
            >
              <v-card-actions>
                <v-card-text @click="showpool = !showpool"
                  >CATEGORY 3</v-card-text
                >
                <v-spacer></v-spacer>
                <v-btn @click="showpool = !showpool" depressed color="#EFEFEF">
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
            <div v-show="showsize">
              <v-app>
                <v-col align="center" justify="center">
                  Product or category information display
                  <h4>Your selected Item in Category 2 is {{ accessories }}</h4>
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
                    <v-checkbox
                      :value="item.id"
                      @click="disabledbutton2"
                      v-model="accessories"
                    >
                    </v-checkbox>
                  </v-card>

                  {{ accessories }}
                </v-row>
                <v-row class="mx-5 mb-3">
                  <v-btn
                    @click="
                      show = !show;
                      showpool = !showpool;
                    "
                  >
                    Previous Step
                  </v-btn>
                  <v-spacer></v-spacer>
                  <v-btn
                    @click="
                      enablelaststep();
                      showsize = !showsize;
                      showpool = !showpool;
                    "
                    :disabled="!enabled"
                  >
                    Next Step
                  </v-btn>
                </v-row>
              </v-app>
            </div>
            <div v-show="showpool">
              <v-app>
                <v-col align="center" justify="center">
                  Product or category information display
                  <h4>Your selected Item in category 3 is {{ pool }}</h4>
                </v-col>
                <v-divider></v-divider>
                <v-row class="ml-5">
                  <v-card
                    v-for="item in products"
                    :key="item"
                    class="mx-5 mt-7"
                    max-width="30vh"
                    max-height="30vh"
                  >
                    {{ item.name }}
                    <v-img :src="item.media" />
                    <v-checkbox
                      :value="item.id"
                      @click="disabledbutton"
                      v-model="pool"
                    >
                    </v-checkbox>
                  </v-card>

                  {{ pool }}
                </v-row>
                <v-row class="mx-5 mb-3">
                  <v-btn
                    @click="
                      showpool = !showpool;
                      showsize = !showsize;
                    "
                  >
                    Previous Step
                  </v-btn>
                  <v-spacer></v-spacer>
                  <v-btn to="/summary" @click="alertfunc" :disabled="!enabled">
                    Next Step
                  </v-btn>
                </v-row>
              </v-app>
            </div>
          </div>
        </v-row>
      </div>
    </v-main>
  </v-app>
</template>
<script>
const axios = require("axios");
import myheader from "../components/myheader.vue";
import gardensize from "../components/gardensize.vue";
import budget from "../components/budget.vue";
export default {
  data() {
    return {
      min: 0,
      max: 10000,
      range: [0, 10000],
      products: [],
      productsaccessories: [],
      pool: "",
      accessories: "",
      e6: 1,
      show: false,
      enabled: false,
      budgetcomplete: false,
      step2complete: false,
      showsize: false,
      showpool: false,
      toggle_exclusive: undefined,
      cardstyle: {
        activecolor: "blue",
        color: "#EFEFEF",
        wdth: "40vw",
        ht: "9vh",
      },
    };
  },
  methods: {
    homepage() {
      this.$router.push("/");
    },
    disabledbutton() {
      this.enabled = false;
      if (this.pool) {
        return (this.enabled = true);
      }
    },
    disabledbutton2() {
      this.enabled = false;
      if (this.accessories) {
        return (this.enabled = true);
      }
    },

    checkinput() {
      if (this.pool) {
        console.log(this.pool);
      }
    },
    getProducts() {
      axios.get("./api/products").then((response) => {
        this.products = response.data;
      });
    },
    getProductsaceesories() {
      axios.get("./api/product/accessories").then((response) => {
        this.productsaccessories = response.data;
      });
    },
    enablelaststep() {
      return (this.step2complete = true);
    },
    enablesecondstep() {
      return (this.budgetcomplete = true);
    },
    alertfunc() {
      alert("Items selected successfully");
    },
  },
  mounted() {
    this.getProducts();
    this.getProductsaceesories();
  },
  emit() {
    this.$emit("pool");
  },
  components: {
    gardensize,
    myheader,
    budget,
  },
};
</script>
<style scoped>
body {
  width: 100vw;
  height: 100vh;

  font-family: "Lato", sans-serif;
}
.cardstyle {
  color: #efefef;
}
.category {
  background-color: #fcfcfc;
  width: 40vw;
  height: 100vh;
}
.item {
  background-color: #ffffff;
}
</style>
