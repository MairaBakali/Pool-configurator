<template>
  <v-app>
    <v-row>
      <v-col cols="5">
        <div class="filters">
          <v-stepper
            v-model="e6"
            vertical
            v-for="(item, i) in filters"
            :key="i"
          >
            <v-stepper-step :complete="e6 > i" step="i">
              {{ item.name }}
            </v-stepper-step>
            <v-stepper-content step="i">
              <v-card
                color="grey lighten-1"
                class="mb-12"
                height="200px"
              ></v-card>
              <v-btn color="primary" @click="e6 = i + 1"> Continue </v-btn>
              <v-btn text> Cancel </v-btn>
            </v-stepper-content>
          </v-stepper>
          <!-- <v-card
                :disabled="!nextstep"
                flat
                :height="cardstyle.ht"
                :width="cardstyle.wdth"
                :color="cardstyle.color"
              >
                <v-card-actions>
                  <v-icon>mdi-circle</v-icon>
                  <span class="ml-2"> {{ item.name }}</span>

                  <v-spacer></v-spacer>
                  <v-btn @click="enable()">
                    <v-icon>
                      {{ i ? "mdi-chevron-up" : "mdi-chevron-down" }}</v-icon
                    >
                  </v-btn>
                </v-card-actions>
                ></v-card
              >
            </v-list-item>
          </v-list> -->
        </div>
      </v-col>
      <v-col cols="7">
        <div class="right-products">products</div>
      </v-col>
    </v-row>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      e6: 1,
      filters: [
        { name: "LEGEN SIE IHR BUDGET FEST", value: "1" },
        { name: "GRUNDFLÄCHE BESTIMMENT", value: "2" },
        { name: "SCHWIMMBECKEN AUSWÄHLEN", value: "3" },
        { name: "FILTER UND ZUBEHÖR", value: "4" },
        { name: "SERVICE- UND MONTAGEOPTIONEN", value: "5" },
      ],
      cardstyle: {
        color: "#EFEFEF",
        wdth: "100%",
        ht: "9vh",
      },
      nextstep: false,
    };
  },
  methods: {
    enable() {
      return (this.nextstep = true);
    },
  },
};
</script>
