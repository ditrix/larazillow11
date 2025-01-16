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
                Monthly Paymant
            </template>
            <div>
                <label class="label">Interest rate ({{ interestRate }}%)</label>
                <input
                v-model.number="interestRate"
                type="range"
                min="0.1"
                max="30"
                step="0.1"
                class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                />
            </div>
            <div>
                <label class="label">Duration ({{duration}} years)</label>
                <input
                v-model.number="duration"
                type="range"
                min="3"
                max="35"
                step="1"
                class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                />
            </div>
            <div class="text-gray-600 dark:text-gray-300 mt-2">
                <div class="text-gray-400">Your mothly payment</div>
                <Price :price="monthlyPayment" class="text-3xl"/>
            </div>
            <div class="text-gray-500 mt-2">
                <div class="flex justify-between">
                    <div>Total paid</div>
                    <div><Price :price="totalPaid" class="bold" /></div>
                </div>
                <div class="flex justify-between">
                    <div>Principial paid</div>
                    <div><Price :price="listing.price" class="bold" /></div>
                </div>
                <div class="flex justify-between">
                    <div>Total interest</div>
                    <div><Price :price="totalInterest" class="bold" /></div>
                </div>

            </div>
        </Box>
        </div>
    </div>
</template>

<script setup>

import ListingAddress from '@/Component/ListingAddress.vue'
import Box from '@/Component/UI/Box.vue'
import ListingSpace from '@/Component/UI/ListingSpace.vue'
import Price from '@/Component/UI/Price.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
import { ref } from 'vue'


const props = defineProps({
  listing: Object,
})

const interestRate = ref(2.5)
const duration = ref(25)

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.listing.price, interestRate, duration)


</script>

