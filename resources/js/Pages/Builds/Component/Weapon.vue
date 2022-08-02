<template>
    <div class="card glass w-[440px] h-[120px] card-side flex items-center space-x-4 p-2">
        <figure class="">
        <img class="w-24 h-24"  v-if="build.equipList[5].weapon.promoteLevel > 1" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.equipList[5].flat.icon}_Awaken.png`" alt="" srcset="">
        <img class="w-24 h-24"  v-else :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.equipList[5].flat.icon}.png`" alt="" srcset="">
        <div class="absolute flex flex-row items-center mt-[88px]">
            <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
            <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
            <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
            <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
            <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
        </div>
        </figure>
        <div class="flex flex-col">
            <div class="box row-span-1 col-span-2" >
                <h1 class="text-lg font-bold">{{build.weapon.name}}</h1>
            </div>
            <div class="flex">
                <div class="w-[110px]">
                    <pre>Level </pre>
                    <pre>{{build.equipList[5].weapon.level}}/{{(build.equipList[5].weapon.promoteLevel * 10) + (build.equipList[5].weapon.promoteLevel>0?10:0) + 20}}</pre>
                    <div v-if="Object.values(build.equipList[5].weapon.affixMap) == 0"><pre class="badge">R1</pre></div>
                    <div v-else-if="Object.values(build.equipList[5].weapon.affixMap) == 1"><pre class="badge">R2</pre></div>
                    <div v-else-if="Object.values(build.equipList[5].weapon.affixMap) == 2"><pre class="badge">R3</pre></div>
                    <div v-else-if="Object.values(build.equipList[5].weapon.affixMap) == 3"><pre class="badge">R4</pre></div>
                    <div v-else-if="Object.values(build.equipList[5].weapon.affixMap) == 4"><pre class="badge">R5</pre></div>
                </div>
                <div class="box">
                        <pre>Base ATK {{build.equipList[5].flat.weaponStats[0].statValue}}</pre> 
                    <pre v-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'" >ATK {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'" >DEF {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'" >CRIT DMG {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'" >Elemental Mastery {{build.equipList[5].flat.weaponStats[1].statValue}}</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'" >Energy Recharge {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                    <pre v-else-if="build.equipList[5].flat.weaponStats[1].appendPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'" >Physical DMG {{build.equipList[5].flat.weaponStats[1].statValue}}%</pre>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VueFeather from 'vue-feather';

export default{
    components:{
        VueFeather,
    },
    props:['build']
}
</script>