

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
const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTUyMjE0ZWIxMzgxYzdlNzYwMzFiZGMzNzVmODY3NzQ1OGNiZWMzNTQwZDczNWFmODljYmI4NzFhYjFkN2U2ZWQxYjk2NjFiM2I3ZDE0NzQiLCJpYXQiOjE2NzE5MDA1MDUuNzg5ODM4LCJuYmYiOjE2NzE5MDA1MDUuNzg5ODQxLCJleHAiOjE3MDM0MzY1MDUuNzg0MjgyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.u8g63q3lur9K2EW2dvYZoDrdDNYCeXb51f9nUGyBK3XEhm3DtlyUAJC_ez_f1VJU8OAFPiEFs2gyl7AwI1tuDZvwbT5EunFWHfp4pzVOfxuauPEaroCGaOl_081IL2-xZemns4K8rD-qftuv95N7tldLkNtQM24kmUwbnfu9YLeEYnl3gHoZYifmDvJgt2567Wn4xlFx1AE02y0S3ujtWarHVZyos-oglZRZ4goynXET2PPG3O6Uq1te02u53jVwk9nqFoRcKU3ZnrBsole4MDYT9d6xWzGQa7Bwy7T0Kb54I7wUKn22OAEn19ooUSlmF7h8Ru__4D_xufDeE4OqWb775dfU8s9jS9k1fJyYBwMM1gCciO5zRo1HSIvRBrmR3Sf5e6rQUTRmGYDaIoZmB3QTpxzbr6b62NMnP6ddQuoxcupfsw9whpE7z_DlXVC7j1CZwgC7D8y_UN6nTZnIw1HkvIPodracgidJdSpm52UuPKd5pLDpb-aMclEuCDCKq5dIpGAm0Vu8FMIyu1fdWsUBMspJIEO4IFrxwCuMn0leE-x8y3SmpnWULyVxgBHGoTp-_5WJPtr-ojeshadfNdS08kJLZi5TqmcypiM4WQ30yS4nKk0vVgKavp7RlZOHcyjngdnO7a8SRFcRfxjF_b4PilIgFGrX7qoSfQltOTc"
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