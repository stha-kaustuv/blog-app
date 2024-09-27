<template>
  <q-page>
    <div>
      <div class="flex justify-end">
        <router-link to="/dashboard/blog/create">
          <q-btn
            class="bg-dark text-white q-mr-lg"
            dense
            bordered
            label="Create"
          ></q-btn>
        </router-link>
      </div>
      <div class="q-pa-md q-mt-xl col">
        <q-table
          flat
          bordered
          title="Blogs"
          :rows="rows"
          :columns="columns"
          row-key="name"
          dark
          color="amber"
        >
          <template v-slot:body-cell-actions="props">
            <q-td :props="props">
              <router-link :to="`/dashboard/blog/edit/${props.row.id}`">
                <q-btn
                  color="primary"
                  dense
                  icon="edit"
                  
                />
              </router-link>
              <q-btn
                color="negative"
                dense
                icon="delete"
                @click="deleteBlog(props.row.id)"
                class="q-ml-sm"
              />
            </q-td>
          </template>
        </q-table>
      </div>
    </div>
  </q-page>
</template>
<script setup>
import { ref, onMounted } from "vue";

// Define table columns
const columns = ref([
  {
    name: "id",
    required: true,
    label: "ID",
    align: "left",
    field: "id",
    sortable: true,
  },
  {
    name: "title",
    align: "center",
    label: "TITLE",
    field: "title",
    sortable: true,
  },
  {
    name: "description",
    align: "center",
    label: "DESCRIPTION",
    field: "description",
    sortable: true,
  },
  {
    name: "image",
    align: "center",
    label: "IMAGE",
    field: "image",
    sortable: false,
  },
  {
    name: "actions",
    align: "center",
    label: "ACTIONS",
    field: "actions",
    sortable: false,
  },
]);

// Initialize rows
const rows = ref([]);

//api bata data fetch garne function
const fetchData = async() =>{
  try {
    const res = await fetch('http://127.0.0.1:8000/api/blog')
  const result = await res.json();
  rows.value = result.data
  } catch (error) {
    console.log(error)
  }
}

//mount huna saath data lai halne
onMounted(()=>{
  fetchData();
})

//id bata data lai delete
const deleteBlog= async(id)=>{
  try{
    const res = await fetch('http://127.0.0.1:8000/api/blog/delete',{
      method:"POST",
      headers:{
        'Content-Type':'application/json'
      },
      body:JSON.stringify({
        delete_rows:[id],
      })
    });
    if(res.ok){
      alert("Selected item deleted successfully")
    }
    else if(!res.ok){
      alert("Failed to delete")
    }
    rows.value=rows.value.filter((abc)=>abc.id!==id)

  }
  catch(error){
    console.log(error)
  }
    
}


</script>
