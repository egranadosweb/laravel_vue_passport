

<template>
    <div class="card">
        <h5 class="card-header">Lista de clientes</h5>
        <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            
            <table class="table table-dark" id="table-customers">
                
            </table>

        </div>
    </div>
</template>

<script setup>
import {ref, computed, onMounted} from "vue"

//let url = "/api/customers"
const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTAzMDhlNjVmZDRiNTA2YjA4ZjNlOGI5ZWM4YWMyOGZlMGUzMTk5Y2FhM2U1ZTk0NjZmMWRkODBlZjA4MjMyNGQyNTk5MzU2YjRkNTFlMDEiLCJpYXQiOjE2NzE0MTU2NjMuNjgwMjY3LCJuYmYiOjE2NzE0MTU2NjMuNjgwMjcxLCJleHAiOjE3MDI5NTE2NjMuNjczMjg5LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.cvKo-o98dfZCxnzNxLLIm7LZN0UUNeji4h0CTtrk0BcE8_I4LO8B5hEx2YTSBQIglQ7SMaculjb4wcmMvp3t_XOKgWyD-PEzeWIRmDB8zwcu42nGWdfR3NuyIXRX71JcGDEyn_9PTbSj5UXUulOy3vhPZ0M97k5mgZcjVN1G7AjRvMUUA7NiYP3J5ySLM0eR6axIZZR-M4vcYTA7FOv6mWictKpUqZvIblY1lavW3_eohjQuo84VWc_fEIvNpADjqoZSCjUcl1759c85SZfeDZWnEnFbjdAO74DNgHPvtcDcQyaKHno9wFSz-ZLuhgtsjfOD-iLYZYolug3YfHHtnHplq3wlEEIDPFPy8M1Pyijnav7dFRF2UtMLU5WrcK0UUWk7a92Uy7ZSQHXBZJga2AB0Zg8tpA5NMU1VjCZndRg0mxtTraq9KRnunqPxvDdo6oBQwLF0XjHRo2anUKWYR8r927O30W5_3swjm6838wK4pMwaoZkqWaorGcW0H1wnrEzCr5JIXNACGX5UmUws_08eWc8YRXrgFD-J12Pb0_f1jL2wIWrga4dy9AUwC2o957SjDzSl3YK_9VuOJBJtQQoQKqmqw9KMpnXkRSHcpf5ERlDyZEnjmi4PUQjr1fJVaCQ3ARBN2VqlUBdxztR_oPAAOZ6sOZDs2VuYo4qPchM"
let tableCustomers = null

onMounted(async () =>{
    try{
        console.log("Entro")
        const response = await fetch("/api/customers/",{
            headers : {
                "Authorization" : "Bearer " + token
            }
        })

        if(response.status == 200){
        let data = await response.json()
        console.log(data)
        drawTable(data.customers)
        }
    }

    catch(error){
        console.log("Error " + error)
    }    
})

//FUNCION PARA DIBUJAR TABLA
const drawTable = (customers) => {
    tableCustomers = document.querySelector("#table-customers")
    let tab = `
            <thead>
                <tr>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Dirección 2</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Telefono 2</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                <tr>
            </thead>
            <tbody>
    `
    customers.forEach((item, index) => {
        const row = `
            <tr>
                <td>${item.dni}</td>
                <td>${item.name}</td>
                <td>${item.address}</td>
                <td>${item.address2}</td>
                <td>${item.city}</td>
                <td>${item.phone}</td>
                <td>${item.phone2}</td>
                <td>${item.customer_types_id}</td>
                <td>
                    <button style="margin:5px 0" id="btn-eliminar" class="btn btn-danger">Eliminar</button>
                    <button style="margin:5px 0" id="btn-editar" class="btn btn-success">Editar</button>
                </td>
            </tr> 
        `
        tab += row
    })

    tab += "<tbody>"

    tableCustomers.innerHTML = tab
}

</script>

<style scoped>
#table-customers button {
    color: red;
}
</style>