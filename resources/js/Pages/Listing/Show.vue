<template>
    <div class="flex flex-col-reverse gap-4 md:grid md:grid-cols-12">

        <Box class="md:col-span-7 items-center w-full flex text-center">
            <div class="w-full text-gray-500 font-medium">No image</div>
        </Box>

        <div class="md:col-span-5 flex flex-col gap-4">
        <Box>
            <template #header>
                Main info
            </template>
            <Price :price="listing.price" class="text-2xl font-bold"/>
            <ListingSpace :listing="listing" class="text-lg"/>
            <ListingAddress :listing="listing" class="text-gray-500"/>
        </Box>
        <Box>
            <template #header>
                Offer
            </template>
            Make an offer
        </Box>
        </div>
    </div>
</template>

<script setup>

import ListingAddress from '@/Component/ListingAddress.vue'
import Box from '@/Component/UI/Box.vue'
import ListingSpace from '@/Component/UI/ListingSpace.vue'
import Price from '@/Component/UI/Price.vue'

defineProps({
  listing: Object,
})
</script>

