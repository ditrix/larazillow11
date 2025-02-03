<template>
    <form @submit.prevent="create">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label" >Beds</label>
                <input class="input" type="text" v-model.number="form.beds" />
                <FormErrorMessage v-if="form.errors.beds" :message=" form.errors.beds"/>
            </div>
            <div class="col-span-2">
                <label class="label" >Bayths</label>
                <input class="input" type="text" v-model.number="form.baths" />
                <FormErrorMessage v-if="form.errors.baths" :message=" form.errors.baths"/>
            </div>
            <div class="col-span-2">
                <label class="label" >Area</label>
                <input class="input" type="text" v-model.number="form.area" />
                <FormErrorMessage v-if="form.errors.area" :message=" form.errors.area"/>
            </div>
            <div class="col-span-4">
                <label class="label" >City</label>
                <input class="input" type="text" v-model.number="form.city" />
                <FormErrorMessage v-if="form.errors.city" :message=" form.errors.city"/>
            </div>
            <div class="col-span-2">
                <label class="label" >Code</label>
                <input class="input" type="text" v-model.number="form.code" />
                <FormErrorMessage v-if="form.errors.code" :message=" form.errors.code"/>
            </div>
            <div class="col-span-4">
                <label class="label" >Street</label>
                <input class="input" type="text" v-model="form.street" />
                <FormErrorMessage v-if="form.errors.street" :message=" form.errors.street"/>
            </div>
            <div class="col-span-2">
                <label class="label" >Street Nr</label>
                <input class="input" type="text" v-model.number="form.street_nr" />
                <FormErrorMessage v-if="form.errors.street_nr" :message=" form.errors.street_nr"/>
            </div>
            <div class="col-span-6">
                <label class="label" >Price</label>
                <input class="input" type="text" v-model.number="form.price" />
                <FormErrorMessage v-if="form.errors.price" :message="form.errors.price" />
            </div>
            <div>
                <input class="btn-primary" type="submit" value="Create" />
            </div>
            <div class="mt-2 text-center">
                <Link :href="route('user-account.create')"
                    class="text-sm text-gray-500"
                >
                    Have account?  Click to login page
                </Link>
            </div>
        </div>
    </form>
</template>
<script setup>

import {useForm, Link} from '@inertiajs/vue3'
import FormErrorMessage from '@/Component/UI/FormErrorMessage.vue'

const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  code: null,
  street: null,
  street_nr: null,
  price: 0,
})

const create = () => form.post(route('listing.store'))

</script>
