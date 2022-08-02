<template>

    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{title}}
                </h2>
            </div>
        </template>

        <div class="flex flex-wrap space-x-3 justify-center p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="avatar" v-for="(item, index) in weapons.data.items" :key="index">
                <div class="w-24 rounded">
                    <Link :href="route('getWeaponApi')" class="transform hover:scale-105 duration-500 ease-in-out hover:green-500" >
                    <img @click="weaponData(item)" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${item.icon}.png`" alt="">
                    </Link>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
    import {reactive} from 'vue'

    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
        },
        props: {
            weapons: Object,
            
        },
       
        setup(props) {
            const form = reactive({
                name: '',
        })
        return { form,  };
        },
        methods: {
           weaponData(item){
               const i  = item;
               localStorage.setItem('weapon', JSON.stringify(i));
           },
        },
    }

</script>
