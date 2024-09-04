<!-- src/views/Register.vue -->
<template>
  <v-container class="d-flex justify-center align-center fill-height">
    <v-card class="pa-5" max-width="400">
      <v-card-title class="text-h5">Register</v-card-title>
      <v-alert v-if="error" type="error" dismissible>{{ error }}</v-alert>
      <v-form @submit.prevent="register">
        <v-text-field v-model="name" label="Name" required></v-text-field>
        <v-text-field v-model="email" label="Email" type="email" required></v-text-field>
        <v-text-field v-model="password" label="Password" type="password" required></v-text-field>
        <v-text-field
            v-model="passwordConfirmation"
            label="Confirm Password"
            type="password"
            required
        ></v-text-field>
        <v-btn type="submit" color="primary" class="mt-4" :loading="loading">Register</v-btn>
      </v-form>
      <v-card-subtitle class="mt-3">
        Already have an account? <router-link to="/login">Login</router-link>
      </v-card-subtitle>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue';
import apiClient from '../plugins/axios';

const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const error = ref('');
const loading = ref(false);

const register = async () => {
  loading.value = true;
  error.value = '';
  try {
    await apiClient.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value,
    });
    window.location.href = '/login';
  } catch (err) {
    error.value = 'Registration failed. Please check your input.';
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
