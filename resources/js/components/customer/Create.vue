
<template>
    <div class="card">
        <h5 class="card-header">Clientes - crear cliente nuevo</h5>
        <div class="card-body">
            
            <form action="">
                <div class="form-row">
                    <Input v-model="dniField" id="dni" typeInput="number" labelInput="Número de documento" placeholder="numero de documento" :requiredInput="false"></Input>
                    <Input id="names" typeInput="text" labelInput="Nombres" placeholder="nombres" :requiredInput="false"></Input>
                    <Input id="email" typeInput="email" labelInput="Email" placeholder="email" :requiredInput="false"></Input>
                </div>
            </form>
            <p>asds:{{ dniField }}</p>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref, computed} from "vue"
import {useForm, Form} from "vee-validate"
import * as yup from "yup"
//import Input from "../sub/forms/Input.vue"

let dniField = ref()



</script>

<style scoped>
</style>