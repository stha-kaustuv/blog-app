<template>
  <div class="q-pa-md form" style="max-width: 400px">
    <q-form @submit="onSubmit(blogId)" @reset="onReset" class="q-gutter-md">
      <q-form-title class="text-h5">Edit Blog</q-form-title>
      
      <q-input filled v-model="title" label="Title" />
      <q-input filled type="textarea" v-model="description" label="Description" />
      
      <!-- Image Uploader -->
      <q-uploader
        v-model="imageFiles"
        label="Upload Image"
        accept="image/*"
        :max-files="1"
        @added="onFileAdded"
        @removed="onFileRemoved"
      />

      <!-- Display uploaded image path if available -->
      <p class="overflow-hidden" v-if="uploadedImagePath">
        Path: {{ uploadedImagePath }}
      </p>

      <!-- View the uploaded image link -->
      <a
        :href="`http://localhost:8000/storage/${uploadedImagePath}`"
        v-if="uploadedImagePath"
        target="_blank"
      >View Uploaded Image</a>

      <div>
        <q-btn label="Update" type="submit" color="primary" />
        <q-btn
          label="Reset"
          type="reset"
          color="primary"
          flat
          class="q-ml-sm"
          @click="onReset"
        />
      </div>
    </q-form>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";

const title = ref("");
const description = ref("");
const imageFiles = ref([]);
const uploadedImagePath = ref("");

const route = useRoute();
const router = useRouter();
const blogId = route.params.id;

// Fetch the existing blog data
const fetchData = async (id) => {
  try {
    const res = await fetch(`http://127.0.0.1:8000/api/blog/${id}`);
    const result = await res.json();

    if (!res.ok) {
      alert("Error fetching blog data");
      return;
    }

    const blogData = result.data;

    // Populate the form fields with fetched data
    title.value = blogData.title;
    description.value = blogData.description;
    uploadedImagePath.value = blogData.image;
  } catch (error) {
    console.error("Error fetching blog data:", error);
  }
};

// Fetch blog data when the component is mounted
onMounted(() => {
  fetchData(blogId);
});

// Handle form submission for updating the blog post
const onSubmit = async (id) => {
  try {
    const res = await fetch(`http://127.0.0.1:8000/api/blog/${id}`, {
      method: "POST", 
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        title: title.value,
        description: description.value,
        image: uploadedImagePath.value,
      }),
    });

    if (!res.ok) {
      alert("Error updating the blog");
      return;
    }

    alert("Blog updated successfully!");
    router.push("/dashboard/blog");
  } catch (error) {
    console.error("Error updating blog:", error);
  }
};

// Handle image file upload
const onFileAdded = async (files) => {
  const imageFile = files[0];

  try {
    const formData = new FormData();
    formData.append("image", imageFile);

    const res = await fetch("http://localhost:8000/api/blogs/image-upload", {
      method: "POST",
      body: formData,
    });

    if (!res.ok) {
      console.error("Image upload failed");
      return;
    }

    const responseData = await res.json();
    uploadedImagePath.value = responseData.image_path;
  } catch (error) {
    console.error("Error uploading image:", error);
  }
};

// Handle image file removal
const onFileRemoved = () => {
  uploadedImagePath.value = "";
  imageFiles.value = [];
};

// Handle form reset
const onReset = () => {
  title.value = "";
  description.value = "";
  uploadedImagePath.value = "";
  imageFiles.value = [];
};
</script>
