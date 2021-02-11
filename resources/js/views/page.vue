<template>
<v-app>
  <v-toolbar dense  max-height="100">
    <h1 class="display-1" >
      Configurator
    </h1>
    <v-spacer></v-spacer>
    <v-btn to="main" small rounded depressed>
      Exit Configuration
    </v-btn>
  </v-toolbar>
    <v-main>
      <v-row>
      <v-col>
            <v-card class="my-2"  height="150" color="grey" width="250">
              Garden Size
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn depressed x-small @click="component ='gardensize'">select</v-btn>
              </v-card-actions>
            </v-card>

            <v-card class="my-2"  height="150" color="grey" width="250">
              PoolBase
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn depressed x-small @click="component ='poolbase'">select</v-btn>
              </v-card-actions>
            </v-card>
            <v-card class="my-2" height="150" color="grey" width="250">
              Addons
              <v-card-actions>

                <v-spacer></v-spacer>
                <v-btn depressed x-small @click="component ='addons'">select</v-btn>
              </v-card-actions>
            </v-card>
            <v-spacer></v-spacer>
                  <v-btn to="checkout" dark small rounded >
          Checkout
        </v-btn>

      </v-col>
      <v-col md="8">
        <component :is=component ></component>

      </v-col>

      </v-row>


      <!-- <component :is=component ></component>
      <v-btn @click="component ='gardensize'" class="display-3">Garden Size</v-btn>
      <v-btn @click="component='poolbase'" class="display-3">Pool Base</v-btn>
      <v-btn @click="component='addons'" class="display-3">AddOns</v-btn> -->


    </v-main>
</v-app>
</template>
<script>
import gardensize from '../components/gardensize.vue'
import poolbase from '../components/PoolBase.vue'
import addons from '../components/addons.vue'
export default {
  components :{
    gardensize,
    poolbase,
    addons
  },
  data(){
    return{
      component : "gardensize"
    }
  }
}
</script>
