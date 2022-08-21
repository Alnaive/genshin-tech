<template>
    <Head>
       <title>Build By {{uid}}</title>
    </Head>
    <Guest>
        <template #header>
            <div>
                <h1 class="text-2xl font-bold">Showcase Character by {{uid}}</h1>
            </div>
        </template>
        <div >
            <div class="flex flex-col items-stretch md:flex-row justify-center">
                <perfect-scrollbar  class=" md:w-1/3 md:h-[730px] overflow-auto ">
                    <div class="flex md:flex-wrap md:justify-center">
                        <div  v-for="build in builds" :key="build">
                            <div @click="show(build.id)" >
                                <div class="relative inline-block w-24 m-2 rounded-lg h-26 h-auto w-32 " :class="showBuild == build.id ? ' border-2 border-white ' : ' border-none'">
                                    <div class=" flex flex-row justify-center rounded-t-lg bg-gray-scale" >
                                        <span>
                                            <img v-if="build.character.rarity == 5" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.character.icon}.png`" class="h-24 h-32 rounded-br-3xl"
                                            :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                                            <img v-else :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.character.icon}.png`" class="h-24 h-32 rounded-br-3xl"
                                            :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" style="border-top-right-radius:0.5rem; border-top-left-radius:0.5rem;">
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-center overflow-auto text-sm bg-gray-scale text-black text-center rounded-b-lg h-9 ">
                                        <p class="text-lg">Lv. {{build.level}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </perfect-scrollbar>
                <div id="divData" >
                    <Characters :builds="builds" :showBuild="showBuild"/>
                </div>
            </div>
        </div>
        <div class="invisible md:visible md:flex md:justify-center md:mt-2">
            <button v-if="showBuild" class="btn bg-green-500 hover:bg-green-400 text-white" @click="exportImage()"><VueFeather type="image" size="24" class="mr-1" ></VueFeather> Export</button>
        </div>
        <div class="flex" id="canvas"></div>

    </Guest>
</template>

<script>
import { Head, Link, } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue';
import VueFeather from 'vue-feather';
import Characters from './Component/Characters.vue';
import { PerfectScrollbar } from 'vue3-perfect-scrollbar';
import domtoimage from 'dom-to-image';

export default {
    components:{
       Head, Link, Guest, VueFeather, Characters, PerfectScrollbar,
    },
    props:{
        uid: String,
        builds: Object,
        nickname: Object,
    },
    data(){
        return{
            showBuild: null,
        }
    },
    watch:{
        build(newshowBuild) {
            newshowBuild;
        }
    },
    methods:{
        show(id){
            this.showBuild = id;
            console.log(this.showBuild = id)
        },
        exportImage(){
            const scale = 1    
                var node = document.getElementById("divData");
                var node1 = document.getElementById("canvas");
                const style = {
                    transform: 'scale('+scale+')',
                    transformOrigin: 'top left',
                    width: node.offsetWidth + "px",
                    height: node.offsetHeight + "px"
                }

                const param = {
                    height: node.offsetHeight * scale,
                    width: node.offsetWidth * scale,
                    quality: 1,
                    style
                }
                domtoimage
                .toPng(node, param)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    node1.appendChild(img);
                })
                .catch(function (error) {
                    console.error("oops, something went wrong!", error);
                });
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
<style src="vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css"/>
