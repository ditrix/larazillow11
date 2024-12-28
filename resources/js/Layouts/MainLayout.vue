<template>
    <Link href="/">Main</Link>&nbsp;
    <Link href="/hello">Show</Link>
    Current timer is {{ timer  }} <hr/>
 <!-- eslint-disable-next-line vue/html-self-closing -->
    <slot></slot>


</template>
<script setup>
import { Link } from '@inertiajs/vue3'

import {ref} from 'vue'

const timer = ref(0)

setInterval(()=> timer.value++, 1000)


</script>
