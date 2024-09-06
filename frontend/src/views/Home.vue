<!-- src/views/Home.vue -->
<template>
  <v-container>
    <v-row>
      <v-col md="2" sm="6" cols="12">
        <BrandPicker v-model="brandId"></BrandPicker>
      </v-col>
      <v-col md="2" sm="6" cols="12">
        <ColorPicker v-model="exteriorColorId" label="Exterior color"></ColorPicker>
      </v-col>
      <v-col md="2" sm="6" cols="12">
        <ColorPicker v-model="interiorColorId" label="Interior color"></ColorPicker>
      </v-col>
      <v-col md="2" sm="6" cols="12">
        <v-text-field v-model="name" label="Name" type="text" required></v-text-field>
      </v-col>
      <v-col md="2" sm="6" cols="12">
        <v-text-field v-model="year" label="Year" type="number" required></v-text-field>
      </v-col>
      <v-col md="2" sm="6" cols="12">
        <v-text-field v-model="price" label="Price" type="number" required></v-text-field>
      </v-col>
    </v-row>

    <v-card fluid>
      <v-card-title>Models</v-card-title>
      <v-card-text v-if="!models.length">No models found</v-card-text>
      <v-list v-else :items="models"></v-list>

      <v-pagination
          v-model="page"
          :length="totalPages"
          :total-visible="5"
          color="primary"
      ></v-pagination>
    </v-card>
  </v-container>
</template>

<script setup>
import {ref, watch} from 'vue';
import apiClient from '../plugins/axios';
import BrandPicker from "@/components/BrandPicker.vue";
import ColorPicker from "@/components/ColorPicker.vue";

const models = ref([]);
const page = ref(1);
const totalPages = ref(1);

const name = ref('');
const year = ref('');
const price = ref('');
const brandId = ref(null);
const exteriorColorId = ref(null);
const interiorColorId = ref(null);
const params = ref({});

const loadModels = async (params) => {
  const response = await apiClient.get('/models', {params: params.value});
  models.value = response.data.data.map(model => ({
    value: model.id,
    title: Object.values(model).slice(1).reduce((prop, acc) => `${prop}, ${acc}`),
    data: model
  }));

  totalPages.value = response.data.meta.last_page;
}

loadModels(params);

watch(
    [page, brandId, exteriorColorId, interiorColorId, name, year, price],
    async (
        [currentPage, newBrandId, newExteriorColorId, newInteriorColorId, newName, newYear, newPrice],
        [oldPage]
    ) => {
      params.value = {};

      if (currentPage) {
        params.value = {page: currentPage, ...params.value};
      }

      if (currentPage === oldPage) {
        params.value.page = 1;
        page.value = 1;
      }

      if (newBrandId) {
        params.value = {brandId: newBrandId, ...params.value};
      }

      if (newExteriorColorId) {
        params.value = {exteriorColorId: newExteriorColorId, ...params.value};
      }

      if (newInteriorColorId) {
        params.value = {interiorColorId: newInteriorColorId, ...params.value};
      }

      if (newName) {
        params.value = {name: newName, ...params.value};
      }

      if (newYear) {
        params.value = {year: newYear, ...params.value};
      }

      if (newPrice) {
        params.value = {price: newPrice, ...params.value};
      }

      await loadModels(params);
    }
);

</script>
