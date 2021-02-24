<template>
  <v-app>
    <div class="hero1">
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
          <h4 class="title1">Willkommen im Cranpool Konfigurator</h4>
          <v-spacer></v-spacer>
          <v-btn rounded color="#ef7d01" class="white--text">
            <v-icon white>mdi-help-circle-outline</v-icon>
            <span class="ml-2">Benotigen Sie Hilfe? </span>
          </v-btn>
        </v-app-bar>
      </div>
      <v-main>
        <div>
          <v-row>
            <v-col class="my-1" cols="5">
              <v-card
                flat
                active-class="red"
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2"> SIE IHR BUDGET FEST</span>
                  <v-spacer></v-spacer>
                  <v-btn @click="show = !show" icon color="black">
                    <v-icon>
                      {{ show ? "mdi-chevron-up" : "mdi-chevron-down" }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
              <v-expand-transition>
                <div v-show="show">
                  Budget
                  <v-btn
                    @click="
                      enablesecondstep();
                      show = !show;
                      showground = !showground;
                    "
                    >Next</v-btn
                  >
                </div>
              </v-expand-transition>
              <v-card
                flat
                :active-class="cardstyle.active"
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
                :disabled="!budgetcomplete"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2">GRUNDFLÄCHE BESTIMMEN</span>
                  <v-spacer></v-spacer>
                  <v-btn @click="showground = !showground" icon color="black">
                    <v-icon>
                      {{
                        showground ? "mdi-chevron-up" : "mdi-chevron-down"
                      }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
              <v-expand-transition>
                <div v-show="showground">GROUND SPACE</div>
              </v-expand-transition>
              <v-card
                :disabled="!groundcomplete"
                flat
                active-class="red"
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2"> SCHWIMMBECKEN AUSWÄHLEN</span>
                  <v-spacer></v-spacer>
                  <v-btn @click="showpool = !showpool" icon color="black">
                    <v-icon>
                      {{
                        showpool ? "mdi-chevron-up" : "mdi-chevron-down"
                      }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
              <v-expand-transition>
                <div v-show="showpool">POOL</div>
              </v-expand-transition>
              <v-card
                :disabled="!poolcomplete"
                flat
                active-class="red"
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2"> FILTER UND ZUBEHÖR</span>
                  <v-spacer></v-spacer>
                  <v-btn @click="showfilters = !showfilters" icon color="black">
                    <v-icon>
                      {{
                        showfilters ? "mdi-chevron-up" : "mdi-chevron-down"
                      }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
              <v-expand-transition>
                <div v-show="showfilters">Filter</div>
              </v-expand-transition>
              <v-card
                flat
                :disabled="!filtercomplete"
                active-class="red"
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2"> SERVICE- UND MONTAGEOPTIONEN</span>
                  <v-spacer></v-spacer>
                  <v-btn @click="showservice = !showservice" icon color="black">
                    <v-icon>
                      {{
                        showservice ? "mdi-chevron-up" : "mdi-chevron-down"
                      }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
              <v-expand-transition>
                <div v-show="showservice">Services</div>
              </v-expand-transition>
            </v-col>
            <v-col cols="7">
              <div v-show="show">budget slider</div>
              <div v-show="showground">
                <v-row class="mt-12 text--center">
                  <span class="text"
                    >Diese pools haben sich andere kunden angesehen:</span
                  >
                </v-row>
                <v-row>
                  <v-col
                    sm="6"
                    md="4"
                    v-for="products in product"
                    :key="product.name"
                  >
                    <v-card class="my-10" height="221" width="231" outlined>
                      <v-card-actions>
                        <v-checkbox :value="products.id" v-model="pool">
                        </v-checkbox>
                      </v-card-actions>
                      <v-img :src="products.media" height="118" />
                      <v-card-title>{{ products.name }}</v-card-title>
                      <v-card-subtitle>{{ products.price }}</v-card-subtitle>
                    </v-card>
                  </v-col>
                  <v-btn
                    @click="
                      enablethirdstep();
                      showground = !showground;
                      showpool = !showpool;
                    "
                  >
                    Next</v-btn
                  >
                </v-row>
              </div>
              <div v-show="showpool">
                <v-row class="mt-12 text--center">
                  <span class="text">POOL DISPLAY:</span>
                </v-row>
                <v-btn
                  @click="
                    enablefourthstep();
                    showpool = !showpool;
                    showfilters = !showfilters;
                  "
                >
                  NEXT</v-btn
                >
              </div>
              <div v-show="showfilters">
                <v-row class="mt-12 text--center">
                  <span class="text">Filters Display</span>
                </v-row>
                <v-btn
                  @click="
                    enablefifthstep();
                    showfilters = !showfilters;
                    showservice = !showservice;
                  "
                >
                  NEXT</v-btn
                >
              </div>
              <div v-show="showservice">
                <v-row class="mt-12 text--center">
                  <span class="text">SERVICE Display</span>
                </v-row>
                <v-btn to="/summary"> NEXT</v-btn>
              </div>
            </v-col>
          </v-row>
        </div>
      </v-main>
    </div>
  </v-app>
</template>
<script>
const axios = require("axios");
export default {
  data() {
    return {
      product: [],
      accessories: [],
      pool: "",
      show: false,
      cardstyle: {
        color: "#EFEFEF",
        wdth: "100%",
        ht: "9vh",
      },
      showground: false,
      showpool: false,
      showfilters: false,
      showservice: false,
      budgetcomplete: false,
      groundcomplete: false,
      poolcomplete: false,
      filtercomplete: false,
    };
  },
  methods: {
    getProducts() {
      axios.get("./api/products").then((response) => {
        this.product = response.data;
      });
    },
    getAccessories() {
      axios.get("./api/product/accessories").then((response) => {
        this.accessories = response.data;
      });
    },
    enablesecondstep() {
      return (this.budgetcomplete = true);
    },
    enablethirdstep() {
      return (this.groundcomplete = true);
    },
    enablefourthstep() {
      return (this.poolcomplete = true);
    },
    enablefifthstep() {
      return (this.filtercomplete = true);
    },
    homepage() {
      this.$router.push("/");
    },
  },
  mounted() {
    this.getProducts();
    this.getAccessories();
  },
};
</script>
<style scoped>
body {
  width: 100vw;
  height: 100vh;
  overflow: scroll;
  font-family: "Lato", sans-serif;
  overflow-x: scroll;
}
.text {
  color: dodgerblue;
  text-align: center;
  font-size: 20px;
  margin-left: 20%;
}
.title1 {
  color: #ef7d01;
  font-weight: bold;
  margin-left: 30px;
}
</style>
