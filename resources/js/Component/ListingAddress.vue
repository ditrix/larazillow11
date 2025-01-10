<template>
<span>{{ listing.street }}  {{ listing.street_nr }}</span>
</template>
<script setup>

defineProps({
  listing: Object,
})
</script>
