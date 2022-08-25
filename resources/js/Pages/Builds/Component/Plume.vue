<template>
    <div class="rounded-lg bg-gray-900 bg-opacity-30 w-[440px] h-[105px] card-side flex items-center space-x-4 p-2">
        <figure class="relative">
        <img class="w-24 h-24" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build.equipList[1].flat.icon}.png`" alt="" srcset="">
         <div v-if="build.equipList[1].flat.rankLevel == 5" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        <div v-else-if="build.equipList[1].flat.rankLevel == 4" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        </figure>
        <div class="divider divider-horizontal w-0"></div>
        <div class="w-[95px]">
            <h1 class="font-bold">ATK</h1>
            <pre class="text-xl">{{build.equipList[1].flat.reliquaryMainstat.statValue}}</pre> 
            <span class="badge"><pre>+{{build.equipList[1].reliquary.level - 1}}</pre></span> 
        </div>
        <div class="">
            <ul>
            <li>
                <pre v-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[1].flat.reliquarySubstats[0].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[1].flat.reliquarySubstats[1].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[1].flat.reliquarySubstats[2].statValue}}</pre>
            </li>
            <li v-if="build.equipList[1].flat.reliquarySubstats.length > 3">
                <pre v-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[1].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[1].flat.reliquarySubstats[3].statValue}}</pre>
            </li>
        </ul>
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