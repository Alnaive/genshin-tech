<template>
    <section> 
        <ul class="flex flex-col w-[70px]  bg-transparent absolute right-[-10px] top-12 ">
            <li  v-if="sessionData.talentIdList">
                <div>
                    <div v-if="sessionData.talentIdList.length >= 1" class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[0]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14"  style="background-image: url('/image/svg/Const.svg');" >
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[0]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="sessionData.talentIdList.length <= 1" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[1]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[1]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="sessionData.talentIdList.length <= 2" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[2]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[2]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="sessionData.talentIdList.length <= 3" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[3]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[3]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="sessionData.talentIdList.length <= 4" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[4]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[4]}.png`" alt="">
                        </div>
                    </div>
                </div>
                <div>
                    <div v-if="sessionData.talentIdList.length <= 5" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[5]}.png`" alt="">
                        </div>
                    </div>
                    <div v-else class="hero w-14 h-14" :style="{backgroundImage: 'url('+ constBorder() +')'}">
                        <div  class="hero-content text-center text-neutral-content">
                            <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${charData.Consts[5]}.png`" alt="">
                        </div>
                    </div>
                </div>
            </li>
            <li v-else>
                <div v-for="cons in charData.Consts" :key="cons" class="hero w-14 h-14" style="background-image: url('/image/svg/Const.svg');">
                    <div class="hero-content text-center text-neutral-content">
                        <img :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${cons}.png`" alt="">
                    </div>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
export default {
    props: ['charData', 'sessionData'],
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
            constBorder(){
                const ele = this.charData.element;
                if(ele == "Ice"){
                    return '../image/svg/Const_Cryo.svg';
                } else if(ele == "Rock"){
                    return "../image/svg/Const_Geo.svg";
                } else if(ele == "Dendro"){
                    return this.isDendro;
                } else if(ele == "Wind"){
                    return "../image/svg/Const_Anemo.svg";
                } else if(ele == "Electric"){
                    return "../image/svg/Const_Electro.svg";
                } else if(ele == "Water"){
                    return "../image/svg/Const_Hydro.svg";
                } else if(ele == "Fire"){
                    return "../image/svg/Const_Pyro.svg";
                } else {
                    return "../image/svg/Const_Dendro.svg"
                }
            },
            lock(){
                return "../image/attribute/lock.png"
            },
    }
}
</script>