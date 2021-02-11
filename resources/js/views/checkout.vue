<template>
<v-app id="inspire">
  <v-main>
    <v-container>
      <h2 class="display-2" >CHECK OUT</h2>
      <form action=''>
        <v-layout>
          <v-flex x6>
            <strong>Payment Address</strong>
            <v-text-field label="Name"></v-text-field>
            <v-text-field label="E-mail"></v-text-field>
            <v-text-field label="Phone"></v-text-field>
            <v-text-field label="City"></v-text-field>
            <v-text-field label="Address"></v-text-field>
            <v-checkbox v-model="del_address" label ="Other delivery address"></v-checkbox>
          </v-flex>
          <v-flex x6>
            <strong>
              Delivery Address
            </strong>
            <div v-if="del_address">
            <v-text-field label="Name"></v-text-field>
            <v-text-field label="Address"></v-text-field>
            <v-text-field label="Zipcode"></v-text-field>
            <v-text-field label="City"></v-text-field>
            </div>
            <div v-else>
              <v-spacer></v-spacer>
              <v-alert type="info" :value="true">
                The delivery address is same as payment address
              </v-alert>
            </div>
          </v-flex>
        </v-layout>
      </form>
      <hr />

      <v-btn color="success" lager style="float: right">
        Complete Order
  </v-btn>
   </v-container>

  </v-main>
</v-app>
</template>
<script>
export default {
  data(){
    return {
      del_address : false,

    }
  }
}
</script>
