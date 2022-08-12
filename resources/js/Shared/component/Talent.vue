<template>
<div  class=" absolute top-[45%] md:top-[17%] md:left-2">
    <div v-if="!build[0].talentExtraLv"  class="flex flex-row space-x-2 md:flex-col md:space-x-0 md:space-y-4 ">
        <div v-for="(skillLv, skillKey) in build[0].talent" :key="skillKey">
            <div v-for="(icon, iconKey) in build[0].character.Skills" :key="iconKey" > 
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
    <div v-else-if="Object.keys(build[0].talentExtraLv).length == 1" >
            <div v-for="conS in Object.keys(build[0].talentExtraLv)" :key="conS">
                <div v-for="(proudVal, proudKey) in build[0].character.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conS" class="flex flex-row space-x-2 md:flex-col md:space-x-0 md:space-y-4 ">
                    <div v-for="(skillLv, skillKey) in build[0].talent" :key="skillKey" >
                        <div v-for="(icon, iconKey) in build[0].character.Skills" :key="iconKey"> 
                            <div v-if="skillKey == iconKey"  class="indicator ">
                            <span v-if="skillKey == proudKey" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">
                                {{skillLv + build[0].talentExtraLv[conS]}}
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
    <div v-else-if="Object.keys(build[0].talentExtraLv).length == 2" >
        <div v-for="conT in Object.keys(build[0].talentExtraLv).splice(0,1)" :key="conT">
            <div v-for="conS in Object.keys(build[0].talentExtraLv).splice(1,1)" :key="conS">
                <div v-for="proudVal in build[0].character.ProudMap" :key="proudVal">
                    <div v-if="proudVal == conT && conS" class="flex flex-row space-x-2 md:flex-col md:space-x-0 md:space-y-4 ">
                        <div v-for="(skillLv, skillKey) in build[0].talent" :key="skillKey">
                            <div v-for="(icon, iconKey) in build[0].character.Skills" :key="iconKey" > 
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == build[0].character.SkillOrder[0]" >
                                        <span v-if="proudVal != 3331" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv}}</span>
                                        <span v-else class="indicator-item font-bold indicator-bottom indicator-center badge  badge-black mb-[-8px]">{{skillLv + build[0].talentExtraLv[conT]}}</span>
                                        <div class=" place-items-center">
                                            <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                            <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                        </div>
                                    </div>
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == build[0].character.SkillOrder[1]" >
                                     <span class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv + build[0].talentExtraLv[conS]}}</span>
                                        <div class=" place-items-center">
                                            <img  class="w-[60px] h-[40px]" src="/image/attribute/talentBorder.png" alt="" srcset="">
                                            <img  class="w-10 h-10 ml-[10px] mt-[-40px]" :src=" `https://res.cloudinary.com/genshin/image/upload/sprites/${icon}.png`" >
                                        </div>
                                    </div>
                                    <div class="indicator" v-if="skillKey == iconKey && skillKey == build[0].character.SkillOrder[2]" >
                                    
                                    <span v-if="skillKey == 10333" class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv}}</span>
                                    <span v-else class="indicator-item font-bold indicator-bottom indicator-center badge badge-info mb-[-8px]">{{skillLv + build[0].talentExtraLv[conS]}}</span>
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
    <div v-else-if="Object.keys(build[0].talentExtraLv).length == 3" >
        <div v-for="nT in Object.keys(build[0].talentExtraLv).splice(0,1)" :key="nT">
            <div v-for="conT in Object.keys(build[0].talentExtraLv).splice(1,1)" :key="conT">
                <div v-for="conS in Object.keys(build[0].talentExtraLv).splice(2,2)" :key="conS">
                <div v-for="proudVal in build[0].character.ProudMap" :key="proudVal">
                    <div v-if="proudVal == nT && conT && conS" class="flex flex-row space-x-2 md:flex-col md:space-x-0 md:space-y-4 ">
                    <div v-for="(skillLv, skillKey) in build[0].talent" :key="skillKey">
                            <div v-for="(icon, iconKey) in build[0].character.Skills" :key="iconKey"> 
                            <div class="indicator-item" v-if="skillKey == iconKey">
                            <div class="indicator">
                                <span v-if="skillKey == build[0].character.SkillOrder[0]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + build[0].talentExtraLv[nT]}}</span>
                                <span v-else-if="skillKey == build[0].character.SkillOrder[1]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + build[0].talentExtraLv[conT]}}</span>
                                <span v-else-if="skillKey == build[0].character.SkillOrder[2]" class="indicator-item font-bold indicator-bottom indicator-center badge  badge-info mb-[-8px]">{{skillLv + build[0].talentExtraLv[conS]}}</span>
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
    props:['build'],
}
</script>