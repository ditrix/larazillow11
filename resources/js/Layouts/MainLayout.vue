<template>



    <header class="border-b border-gray-200 bg-white
        dark:border-gray-700 dark:bg-gray-900 w-full">
        <div class="container mx-auto ">
            <nav class="p-4 items-center flex justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listing</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">Larazillow</Link>
                </div>
                <div class="btn-primary">
                    <Link :href="route('listing.create')">+  New listing</Link>
                </div>
            </nav>
        </div>

    </header>
    <main class="container mx-auto p-4">
        <div v-if="page.props.flash.success" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{page.props.flash.success}}
        </div>
        <slot>default</slot>
    </main>

</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
</script>
<style scoped>
.success {
    background-color: green;
    color: lightgray;
    font-size: small;
    padding: 0.3rem 1rem;
}

</style>
