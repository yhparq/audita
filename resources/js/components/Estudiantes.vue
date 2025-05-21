<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4 text-[#00367e]">Lista de Estudiantes Registrados</h1>

    <table class="min-w-full border border-gray-300 shadow rounded-lg overflow-hidden text-sm">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="p-3 border">DNI</th>
          <th class="p-3 border">Nombres</th>
          <th class="p-3 border">Apellidos</th>
          <th class="p-3 border">Correo</th>
          <th class="p-3 border">Teléfono</th>
          <th class="p-3 border">Institución</th>
          <th class="p-3 border">Tipo</th>
          <th class="p-3 border">Código Operación</th>
          <th class="p-3 border">Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="e in estudiantes" :key="e.id" class="hover:bg-gray-50">
          <td class="p-2 border">{{ e.dni }}</td>
          <td class="p-2 border">{{ e.nombres }}</td>
          <td class="p-2 border">{{ e.apellidos }}</td>
          <td class="p-2 border">{{ e.correo }}</td>
          <td class="p-2 border">{{ e.telefono }}</td>
          <td class="p-2 border">{{ e.institucion }}</td>
          <td class="p-2 border">{{ e.tipo }}</td>
          <td class="p-2 border">{{ e.codigo_operacion }}</td>
          <td class="p-2 border">{{ e.estado ? 'Activo' : 'Inactivo' }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup lang="ts">
defineProps<{ estudiantes: Array<any> }>()
</script>
