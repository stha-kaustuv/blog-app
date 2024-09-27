<template>
  <q-layout view="hHh Lpr lFf">
   
    <NavBar/>
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>

import NavBar from 'src/components/NavBar.vue';

defineOptions({
  name: 'MainLayout'
})




</script>
