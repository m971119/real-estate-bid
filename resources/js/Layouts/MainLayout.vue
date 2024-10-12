<template>
  <Link href="/listing">Listing</Link>&nbsp;
  <Link href="/listing/create">Create Listing</Link>
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
</script>
<style scoped>
.success {
    background-color: lightseagreen;
    color: white;
}
</style>
