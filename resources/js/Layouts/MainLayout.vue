<template>
    <Link href="/listing">Listing</Link>&nbsp;
    <Link href="/listing/create">New listing</Link>

    <div v-if="page.props.flash.success" class="success">
    {{page.props.flash.success}}
    </div>

    <slot/>


</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

//console.log(page.props.flash.success)

</script>
<style scoped>
.success {
    background-color: green;
    color: lightgray;
    font-size: small;
    padding: 0.3rem 1rem;
}

</style>
