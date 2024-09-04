<!-- src/views/Home.vue -->
<template>
  <v-container>
    <v-row>
      <v-col>
        <BrandPicker v-model="brandId"></BrandPicker>
      </v-col>
      <v-col>
        <ColorPicker v-model="exteriorColorId" label="Exterior color"></ColorPicker>
      </v-col>
      <v-col>
        <ColorPicker v-model="interiorColorId" label="Interior color"></ColorPicker>
      </v-col>
      <v-col>
        <v-text-field v-model="name" label="Name" type="text" required></v-text-field>
      </v-col>
      <v-col>
        <v-text-field v-model="year" label="Year" type="number" required></v-text-field>
      </v-col>
    </v-row>

    <v-card fluid>
      <v-card-title>Models</v-card-title>
      <v-list :items="models"></v-list>
    </v-card>
  </v-container>
</template>

<script setup>
import {ref, watch} from 'vue';
import apiClient from '../plugins/axios';
import BrandPicker from "@/components/BrandPicker.vue";
import ColorPicker from "@/components/ColorPicker.vue";

const models = ref([]);

const name = ref('');
const year = ref('');
const brandId = ref(null);
const exteriorColorId = ref(null);
const interiorColorId = ref(null);

const response = await apiClient.get('/models');
const modelObject = response.data.data.map(model => ({
  value: model.id,
  title: Object.values(model).slice(1).reduce((prop, acc) => `${prop}, ${acc}`),
  data: model
}));

models.value = modelObject;

watch(
    [brandId, exteriorColorId, interiorColorId, name, year],
    ([newBrandId, newExteriorColorId, newInteriorColorId, newName, newYear]) => {
      models.value = modelObject;

      if (newBrandId) {
        models.value = models.value.filter(model => model.data.brandId === newBrandId);
      }

      if (newExteriorColorId) {
        models.value = models.value.filter(model => model.data.exteriorColorId === newExteriorColorId);
      }

      if (newInteriorColorId) {
        models.value = models.value.filter(model => model.data.interiorColorId === newInteriorColorId);
      }

      if (newName) {
        models.value = models.value.filter(model => model.data.name.startsWith(newName));
      }

      if (newYear) {
        models.value = models.value.filter(model => model.data.year === newYear);
      }
    }
);

</script>
