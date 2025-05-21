<template>
  <Head title="Participantes" />
  <AppLayout>
    <div class="p-4">
      <!-- Botón Agregar -->
      <div class="flex justify-end mb-4">
        <Link
          href="/participantes/create"
          class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 text-sm font-medium rounded hover:bg-indigo-700"
        >
          ➕ Agregar Participante
        </Link>
      </div>

      <!-- Tabla con scroll vertical -->
      <div class="overflow-auto max-h-[600px] bg-white shadow-md rounded-lg border">
        <table class="min-w-full text-sm text-left text-gray-800">
          <thead class="bg-gray-100 text-xs uppercase sticky top-0 z-10">
            <tr>
              <th class="px-4 py-3">Nombres</th>
              <th class="px-4 py-3">Apellidos</th>
              <th class="px-4 py-3">DNI</th>
              <th class="px-4 py-3">Teléfono</th>
              <th class="px-4 py-3">Correo</th>
              <th class="px-4 py-3">Institución</th>
              <th class="px-4 py-3">Tipo</th>
              <th class="px-4 py-3">Código Operación</th>
              <th class="px-4 py-3">Voucher</th>
              <th class="px-4 py-3">Estado</th>
              <!-- <th class="px-4 py-3">Departamento</th>
              <th class="px-4 py-3">Provincia</th>
              <th class="px-4 py-3">Distrito</th>
              <th class="px-4 py-3">Dirección</th> -->
              <th class="px-4 py-3 text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="p in participantes"
              :key="p.id"
              class="border-b hover:bg-gray-50"
            >
              <td class="px-4 py-2">{{ p.nombres }}</td>
              <td class="px-4 py-2">{{ p.apellidos }}</td>
              <td class="px-4 py-2">{{ p.dni }}</td>
              <td class="px-4 py-2">{{ p.telefono }}</td>
              <td class="px-4 py-2">{{ p.correo }}</td>
              <td class="px-4 py-2">{{ p.institucion }}</td>
              <td class="px-4 py-2 capitalize">{{ p.tipo }}</td>
              <td class="px-4 py-2">{{ p.codigo_operacion }}</td>
              <td class="px-4 py-2">
                <a
                  v-if="p.voucher_pago"
                  :href="`/storage/${p.voucher_pago}`"
                  target="_blank"
                  class="text-blue-600 hover:underline text-xs"
                >
                  Ver voucher
                </a>
                <span v-else class="text-gray-400 text-xs">Sin archivo</span>
              </td>
              <td class="px-4 py-2 capitalize">
                <span :class="p.estado === 'activo' ? 'text-green-600' : 'text-red-600'">
                  {{ p.estado }}
                </span>
              </td>
              <!-- <td class="px-4 py-2">{{ p.departamento }}</td> -->
              <!-- <td class="px-4 py-2">{{ p.provincia }}</td>
              <td class="px-4 py-2">{{ p.distrito }}</td>
              <td class="px-4 py-2">{{ p.direccion }}</td> -->
              <td class="px-4 py-2 flex flex-col gap-1 text-center">
                <Link
                  :href="`/participantes/${p.id}/edit`"
                  class="px-2 py-1 bg-yellow-400 text-white rounded text-xs hover:bg-yellow-500"
                >
                  ✏️ Editar
                </Link>
                <button
                  @click="eliminar(p.id)"
                  class="px-2 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700"
                >
                  🗑️ Eliminar
                </button>
                <button
                  @click="toggleEstado(p.id, p.estado)"
                  class="px-2 py-1 rounded text-xs"
                  :class="p.estado === 'activo' ? 'bg-gray-500 hover:bg-gray-600 text-white' : 'bg-green-600 hover:bg-green-700 text-white'"
                >
                  {{ p.estado === 'activo' ? 'Desactivar' : 'Activar' }}
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const props = defineProps<{
  participantes: any[]
}>()

const participantes = props.participantes

const eliminar = (id: number) => {
  if (confirm('¿Estás seguro de eliminar este participante?')) {
    router.delete(`/participantes/${id}`)
  }
}

const toggleEstado = (id: number, estado: string) => {
  router.put(`/participantes/${id}`, { estado: estado === 'activo' ? 'inactivo' : 'activo' })
}
</script>
