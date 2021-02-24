<template>
  <v-app>
    <div class="hero1">
      <div>
        <v-app-bar
          height="90px"
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
<<<<<<< HEAD
              <div>
                <v-row v-show="show" class="mt-12 text--center">
                  <span class="text">
                    Bitte legen Sie ihr geplantes Budget fest, indem Sie die
                    Schieberegler auf der linken Seite nutzen.
                  </span>
                </v-row>

                <v-row v-show="showground" class="mt-12 text--center">
=======
              <div v-show="show">budget slider</div>

              <div v-show="showground">
                <v-row class="mt-12 text--center">
>>>>>>> b4b3361c7081b9f4edb8e04082ea222067ac9c96
                  <span class="text"
                    >Diese pools haben sich andere kunden angesehen:</span
                  >
                </v-row>
                <!-- bundleProduct start -->
                <v-row>
<<<<<<< HEAD
                  <v-col
                    sm="6"
                    md="4"
                    v-for="(bundleProduct, index) in bundleProducts"
                    :key="index"
                  >
                    <v-card class="my-10" height="221" width="231" outlined>
                      <v-card-actions>
                        <v-checkbox
                          :value="index"
                          @change="getSelectedBundleIndex(index)"
                        >
                        </v-checkbox>
                      </v-card-actions>
                      <v-img
                        :src="bundleProduct.base_product.media.split('~')[0]"
                        height="118"
                      />
                      <v-card-title>{{
                        bundleProduct.base_product.name
                      }}</v-card-title>
                      <v-card-subtitle>{{
                        bundleProduct.base_product.price
                      }}</v-card-subtitle>
                    </v-card>
                  </v-col>
                </v-row>
                <!-- bundleProduct end -->
=======
                  <v-col sm="6" md="4" v-for="(bundleProduct,index) in bundleProducts" :key="index">
                    <v-card class="my-10" height="221" width="231" outlined>
                      <v-card-actions>
                        <v-checkbox :value="index" @change="getSelectedBundleIndex(index)">
                        </v-checkbox>
                      </v-card-actions>
                      <v-img :src="bundleProduct.base_product.media.split('~')[0]" height="118" />
                      <v-card-title>{{ bundleProduct.base_product.name }}</v-card-title>
                      <v-card-subtitle>{{ bundleProduct.base_product.price }}</v-card-subtitle>
                    </v-card>
                  </v-col>
                  <v-btn @click="enablethirdstep(); showground = !showground; showpool = !showpool;">
                    Next
                  </v-btn>
                </v-row>
                <!-- bundleProduct end -->
              </div>

              <div v-show="showpool">
                <v-row class="mt-12 text--center">
                  <span class="text">POOL DISPLAY:</span>
                </v-row>
                <v-btn @click=" enablefourthstep(); showpool = !showpool; showfilters = !showfilters;">
                  NEXT
                  </v-btn>
              </div>

              <div v-show="showfilters">
                <v-row class="mt-12 text--center">
                  <span class="text">Filters Display</span>
                </v-row>
                <v-btn @click="enablefifthstep(); showfilters = !showfilters; showservice = !showservice;">
                  NEXT
                </v-btn>
              </div>

              <div v-show="showservice">
                <v-row class="mt-12 text--center">
                  <span class="text">SERVICE Display</span>
                </v-row>
                <v-btn to="/summary"> NEXT</v-btn>
>>>>>>> b4b3361c7081b9f4edb8e04082ea222067ac9c96
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
<<<<<<< HEAD
      min: 0,
      max: 10000,
      range: [0, 10000],
      bundleProducts: [],
      selectedBundleIndex: [],
      show: true,
=======
      bundleProducts: [],
      selectedBundleIndex: [],
      show: false,
>>>>>>> b4b3361c7081b9f4edb8e04082ea222067ac9c96
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
    getBundleProducts() {
      axios.get("./api/bundle-product").then((response) => {
        console.log(response.data);
        this.bundleProducts = response.data.data;
      });
    },
    enablesecondstep() {
      return (this.budgetcomplete = true);
    },
    enablethirdstep() {
<<<<<<< HEAD
      console.log(this.selectedBundleIndex);
=======
      console.log(this.selectedBundleIndex);
>>>>>>> b4b3361c7081b9f4edb8e04082ea222067ac9c96
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
    getSelectedBundleIndex(index) {
<<<<<<< HEAD
      if (this.selectedBundleIndex.includes(index)) {
        let position = this.selectedBundleIndex.indexOf(index);
        this.selectedBundleIndex.splice(position, 1);
      } else {
        this.selectedBundleIndex.push(index);
      }
    },
  },
  mounted() {
    this.getBundleProducts();
();
 30px;
=======
      if (this.selectedBundleIndex.includes(index)){
        let position = this.selectedBundleIndex.indexOf(index);
        this.selectedBundleIndex.splice(position, 1);
      }
      else {
        this.selectedBundleIndex.push(index);
      }
    },

  },
  mounted() {
    this.getBundleProducts();
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
>>>>>>> b4b3361c7081b9f4edb8e04082ea222067ac9c96
}
</style>
