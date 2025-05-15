<template>
  <div
    v-if="show"
    class="absolute top-full mt-2 left-0 right-0 bg-white border border-gray-300 rounded shadow-lg p-4 text-xs z-10"
  >
    <slot />
  </div>
</template>

<script setup lang="ts">
defineProps<{ show: boolean }>()
</script>
