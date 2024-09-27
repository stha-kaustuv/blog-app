<template>
  <q-card class="my-card q-mt-xl" shadow-4 rounded-borders>
    <router-link :to="`/blog/${id}`">
    <img
      :src="`http://127.0.0.1:8000/storage/${image}`"
      alt="Blog Image"
      class="q-img imgzoom cursor-pointer"
    />
  </router-link>

    <q-card-section>
      <router-link :to="`/blog/${id}`">
        <p class="text-h6 title-hover">{{ title }}</p>
      </router-link>
    </q-card-section>

    <q-card-section class="q-pt-none">
      {{ description }}
    </q-card-section>

    <q-card-actions>
      <div class="q-mt-md flex items-center">
        <q-avatar class="q-mr-md">
          <img class="imgwh" :src="avatar" />
        </q-avatar>
        <div class="text-subtitle2 title-hover">Nepal@123</div>
      </div>
    </q-card-actions>
  </q-card>
</template>

<script setup>
import avatar from "/public/img/avatar.png";
const props = defineProps({
  id: {
    type: Number,
    required: true,
  },
  image: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },

  description: {
    type: String,
    required: true,
  },
});
</script>

<style scoped>
.my-card {
  width: 400px;
  height: 500px;
  overflow: hidden; /* Ensures overflow content is hidden */
  display: flex;
  flex-direction: column;
}
.my-card .imgzoom {
  transition: 0.5s;
  object-fit: cover;
}
.my-card:hover .imgzoom {
  transform: scale(1.1);
}

.imgwh {
  object-fit: cover;
}
.q-img {
  width: 100%;
  height: auto;
}

.q-card-actions {
  display: flex;
  align-items: center;
}

.title-hover {
  cursor: pointer;
  transition: 0.3s ease;
  color: black !important;
}

.title-hover:hover {
  text-decoration: underline;
}
.q-img {
  width: 100%;
  height: 300px; /* Fixed height for image */
  object-fit: cover; /* Ensures the image covers the area */
}
</style>
