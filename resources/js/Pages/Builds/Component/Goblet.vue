<template>
    <div class="card glass w-[440px] h-[105px] card-side flex items-center space-x-4 p-2">
        <figure class="">
        <img class="w-24 h-24" :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build.equipList[3].flat.icon}.png`" alt="" srcset="">
        <div class="absolute flex flex-row items-center mt-[65px]">
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
        </div>
        </figure>
        <div class="w-[95px]">
            <h1 class="font-bold" v-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" >HP</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_PHYSICAL_ADD_HURT'">Physical DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_FIRE_ADD_HURT'">Pyro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEC_ADD_HURT'">Electro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WATER_ADD_HURT'">Hydro DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_WIND_ADD_HURT'">Anemo DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ICE_ADD_HURT'">Cryo DMG Bonus</h1>
            <h1 class="font-bold" v-else-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_GEO_ADD_HURT'">Geo DMG Bonus</h1>
            <div v-if="build.equipList[3].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">
                <pre class="text-xl">{{build.equipList[3].flat.reliquaryMainstat.statValue}}</pre>
            </div>
            <div v-else>
                <pre class="text-xl">{{build.equipList[3].flat.reliquaryMainstat.statValue}}%</pre>
            </div>
            <span class="badge"><pre>+{{build.equipList[3].reliquary.level - 1}}</pre></span> 
        </div>
        <div class="">
            <ul>
            <li>
                <pre v-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[3].flat.reliquarySubstats[0].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[3].flat.reliquarySubstats[1].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[3].flat.reliquarySubstats[2].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build.equipList[3].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP'">HP+{{build.equipList[3].flat.reliquarySubstats[3].statValue}}</pre>
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