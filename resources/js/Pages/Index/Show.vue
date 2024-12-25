<template>
    <div>Show</div>
    <p>{{ message }}</p>
    <Link href="/">Main page</Link>
</template>


<script setup>
import { Link } from '@inertiajs/vue3'
defineProps(['message'])
</script>
