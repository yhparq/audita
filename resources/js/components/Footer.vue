<template>
  <footer
    class="relative bg-cover bg-center bg-no-repeat text-white"
    style="background-image: url('/images/punolanding1.jpg')"
  >
    <div class="absolute inset-0 bg-[#00367e]/90"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Columna 1: Información General -->
      <div>
        <h3 class="text-lg font-bold uppercase mb-4">Información General</h3>
        <ul class="text-sm space-y-2">
          <li class="flex items-start gap-2">
            <span>📅</span> Fechas del evento: <strong>24, 25 y 26 de julio 2025</strong>
          </li>
          <li class="flex items-start gap-2">
            <span>⏰</span>
            <span>
              Horario: L–V de 09:00 a 13:00 y 15:00 a 19:00 hrs. <br />
              Sábados: 09:00 a 12:00 hrs.
            </span>
          </li>
          <li class="flex items-center gap-2">
            <span>🖥️</span> Modalidad: Presencial y Virtual
          </li>
          <li class="flex items-start gap-2">
            <span>📍</span>
            <a
              href="https://www.google.com/maps/place/UNA+PUNO+Centro+de+Convenciones"
              target="_blank"
              class="hover:underline text-blue-200"
            >
              Salón de eventos de la UNA PUNO (Centro de Convenciones)
            </a>
          </li>
        </ul>
      </div>

      <!-- Columna 2: Recursos y contactos -->
      <div>
        <h3 class="text-lg font-bold uppercase mb-4">Recursos y Contacto</h3>
        <ul class="text-sm space-y-2">
          <li class="flex items-start gap-2">
            <span>📌</span>
            <a
              href="https://drive.google.com" target="_blank"
              class="hover:underline text-blue-200"
            >
              Destinos turísticos (Ver PDF/Drive)
            </a>
          </li>
          <li class="flex items-start gap-2">
            <span>🏨</span>
            <a
              href="https://drive.google.com"
              target="_blank"
              class="hover:underline text-blue-200"
            >
              Lista de hoteles (Ver PDF/Drive)
            </a>
          </li>
          <li class="flex items-center gap-2">
            <span>📱</span> Celular 1: 978785287
          </li>
          <li class="flex items-center gap-2">
            <span>📱</span> Celular 2: 940011104
          </li>
          <li class="flex items-center gap-2">
            <span>☎️</span> Teléfono fijo: 051-351509
          </li>
          <li class="flex items-center gap-2">
            <span>💬</span>
            <a href="https://wa.me/51978785287" target="_blank" class="hover:underline text-green-300">
              WhatsApp: 978785287
            </a>
          </li>
        </ul>
      </div>

      <!-- Columna 3: Logo -->
      <div class="flex items-center justify-center">
        <img src="/images/logo1.png" alt="Logo Audita" class="h-48 md:h-60" />
      </div>
    </div>
  </footer>
</template>
