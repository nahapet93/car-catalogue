<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const engineTypes = ref([]);

const response = await apiClient.get('/engine-types');
engineTypes.value = response.data.map((engineType: any) => ({value: engineType.id, title: engineType.name}));
</script>

<template>
  <v-select
      :items="engineTypes"
      label="Engine Type"
  ></v-select>
</template>

<style scoped>

</style>