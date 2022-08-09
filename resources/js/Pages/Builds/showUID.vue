<template>
    <Head>
       <title>Build By {{uid}}</title>
    </Head>
    <Guest>
        <template #header>
            <div>
                <h1 class="text-lg">{{uid}} Showcase </h1>
            </div>
        </template>
        <div class="flex flex-wrap justify-center gap-2">
            <Characters :builds="builds" />
        </div>
    </Guest>
</template>

<script>
import { Head, Link, } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
import VueFeather from 'vue-feather';
import Characters from './Component/Characters.vue';

export default {
    components:{
       Head, Link, Guest, VueFeather, Characters,
    },
    props:{
        uid: String,
        builds: Object,
        nickname: Object,
    },
    data(){
        return{
            element: [],
        }
    },
    methods:{
    
    defineElement(){
        this.builds.map((item) => {
           this.element.push(item.character.element)
        })
    },
       
    
    },
    mounted(){
        this.defineElement();
    }
}

</script>