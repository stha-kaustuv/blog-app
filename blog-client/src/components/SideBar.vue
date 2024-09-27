<template>
  <div class="sidebar ">
    <div>
      <router-link to="/dashboard">
      <q-list
        class="row no-wrap q-px-sm q-py-xs  cursor-pointer items-center custom-color"
      >
        <q-icon name="grid_view" size="30px"></q-icon>
        <q-item class="col items-center">Dashboard</q-item>
      </q-list>
    </router-link>

      <router-link to="/dashboard/blog">
      <q-list
        class="row no-wrap q-px-sm q-py-xs cursor-pointer items-center custom-color"
      >
        <q-icon name="article" size="30px"></q-icon>
        <q-item class="col items-center">Blog</q-item>
      </q-list>
    </router-link>
    </div>
    <div class="absolute">
      <q-list
        class="row no-wrap q-px-sm q-py-xs cursor-pointer items-center custom-color"
      >
        <q-icon name="account_circle" size="30px"></q-icon>
        <q-item class="col items-center">Profile</q-item>
      </q-list>
      <q-list
        class="row no-wrap q-px-sm q-py-xs cursor-pointer items-center custom-color"
      >
        <q-icon name="settings" size="30px"></q-icon>
        <q-item class="col items-center">Setting</q-item>
      </q-list>
      <q-separator color="red" />
      <q-list
        class="row no-wrap q-px-sm q-py-xs cursor-pointer items-center custom-color"
      >
        <q-icon name="logout" size="30px"></q-icon>
        <q-item class="col items-center">Logout</q-item>
      </q-list>
    </div>
  </div>
</template>
