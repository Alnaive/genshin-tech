<template>
    <Guest>
        <template #header>
            <div class="flex  justify-center">
                <h1 class="text-2xl">Build by {{build.nickname}}</h1>
            </div>
             <div class="flex items-center space-x-2 justify-center">
                <VueFeather type="heart" size="24" stroke="red" fill="red"></VueFeather><span class="text-lg">{{build.likes_count}}</span>
            </div>
        </template>
       
        
        <div  class="flex flex-row card shadow-lg overflow-x-auto" >
                <ul id="landscapeData" class="flex flex-row space-x-4 rounded-xl" :style="{ backgroundImage: 'url(' + bgElement() + ')', backgroundSize:'cover', backgroundRepeat: 'no-repeat'}">
                    <li>
                        <div id="potraitData" class="w-[414px] h-[736px] card " >
                        <figure >
                            <img  :src="showAvatar() + build.character.avatar" >
                        </figure> 
                        <div class="drop-shadow-lg shadow-black font-bold text-white absolute ml-4 top-0 mt-1">
                        <pre data-prefix="$"><code>{{ build.character.name}}</code></pre> 
                        <pre data-prefix=">" class="text-warning"><code>Level {{ build.level}}/{{( build.ascendsion * 10) + ( build.ascendsion>0?10:0) + 20}}</code></pre> 
                        </div>
                        <Equip :build="build" />
                        <Conste :build="build" />
                        <Talent :build="build" /> 
                        <div class="card absolute inset-x-0 bottom-0 mt-5">
                            <div class="bg-transparent" >
                                <section class="px-2 py-2 text-white" >
                                    <Stats :build="build" />
                                </section>
                            </div>
                        </div>
                        </div>
                    </li>
                    <li>

                <div class="space-y-1 mt-3 mr-2 text-white">
                    <Weapon :build="build" />
                    <Flower :build="build"/>
                    <Plume :build="build"/>
                    <Sands :build="build"/>
                    <Goblet :build="build"/>
                    <Circlet :build="build"/>
                    <div  class="flex space-x-4 justify-center" >
                        <div class="flex-none ...">
                        <div class="flex flex-col">
                                <div  v-if="build.two_pcs_art">
                                    <div v-for="data in build.two_pcs_art" :key="data" class="font-bold whitespace-nowrap text-md">
                                        {{data}}
                                    </div>
                                </div>
                                <div v-if="build.one_pcs_art">
                                    <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.one_pcs_art}}</div>
                                </div>
                                <div v-if="build.four_pcs_art">
                                    <div class="font-bold whitespace-nowrap text-md mt-[12px]">{{build.four_pcs_art}}</div>
                                </div>
                        </div>
                        </div>
                        <div class="flex-none ...">
                            <div class="flex flex-col " >
                                <div  v-if="build.two_pcs_art">
                                 <div v-for="data in build.two_pcs_art" :key="data" class="font-bold text-md">
                                    <div class="font-bold text-md badge">2</div>
                                    </div>
                                </div>
                                <div v-if="build.one_pcs_art">
                                    <div class="font-bold text-md badge mt-[12px]">3</div>
                                </div>
                                <div v-if="build.four_pcs_art">
                                    <div class="font-bold text-md badge mt-[15px]">4</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </li>
                </ul>
            </div>
            <div class="mt-5 space-x-3">
                <button v-if="!isLiked" class="btn btn-ghost" @click="liked(build.id)"><VueFeather type="heart" size="18" class="mr-1"></VueFeather>Like</button>
                <button  v-else class="btn btn-ghost" @click="disLiked(build.id)"><VueFeather type="heart" size="18" stroke="red" fill="red" class="mr-1"></VueFeather>Dislike</button>
                <button class="btn bg-green-500 hover:bg-green-400 text-white" @click="landscapeImage()"><VueFeather type="image" size="24" class="mr-1" ></VueFeather> Export</button>
            </div>
            <div class="flex mt-2">
                        <div class="bg-transparent " id="canvas-landscape"></div>
                    </div>
            
    </Guest>
</template>

<script>
import Guest from "@/Layouts/Guest.vue";
import VueFeather from 'vue-feather';
import Equip from './Component/Equip.vue';
import Conste from './Component/Conste.vue';
import Talent from './Component/Talent.vue';
import Stats from './Component/Stats.vue';
import Weapon from './Component/Weapon.vue';
import Flower from './Component/Flower.vue';
import Plume from './Component/Plume.vue';
import Sands from './Component/Sands.vue';
import Goblet from './Component/Goblet.vue';
import Circlet from './Component/Circlet.vue';
import domtoimage from 'dom-to-image';



export default{
    components:{
        Guest,
        VueFeather, Equip, Conste, Talent, Stats, Weapon, Flower, Plume, Sands, Goblet, Circlet,
    },
    props:{
        build:Object,
        isLiked:Boolean,
    },
    data() {
		return{
            likeData:'',
        }
	},
    watch:{
        build(newBuild) {
            this.ipAddressLiked = newBuild;
        }
    },
    methods:{
        liked(id){
            this.$inertia.post(`/liked/${id}`, {}, { preserveScroll: true });
        },
        disLiked(id){
            this.$inertia.post(`/disliked/${id}`, {} , { preserveScroll: true });
        },
        showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
       
        bgElement(){
            const ele = this.build.character.element;
                if(ele == "Ice"){
                    return "../image/element/bgCryo.jpg"
                } else if(ele == "Rock"){
                    return "../image/element/bgGeo.jpg"
                } else if(ele == "Dendro"){
                    return "../image/element/bgDendro.jpg"
                } else if(ele == "Wind"){
                    return "../image/element/bgAnemo.jpg"
                } else if(ele == "Electric"){
                    return "../image/element/bgElectro.jpg"
                } else if(ele == "Water"){
                    return "../image/element/bgHydro.jpg"
                } else if(ele == "Fire"){
                    return "../image/element/bgPyro.jpg"
                }
            },
        portraitImage(){
                var node = document.getElementById("potraitData");
                var node1 = document.getElementById("canvas-potrait");

                domtoimage
                .toPng(node)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    node1.appendChild(img);
                })
                .catch(function (error) {
                    console.error("oops, something went wrong!", error);
                });
            },
        landscapeImage(){
                var node = document.getElementById("landscapeData");
                var node1 = document.getElementById("canvas-landscape");

                domtoimage
                .toPng(node)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    node1.appendChild(img);
                })
                .catch(function (error) {
                    console.error("oops, something went wrong!", error);
                });
            },
    },
    mounted(){
        
    }
}
</script>