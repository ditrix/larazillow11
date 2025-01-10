<template>
<span>{{ formatedPrice  }}</span>
</template>
<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: [Number, String],
})

// const formatedPrice = computed(
//   () => { Number(props.price).toLocaleString('de-DE',
//     style: 'currency',
//     currency: 'USD',
//     maximumFractionDigits: 2,}
//   ) },
// )

const formatedPrice = computed(
  () => Number(props.price).toLocaleString('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0,
  }),
)

</script>
