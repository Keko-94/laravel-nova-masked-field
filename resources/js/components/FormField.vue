<template>
    <DefaultField
        :field="currentField"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <input
                :id="currentField.uniqueKey"
                type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="currentField.placeholder"
                v-model="value"
                v-maska="maskOptions"
                @maska="handleChange"
            />
        </template>
    </DefaultField>
</template>

<script>
import {DependentFormField, HandlesValidationErrors} from 'laravel-nova'
import { vMaska } from "maska/vue"

export default {
    mixins: [DependentFormField, HandlesValidationErrors],

    directives: {maska: vMaska},

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.currentField.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.currentField.attribute, this.value || '')
        },
    },

    computed: {
        maskOptions() {
            return this.currentField.maskOptions;
        },
    },
}
</script>
