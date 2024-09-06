<script setup lang="ts">
import {ref} from 'vue';
import apiClient from '../plugins/axios';
import {useRouter} from "vue-router";
import BrandPicker from "@/components/BrandPicker.vue";
import ColorPicker from "@/components/ColorPicker.vue";
import EngineTypePicker from "@/components/EngineTypePicker.vue";
import TransmissionTypePicker from "@/components/TransmissionTypePicker.vue";

const name = ref('');
const price = ref('');
const year = ref('');
const error = ref('');
const brandId = ref(null);
const exteriorColorId = ref(null);
const interiorColorId = ref(null);
const engineTypeId = ref(null);
const transmissionTypeId = ref(null);
const loading = ref(false);
const router = useRouter();


const createModel = async () => {
  loading.value = true;
  error.value = '';
  try {
    const response = await apiClient.post('/models', {
      name: name.value,
      price: price.value,
      year: year.value,
      brandId: brandId.value,
      exteriorColorId: exteriorColorId.value,
      interiorColorId: interiorColorId.value,
      engineTypeId: engineTypeId.value,
      transmissionTypeId: transmissionTypeId.value
    }, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('token')}`,
      },
    });

    await router.push('/dashboard');
  } catch (err) {
    error.value = 'Something went wrong';
  } finally {
    loading.value = false;
  }
};

</script>

<template>
  <v-container class="py-5">
    <v-card class="mx-auto pa-5" max-width="600">
      <v-alert v-if="error" type="error" dismissible>{{ error }}</v-alert>
      <v-form @submit.prevent="createModel">
        <BrandPicker v-model="brandId"></BrandPicker>
        <ColorPicker v-model="exteriorColorId" label="Exterior color"></ColorPicker>
        <ColorPicker v-model="interiorColorId" label="Interior color"></ColorPicker>
        <EngineTypePicker v-model="engineTypeId"></EngineTypePicker>
        <TransmissionTypePicker v-model="transmissionTypeId"></TransmissionTypePicker>
        <v-text-field v-model="name" label="Name" type="text" required></v-text-field>
        <v-text-field v-model="price" label="Price" type="number" required></v-text-field>
        <v-text-field v-model="year" label="Year" type="number" required></v-text-field>
        <v-btn type="submit" color="primary" class="mt-4" :loading="loading">Save</v-btn>
      </v-form>
    </v-card>
  </v-container>
</template>

<style scoped>

</style>