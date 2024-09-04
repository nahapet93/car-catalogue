<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const brands = ref([]);

const response = await apiClient.get('/brands');
brands.value = response.data.data.map((brand: any) => ({value: brand.id, title: brand.name}));

</script>

<template>
  <v-select
      :items="brands"
      label="Brand"
  ></v-select>
</template>

<style scoped>

</style>