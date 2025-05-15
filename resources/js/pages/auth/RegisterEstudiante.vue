<script setup>

import Header from "@/components/Header.vue"

import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

const form = useForm({
    nombres: '',
    apellidos: '',
    dni: '',
    telefono: '',
    correo: '',
    institucion: '',
    tipo: 'pleno',
    codigo_operacion: '',
    voucher_pago: null,
});

const buscarDni = async () => {
    if (form.dni.length === 8) {
        try {
            const res = await axios.get(`/api/dni/${form.dni}`);
            form.nombres = res.data.data.nombres;
            form.apellidos = `${res.data.data.apellido_paterno} ${res.data.data.apellido_materno}`;
        } catch (err) {
            form.nombres = '';
            form.apellidos = '';
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
    <Header/>
    <div class="h-[91vh] bg-[#00367e] flex flex-col items-center justify-center p-6 relative bg-cover bg-center bg-no-repeat" style="background-image: url('/images/puno6.webp')">
        <div class="absolute inset-0 bg-[#00367e]/80"></div>
        <!-- Logo y título fuera del formulario -->
        <div class="text-center mb-6 z-100">
            <img src="/images/logo1.png" alt="Logo Audita" class="h-30 mx-auto mb-3" />
            <h1 class="text-3xl font-extrabold uppercase text-white">Registro</h1>
            <h2 class="text-xl font-bold uppercase text-[#ffb300]">Audita 2025</h2>
            <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                <div class="absolute left-0 top-0 w-1/2 h-1 bg-white"></div>
            </div>
        </div>

        <!-- Formulario -->
        <div class="w-full max-w-5xl bg-gray-100 shadow-lg rounded-2xl p-10 z-100">
            <form @submit.prevent="submit" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna izquierda -->
                <div class="space-y-4">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">DNI</label>
                        <input v-model="form.dni" @blur="buscarDni" type="text"
                            class="w-full border p-2 rounded text-black" placeholder="DNI" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Nombres</label>
                        <input v-model="form.nombres" type="text"
                            class="w-full border p-2 rounded text-black" placeholder="Nombres" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Apellidos</label>
                        <input v-model="form.apellidos" type="text"
                            class="w-full border p-2 rounded text-black" placeholder="Apellidos" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Celular</label>
                        <input v-model="form.telefono" type="text"
                            class="w-full border p-2 rounded text-black" placeholder="Ej. 987654321" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Correo Electronico</label>
                        <input v-model="form.correo" type="email"
                            class="w-full border p-2 rounded text-black" placeholder="correo@institucion.edu" />
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="space-y-4">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Institución</label>
                        <input v-model="form.institucion" type="text"
                            class="w-full border p-2 rounded text-black" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Tipo de estudiante</label>
                        <select v-model="form.tipo" class="w-full border p-2 rounded text-black">
                            <option value="pleno">Pleno</option>
                            <option value="observador">Observador</option>
                            <option value="estudiante">Estudiante</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Código de Operación</label>
                        <input v-model="form.codigo_operacion" type="text"
                            class="w-full border p-2 rounded text-black" />
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Comprobante de Pago (Voucher)</label>
                        <input type="file" @change="e => form.voucher_pago = e.target.files[0]"
                            class="w-full border p-2 rounded text-black bg-white" />
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-[#00367e] hover:bg-[#002a63] text-white font-semibold p-3 rounded-lg transition">
                            Enviar Registro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
