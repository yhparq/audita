<template>
    <AuditaLayout>

        <ImageSlider />



        <section class="bg-white py-16 px-4">
            <div class="max-w-6xl mx-auto text-center mb-12">
                <h2 class="text-4xl font-extrabold text-[#00367e] uppercase">Bienvenidos a todos</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Video -->
                <div class="aspect-video w-full">
                    <iframe class="w-full h-full rounded-lg shadow-md" src="https://www.youtube.com/embed/Ebme3gCsjXw"
                        title="Video Audita" frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Texto -->
                <div class="text-left px-2">
                    <h3 class="text-2xl font-bold text-[#00367e] mb-4">Puno te saluda!</h3>
                    <p class="text-gray-700 leading-relaxed">
                        El Colegio de Contadores Públicos de Puno y la Junta de Decanos de los Colegios de Contadores
                        del Perú - JDCCPP, invitan a los Contadores Públicos, profesionales, empresarios, estudiantes y
                        ciudadanía, regional y nacional, a participar en la <span
                            class="font-semibold text-[#00367e]">“XI Convención Nacional de Auditoría – AUDITA
                            2025”</span>, a realizarse los días 26, 27 y 28 de julio de 2025.
                    </p>
                </div>
            </div>
        </section>












        <section class="bg-white py-16 px-4">
            <div class="max-w-7xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-extrabold text-[#00367e] uppercase">Material de Audita</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div v-for="item in items" :key="item.title" class="text-center group">
                    <a :href="item.pdf" download target="_blank"
                        class="block hover:scale-105 transition duration-300">
                        <img :src="item.image" alt="preview" class="w-full h-auto rounded-lg shadow-md" />
                    </a>
                    <div class="mt-4">
                        <h3 class="text-md font-semibold text-[#00367e]">{{ item . title }}</h3>
                        <p class="text-sm text-gray-500">Descarga .PDF</p>
                    </div>
                </div>
            </div>
        </section>









        <section class="flex flex-col md:flex-row w-full">
            <!-- Bloque izquierdo -->
            <div class="bg-[#00367e] text-white flex items-center justify-center px-6 py-12 md:w-1/3 w-full">
                <div>
                    <h2 class="text-3xl font-bold leading-snug">PUNO<br /><span class="text-white">TURISTICO</span></h2>
                    <p class="mt-2 text-sm">Una ciudad bella y mágica.</p>
                </div>
            </div>

            <!-- Galería: sin espacios, 100% ancho y altura fija -->
            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 w-full md:w-2/3 h-[200px]">
                <div v-for="(img, i) in images" :key="i" class="w-full h-full overflow-hidden">
                    <img :src="img" alt="Puno"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500" />
                </div>
            </div>
        </section>





        <section class="bg-[#f9f9f9] py-16 px-4">
            <div class="max-w-6xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-extrabold text-[#00367e] uppercase">Inversión</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>
                <p class="mt-4 text-sm text-gray-600 max-w-xl mx-auto">
                    Los derechos de inscripción a la <strong>“XI Convención Nacional de Auditoría – AUDITA
                        2025”</strong> , se abonarán en cuenta de ahorros a nombre de BENJAMIN FELIX AVENDAÑO GORDILLO,
                    director de Administración Financiera, Contabilidad y Presupuesto del Colegio de Contadores Públicos
                    de Puno.

                </p>
            </div>


            <!-- precios -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div v-for="plan in planes" :key="plan.tipo"
                    class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transform transition duration-300 hover:shadow-2xl hover:scale-[1.03] relative">
                    <img :src="plan.imagen" class="w-full h-80 object-cover" />

                    <div :class="['py-2 text-white text-center font-bold text-lg uppercase', plan.bg]">
                        {{ plan . tipo }}
                    </div>

                    <div class="p-4 flex-grow">
                        <p class="text-sm text-gray-600 mb-4">{{ plan . descripcion }}</p>

                        <hr class="my-2" />

                        <p class="font-semibold text-sm text-gray-800">Presencial</p>
                        <div class="flex justify-between text-sm text-gray-600 mt-1">
                            <span>Hasta 30 junio:</span>
                            <span class="text-[#ae1f22] font-bold">S/ {{ plan . presencial . hasta30junio }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Desde 01 julio:</span>
                            <span class="text-[#ae1f22] font-bold">S/ {{ plan . presencial . desde01julio }}</span>
                        </div>

                        <p class="font-semibold text-sm text-gray-800 mt-4">Virtual</p>
                        <div class="flex justify-between text-sm text-gray-600 mt-1">
                            <span>Hasta 30 junio:</span>
                            <span class="text-[#ae1f22] font-bold">S/ {{ plan . virtual . hasta30junio }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Desde 01 julio:</span>
                            <span class="text-[#ae1f22] font-bold">S/ {{ plan . virtual . desde01julio }}</span>
                        </div>
                    </div>

                    <div class="bg-gray-200 text-center text-sm p-2 font-semibold text-gray-700">
                        {{ plan . descuento }}
                    </div>

                    <div class="p-4 text-sm relative">
                        <p class="font-semibold text-[#00367e] mb-1">¿Qué se les brinda?</p>
                        <ul class="list-disc list-inside text-gray-600">
                            <li @click="toggleCard(plan.tipo)" class="cursor-pointer text-[#00367e] hover:underline">
                                Ver más
                            </li>
                        </ul>

                        <!-- Reutilizable -->
                        <FloatingCard :show="expandedTipo === plan.tipo">
                            <p class="text-gray-700">
                                ✔ Constancia digital<br />
                                ✔ Certificación por horas<br />
                                ✔ Acceso a todas las ponencias<br />
                                ✔ Material digital de apoyo<br />
                                ✔ Atención personalizada<br />
                                ✔ Acceso al grupo privado
                            </p>
                        </FloatingCard>
                    </div>
                </div>
            </div>


        </section>





        <section class="bg-[#ae1f22] text-white py-10 px-4 ">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-4 md:gap-6">

                <!-- Info fija -->
                <!-- <div class="md:w-1/3 text-center md:text-left">
                    <h3 class="text-lg font-semibold">Lema</h3>
                    <h2 class="text-2xl font-bold tracking-wide">AUDITA 2025</h2>
                    <p class="text-sm mt-1 italic text-white/80">Aprobado por la JDCCPP</p>
                </div> -->

                <!-- Cita con comillas tipográficas -->
                <div
                    class="flex-grow text-center md:text-left text-lg italic font-medium leading-relaxed text-white font-serif font-[Playfair Display]">
                    <span class="text-3xl font-bold text-white select-none">“</span>
                    {{ lema }}
                    <span class="text-3xl font-bold text-white select-none">”</span>
                </div>
            </div>
        </section>









        <ExpositoresSlider />



        <section class="bg-white py-16 px-4 w-full">
            <div class="w-full max-w-screen-2xl mx-auto">
                <!-- Título -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold uppercase text-gray-900">Temario</h2>
                    <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                        <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Lateral -->
                    <div class="bg-[#ae1f22] text-white p-6 rounded shadow col-span-1">
                        <h3 class="text-lg font-semibold">Eje Temático</h3>
                        <h4 class="text-2xl font-bold">AUDITA 2025</h4>
                        <p class="text-sm mt-2">Incluye materias modernas y de vanguardia para la profesión contable
                            dentro del área de Auditoría.</p>
                    </div>

                    <!-- Temas -->
                    <div class="md:col-span-3 space-y-10">
                        <!-- Tema 1 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                            <div class="overflow-hidden rounded-lg">
                                <img src="/images/info2.jpg" alt="tema1"
                                    class="rounded-lg w-full h-48 object-cover transform transition duration-500 hover:scale-105">
                            </div>
                            <div>
                                <h4 class="text-[#00367e] font-bold text-sm uppercase mb-1">Tema Nº 1:</h4>
                                <p class="text-[#ae1f22] font-bold text-lg leading-snug">MARCO NORMATIVO INTERNACIONAL
                                    PARA LOS TRABAJOS DE AUDITORÍA, REVISIÓN, ASEGURAMIENTO Y SERVICIOS RELACIONADOS</p>
                                <button
                                    class="mt-3 bg-[#ae1f22] hover:bg-[#00367e] text-white text-sm font-medium py-1 px-4 rounded transition">Ver
                                    Temas</button>
                            </div>
                        </div>

                        <!-- Tema 2 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                            <div>
                                <h4 class="text-[#00367e] font-bold text-sm uppercase mb-1">Tema Nº 2:</h4>
                                <p class="text-[#ae1f22] font-bold text-lg leading-snug">LA AUDITORÍA EN LA ERA
                                    DIGITAL, LA INTELIGENCIA ARTIFICIAL Y LA CIBERSEGURIDAD</p>
                                <button
                                    class="mt-3 bg-[#ae1f22] hover:bg-[#00367e] text-white text-sm font-medium py-1 px-4 rounded transition">Ver
                                    Temas</button>
                            </div>
                            <div class="overflow-hidden rounded-lg">
                                <img src="/images/info3.jpg" alt="tema2"
                                    class="rounded-lg w-full h-48 object-cover transform transition duration-500 hover:scale-105">
                            </div>
                        </div>

                        <!-- Tema 3 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                            <div class="overflow-hidden rounded-lg">
                                <img src="/images/info1.jpg" alt="tema3"
                                    class="rounded-lg w-full h-48 object-cover transform transition duration-500 hover:scale-105">
                            </div>
                            <div>
                                <h4 class="text-[#00367e] font-bold text-sm uppercase mb-1">Tema Nº 3:</h4>
                                <p class="text-[#ae1f22] font-bold text-lg leading-snug">GOBIERNO CORPORATIVO Y LA
                                    GESTIÓN DE RIESGOS Y CUMPLIMIENTO</p>
                                <button
                                    class="mt-3 bg-[#ae1f22] hover:bg-[#00367e] text-white text-sm font-medium py-1 px-4 rounded transition">Ver
                                    Temas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







        <section class="bg-white py-16 px-4">
            <div class="max-w-6xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-extrabold text-black uppercase">Documentos</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>
                <p class="mt-4 text-sm text-gray-600">Descarga la Documentación del AUDITA 2025.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div v-for="(doc, i) in documentos" :key="i"
                    class="flex flex-col items-center text-center">
                    <a :href="doc.pdf" download target="_blank">
                        <img :src="doc.imagen" alt="documento"
                            class="w-64 h-auto shadow-md rounded hover:scale-105 transition" />
                    </a>
                    <div class="mt-4 flex items-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#00367e]" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M12 16.5l4-4h-3V4h-2v8.5H8l4 4z" />
                            <path d="M20 18H4v2h16v-2z" />
                        </svg>
                        <div class="text-sm text-left">
                            <p class="font-semibold text-[#00367e]">{{ doc . titulo }}</p>
                            <p class="text-gray-500">Descarga .PDF</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="bg-[#f9f9f9] py-16 px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-extrabold uppercase text-center text-black capitalize">Trabajos de
                    Investigación</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>

                <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-10">
                    <!-- Imagen -->
                    <div class="w-full md:w-2/3 max-w-xs px-8">
                        <img src="/images/baner1.png" alt="Reglamento" class="rounded shadow" />
                    </div>

                    <!-- Info -->
                    <div class="w-full md:w-1/3 text-center md:text-left">
                        <div class="mb-16">

                            <p class="text-lg font-semibold text-[#00367e]">Fecha Límite de Recepción:</p>
                            <p class="text-md font-bold text-gray-800 mb-4">Viernes 20 de junio 2025</p>
                        </div>

                        <h3 class="font-semibold text-gray-700 mb-2">Monto de la premiación:</h3>
                        <div class="text-sm text-gray-700 space-y-2 max-w-sm mx-auto md:mx-0 mb-10">
                            <div class="border-t pt-2">Primer Puesto: <strong>S/ 4,000.00</strong></div>
                            <div class="border-t pt-2">Segundo Puesto: <strong>S/ 3,000.00</strong></div>
                            <div class="border-t pt-2">Tercer Puesto: <strong>S/ 1,500.00</strong></div>
                        </div>

                        <p class="text-sm text-gray-600 mt-6">
                            Ver más detalle en el
                            <a href="/pdfs/reglamento-audita2025.pdf" class="text-blue-600 hover:underline"
                                target="_blank">Reglamento de Audita 2025</a>
                            y en el
                            <a href="/pdfs/reglamento-investigacion.pdf" class="text-blue-600 hover:underline"
                                target="_blank">Reglamento de Trabajos de Investigación</a>.
                        </p>

                        <p class="text-sm text-blue-700 mt-2 font-bold">
                            Enviar los trabajos al correo:
                            <a href="mailto:investigacion@ccppap.org.pe"
                                class="underline font-normal">ctnauditoria@jdccpp.org.pe</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>













        <section class="bg-white py-16 px-4">
            <div class="max-w-6xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-extrabold text-black uppercase">Información General</h2>
                <div class="mt-2 w-24 h-1 mx-auto bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>
            </div>

            <!-- Contador -->
            <div class="text-center mb-12">
                <p class="text-sm text-gray-600">Faltan:</p>
                <p class="text-2xl font-bold text-[#00367e]">{{ tiempoRestante }}</p>
            </div>

            <!-- Información -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center max-w-6xl mx-auto">
                <div
                    class="bg-[#f9f9f9] p-6 rounded shadow transition duration-300 hover:shadow-xl hover:scale-105 hover:border-t-4 hover:border-[#00367e] hover:bg-white cursor-pointer">
                    <div class="text-[#b58900] mb-2 text-4xl transition duration-300 group-hover:text-[#00367e]">
                        📅
                    </div>
                    <h3 class="font-bold text-gray-800">Fechas</h3>
                    <p class="text-sm text-gray-600">24, 25 y 26 de julio 2025</p>
                </div>

                <div
                    class="bg-[#f9f9f9] p-6 rounded shadow transition duration-300 hover:shadow-xl hover:scale-105 hover:border-t-4 hover:border-[#00367e] hover:bg-white cursor-pointer">
                    <div class="text-[#b58900] mb-2 text-4xl">👥</div>
                    <h3 class="font-bold text-gray-800">Hora</h3>
                    <p class="text-sm text-gray-600">L–V 09:00 hrs. <br />Sáb. 9:00 hrs.</p>
                </div>

                <div
                    class="bg-[#f9f9f9] p-6 rounded shadow transition duration-300 hover:shadow-xl hover:scale-105 hover:border-t-4 hover:border-[#00367e] hover:bg-white cursor-pointer">
                    <div class="text-[#b58900] mb-2 text-4xl">🖥️</div>
                    <h3 class="font-bold text-gray-800">Modalidad</h3>
                    <p class="text-sm text-gray-600">Presencial | Virtual</p>
                </div>

                <div
                    class="bg-[#f9f9f9] p-6 rounded shadow transition duration-300 hover:shadow-xl hover:scale-105 hover:border-t-4 hover:border-[#00367e] hover:bg-white cursor-pointer">
                    <div class="text-[#b58900] mb-2 text-4xl">📍</div>
                    <h3 class="font-bold text-gray-800">Lugar</h3>
                    <p class="text-sm text-gray-600">Salón de eventos de la UNA PUNO (Centro de Convenciones)</p>
                </div>
            </div>
        </section>


        <section class="relative h-[400px] md:h-[500px] overflow-hidden">
            <!-- Mapa interactivo -->
            <iframe class="absolute inset-0 w-full h-full grayscale hover:grayscale-0 transition duration-500"
                loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.584692358328!2d-70.01236118225954!3d-15.825837905726935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d69ebbb2ab6e3%3A0x574b1be61f54d86b!2sCENTRO%20DE%20CONVENCIONES!5e0!3m2!1ses-419!2spe!4v1747224815176!5m2!1ses-419!2spe"></iframe>



            <!-- Capa superior -->
            <div class="absolute inset-0 bg-black/30 z-10"></div>

            <!-- Contenido -->
            <div
                class="relative z-20 max-w-4xl mx-auto h-full flex flex-col justify-center items-center px-4 text-center">
                <h2 class="text-3xl font-extrabold uppercase text-white">Contáctanos</h2>
                <div class="mt-2 w-24 h-1 bg-[#ffb300] relative">
                    <div class="absolute left-0 top-0 w-1/2 h-1 bg-gray-300"></div>
                </div>

                <!-- Caja flotante -->
                <div class="bg-white rounded shadow-lg mt-8 p-6 max-w-xl w-full">
                    <p class="text-gray-800 font-semibold text-lg mb-2">¿Tienes alguna duda?</p>
                    <p class="text-sm text-gray-600">
                        Es muy importante que el participante pueda resolver todas sus dudas sobre la
                        <strong>XI Convención Nacional de Auditoría, AUDITA 2025</strong>. Comunícate al
                        <strong>999912070</strong> o escríbenos por WhatsApp.
                    </p>

                    <a href="https://wa.me/51999912070" target="_blank"
                        class="inline-block mt-4 bg-[#28a745] hover:bg-[#218838] text-white font-semibold px-5 py-2 rounded transition">
                        Charlemos 💬
                    </a>
                </div>
            </div>
        </section>




        <section class="bg-[#f9f9f9] py-12 overflow-hidden">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold uppercase text-[#00367e]">Auspiciadores</h2>
            </div>

            <Carousel class="max-w-7xl mx-auto" v-bind="config">
                <Slide v-for="(logo, index) in logos" :key="index">
                    <div class="flex items-center justify-center h-24 py-5 my-1">
                        <img :src="logo" alt="logo" class="h-14 object-contain" />
                    </div>
                </Slide>
            </Carousel>
        </section>


        <!-- <section class="bg-[#f9f9f9] py-12 px-4">
            <div class="max-w-6xl mx-auto text-center mb-6 py-5">
                <h2 class="text-2xl font-extrabold uppercase text-[#00367e]">AUSPICIADORES</h2>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-8 mb-10">
                <img v-for="(logo, i) in logos" :key="i" :src="logo" alt="patrocinador"
                    class="h-16 object-contain px-15" />
            </div>
        </section> -->












    </AuditaLayout>
</template>

<script setup lang="ts">
    import AuditaLayout from '@/layouts/AuditaLayout.vue'
    import ImageSlider from '@/components/ImageSlider.vue'
    import ExpositoresSlider from '@/components/ExpositoresSlider.vue'
    import FloatingCard from '@/components/FloatingCard.vue'





    import {
        ref,
        onMounted,
        onBeforeUnmount
    } from 'vue'



    import 'vue3-carousel/carousel.css'
    import {
        Carousel,
        Slide,
        Pagination,
        Navigation
    } from 'vue3-carousel'







    interface Item {
        title: string
        image: string
        pdf: string
    }

    const items: Item[] = [{
            title: 'Conoce AUDITA 2025',
            image: '/images/que-es-audita.png',
            pdf: '/pdfs/que-es-audita.pdf',
        },
        {
            title: 'Destinos Turisticos',
            image: '/images/catalogo-arequipa.png',
            pdf: '/pdfs/catalogo-arequipa.pdf',
        },
        {
            title: 'Programa AUDITA 2025',
            image: '/images/programa-audita.png',
            pdf: '/pdfs/programa-audita.pdf',
        },
    ]



    const images = [
        '/images/puno1.jpg',
        '/images/puno2.webp',
        '/images/puno3.webp',
        '/images/puno4.jpg',
        '/images/puno5.jpg',
        '/images/puno6.webp',
    ]



    const planes = [{
            tipo: 'PLENO',
            imagen: '/images/precio3.jpg',
            bg: 'bg-[#ae1f22]',
            descripcion: 'Contadores Públicos inscritos en su Colegio. Participan con voto y voz.',
            presencial: {
                hasta30junio: 315,
                desde01julio: 350,
            },
            virtual: {
                hasta30junio: 270,
                desde01julio: 300,
            },
        },
        {
            tipo: 'OBSERVADOR',
            imagen: '/images/precio1.jpg',
            bg: 'bg-[#00367e]',
            descripcion: 'Empresarios, profesionales y egresados. Participan con voz, sin voto.',
            presencial: {
                hasta30junio: 270,
                desde01julio: 300,
            },
            virtual: {
                hasta30junio: 225,
                desde01julio: 250,
            },
        },
        {
            tipo: 'ESTUDIANTE',
            imagen: '/images/precio2.jpg',
            bg: 'bg-[#ffb300]',
            descripcion: 'Estudiantes de nivel superior en Ciencias Contables y afines.',
            presencial: {
                hasta30junio: 90,
                desde01julio: 100,
            },
            virtual: {
                hasta30junio: 45,
                desde01julio: 50,
            },
        },
    ]

    const expandedTipo = ref < string | null > (null)

    function toggleCard(tipo: string) {
        expandedTipo.value = expandedTipo.value === tipo ? null : tipo
    }


















    const lema =
        'La AUDITORÍA, el gobierno corporativo, la gestión de riesgos y el cumplimiento, en un entorno global y digital'




    const documentos = [{
            titulo: 'Reglamento AUDITA 2025',
            imagen: '/images/doc1.png',
            pdf: '/pdfs/reglamento-audita2025.pdf',
        },
        {
            titulo: 'Reglamento Trabajos de Investigación',
            imagen: '/images/doc2.png',
            pdf: '/pdfs/reglamento-investigacion-audita2025.pdf',
        },
    ]















    const tiempoRestante = ref('')
    const fechaEvento = new Date('2025-07-24T09:00:00') // 24 de agosto de 2025, 09:00 hrs

    const actualizarContador = () => {
        const ahora = new Date()
        const diferencia = fechaEvento.getTime() - ahora.getTime()

        if (diferencia <= 0) {
            tiempoRestante.value = '¡El evento ha comenzado!'
            return
        }

        const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24))
        const horas = Math.floor((diferencia / (1000 * 60 * 60)) % 24)
        const minutos = Math.floor((diferencia / (1000 * 60)) % 60)
        const segundos = Math.floor((diferencia / 1000) % 60)

        tiempoRestante.value = `${dias} días, ${horas}h ${minutos}m ${segundos}s`
    }

    let intervalo: ReturnType < typeof setInterval >

        onMounted(() => {
            actualizarContador()
            intervalo = setInterval(actualizarContador, 1000)
        })

    onBeforeUnmount(() => {
        clearInterval(intervalo)
    })







    const logos = [
        '/images/logo.png',
        '/images/logo1.png',
        '/images/logo2.png',
        '/images/logo3.png',
        '/images/logo5.png',
    ]

    const config = {
        height: 120,
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


<style scoped>
    @keyframes typewriter {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    .animate-typewriter {
        animation: typewriter 8s steps(100) 1 forwards;
        overflow: hidden;
        white-space: nowrap;
    }
</style>
