<template>
    <section  v-if="build.conste == '1'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="build.conste == '2'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="build.conste == '3'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="build.conste == '4'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="build.conste == '5'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c5_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="build.conste == '6'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c5_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="build.character.constellation.c6_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

   <section v-else>
        <ul  class="flex flex-col w-12 py-1  bg-transparent  absolute right-4 top-16 space-y-1" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c1_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c2_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c3_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c4_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c5_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]" :style="{ backgroundImage: 'url(' + build.character.constellation.c6_icon + ')', backgroundSize:'contain', backgroundColor:'black', opacity:'50' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
        
   </section>
</template>

<script>
export default {
    props: ['build'],
    data(){
        return{
            isPyro: 'ring-red-800',
            isHydro: 'ring-blue-700',
            isAnemo: 'ring-lime-700',
            isElectro: 'ring-violet-700',
            isDendro: 'ring-green-700',
            isCryo: 'ring-cyan-700',
            isGeo: 'ring-amber-700',
        }
    },
    methods:{
            ringColor(){
                const ele = this.build.character.element;
                if(ele == "Cryo"){
                    return this.isCryo;
                } else if(ele == "Geo"){
                    return this.isGeo;
                } else if(ele == "Dendro"){
                    return this.isDendro;
                } else if(ele == "Anemo"){
                    return this.isAnemo;
                } else if(ele == "Electro"){
                    return this.isElectro;
                } else if(ele == "Hydro"){
                    return this.isHydro;
                } else if(ele == "Pyro"){
                    return this.isPyro;
                }
            },
            lock(){
                return "../image/attribute/lock.png"
            },
    }
}
</script>