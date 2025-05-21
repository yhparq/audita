<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'

type BreadcrumbItem = { title: string; href: string }
const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Participantes', href: '/participantes' },
  { title: 'Crear', href: '/participantes/create' },
]

const form = ref<FormData>(new FormData())

const handleSubmit = () => {
  router.post('/participantes', form.value, {
    forceFormData: true,
  })
}
</script>

<template>
  <Head title="Crear Participante" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex flex-1 flex-col gap-4 rounded-xl p-4">
      <h1 class="text-2xl font-bold">Crear Participante</h1>

      <form @submit.prevent="handleSubmit" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><Label for="nombres">Nombres</Label><Input id="nombres" @input="e => form.value.set('nombres', e.target.value)" /></div>
        <div><Label for="apellidos">Apellidos</Label><Input id="apellidos" @input="e => form.value.set('apellidos', e.target.value)" /></div>
        <div><Label for="dni">DNI</Label><Input id="dni" @input="e => form.value.set('dni', e.target.value)" /></div>
        <div><Label for="telefono">Teléfono</Label><Input id="telefono" @input="e => form.value.set('telefono', e.target.value)" /></div>
        <div><Label for="correo">Correo</Label><Input id="correo" @input="e => form.value.set('correo', e.target.value)" /></div>
        <div><Label for="institucion">Institución</Label><Input id="institucion" @input="e => form.value.set('institucion', e.target.value)" /></div>

        <div>
          <Label for="tipo">Tipo</Label>
          <select
            id="tipo"
            class="w-full border-gray-300 rounded-md text-sm"
            @change="e => form.value.set('tipo', e.target.value)"
          >
            <option value="">Seleccione tipo</option>
            <option value="pleno">Pleno</option>
            <option value="observador">Observador</option>
            <option value="estudiante">Estudiante</option>
          </select>
        </div>

        <div><Label for="codigo_operacion">Código de Operación</Label><Input id="codigo_operacion" @input="e => form.value.set('codigo_operacion', e.target.value)" /></div>

        <div>
          <Label for="voucher_pago">Comprobante (imagen)</Label>
          <input
            id="voucher_pago"
            type="file"
            accept="image/*"
            class="block w-full text-sm border-gray-300 rounded-md"
            @change="e => form.value.set('voucher_pago', e.target.files[0])"
          />
        </div>

        <div><Label for="departamento">Departamento</Label><Input id="departamento" @input="e => form.value.set('departamento', e.target.value)" /></div>
        <div><Label for="provincia">Provincia</Label><Input id="provincia" @input="e => form.value.set('provincia', e.target.value)" /></div>
        <div><Label for="distrito">Distrito</Label><Input id="distrito" @input="e => form.value.set('distrito', e.target.value)" /></div>
        <div class="md:col-span-2"><Label for="direccion">Dirección</Label><Input id="direccion" @input="e => form.value.set('direccion', e.target.value)" /></div>

        <div class="md:col-span-2">
          <Button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white">
            Guardar Participante
          </Button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
