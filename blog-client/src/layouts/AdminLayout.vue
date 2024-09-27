<template>
  <q-layout view="hHh Lpr fFf">
    <!-- Sidebar -->
    <q-drawer show-if-above v-model="leftDrawerOpen" side="left" >
      <SideBar />
    </q-drawer>

    <!-- Main content area -->
    <q-page-container>
      <!-- Header/Navbar -->
      <q-toolbar>
        <NavBar />
      </q-toolbar>
      

      <!-- Router View for Content -->
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from 'vue';
import NavBar from 'src/components/NavBar.vue';
import SideBar from 'src/components/SideBar.vue';

const leftDrawerOpen = ref(true); // Controls the sidebar state
</script>
