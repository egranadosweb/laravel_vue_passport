
<template>

    
        <input v-if="isText" v-bind="$attrs" :name="$attrs.id" type="text" aria-label="" class="form-control" :placeholder="props.placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :required="isRequired">
   

    
        <input v-if="isNumber" v-bind="$attrs" :name="$attrs.id" type="number" aria-label="" class="form-control" :placeholder="props.placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :required="isRequired">
    

   
        <input v-if="isEmail" v-bind="$attrs" :name="$attrs.id" type="email" aria-label="" class="form-control" :placeholder="props.placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :required="isRequired">
    

    

</template>

<script setup>
import {ref, computed, onMounted} from "vue"
const props = defineProps({
    typeInput : {
        type: String,
        required : true,
        default : "text"
    },
    placeholder : {
        type : String,
        required : false,
        default : "Digite un texto"
    },
    numOptions : {
        type : String,
        required : false,
        default : "1"
    },
    requiredInput : {
        type : Number,
        required : true,
        default : 1
    },
    modelValue : {
        type : String,
        required : false,
    }
})

const emits = defineEmits(["update:modelValue"])

const isText = computed(() => {
    return props.typeInput === "text"? true : false
})

const isNumber = computed(() => {
    return props.typeInput === "number"? true : false
})
const isEmail = computed(() => {
    return props.typeInput === "email"? true : false
})

const isRequired = computed(() => {
    return props.requiredInput
})


</script>

<style scoped>
.form-group, .input-group{
    margin-bottom: 21px;
}
.form-group label{
    margin-bottom: 8px;
}
</style>