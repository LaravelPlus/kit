<script setup lang='ts'>
import { computed } from 'vue'

const props = defineProps({ status: Number })

const title = computed(() => {
    return {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
    }[props.status as number]
})

const description = computed(() => {
    return {
        503: 'Sorry, we are doing some maintenance. Please check back soon.',
        500: 'Whoops, something went wrong on our servers.',
        404: 'Sorry, the page you are looking for could not be found.',
        403: 'Sorry, you are forbidden from accessing this page.',
    }[props.status as number]
})
</script>

<template>
    <div class='w-screen h-screen text-blue-500 grid place-items-center'>
        <div class='text-center'>
            <h1 class='text-3xl'>{{ title }}</h1>
            <img class="block h-3/4 w-auto m-auto" src="/assets/images/illustration.svg" alt="illustration" />
            <div class='text-lg'>{{ description }}</div>
        </div>
    </div>
</template>
