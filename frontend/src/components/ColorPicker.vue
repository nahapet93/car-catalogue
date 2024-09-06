<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const colors = ref([] as any[]);
const props = defineProps(['label']);

const response = await apiClient.get('/colors');
colors.value = [
  {value: null, title: 'Choose color'},
  ...response.data.map((color: any) => ({value: color.id, title: color.name}))
];

</script>

<template>
  <v-select
      :items="colors"
      :label="props.label"
  ></v-select>
</template>

<style scoped>

</style>