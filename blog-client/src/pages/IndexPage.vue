<template>
  <q-page class="q-px-xl q-py-lg bg-accent">
    <div class="row items-center justify-end q-mb-xl">
      <q-input
        class="search q-mr-xl"
        rounded
        outlined
        v-model="text"
        placeholder="Search..."
      >
        <q-icon
          class="col searchIcon text-black cursor-pointer"
          name="search"
          size="25px"
        />
      </q-input>
    </div>
    <div class="q-mx-xl">
      <div class="row q-mx-auto">
        <div
          v-for="(card, index) in cards"
          :key="index"
          class="col-xs-12 col-sm-6 col-md-3"
        >
          <ReusableCard
            :image="card.image"
            :title="card.title"
            :description="card.description"
            :id="card.id"
            class="q-mb-xl"
          />
        </div>
      </div>
    </div>
  </q-page>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import ReusableCard from "src/components/ReusableCard.vue";

// Reactive variable card ko data store garna define gareko
const cards = ref([]);

//Reactive variable search text ko lagi
const text = ref("");

const fetchBlogs = async () => {
  try {
    const res = await fetch("http://127.0.0.1:8000/api/blog");
    const parsedRes = await res.json();
    cards.value = parsedRes.data;
  } catch (error) {
    console.log(error);
  }
};

// Blog ko data local storage bata fetch garxa component mount huda
onMounted(() => {
  fetchBlogs();
});


</script>

<style scoped></style>
