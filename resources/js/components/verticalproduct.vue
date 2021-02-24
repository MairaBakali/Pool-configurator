<template>
  <v-card class="my-10" height="221" width="231" outlined>
    <v-card-actions>
      <v-checkbox
        :value="products.id"
        v-model="value"
      >
      </v-checkbox>
    </v-card-actions>
    <v-img :src="products.media" height="118" />
    <v-card-title>{{ products.name }}</v-card-title>
    <v-card-subtitle>{{ products.price }}</v-card-subtitle>
  </v-card>
</template>

<script>
export default {
  props: {
    products: Object,
    addToList: Function,
    value: String,
  },
  methods: {
    updateVal() {
      this.$emit("update", this.products.id);
    },
  },
  computed: {
    checked: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      },
    },
  },
};
</script>

<style>
</style>
