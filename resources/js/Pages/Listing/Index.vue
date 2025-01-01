<template>
    <div v-for="listing in listings" :key="listing.id">

        <Link :href="`/listing/${listing.id}`">
            <ListingAddress :listing="listing"/>
        </Link>&nbsp;
        <span class="ml-5">
            <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
        </span>&nbsp;
        <Link :href="`/listing/${listing.id}`" method="delete">
            Delete
        </Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Component/ListingAddress.vue'
defineProps({
  listings: Array,
})
</script>
