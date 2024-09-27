<template>
  <div >
    <q-header  class= "bg-dark text-white">
      <q-toolbar class="q-px-xl q-mx-xl">
        <q-toolbar-title>
          <router-link to="/">
            <span class="text-white a">Logo</span>
          </router-link>
        </q-toolbar-title>
        <router-link to="/dashboard/blog">
        <p class="q-pa-sm q-mt-lg q-mr-lg cursor-pointer text-white a">DashBoard</p>
      </router-link>
        <q-avatar class="q-mr-lg cursor-pointer">
          <img src="https://cdn.quasar.dev/img/avatar.png" />
        </q-avatar>
      </q-toolbar>
    </q-header>
  </div>
</template>

<script setup></script>
