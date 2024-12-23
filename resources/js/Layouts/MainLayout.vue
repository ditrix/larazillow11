<template>
    <Link href="/">Main</Link>&nbsp;
    <Link href="/hello">Show</Link>
<slot></slot>
Current timer is {{ timer  }}
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

import {ref} from 'vue';

const timer = ref(0);

setInterval(()=> timer.value++, 1000);


</script>
