<template>
    <section class="bg-white py-16 px-4">
        <div class="max-w-7xl mx-auto text-center mb-8">
            <h2 class="text-3xl font-extrabold uppercase text-black">Expositores</h2>
            <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
            </div>
        </div>

        <Carousel v-bind="config" class="max-w-7xl mx-auto">



<Slide v-for="(expositor, index) in expositores" :key="index">
  <a
    :href="expositor.perfil"
    target="_blank"
    rel="noopener noreferrer"
    class="block px-4 py-6 transition duration-300 hover:scale-[1.08]"
  >
    <div
      class="w-[230px] h-[260px] bg-[#fffdf5] border border-[#00367e] rounded-xl shadow-md p-4 flex flex-col items-center justify-between hover:shadow-2xl transition-all duration-500 mx-auto"
    >
      <!-- Imagen grande centrada -->
      <div class="w-35 h-35 rounded-full overflow-hidden border-2 border-[#00367e] shadow mb-4">
        <img
          :src="expositor.foto"
          alt="foto expositor"
          class="w-full h-full object-cover"
        />
      </div>

      <!-- Nombre y cargo -->
      <div class="text-center">
        <h3 class="font-bold text-[#00367e] text-sm leading-tight">{{ expositor.nombre }}</h3>
        <p class="text-xs text-gray-600 mt-1">{{ expositor.cargo }}</p>
      </div>
    </div>
  </a>
</Slide>



        </Carousel>
    </section>
</template>

<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide } from 'vue3-carousel'

interface Expositor {
    nombre: string
    cargo: string
    foto: string
}

const expositores: Expositor[] = [
  {
    nombre: 'Dr. Luis Alarcón Paredes',
    cargo: 'Profesor Investigador UNMSM',
    foto: '/images/expo1.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/luis-alarcon-paredes'
  },
  {
    nombre: 'Mg. María Torres Lazo',
    cargo: 'Consultora en Control Gubernamental',
    foto: '/images/expo2.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/maria-torres-lazo'
  },
  {
    nombre: 'Dr. Jaime Gutiérrez Sosa',
    cargo: 'Docente PUCP – Área de Auditoría',
    foto: '/images/expo3.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/jaime-gutierrez-sosa'
  },
  {
    nombre: 'CPC Sandra Quispe Ramos',
    cargo: 'Auditora Interna SUNAT',
    foto: '/images/expo4.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/sandra-quispe-ramos'
  },
  {
    nombre: 'Dr. Manuel Huamán Flores',
    cargo: 'Investigador de Riesgos Financieros',
    foto: '/images/expo5.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/manuel-huaman-flores'
  },
  {
    nombre: 'Ing. Rosa Morales Chávez',
    cargo: 'Experta en Transformación Digital',
    foto: '/images/expo6.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/rosa-morales-chavez'
  },
  {
    nombre: 'PhD. José Encinas León',
    cargo: 'Investigador Principal en Finanzas',
    foto: '/images/expo7.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/jose-encinas-leon'
  },
  {
    nombre: 'Mg. Carmen Ríos Delgado',
    cargo: 'Auditora Internacional de Gobiernos Locales',
    foto: '/images/expo8.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/carmen-rios-delgado'
  },
  {
    nombre: 'CPC Pedro Álvarez Yupanqui',
    cargo: 'Contralor General de Entidad Pública',
    foto: '/images/expo9.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/pedro-alvarez-yupanqui'
  },
  {
    nombre: 'Dra. Sofía Núñez Mejía',
    cargo: 'Directora de Ética Profesional en Auditoría',
    foto: '/images/expo10.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/sofia-nunez-mejia'
  },
  {
    nombre: 'Lic. Enrique Rojas Campos',
    cargo: 'Consultor en Normas Internacionales',
    foto: '/images/expo11.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/enrique-rojas-campos'
  },
  {
    nombre: 'PhD. Julia Paredes Calla',
    cargo: 'Especialista en Gestión del Riesgo Público',
    foto: '/images/expo12.jpg',
    perfil: 'https://buscador.concytec.gob.pe/buscador/autor/julia-paredes-calla'
  },
]



const config = {
    // height: 120,
    itemsToShow: 5,
    gap: 5,
    autoplay: 3000,
    wrapAround: true,
    pauseAutoplayOnHover: true,


    breakpointMode: 'carousel',

    // Breakpoints are mobile-first
    // Any settings not specified will fall back to the carousel's default settings
    breakpoints: {
        // 300px and up
        300: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
        // 400px and up
        400: {
            itemsToShow: 2,
            snapAlign: 'start',
        },
        // 500px and up
        500: {
            itemsToShow: 5,
            snapAlign: 'start',
        },
    },
}






</script>
