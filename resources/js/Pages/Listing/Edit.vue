<template>
    <form @submit.prevent="update">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input class="input" type="text" v-model.number="form.beds"  />
                <FormErrorMessage v-if="form.errors.beds" :message="form.errors.beds" />
            </div>
            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" type="text" v-model.number="form.baths" />
                <FormErrorMessage v-if="form.errors.baths" :message="form.errors.baths" />
            </div>
            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input"  type="text" v-model.number="form.area" />
                <FormErrorMessage v-if="form.errors.area" :message="form.errors.area" />
            </div>
            <div class="col-span-4">
                <label class="label">City</label>
                <input class="input"  type="text" v-model.number="form.city" />
                <FormErrorMessage v-if="form.errors.city" :message="form.errors.city" />
            </div>
            <div class="col-span-2">
                <label class="label">Code</label>
                <input class="input"  type="text" v-model.number="form.code" />
                <FormErrorMessage v-if="form.errors.code" :message="form.errors.code" />
            </div>
            <div class="col-span-4">
                <label class="label">Street</label>
                <input class="input"  type="text" v-model="form.street" />
                <FormErrorMessage v-if="form.errors.street" :message="form.errors.street" />
            </div>
            <div class="col-span-2">
                <label class="label">Street Nr</label>
                <input class="input"  type="text" v-model.number="form.street_nr" />
                <FormErrorMessage v-if="form.errors.street_nr" :message="form.errors.street_nr" />
            </div>
            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input"  type="text" v-model.number="form.price" />
                <FormErrorMessage v-if="form.errors.price" :message="form.errors.price" />
            </div>
            <div class="col-span-2">
                <input class="btn-primary" type="submit" value="Update" />
            </div>
        </div>
    </form>
</template>
<script setup>

import {useForm} from '@inertiajs/vue3'
import FormErrorMessage from '@/Component/UI/FormErrorMessage.vue'

const props = defineProps({
  listing: Object,
})

const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  code: props.listing.code,
  street: props.listing.street,
  street_nr: props.listing.street_nr,
  price: props.listing.price,
})

const update = () => form.put(route('listing.update',{listing: props.listing.id}))

</script>

