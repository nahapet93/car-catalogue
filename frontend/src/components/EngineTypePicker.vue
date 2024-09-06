<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const engineTypes = ref([] as any[]);

const response = await apiClient.get('/engine-types');
engineTypes.value = [
  {value: null, title: 'Choose engine type'},
  ...response.data.map((engineType: any) => ({value: engineType.id, title: engineType.name}))
];

</script>

<template>
  <v-select
      :items="engineTypes"
      label="Engine Type"
  ></v-select>
</template>

<style scoped>

</style>