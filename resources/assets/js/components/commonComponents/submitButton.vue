<template>
    <button class="btn mobile-btn d-inline-flex"
            type="submit"
            @click.prevent="submit()"
            :disabled="isDisabled"
            style="
            background-color: #CA965C;
            color: white;
            "
            >
        <span class="w-100" :class="{buttonText:buttonLoader}">
            <roller-loader class="d-inline mx-2" v-if="buttonLoader"/>
            <strong>{{ trans('lang.'+buttonText) }}</strong>
        </span>
    </button>
</template>
<script>
    export default {
        props:['buttonLoader','isDisabled','isActiveText','buttonText'],
        data() {
            return {
            }
        },
        mounted(){

        },
        methods:{
            submit(){
                let instance=this;
                instance.$emit('submit');
            },
        }
    }
</script>
