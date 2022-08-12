<template>
<div  :class="!showEquip ? 'absolute top-[45%] left-2' : 'absolute top-[17%] left-2'">
    <div v-if="!sessionData.proudSkillExtraLevelMap"  :class="!showEquip ? 'flex flex-row space-x-2':'flex flex-col space-x-0 space-y-4'">
        <div v-for="(skillLv, skillKey) in sessionData.skillLevelMap" :key="skillKey">
            <div v-for="(icon, iconKey) in charData.Skills" :key="iconKey" > 
                <div v-if="iconKey == skillKey">
                <div class="indicator">
                    <span class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv}}</span>
                    <div class=" place-items-center">
                        <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                        <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(sessionData.proudSkillExtraLevelMap).length == 1" >
            <div v-for="conS in Object.keys(sessionData.proudSkillExtraLevelMap)" :key="conS">
                <div v-for="(proudVal, proudKey) in charData.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conS" :class="!showEquip ? 'flex flex-row space-x-2':'flex flex-col space-x-0 space-y-4'">
                    <div v-for="(skillLv, skillKey) in sessionData.skillLevelMap" :key="skillKey" >
                        <div v-for="(icon, iconKey) in charData.Skills" :key="iconKey"> 
                            <div v-if="skillKey == iconKey"  class="indicator ">
                                <span v-if="skillKey == proudKey" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">
                                {{skillLv + sessionData.proudSkillExtraLevelMap[conS]}}
                                </span>
                                <span v-else class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv}}</span> 
                                <div v-if="iconKey == skillKey" class=" place-items-center">
                                    <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                    <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(sessionData.proudSkillExtraLevelMap).length == 2" >
        <div v-for="conT in Object.keys(sessionData.proudSkillExtraLevelMap).splice(0,1)" :key="conT">
            <div v-for="conS in Object.keys(sessionData.proudSkillExtraLevelMap).splice(1,1)" :key="conS">
                <div v-for="proudVal in charData.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conT && conS" :class="!showEquip ? 'flex flex-row space-x-2':'flex flex-col space-x-0 space-y-4'">
                        <div v-for="(skillLv, skillKey) in sessionData.skillLevelMap" :key="skillKey">
                            <div v-for="(icon, iconKey) in charData.Skills" :key="iconKey" > 
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == charData.SkillOrder[0]" >
                                        <span v-if="proudVal != 3331" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv}}</span>
                                        <span v-else class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[conT]}}</span>
                                        <div class=" place-items-center">
                                            <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                            <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                        </div>
                                    </div>
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == charData.SkillOrder[1]" >
                                     <span class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[conS]}}</span>
                                        <div class=" place-items-center">
                                            <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                            <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                        </div>
                                    </div>
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == charData.SkillOrder[2]" >
                                    
                                    <span v-if="skillKey == 10333" class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv}}</span>
                                    <span v-else class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[conS]}}</span>
                                        <div class=" place-items-center">
                                            <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                            <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="Object.keys(sessionData.proudSkillExtraLevelMap).length == 3" >
        <div v-for="nT in Object.keys(sessionData.proudSkillExtraLevelMap).splice(0,1)" :key="nT">
            <div v-for="conT in Object.keys(sessionData.proudSkillExtraLevelMap).splice(1,1)" :key="conT">
                <div v-for="conS in Object.keys(sessionData.proudSkillExtraLevelMap).splice(2,2)" :key="conS">
                <div v-for="proudVal in charData.ProudMap" :key="proudVal">
                    <div v-if="proudVal == nT && conT && conS" :class="!showEquip ? 'flex flex-row space-x-2':'flex flex-col space-x-0 space-y-4'">
                    <div v-for="(skillLv, skillKey) in sessionData.skillLevelMap" :key="skillKey">
                            <div v-for="(icon, iconKey) in charData.Skills" :key="iconKey"> 
                            <div class="indicator-item" v-if="skillKey == iconKey">
                            <div class="indicator">
                                <span v-if="skillKey == charData.SkillOrder[0]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[nT]}}</span>
                                <span v-else-if="skillKey == charData.SkillOrder[1]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[conT]}}</span>
                                <span v-else-if="skillKey == charData.SkillOrder[2]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + sessionData.proudSkillExtraLevelMap[conS]}}</span>
                                <div v-if="iconKey == skillKey" class=" place-items-center">
                                    <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                    <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
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
    </div>
</div>
</template>

<script>
export default {
    props:['sessionData','charData','showEquip'],
}
</script>