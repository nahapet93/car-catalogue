<!-- src/views/Dashboard.vue -->
<template>
  <v-container class="py-5">
    <v-card>
      <v-card-title>Brands</v-card-title>
      <v-list :items="brands"></v-list>
      <v-card-actions>
        <v-btn color="primary" class="mt-4" to="/create-brand">Create brand</v-btn>
        <v-btn color="primary" class="mt-4" to="/create-model">Create model</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script setup>
import {ref} from 'vue';
import apiClient from '../plugins/axios';

const brands = ref([]);

const response = await apiClient.get('/brands');
brands.value = response.data.data.map(brand => ({value: brand.id, title: brand.name}));

</script>
