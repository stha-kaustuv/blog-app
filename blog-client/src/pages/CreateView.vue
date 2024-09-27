<template>
  <div class="q-pa-md form" style="max-width: 400px">
    <q-form @submit.prevent="onSubmit" @reset="onReset" class="q-gutter-md">
      <q-input filled v-model="title" label="Title" />
      <q-input filled v-model="description" label="Description" />

      <!-- Image Uploader -->
      <q-uploader
        v-model="imageFiles"
        label="Upload Image"
        accept="image/*"
        :max-files="1"
        @added="onFileAdded"
        @removed="onFileRemoved"
      />

      <p class="overflow-hidden" v-if="uploadedImagePath">
        Path: {{ uploadedImagePath }}
      </p>
      <a
        :href="`http://localhost:8000/storage/${uploadedImagePath}`"
        v-if="uploadedImagePath"
        target="_blank"
        >View Uploaded Image</a
      >

      <div>
        <q-btn label="Submit" type="submit" color="primary" />
        <q-btn
          label="Reset"
          type="reset"
          color="primary"
          flat
          class="q-ml-sm"
        />
      </div>
    </q-form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const title = ref("");
const description = ref("");
const imageFiles = ref([]);
const router = useRouter();
const uploadedImagePath = ref("");

const onSubmit = async () => {
  try {
    const res = await fetch("http://127.0.0.1:8000/api/blog", {
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

    if (res.ok) {
      alert("New Data Added Successfully");
      router.push("/dashboard/blog");
    } else if (!res.ok) {
      alert("New data couldn't be added!!!");
    }
  } catch (error) {
    console.log(error);
  }
};

const onFileAdded = async (files) => {
  const imageFile = files[0]; // Since you're allowing only one file

  try {
    const formData = new FormData();
    formData.append("image", imageFile);

    const res = await fetch("http://localhost:8000/api/blogs/image-upload", {
      method: "POST",
      body: formData,
    });

    if (!res.ok) {
      console.log("Image couldn't be uploaded!!!");
    }
    const responseData = await res.json();
    uploadedImagePath.value = responseData.image_path;

    console.log(uploadedImagePath.value);
  } catch (error) {
    console.log(error);
  }
};

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
