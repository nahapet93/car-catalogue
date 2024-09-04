<script setup lang="ts">
import {ref} from 'vue';
import apiClient from '../plugins/axios';
import {useRouter} from "vue-router";

const name = ref('');
const error = ref('');
const loading = ref(false);
const router = useRouter();

const createBrand = async () => {
  loading.value = true;
  error.value = '';
  try {
    const response = await apiClient.post('/brands', {
      name: name.value
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
    <v-card class="mx-auto pa-5" width="300">
      <v-alert v-if="error" type="error" dismissible>{{ error }}</v-alert>
      <v-form @submit.prevent="createBrand">
        <v-text-field v-model="name" label="Name" type="text" required></v-text-field>
        <v-btn type="submit" color="primary" class="mt-4" :loading="loading">Save</v-btn>
      </v-form>
    </v-card>
  </v-container>
</template>

<style scoped>

</style>