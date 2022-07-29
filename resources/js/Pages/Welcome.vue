<template>
    <Head>
        <title>Character</title>
    </Head>
        <Guest>
            <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="alert alert-info shadow-lg">
                    <div>
                        <span> <h1 class="text-lg font-bold">Welcome to genshin-tech</h1> Providing you a reference about build characters 
                         using data collection from travelers on this site.</span>
                    </div>
                </div>
            </div>
            </template>
            <div  class="flex flex-wrap justify-center">
              
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class=" text-black dark:text-white">UID</span>
                        </label>
                        <input v-model="uid" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs bg-accent-content dark:bg-base-100"><br>
                        <!-- <Link :href="route('uid', {id: uid})" class="btn btn-success w-24" >Submit</Link> -->
                                       <button @click="liked(uid)">DS</button>

                    </div>
              
            </div>
        </Guest>
    
</template>

<script>
import { Head, Link, useForm, useRemember } from '@inertiajs/inertia-vue3';
import Navbar from '@/Shared/Navbar';
import Guest from '@/Layouts/Guest.vue'
import VueFeather from 'vue-feather';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
export default {
    components: {
      Head,
      Link,
      Navbar,
      Guest, VueFeather, vSelect,
     
    },
    props: {
        
    },
    data(){
        return {
            uid: 807653846,
        }
    },
    methods: {
        showAvatar() {
            return "/storage/images/icon/avatar/";
        },
         liked(uid){
            this.$inertia.get(`/u/${uid}`, {}, { preserveScroll: true });
        },
    computed:{
        
        }
    }
  
    
}


</script>
<style>
    .rounded-br-3xl{
        color: white;
    }
</style>