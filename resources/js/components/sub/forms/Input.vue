
<template>

    <!-- <div v-if="isText" class="form-group">
        <label for="">{{ props.labelInput }}</label>
        <input :class="$attrs.class" type="text" class="form-control" :placeholder="props.placeholder" :required="isRequired">
    </div> -->

    <div v-if="isText" class="input-group">
        <span class="input-group-text">{{ props.labelInput }}</span>
        <input v-bind="$attrs" :name="$attrs.id" type="text" aria-label="" class="form-control" :placeholder="props.placeholder" :value="modelValue" @input="$emit('update:modelValue')" :required="isRequired">
    </div>

    <div v-if="isNumber" class="input-group">
        <span class="input-group-text">{{ props.labelInput }}</span>
        <input v-bind="$attrs" :name="$attrs.id" type="number" aria-label="" class="form-control" :placeholder="props.placeholder" :required="isRequired">
    </div>

    <div v-if="isEmail" class="input-group">
        <span class="input-group-text">{{ props.labelInput }}</span>
        <input v-bind="$attrs" :name="$attrs.id" type="email" aria-label="" class="form-control" :placeholder="props.placeholder" :required="isRequired">
    </div>

    <div v-if="isSelect" class="form-group">
        <span class="input-group-text">{{ props.labelInput }}</span>
        <select :class="$attrs.class" name="" id="" class="form-select">
            <option value="" selected></option>
        </select>
    </div>

    <div v-if="isCheckBox" class="form-check form-switch">
        <input :class="$attrs.class" class="form-check-input" type="checkbox" value="" role="switch" id="">
        <label class="form-check-label" for="">{{ props.labelInput }}</label>
    </div>

    <div v-if="isRadio" class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="" value="" checked>
        <label class="form-check-label" for="">
            {{ props.labelInput }}
        </label>
    </div>

    <div v-if="isTextArea" class="form-floating">
        <textarea class="form-control" placeholder="" id="" style="height: 100px"></textarea>
        <span class="input-group-text">{{ props.labelInput }}</span>
    </div>

</template>

<script setup>
import {ref, computed, onMounted} from "vue"
const props = defineProps({
    typeInput : {
        type: String,
        required : true,
        default : "text"
    },
    labelInput : {
        type: String,
        required : true,
        default : "Nombre"
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
const isSelect = computed(() => {
    return props.typeInput === "select"? true : false
})
const isRadio = computed(() => {
    return props.typeInput === "radio"? true : false
})
const isCheck = computed(() => {
    return props.typeInput === "checkbox"? true : false
})
const isTextArea = computed(() => {
    return props.typeInput === "textarea"? true : false
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