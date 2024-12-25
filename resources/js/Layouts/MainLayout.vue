<template>
    <Link href="/">Main</Link>&nbsp;
    <Link href="/hello">Show</Link>
 <!-- eslint-disable-next-line vue/html-self-closing -->
    <slot></slot>
    Current timer is {{ timer  }}
</template>
<script setup>
import { Link } from '@inertiajs/vue3'

import {ref} from 'vue'

const timer = ref(0)

setInterval(()=> timer.value++, 1000)


</script>
