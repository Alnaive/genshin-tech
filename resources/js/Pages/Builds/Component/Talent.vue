<template>
     <div class="flex flex-col w-14 py-3 gap-1  bg-transparent  absolute right-4 space-y-1" style="top:360px;">
            <div class="avatar indicator ml-2">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]">
                    <div class="indicator-item ">
                        <div  class="text-center text-sm text-black dark:text-white" >
                            {{talent1}}
                        </div>
                    </div>
                    <img :src="normalAtk()">
                </div>
            </div>
            <div class="avatar indicator ml-2">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]">
                        <div class="indicator-item ">
                        <div  class="text-center text-sm text-black dark:text-white" >
                            {{talent2}}
                        </div>
                    </div>
                    <img :src="eleSkill()">
                </div>
            </div>
            <div class="avatar indicator ml-2">
                <div class=" rounded-full w-10 h-10 ring" :class="[ringColor()]">
                        <div class="indicator-item ">
                        <div  class="text-center text-sm text-black dark:text-white" >
                            {{talent3}}
                        </div>
                    </div>
                    <img :src="eleBurst()">
                </div>
            </div>
    </div>
</template>

<script>
export default {
    props:['character','talent1','talent2','talent3'],
    data(){
        return{
            isPyro: 'ring-red-700',
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
            const ele = this.character.element;
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
        normalAtk(){
            const src = this.character.talent.talent1_icon;
            const url = "https://res.cloudinary.com/genshin/image/upload/sprites/"+src+".png"
            return url;
        },
        eleSkill(){
            const src = this.character.talent.talent2_icon;
            const url = "https://res.cloudinary.com/genshin/image/upload/sprites/"+src+".png"
            return url;
        },
        eleBurst(){
            const src = this.character.talent.talent3_icon;
            const url = "https://res.cloudinary.com/genshin/image/upload/sprites/"+src+".png"
            return url;
        },
    }
}
</script>