<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

interface Props {
  className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
  <img
    :class="className"
    src="/images/logo1.png"
    alt="Logo Audita"
    v-bind="$attrs"
  />
</template>
