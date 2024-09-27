<template>
  <q-page class="q-mx-xl width">
    <q-head>
      <h4 class="text-h4 font-bold text-black">My Blog</h4>
    </q-head>
    <q-body>
      <q-img
        class="q-img q-mt-xl"
        :src="`http://127.0.0.1:8000/storage/${image}`"
      />
      <span class="q-ml-md">
        <span class="flex justify-start items-center q-mt-lg text">
          <p class="cursor-pointer" style="display: inline-block">Nepal</p>
          <p class="cursor-pointer" style="display: inline-block">
            -----Sept 11,2025
          </p>
        </span>

        <p
          class="text-h5 text q-mt-lg cursor-pointer"
          style="display: inline-block"
        >
          {{ title || "This is title" }}
        </p>
        <div
          v-for="(desc, index) in description"
          :key="index"
          class="q-mt-lg text-lg q-mb-lg"
        >
          {{ desc || "Hello, this is a description" }}
        </div>
      </span>
    </q-body>
  </q-page>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const id = route.params.id;
const title = ref();
const description = ref([
  "The Global MBA program is designed to equip the next generation of business leaders with the skills and insights they need to thrive in a rapidly evolving global marketplace. This program goes beyond the basics, offering students a comprehensive foundation in business while highlighting the importance of leadership, innovation, and sustainable practices in the modern world. ",
  "The Global MBA program is designed to equip the next generation of business leaders with the skills and insights they need to thrive in a rapidly evolving global marketplace. This program goes beyond the basics, offering students a comprehensive foundation in business while highlighting the importance of leadership, innovation, and sustainable practices in the modern world.",
  "The Global MBA program is designed to equip the next generation of business leaders with the skills and insights they need to thrive in a rapidly evolving global marketplace. This program goes beyond the basics, offering students a comprehensive foundation in business while highlighting the importance of leadership, innovation, and sustainable practices in the modern world.",
]);
const image = ref();

const fetchBlogDetails = async (id) => {
  try {
    const res = await fetch(`http://127.0.0.1:8000/api/blog/${id}`);
    if (!res) {
      console.log("The network response was not ok");
    }
    const result = await res.json();
    const blogdetetails = result.data;
    title.value = blogdetetails.title;
    description.value = [blogdetetails.description];
    image.value = blogdetetails.image;
  } catch (error) {}
};

onMounted(() => {
  fetchBlogDetails(id);
});
</script>
<style scoped>
.q-img {
  width: 100%;
  height: 550px;
  object-fit: cover;
}

.text:hover {
  text-decoration: underline;
}
.width {
  width: 55%;
}
</style>
