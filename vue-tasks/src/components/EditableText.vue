<template>
    <span>
        <span v-if="!editing" @dblclick="editing=true">
        {{ currentText }}
            <svg @click="editing=true"  fill="#61AB00" class="h-3 w-3 ml-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
        </span>
        <span v-if="editing" @keyup.esc="editing=false" @keyup.enter="edit">
            <input type="text" v-model="currentText">
            <svg @click="editing=false" fill="#FF0000" class="h-4 w-4 ml-2 mr-2 mlcursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zM11.4 10l2.83-2.83-1.41-1.41L10 8.59 7.17 5.76 5.76 7.17 8.59 10l-2.83 2.83 1.41 1.41L10 11.41l2.83 2.83 1.41-1.41L11.41 10z"/></svg>
            <svg @click="edit" fill="#61AB00" class="h-4 w-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"/></svg>
        </span>
    </span>
</template>

<script>

    export default {
        name: 'EditableText',
        data() {
            return {
                editing: false,
                currentText: this.text
            }
        },
        props: {
            'text': {
                type: String,
                required: true
            }
    },
        methods: {
            edit() {

                this.editing = false
                // informar al pare
                this.$emit('edited', this.currentText)
            }

        }
    }

</script>