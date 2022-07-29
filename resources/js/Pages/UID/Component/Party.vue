<template>
 <div v-if="build.healing_bonus > 0 && build.elemental_dmg > 0 && build.physical_dmg > 0" class="space-x-2 absolute left-1 " style="top:50%">
       <div v-if="!data.proudSkillExtraLevelMap"  class="flex flex-col w-14 py-3 gap-1  bg-transparent  absolute right-[8px] space-y-1" style="top:360px;">
        <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
            <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator "> 
                <div v-if="skillKey == iconKey"  class="indicator-item ">
                    <span class="ml-[10px] text-center text-md font-bold text-black dark:text-white">{{skillLv}}</span> 
                </div>
                <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring">
                    <img  :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 1" class="flex flex-col w-14 py-3 gap-1  bg-transparent  absolute right-[8px] space-y-1" style="top:360px;">
            <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap)" :key="conS">
                <div v-for="(proudVal, proudKey) in char.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conS">
                    <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                        <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator "> 
                            <div v-if="skillKey == iconKey"  class="indicator-item ">
                                <span v-if="skillKey == proudKey" class="ml-[10px] text-center text-md font-bold text-blue-400">
                                {{skillLv + data.proudSkillExtraLevelMap[conS]}}
                                </span>
                                <span v-else class="ml-[10px] text-center text-md font-bold text-black dark:text-white">{{skillLv}}</span> 
                            </div>
                            <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring">
                                <img  :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 2" class="flex flex-col w-14 py-3 gap-1  bg-transparent  absolute right-[8px] space-y-1" style="top:360px;">
        <div v-for="conT in Object.keys(data.proudSkillExtraLevelMap).splice(0,1)" :key="conT">
            <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap).splice(1,1)" :key="conS">
                <div v-for="(proudVal, proudKey) in char.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conT && conS">
                        <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                            <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator"> 
                                    <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[0]"  class="indicator-item ">
                                    <span v-if="proudVal != 3331" class="ml-[10px] text-center text-md font-bold ">{{skillLv}}</span>
                                    <span v-else class="ml-[10px] text-center text-md font-bold text-blue-400">{{skillLv + data.proudSkillExtraLevelMap[conT]}}</span> 
                                    </div>
                                    <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[1]"  class="indicator-item ">
                                    <span  class="ml-[10px] text-center text-md font-bold text-blue-400">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span> 
                                    </div>
                                    <div v-if="skillKey == iconKey && skillKey == char.SkillOrder[2]"  class="indicator-item ">
                                    <span v-if="skillKey == 10333" class="ml-[10px] text-center text-md font-bold">{{skillLv}}</span>
                                    <span v-else class="ml-[10px] text-center text-md font-bold text-blue-400">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span> 
                                    </div>
                                <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring">
                                    <img :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(data.proudSkillExtraLevelMap).length == 3" class="flex flex-col w-14 py-3 gap-1  bg-transparent  absolute right-[8px] space-y-1" style="top:360px;">
        <div v-for="nT in Object.keys(data.proudSkillExtraLevelMap).splice(0,1)" :key="nT">
            <div v-for="conT in Object.keys(data.proudSkillExtraLevelMap).splice(1,1)" :key="conT">
                <div v-for="conS in Object.keys(data.proudSkillExtraLevelMap).splice(2,2)" :key="conS">
                <div v-for="proudVal in char.ProudMap" :key="proudVal">
                    <div v-if="proudVal == nT && conT && conS">
                    <div v-for="(skillLv, skillKey) in data.skillLevelMap" :key="skillKey">
                        
                            <div v-for="(icon, iconKey) in char.Skills" :key="iconKey" class="avatar indicator"> 
                            <div class="indicator-item" v-if="skillKey == iconKey">
                            <span v-if="skillKey == char.SkillOrder[0] ">{{skillLv + data.proudSkillExtraLevelMap[nT]}}</span>
                            <span v-if="skillKey == char.SkillOrder[1] ">{{skillLv + data.proudSkillExtraLevelMap[conT]}}</span>
                            <span v-if="skillKey == char.SkillOrder[2]">{{skillLv + data.proudSkillExtraLevelMap[conS]}}</span>
                            </div>
                            <div v-if="iconKey == skillKey" class=" rounded-full w-10 h-10 ring">
                                <img :src=" `https://enka.shinshin.moe/ui/${icon}.png`">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
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