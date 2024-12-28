<template>
    <h1>is show</h1>
    <ListingAddress :listing="listing"/>
</template>

<script setup>
import ListingAddress from '@/Component/ListingAddress.vue'


defineProps({
  listing: Object,
})
</script>
