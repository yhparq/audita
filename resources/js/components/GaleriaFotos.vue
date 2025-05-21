GaleriaFotos.vue<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import { ref } from 'vue'

defineProps({ fotos: Array })

const form = useForm({
  titulo: '',
  foto: null,
})

const handleUpload = (e) => {
  form.foto = e.target.files[0]
}

const submit = () => {
  form.post(route('fotos.store'), {
    forceFormData: true
  })
}
</script>

<template>
  <Head title="Galería de Fotos" />


  <AppLayout>
    <div class="p-6">
      <h2 class="text-2xl font-bold text-white mb-4">Subir Foto</h2>

      <form @submit.prevent="submit" class="mb-6 space-y-4">
        <input v-model="form.titulo" type="text" placeholder="Título (opcional)" class="w-full border p-2 rounded" />
        <input type="file" @change="handleUpload" class="w-full border p-2 rounded bg-white" />
        <button class="bg-[#00367e] text-white py-2 px-4 rounded">Subir</button>
      </form>

      <h3 class="text-xl text-white font-semibold mb-3">Fotos Subidas</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div v-for="foto in fotos" :key="foto.id">
          <img :src="`/storage/${foto.ruta}`" class="rounded shadow" />
          <p class="text-white text-sm mt-1">{{ foto.titulo }}</p>
        </div>
      </div>
    </div>
  </AppLayout>


</template>
