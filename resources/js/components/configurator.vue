<template>
    <v-app>
        <div class="card_display">
            <div>
            <v-row >
                <v-col>
                    <!-- Filters Block -->
                    <div class="category_display">
                <v-card  max-width="100vh" color="#EFEFEF" >
 <v-card-actions>
     <v-btn @click="showbudget = !showbudget" >
         show me
          <v-icon>{{ showbudget ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
     </v-btn>
 </v-card-actions>
 <v-expand-transition>

      <div v-show="showbudget">
        <v-divider></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="component ='gardensize'" >
                Next
            </v-btn>
        </v-card-actions>
      </div>
    </v-expand-transition>
                </v-card>
                <v-card max-width="100vh" color="#EFEFEF">
 <v-card-actions>
     <v-btn @click="showsize =!showsize" >
         show me
          <v-icon>{{ showsize ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
     </v-btn>
 </v-card-actions>
 <v-expand-transition>
      <div v-show="showsize">
        <v-divider></v-divider>

        <v-card-text>
          I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
        </v-card-text>

      </div>
    </v-expand-transition>
                </v-card>
                  <v-card  max-width="100vh" color="#EFEFEF" >
 <v-card-actions>
     <v-btn @click="showbudget = !showbudget" >
         show me
          <v-icon>{{ showbudget ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
     </v-btn>
 </v-card-actions>
 <v-expand-transition>

      <div v-show="showbudget">
        <v-divider></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="component ='gardensize'" >
                Next
            </v-btn>
        </v-card-actions>
      </div>
    </v-expand-transition>
                </v-card>
                    </div>

                </v-col>

            <v-col class="align-center">
                  <!-- Items Block -->
                <div  class="item_display">
                <component :is=component ></component>
                </div>
            </v-col>
            </v-row>
            </div>
        </div>

    </v-app>
</template>
<script>
import budget from '../components/budget.vue'
import gardensize from '../components/gardensize.vue'
export default {
    data(){
        return{
            component : "budget",
            showbudget : false,
            showsize :false,

    };
  },
  components: {
      budget,
      gardensize
  },
  computed: {
      preconfigured(){
          return{
              component :'budget'
          }
    }
  }
}
</script>
<style >
.card_display{

    border: 1px solid gray;
}
.category_display{
    padding-left: 10px;
    border: 1px solid lightgray;
}
.item_display{
    padding-right: 10px;
    border: 1px solid lightgray;
    min-height: 70vh;
    max-height: 80vh;
    justify-content: center;
}
</style>
