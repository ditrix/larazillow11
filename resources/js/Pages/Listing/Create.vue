<template>
    <form @submit.prevent="create">

        <div>
            <div>
                <label>Beds</label>
                <input type="text" v-model.number="form.beds" />
                <div class="error_mess" v-if="form.errors.beds">{{ form.errors.beds  }}</div>
            </div>
            <div>
                <label>Bayths</label>
                <input type="text" v-model.number="form.baths" />
                <div class="error_mess" v-if="form.errors.baths">{{ form.errors.baths  }}</div>
            </div>
            <div>
                <label>Area</label>
                <input type="text" v-model.number="form.area" />
                <div class="error_mess" v-if="form.errors.area">{{ form.errors.area  }}</div>
            </div>
            <div>
                <label>City</label>
                <input type="text" v-model.number="form.city" />
                <div class="error_mess" v-if="form.errors.city">{{ form.errors.city  }}</div>
            </div>
            <div>
                <label>Code</label>
                <input type="text" v-model.number="form.code" />
                <div class="error_mess" v-if="form.errors.code">{{ form.errors.code  }}</div>
            </div>
            <div>
                <label>Street</label>
                <input type="text" v-model="form.street" />
                <div class="error_mess" v-if="form.errors.street">{{ form.errors.street  }}</div>
            </div>
            <div>
                <label>Street Nr</label>
                <input type="text" v-model.number="form.street_nr" />
                <div class="error_mess" v-if="form.errors.street_nr">{{ form.errors.street_nr  }}</div>
            </div>
            <div>
                <label>Price</label>
                <input type="text" v-model.number="form.price" />
                <div class="error_mess" v-if="form.errors.price">{{ form.errors.price  }}</div>
            </div>
            <div>
                <input type="submit" value="Create" />
            </div>
        </div>
    </form>
</template>
<script setup>

import {useForm} from '@inertiajs/vue3'

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

const create = () => form.post('/listing')

</script>
<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
.error_mess {
    font-size: small;
    color: red;
}

</style>
