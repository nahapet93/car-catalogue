<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const transmissionTypes = ref([] as any[]);

const response = await apiClient.get('/transmission-types');
transmissionTypes.value = [
  {value: null, title: 'Choose transmission type'},
  ...response.data.map((transmissionType: any) => ({value: transmissionType.id, title: transmissionType.name}))
];

</script>

<template>
  <v-select
      :items="transmissionTypes"
      label="Transmission Type"
  ></v-select>
</template>

<style scoped>

</style>