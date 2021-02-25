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
                    <div class="mx-4">
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
          class="mt-0 ml-2 pt-0"
          hide-details
          type="number"
          style="width: 50px"
          @change="$set(range, 0, $event)"
        ></v-text-field>
      </template>
      <template v-slot:append>
        <v-text-field
          :value="range[1]"
          class="mt-0 ml-2 mr-2 pt-0"
          hide-details
          double-line
          type="number"
          style="width: 50px"
          @change="$set(range, 1, $event)"
        ></v-text-field>
      </template>
    </v-range-slider>
                </div>
                <v-card-actions>
                    <v-spacer></v-spacer>
                  <v-btn
                  flat
                  text
                  small
                    @click="
                      enablefourthstep();
                      show = !show;
                      showfilters = !showfilters;
                    "
                    >Next</v-btn
                  >
                  </v-card-actions>
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
              <div v-show="showground">
              <v-expand-transition>
                  <v-col cols="3" v-for="(space,index) in ground " :key="space.name">
                      <v-card active-class="lightblue-text" width="300px"  flat>
                    <v-card-actions>
                      <v-checkbox
                        :value="index"
                        v-model="ground"
                      >
                      </v-checkbox>
                    </v-card-actions>
                    <v-img
                      :src="space.img"
                      width="100%"
                    />

                    <v-card-subtitle>
                      {{space.name}}
                    </v-card-subtitle>
                  </v-card>
                  </v-col>
                  <v-btn @click="enablethirdstep()" small text> Next</v-btn>
              </v-expand-transition>
                    </div>
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

                <div v-show="showfilters">
                     <v-expand-transition>
                    <v-row>
                        <v-col cols="3"
                            v-for="(bundleProduct, index) in bundleProducts"
                  :key="index">
                  <v-card active-class="lightblue-text" width="300px"  flat>
                    <v-card-actions>
                      <v-checkbox
                        :value="index"
                        v-model="filters"
                      >
                      </v-checkbox>
                    </v-card-actions>
                    <v-img
                      :src="bundleProduct.base_product.media.split('~')[0]"
                      width="100%"
                    />

                    <v-card-subtitle>{{
                      bundleProduct.base_product.price
                    }}</v-card-subtitle>
                  </v-card>
                </v-col>
                             </v-row>
                             </v-expand-transition>
                </div>

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
              <div v-show="show">
                <v-row class="mt-12" align="center" justify="center">
                  <v-btn icon color="#ef7d01">
                      <v-icon x-large>mdi-information

                      </v-icon>


                  </v-btn>
                </v-row>
                <v-row  align="center" justify="center">
                  </v-btn>
                  <v-btn
                    class="mt-4 button"
                    small
                    depressed
                    rounded
                    color="#efefef"
                    height="60px"
                  >
                    <p>
                      Bitte legen Sie ihr geplantes Budget fest, indem Sie die
                      Schieberegler auf der linken Seite nutzen.
                    </p>
                  </v-btn>
                </v-row>
              </div>

              <div v-show="!show">
                <v-row class="mt-12 text--center">
                  <span class="text"
                    >Diese items haben sich andere kunden angesehen:</span
                  >

                </v-row>
              </div>
              <!-- bundleProduct start -->
              <v-row>
                <v-col
                  sm="6"
                  md="4"
                  v-for="(bundleProduct, index) in bundleProducts"
                  :key="index"
                >
                  <v-card class="my-10" height="221" width="200" flat>
                    <v-card-actions>
                      <v-checkbox
                        :value="index"
                        @change="getSelectedBundleIndex(index)"
                      >
                      </v-checkbox>
                    </v-card-actions>
                    <v-img
                      :src="bundleProduct.base_product.media.split('~')[0]"
                      width="70%"
                    />
                    <v-card-title class="text--small">{{
                      bundleProduct.base_product.name
                    }}</v-card-title>
                    <v-card-subtitle>{{
                      bundleProduct.base_product.price
                    }}</v-card-subtitle>
                  </v-card>
                </v-col>
              </v-row>
              <v-row>
                  <v-spacer></v-spacer>
                <v-card-actions>
<div v-show>
                <v-btn
                small
                text
                  @click="
                  enablefourthstep();
                     show = !show;
                     showfilters=!showfilters
                  "
                >
                  Next
                </v-btn>
                </div>
                <div v-show="showfilters">
                     <v-btn
                small
                text
                  @click="
                  enablefifthstep();
                     showfilters = !showfilters;
                     showservice=!showservice;
                  "
                >
                  Next
                </v-btn>
                </div>
                <div v-show="showservice">
                     <v-btn
                small
                text
                  to="/summary"
                >
                  Next
                </v-btn>
                </div>
                </v-card-actions>
              </v-row>
               <v-row class="mt-12" align="center" justify="center">
                  <v-btn @click="enablesecondstep();showground=!showground;show=!show" class="configuresets_button" rounded outlined>
                      <v-icon color="#0095d9">mdi-format-list-bulleted</v-icon>
                 <p>  eigenes Set erstellen </p>
                  </v-btn>
              </v-row>

              <!-- bundleProduct end -->



            </v-col>
          </v-row>
        </div>
      </v-main>
    </div>
  </v-app>
</template>

<script>
import About from "./About.vue";
const axios = require("axios");
export default {
  components: { About },
  data() {
    return {
      min: 0,
      max: 1000,
      range: [0, 1000],
      bundleProducts: [],
      selectedBundleIndex: [],
      filters: [],
      ground: [
        { name: "120m", img: "https://i.ibb.co/Jz9B63W/groundimage.png" },
        { name: "250m", img: "https://i.ibb.co/Jz9B63W/groundimage.png" },
        { name: "300m", img: "https://i.ibb.co/Jz9B63W/groundimage.png" },
        { name: "400m", img: "https://i.ibb.co/Jz9B63W/groundimage.png" },
      ],
      show: true,
      cardstyle: {
        color: "#EFEFEF",
        wdth: "100%",
        ht: "9vh",
      },
      ground: "",
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
      console.log(this.selectedBundleIndex);
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
.configuresets_button {
  border: 2px solid #0095d9;
}
.configuresets_button p {
  margin-top: 4%;
  color: #0095d9 !important;
}
.title1 {
  color: #ef7d01;
  font-weight: bold;
  margin-left: 30px;
}
.button p {
  font-size: 15px;
  color: #707070;
  text-transform: capitalize;
  white-space: break-spaces;
}
</style>
