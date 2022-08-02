<template>
    <div class="card glass w-[440px] h-[105px] card-side flex items-center space-x-4 p-2">
        <figure class="">
        <img class="w-24 h-24" :src="`https://upload-os-bbs.mihoyo.com/game_record/genshin/equip/${build[0].equipList[2].flat.icon}.png`" alt="" srcset="">
        <div class="absolute flex flex-row items-center mt-[65px]">
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
                <vue-feather type="star" stroke="none" fill="orange" size="20"></vue-feather>
        </div>
        </figure>
        <div class="w-[95px]">
            <h1 class="font-bold" v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_HP_PERCENT'" >HP</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery</h1>
            <h1 class="font-bold" v-else-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge</h1>

            <div v-if="build[0].equipList[2].flat.reliquaryMainstat.mainPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">
                <pre class="text-xl">{{build[0].equipList[2].flat.reliquaryMainstat.statValue}}</pre>
            </div>
            <div v-else>
                <pre class="text-xl">{{build[0].equipList[2].flat.reliquaryMainstat.statValue}}%</pre>
            </div>
            <span class="badge"><pre>+{{build[0].equipList[2].reliquary.level - 1}}</pre></span> 
            

        </div>
        <div class="">
            <ul>
            <li>
                <pre v-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[0].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[2].flat.reliquarySubstats[0].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[1].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[2].flat.reliquarySubstats[1].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[2].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[2].flat.reliquarySubstats[2].statValue}}</pre>
            </li>
            <li>
                <pre v-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK_PERCENT'">ATK+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP_PERCENT'" >HP+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE_PERCENT'">DEF+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL'" >CRIT RATE+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CRITICAL_HURT'">CRIT DMG+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ELEMENT_MASTERY'">Elemental Mastery+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_CHARGE_EFFICIENCY'">Energy Recharge+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}%</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_ATTACK'" >ATK+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_DEFENSE'" >DEF+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}</pre>
                <pre v-else-if="build[0].equipList[2].flat.reliquarySubstats[3].appendPropId == 'FIGHT_PROP_HP'">HP+{{build[0].equipList[2].flat.reliquarySubstats[3].statValue}}</pre>
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
    props:['build'],
}
</script>