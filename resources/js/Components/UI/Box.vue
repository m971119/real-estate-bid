<template>
  <div
    class="rounded-md border border-gray-200 p-4 shadow-sm dark:border-gray-800 dark:text-gray-300"
  >
    <header class="text-gray-500 mb-1">
      <slot name="header" />
    </header>
    <slot />
  </div>
</template>
