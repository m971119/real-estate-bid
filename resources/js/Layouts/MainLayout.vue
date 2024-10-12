<template>
  <Link href="/listing">Listing</Link>&nbsp;
  <Link href="/listing/create">Create Listing</Link>
  <header
    class="border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
  />
  <div v-if="flashSuccess">
    {{ flashSuccess }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>
