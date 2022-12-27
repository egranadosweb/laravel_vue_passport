
<template>
    <div class="card">
        <h5 class="card-header">Clientes - crear cliente nuevo</h5>
        <div class="card-body">
            
            <form action="">
                <div class="row mb-2">
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Tipo de documento</label>
                        <select class="form-select" name="" id="">
                            <option value="" selected></option>
                            <option value="">Registro civil</option>
                            <option value="">Tarjeta de identidad</option>
                            <option value="">Pasaporte</option>
                            <option value="">Cedula de ciudadania</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Numero de documento</label>
                        <input class="form-control" type="text" id="dniField" @change="validator($event, 'number')">
                        <span class="form-message-error"> </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Tipo de cliente</label>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="pa">Particular</option>
                            <option value="em">Empresarial</option>
                            <option value="es">Estatal</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Nombre:</label>
                        <input tye="text" name="" class="form-control" id="nameField" @change="validator($event, 'text',4,40)">
                        <span class="form-message-error"> </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Fecha de nacimiento:</label>
                        <input type="date" name="" class="form-control" id="">
                        <span class="form-message-error"> </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for=""><span class="req">*</span>Email:</label>
                        <input type="email" name="" class="form-control" id="emailField" @change="validator($event,'email',4,45)">
                        <span class="form-message-error"> </span>
                    </div>                    
                </div>



                <div class="row mb-2">   
                    <div class="form-group col-md-6">
                        <label for=""><span class="req">*</span>Dirección</label>
                        <div class="row-prueba">

                            <select name="" id="" class="form-select col-md-3">
                                <option value="" selected>Cl</option>
                                <option value="">Av</option>
                                <option value="">Cr</option>
                                <option value="">Dg</option>
                                <option value="">Mz</option>
                            </select>
                            <input type="text" name="" class="form-control col-md-3" id="" @change="validator($event,'address',1,6)">
                            
                            <select name="" id="" class="form-select col-md-3">
                                <option value="" selected>#</option>
                                <option value="">Lc</option>
                                <option value="">Ca</option>
                                <option value="">Pi</option>
                                <option value="">Dg</option>
                            </select>
                            <input type="text" name="" class="form-control col-md-3" id="" @change="validator($event,'address',1,6)">

                            <select name="" id="" class="form-select col-md-3">
                                <option value="">Cl</option>
                                <option value="">Av</option>
                                <option value="">Cr</option>
                                <option value="">Dg</option>
                            </select>
                            <input type="text" name="" class="form-control col-md-3" id="" @change="validator($event,'address',1,6)"> 

                        </div>
                        
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="submit" value="">
                    </div>
                </div>
            </form>

        </div>
    </div>
</template>

<script setup>
import {onMounted, ref, computed} from "vue"
import {useForm, Form} from "vee-validate"
import * as yup from "yup"
import valid from "../../utils/Validator.js"
//import Input from "../sub/forms/Input.vue"

let namesField = ref("")
let dniField = ref()
let emailField = ref("")

const validator = valid

</script>

<style scoped>

.form-message-error {
    color: red;
    font-size: 13px;
}

select {
    background-color: #E9ECEF;
    color: #212529;
}
.row-prueba{
    display: flex;
}
.row-prueba select, .row-prueba input{
    display: block;
}

.row-prueba select {
    width: 12%;
}

.row-prueba input {
    width: 21.3%;
}

.error-input{
    border: 2px dotted red;
}
</style>