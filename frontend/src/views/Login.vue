<!-- src/views/Login.vue -->
<template>
  <v-container class="d-flex justify-center align-center fill-height">
    <v-card class="pa-5" max-width="400">
      <v-card-title class="text-h5">Login</v-card-title>
      <v-alert v-if="error" type="error" dismissible>{{ error }}</v-alert>
      <v-form @submit.prevent="login">
        <v-text-field v-model="email" label="Email" type="email" required></v-text-field>
        <v-text-field v-model="password" label="Password" type="password" required></v-text-field>
        <v-btn type="submit" color="primary" class="mt-4" :loading="loading">Login</v-btn>
      </v-form>
      <v-card-subtitle class="mt-3">
        Don't have an account? <router-link to="/register">Register</router-link>
      </v-card-subtitle>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('');
const password = ref('');
const error = ref('');
const loading = ref(false);
const emit = defineEmits(['login']);

const login = async () => {
  loading.value = true;
  error.value = '';
  try {
    emit('login', {email, password});
  } catch (err) {
    error.value = 'Invalid credentials';
  } finally {
    loading.value = false;
  }
};
</script>

<style scoped>
.v-card {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
}
</style>
