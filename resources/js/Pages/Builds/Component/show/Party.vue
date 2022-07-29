<template>
 <div v-if="build.healing_bonus > 0 && build.elemental_dmg > 0 && build.physical_dmg > 0" class="space-x-2 absolute left-1 " style="top:50%">
       <div class="flex flex-row gap-2" >
            <div  class="avatar" v-for="data in build.party" :key="data.id">
                <div  class=" rounded-btn w-12 h-12"  >
                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" />
                    <img v-else :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" />
                </div>
            </div>
        </div> 
    </div>
    <div v-else-if="build.elemental_dmg > 0 && build.healing_bonus > 0 || build.physical_dmg > 0" class="space-x-2 absolute left-1" style="top: 53%">
         <div class="flex flex-row gap-2" >
            <div  class="avatar" v-for="data in build.party" :key="data.id">
                <div  class=" rounded-btn w-12 h-12"  >
                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" />
                    <img v-else :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" />
                </div>
            </div>
        </div> 
    </div>
     <div v-else-if="build.elemental_dmg > 0 || build.physical_dmg >0" class="space-x-2 absolute left-1" style="top: 57%">
        <div class="flex flex-row gap-2" >
            <div  class="avatar" v-for="data in build.party" :key="data.id">
                <div  class=" rounded-btn w-12 h-12"  >
                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" />
                    <img v-else :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" />
                </div>
            </div>
        </div> 
    </div>
     <div v-else class="absolute left-1" style="top:60%;">
        <div class="flex flex-row gap-2" >
            <div  class="avatar" v-for="data in build.party" :key="data.id">
                <div  class=" rounded-btn w-12 h-12"  >
                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }" />
                    <img v-else :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }" />
                </div>
            </div>
        </div> 
    </div>
    
</template>
<script>
export default {
    props: ['characters','build'],
    methods:{
            bgRarity(){
                return "../../image/rarity/Background_Item_5_Star.png"
            },
            bg5(){
                return "../../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../../image/rarity/Background_Item_4_Star.png"
            },
    }
}
</script>