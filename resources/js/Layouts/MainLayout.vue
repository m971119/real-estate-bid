<template>
  <Box>
    <header
      class="w-full border-b dark:bg-gray-900 border-gray-200 bg-white dark:border-gray-900 "
    >
      <div class="container mx-auto">
        <nav class="flex items-center justify-between p-4">
          <div class="text-lg font-medium">
            <Link :href="route('listing.index')">Listings</Link>
          </div>
          <div
            class="text-center text-xl font-bold text-cgreen-800 dark:text-cgreen-300"
          >
            <Link :href="route('listing.index')">BidNest</Link>
          </div>
          <div v-if="user" class="flex items-center gap-4">
            <Link
              class="text-gray-500 relative pr-2 py-2 text-lg"
              :href="route('notification.index')"
            >
              🔔
              <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                {{ notificationCount }}
              </div>
            </Link>
            <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
            <Link
              :href="route('realtor.listing.create')"
              class="btn-primary"
            >
              + New Listing
            </Link>
            <div>
              <Link :href="route('logout')" method="DELETE" as="button">Logout</Link>
            </div>
          </div>
          <div v-else class="flex items-center gap-4">
            <Link :href="route('user.create')">Register</Link>
            <Link :href="route('login')" class="btn-primary">Sign In</Link>
          </div>
        </nav>
      </div>
    </header>
    <main class="container mx-auto p-4 w-full">
      <div
        v-if="flashSuccess"
        class="mb-4 rounded-md border border-green-200 bg-green-50 p-2 shadow-sm dark:border-green-800 dark:bg-green-900"
      >
        {{ flashSuccess }}
      </div>
      <slot>Default</slot>
    </main>
  </Box>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'

defineProps({
  user: Object,
})
const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
const notificationCount = computed(
  () => Math.min(page.props.user.notificationCount, 9),
)
</script>
