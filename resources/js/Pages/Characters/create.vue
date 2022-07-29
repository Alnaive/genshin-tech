<template>

    <Head>

    </Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight" >
                    <button @click="test()">asd</button>
                    {{test}}
                </h2>
            </div>
        </template>

        <div>
            <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
             <div  class="flex flex-wrap justify-center" >
                <div class=" transform hover:scale-105 duration-500 ease-in-out hover:green-500" v-for="(data, key) in characters" :key="data">
                <Link :href="route('getCharacterApi')" >
                    <img @click="charData(data)" v-on:click="charKey(key)" :src="`https://enka.shinshin.moe/ui/${data.SideIconName}.png`">
                </Link>
                </div>
            </div>
        </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {Head,useForm, Link} from '@inertiajs/inertia-vue3'
    import {reactive} from 'vue'
    const GenshinDb = require('genshin-db');

    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
        },
        props: {
            charID: Object,
            characters: Object,
        },
       
        setup(props) {
            const form = reactive({
                name: '',
                keys: null,
        })
        return { form,  };
        },
        data(){
            return{
                arr:[],
            }
        },
        methods: {
            charData(data){
                const i = this.name = data;
                localStorage.setItem('character', JSON.stringify(i));
            },
            charKey(key){
                const i = this.keys = key;
                localStorage.setItem('charKey', JSON.stringify(i));
            },
            
        },
    }

</script>
