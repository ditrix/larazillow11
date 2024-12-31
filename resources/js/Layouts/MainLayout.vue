<template>
    <Link href="/">Main</Link>&nbsp;
    <Link href="/hello">Show</Link>

    <div v-if="page.props.flash.success" class="success">
    {{page.props.flash.success}}
    </div>

    <slot/>


</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

console.log(page.props.flash.success)

</script>
<style scoped>
.success {
    background-color: green;
    color: aliceblue;
}
</style>
