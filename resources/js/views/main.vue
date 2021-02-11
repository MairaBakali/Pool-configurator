<template>
  <v-app id="inspire">

    </v-navigation-drawer>

    <v-app-bar app>
      <v-toolbar-title class="text-center">Configurator</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn x-small  depressed>
        <v-icon>mdi-home</v-icon>
        </v-btn>
        <v-btn x-small  depressed>
        <v-icon>mdi-account</v-icon>
        </v-btn>
        <v-btn x-small  depressed>
        <v-icon>mdi-cart</v-icon>
        </v-btn>
    </v-app-bar>
    <v-main>
      <v-row>
        <v-col >
        <v-img @click="configurator" height="500" width="400" class="rounded-lg mx-4" src="../assets/pool.jpg"></v-img>
        <v-btn to="configurator">Configurator</v-btn>
      </v-col>
      </v-row>
    </v-main>
  </v-app>
</template>

<script>
  export default {
   methods: {
    configurator : function(){
      this.$router.push('/page');
    }
  }
  }
</script>
