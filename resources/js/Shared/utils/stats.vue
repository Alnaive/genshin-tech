<template>
    <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">CRIT Rate</strong>
                                    <strong class="ml-2">{{build.c_rate}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div> 
                                <div class="flex items-center gap-2">
                                    <img src="/image/attribute/Icon_Attribute_Critical_Hit.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">CRIT Damage</strong>
                                    <strong class="ml-2">{{build.c_damage}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="build.healing_bonus > 0">
                                    <img src="/image/attribute/Icon_Attribute_Healing.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Healing Bonus</strong> 
                                    <strong class="ml-2">{{build.healing_bonus}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div> 
                                <div class="flex items-center gap-2"> 
                                    <img src="/image/attribute/Icon_Attribute_Energy_Recharge.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Energy Recharge</strong>
                                    <strong class="ml-2">{{build.er}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="build.elemental_dmg > 0 && build.main_goblet =='Pyro DMG Bonus'"> 
                                    <img  src="/image/attribute/Pyro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Pyro DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Hydro DMG Bonus'"> 
                                    <img  src="/image/attribute/Hydro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Hydro DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Anemo DMG Bonus'"> 
                                    <img  src="/image/attribute/Anemo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Anemo DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Electro DMG Bonus'"> 
                                    <img  src="/image/attribute/Electro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Electro DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Dendro DMG Bonus'"> 
                                    <img  src="/image/attribute/Dendro.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Dendro DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Cryo DMG Bonus'"> 
                                    <img  src="/image/attribute/Cryo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Cryo DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 && build.main_goblet =='Geo DMG Bonus'"> 
                                    <img  src="/image/attribute/Geo.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Geo DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-else-if="build.elemental_dmg > 0 "> 
                                    <img  :src="showElement()" class="w-8 h-8">
                                    <strong class="flex-1 w-64" v-if="build.character.element == 'Geo'">Geo DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Cryo'">Cryo DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Dendro'">Dendro DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Electro'">Electro DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Anemo'">Anemo DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Hydro'">Hydro DMG Bonus</strong>
                                    <strong class="flex-1 w-64" v-else-if="build.character.element == 'Pyro'">Pyro DMG Bonus</strong>
                                    <strong class="ml-2">{{build.elemental_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
                                <div class="flex items-center gap-2" v-if="build.physical_dmg > 0"> 
                                    <img src="/image/attribute/Icon_Attribute_Physical2.png" class="w-8 h-8">
                                    <strong class="flex-1 w-64">Physical DMG Bonus</strong>
                                    <strong class="ml-2">{{build.physical_dmg}}</strong>
                                    <!-- <vue-feather type="percent" size="18px" class="mr-2"></vue-feather> -->
                                    <strong class="mr-2">%</strong>
                                </div>
        
    
</template>
<script>
export default{
   props: ['likedBuild'] 
}
</script>