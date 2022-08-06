<template>
    <div class="card glass w-[440px] h-[105px] card-side flex items-center space-x-4 p-2">
        <figure class="relative">
        <img class="w-24 h-24" :src="`https://res.cloudinary.com/genshin/image/upload/sprites/${build[0].equipList[3].flat.icon}.png`" alt="" srcset="">
        <div v-if="build[0].equipList[3].flat.rankLevel == 5" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        <div v-else-if="build[0].equipList[3].flat.rankLevel == 4" class="absolute inset-x-0 bottom-[-35px] flex flex-row items-center">
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
                <VueFeather type="star" stroke="none" fill="orange" size="20"></VueFeather>
        </div>
        </figure>
        <div class="w-[95px]">
            <h1 class="font-bold" v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" >HP</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'">Physical DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'">Pyro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'">Electro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'">Hydro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'">Anemo DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'">Cryo DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_GEO_ADD_HURT'">Geo DMG Bonus</h1>
            <div v-if="build[0].equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">
                <pre class="text-xl">{{build[0].equipList[3].flat.reliquaryMainstat.statValue}}</pre>
            </div>
            <div v-else>
                <pre class="text-xl">{{build[0].equipList[3].flat.reliquaryMainstat.statValue}}%</pre>
            </div>
            <span class="badge"><pre>+{{build[0].equipList[3].reliquary.level - 1}}</pre></span> 
        </div>
        <div class="">
            <ul>
            <li>
                <pre v-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
            </li>
            <li v-if="build[0].equipList[3].flat.reliquarySubstats.length > 3">
                <pre v-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
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