<script setup lang="ts">
import {ref} from "vue";
import apiClient from "@/plugins/axios";

const colors = ref([]);
const props = defineProps(['label']);

const response = await apiClient.get('/colors');
colors.value = response.data.map((color: any) => ({value: color.id, title: color.name}));
</script>

<template>
  <v-select
      :items="colors"
      :label="props.label"
  ></v-select>
</template>

<style scoped>

</style>