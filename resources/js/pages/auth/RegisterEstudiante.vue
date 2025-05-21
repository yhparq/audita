<script setup>
import { ref } from 'vue';
import Header from "@/components/Header.vue";
import { useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';

const modo = ref('');
const numeroParticipantes = ref(1);
const esperandoNumero = ref(false);

const iniciarCorporativa = () => {
  esperandoNumero.value = true;
};

const generarFormularios = () => {
  form.participantes = Array.from({ length: numeroParticipantes.value }, () => ({
    nombres: '',
    apellidos: '',
    dni: '',
    telefono: '',
    correo: '',
    institucion: '',
    tipo: 'pleno',
    codigo_operacion: '',
  }));
  modo.value = 'iniciar';
  esperandoNumero.value = false;
};

const page = usePage();
const flashMessage = page.props.flash?.success;

const form = useForm({
  participantes: [
    {
      nombres: '',
      apellidos: '',
      dni: '',
      telefono: '',
      correo: '',
      institucion: '',
      tipo: 'pleno',
      codigo_operacion: '',
    }
  ],
  voucher_pago: null,
});

const buscarDni = async (index) => {
  const dni = form.participantes[index].dni;
  if (dni.length === 8) {
    try {
      const res = await axios.get(`/api/dni/${dni}`);
      form.participantes[index].nombres = res.data.data.nombres;
      form.participantes[index].apellidos = `${res.data.data.apellido_paterno} ${res.data.data.apellido_materno}`;
    } catch (err) {
      form.participantes[index].nombres = '';
      form.participantes[index].apellidos = '';
      alert('DNI no encontrado');
    }
  }
};

const submit = () => {
  form.post(route('estudiantes.registrar'), {
    forceFormData: true,
  });
};
</script>

<template>
  <div v-if="flashMessage" class="z-50 mb-6 mt-4 px-6 py-4 rounded bg-green-100 border border-green-400 text-green-800 shadow-md text-center w-full max-w-2xl mx-auto">
    {{ flashMessage }}
  </div>

  <div class="w-full flex justify-center">
    <img src="/images/head1.png" alt="Encabezado Audita 2025" class="w-[60vw] h-[100px] object-cover" />
  </div>

  <div class="min-h-screen w-full bg-[#00367e] relative bg-cover bg-center bg-no-repeat flex flex-col items-center justify-start p-6 overflow-y-auto" style="background-image: url('/images/puno6.webp');">
    <div class="absolute inset-0 bg-[#00367e]/80 z-0"></div>

    <div class="relative z-10 w-full max-w-5xl">
      <!-- Selector de modo -->
      <div v-if="modo === '' || esperandoNumero" class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-bold text-center mb-4 text-gray-800">Seleccione el tipo de inscripción</h2>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
          <button @click="modo = 'individual'" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-semibold w-full sm:w-auto">Inscripción Individual</button>
          <button @click="iniciarCorporativa" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-semibold w-full sm:w-auto">Inscripción Corporativa</button>
        </div>
        <div v-if="esperandoNumero" class="mt-6 text-center">
          <label class="block mb-2 font-semibold text-gray-700">¿Cuántos participantes desea registrar?</label>
          <input v-model="numeroParticipantes" type="number" min="1" class="w-40 border p-2 rounded text-center text-black mx-auto" />
          <div class="mt-4">
            <button @click="generarFormularios" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-semibold">Continuar</button>
          </div>
        </div>
      </div>

      <!-- Formularios -->
      <div v-if="modo === 'individual' || modo === 'iniciar'">
        <form @submit.prevent="submit" enctype="multipart/form-data">
          <div
            v-for="(p, index) in form.participantes"
            :key="index"
            class="bg-[#1f2937] text-white shadow-lg rounded-2xl p-6 sm:p-10 mb-8"
          >
            <h3 class="text-lg font-bold mb-4 text-yellow-400">Participante {{ index + 1 }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div><label>DNI</label><input v-model="p.dni" @blur="() => buscarDni(index)" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div><label>Nombres</label><input v-model="p.nombres" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div><label>Apellidos</label><input v-model="p.apellidos" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div><label>Teléfono</label><input v-model="p.telefono" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div><label>Correo</label><input v-model="p.correo" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div><label>Institución</label><input v-model="p.institucion" class="w-full border p-2 rounded text-black bg-white" /></div>
              <div>
                <label>Tipo</label>
                <select v-model="p.tipo" class="w-full border p-2 rounded text-black bg-white">
                  <option value="pleno">Pleno</option>
                  <option value="observador">Observador</option>
                  <option value="estudiante">Estudiante</option>
                </select>
              </div>
              <div><label>Código Operación</label><input v-model="p.codigo_operacion" class="w-full border p-2 rounded text-black bg-white" /></div>
            </div>
          </div>

          <!-- Voucher solo una vez -->
          <div class="mb-6 text-white">
            <label class="block font-semibold">Comprobante de Pago (Voucher)</label>
            <input type="file" @change="e => form.voucher_pago = e.target.files[0]" class="w-full border p-2 rounded text-black bg-white" />
          </div>

          <!-- Botón único -->
          <div class="text-center">
            <button type="submit" class="px-8 py-3 bg-[#00367e] hover:bg-[#002a63] text-white font-bold rounded-lg">
              Enviar Registro
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
