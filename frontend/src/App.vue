<script setup lang="ts">
import {RouterView, useRouter} from 'vue-router'
import {ref} from 'vue';
import apiClient from './plugins/axios';

const isAuthenticated = ref(!!localStorage.getItem('token'));
let isAdmin = ref(localStorage.getItem('isAdmin') == 'true');
const router = useRouter();

const login = async (data: any) => {
  const response = await apiClient.post('/login', {
    email: data.email.value,
    password: data.password.value,
  });
  localStorage.setItem('token', response.data.token);
  localStorage.setItem('isAdmin', response.data.isAdmin);
  await router.push('/');
  isAuthenticated.value = !(isAuthenticated.value);
  isAdmin = ref(localStorage.getItem('isAdmin') == 'true');
};

const logout = async () => {
  try {
    await apiClient.post('/logout', {}, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('token')}`,
      },
    });
    localStorage.removeItem('token');
    localStorage.removeItem('isAdmin');
    await router.push('/login');
    isAuthenticated.value = !(isAuthenticated.value);
    isAdmin.value = false;
  } catch (err) {
    console.error('Logout failed', err);
  }
};

</script>

<template>
  <v-app>
    <v-app-bar>
      <template v-slot:prepend>
        <v-tabs>
          <v-tab to="/">Home</v-tab>
          <v-tab v-if="!isAuthenticated" to="/login">Login</v-tab>
          <v-tab v-if="isAuthenticated && isAdmin" to="/dashboard">Dashboard</v-tab>
          <v-btn class="h-auto" v-if="isAuthenticated" @click="logout">Logout</v-btn>
        </v-tabs>
      </template>
    </v-app-bar>

    <v-main>
      <RouterView v-on:login="login"/>
    </v-main>
  </v-app>
</template>

<style scoped>

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
