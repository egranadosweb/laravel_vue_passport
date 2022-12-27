


export default function validator(e, type, min=2 , max=20){
    
    const target = e.target
    const val = target.value.trim()
    const errorLabel = target.nextSibling

    //Comprobamos si el valor del input está vacío
    if(isEmpty(val)){
        errorLabel.innerText = "*El campo no puede estar vacío."
        target.classList.add("error-input")
        return
    }else{
        target.classList.remove("error-input")
        errorLabel.innerText = " "
    }

    //Comprobamos la logintud del cotenido de los inputs
    if(val.length < min){
        target.classList.add("error-input")
        errorLabel.innerText = `El campo debe tener minimo ${min} caracteres, restan ${min - val.length}`
        return
    }else if(val.length > max){
        target.classList.add("error-input")
        errorLabel.innerText = `El campo debe tener maximo ${max} caracteres, excedido en ${val.length - max}`
        return
    }
    
    //Aplica la validación correspondiente segun el parametro "type" pasado a la funcion
    switch(type){
        case "text":
            if(isString(val)){
                target.classList.remove("error-input")
                errorLabel.innerText = " "
            }else{
                target.classList.add("error-input")
                errorLabel.innerText = "*El campo debe contener solo letras."
                return
            }
            break;
        case "number":
            if(isNumber(val)){
                target.classList.remove("error-input")
                errorLabel.innerText = " "
            }else{
                target.classList.add("error-input")
                errorLabel.innerText = "*El campo debe contener solo números sin espacios."
                return
            }
            break;
        case "email":
            if(isEmail(val)){
                target.classList.remove("error-input")
                errorLabel.innerText = " "
            }else{
                target.classList.add("error-input")
                errorLabel.innerText = "*El campo degebe contener una dirección de correo valilda"
                return
            }
            break;
        case "address":
            if(isAddress(val)){
                target.classList.remove("error-input")
                errorLabel.innerText = " "
            }else{
                target.classList.add("error-input")
                errorLabel.innerText = "*Dirección invalida"
                return
            }
            break;
    }

    // if(errorLabel.innerText != " "){
    //     console.log("element:" +target)
    //     target.classList.add("error-input")
    // }else{
    //     target.classList.remove("error-input")
    // }

}

//funcion que retorna true si el valor pasado está vacio o false si es lo contrario
const isEmpty = (val) => {
    if(val === "" || val === null){
        return true
    }else{
        return false
    }
}
//funcion que retorna true si el valor pasado es un string o false si es lo contrario
const isString = (val) => {
    const validRegEx = /^[a-zA-Z' -]+$/
    if(val !== null && typeof val === "string" && val.length > 0){
        if(validRegEx.test(val)){
            return true
        }else{
            return false
        }
    }else{
        return false
    }
}
//funcion que retorna true si el valor pasado es un numero o false si es lo contrario
const isNumber = (val) => {
    const validRegEx = /^[0-9]*$/
    if(!isNaN(val)){
        if(Number(val) != NaN){
            if(validRegEx.test(val)){
                return true
            }
        }
    }else{
        return false;
    }
}
//funcion que retorna true si el valor pasado corresponde al formato de un email o false si no
const isEmail = (val) => {
    const validRegEx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/
    if(validRegEx.test(val)){
        return true
    }else{
        return false
    }
}

const isAddress = (val) => {
    const validRegEx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/
    if(validRegEx.test(val)){
        return true
    }else{
        return false
    }
}

