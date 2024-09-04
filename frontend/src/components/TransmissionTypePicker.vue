<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const transmissionTypes = ref([]);

const response = await apiClient.get('/transmission-types');
transmissionTypes.value = response.data.map((transmissionType: any) => ({value: transmissionType.id, title: transmissionType.name}));
</script>

<template>
  <v-select
      :items="transmissionTypes"
      label="Transmission Type"
  ></v-select>
</template>

<style scoped>

</style>