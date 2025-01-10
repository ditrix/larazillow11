<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <div>
                <Price :price="listing.price" class="text-2xl font-bold"/>
            <Link :href="route('listing.show',{'listing': listing.id})">
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Link>
            </div>
            <div>
                <Link :href="route('listing.edit',{'listing': listing.id})">Edit</Link>
            </div>
            <div>
            <Link :href="route('listing.destroy',{'listing': listing.id})" method="delete">
                Delete
            </Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
import Box  from '@/Component/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Component/ListingAddress.vue'
import ListingSpace from '@/Component/UI/ListingSpace.vue'
import Price from  '@/Component/UI/Price.vue'

defineProps({
  listings: Array,
})
</script>
