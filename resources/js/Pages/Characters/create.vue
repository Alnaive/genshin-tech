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
                <div class=" transform hover:scale-105 duration-500 ease-in-out hover:green-500" v-for="(data, key) in characters.data.items" :key="data">
                <Link :href="route('getCharacterApi')" >
                    <div class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32 ">
                        <div @click="charData(data)" class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                            <span>
                                <img v-if="data.rank == '5'" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${data.icon}.png`" class="h-24 h-32 rounded-br-3xl"
                                :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                                <img v-else :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${data.icon}.png`" class="h-24 h-32 rounded-br-3xl"
                                :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                            </span>
                        </div>
                        <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                            <p class="leading-none">{{data.name}}</p>
                        </div>
                    </div>
                   
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
    import axios from 'axios'

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
                char: {},
            }
        },
        methods: {
            charData(data){
                axios.get(`https://api.ambr.top/v2/en/avatar/${data.id}`).then(response => { 
                    localStorage.setItem('character', JSON.stringify(response.data.data));
                })
            },
            bg5(){
            return "../image/rarity/Background_Item_5_Star.png"
        },
        bg4(){
            return "../image/rarity/Background_Item_4_Star.png"
        },
            
        },
    }

</script>
