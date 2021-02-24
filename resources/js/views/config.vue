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
