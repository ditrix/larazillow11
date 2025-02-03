<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto mt-4">
            <div>
                <label for="name" class="label">Name</label>
                <input id="name"  v-model="form.name" class="input" type="text" />
                <div v-if="form.errors.email" class="input-error">{{form.errors.name}}</div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">Email</label>
                <input id="email"  v-model="form.email" class="input" type="text" />
                <div v-if="form.errors.email" class="input-error">{{form.errors.email}}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input id="password"  v-model="form.password" class="input" type="password" />
                <div v-if="form.errors.password" class="input-error">{{form.errors.password}}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input id="password_confirmation"  v-model="form.password_confirmation" class="input" type="password" />
            </div>
            <div class="mt-4">
            <button class="btn-primary w-full" type="submit">Create account</button>
            </div>
            <div class="mt-2 text-center">
                <Link :href="route('login')" class="text-sm text-gray-500">
                    Have account? Click for login
                </Link>
            </div>
        </div>
    </form>
</template>
<script setup>
import {useForm , Link} from '@inertiajs/vue3'


const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const register = () => form.post(route('user-account.store'))

</script>
