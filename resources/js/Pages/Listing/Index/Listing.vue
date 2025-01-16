<template>
    <Box>
        <div>
            <div class="flex gap-1 items-center">
                <Price :price="listing.price" class="text-2xl font-bold"/>
                <div  class="text-xs text-gray-800">
                <Price :price="monthlyPayment"/>pm
                </div>
            </div>
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
</template>
<script setup>
import Box  from '@/Component/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Component/ListingAddress.vue'
import ListingSpace from '@/Component/UI/ListingSpace.vue'
import Price from  '@/Component/UI/Price.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'

const props = defineProps({
  listing: Object,
})

const {monthlyPayment} = useMonthlyPayment(
  props.listing.price, 2.5, 25,
)


</script>
