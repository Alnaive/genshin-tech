<template>
    <head>
        <title>{{title}}</title>
    </head>
    <Guest>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2  class="text-xl font-semibold leading-tight">
                    {{title}} 
                </h2>
            </div>
        </template>
        <div class="flex flex-wrap">
                <div class="grid overflow-hidden xl:grid-cols-2 xl:grid-rows-2 xl:gap-4 lg:grid-cols-2 lg:grid-rows-2 lg:gap-4 gap-4 grid-flow-row">
                    <div class="card image-full bg-white dark:bg-dark-eval-1">
                        <div class="justify-end card-body">
                            <h2 class="card-title">{{character.name}}</h2>
                            <p class="text-black dark:text-white">Currently No Data For {{character.name}}</p>
                            <form @submit.prevent="searchUID(uid)">
                <div class="flex flex-row space-x-4">
                    <input v-model="uid" type="text" placeholder="UID" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                    <button class="btn btn-primary"><VueFeather type="plus" size="24"></VueFeather></button>
                </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>
    </Guest>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
    import VueFeather from 'vue-feather';

export default {
    components:{
        Head, Link,
        Guest,
        VueFeather,
       
    },
    props: {
        title: String,
        character: Object,
    },
    
    methods:{

        searchUID(uid){
            this.$inertia.get(`/u/${uid}`, {}, { preserveScroll: true });
        },
    },
    
}
</script>

<style>
    .card.image-full:before{
        background-color: transparent;
    }
</style>
