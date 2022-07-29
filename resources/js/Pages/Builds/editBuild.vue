<template>
    <head>
        <title>{{build.character.name}}</title>
    </head>
    <Guest>
         <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2  class="text-xl font-semibold leading-tight">
                    {{build.character.name}}
                </h2>
            </div>
        <div class="grid overflow-hidden xl:grid-cols-3 xl:grid-rows-1 xl:grid-flow-col xl:gap-12 lg:grid-cols-2 lg:grid-rows-1 lg:grid-flow-col lg:gap-6 sm:grid-cols-1 sm:grid-rows-2 sm:grid-flow-row  gap-12">
            <div class="card shadow-xl bg-white dark:bg-dark-eval-1 xl:col-span-2 lg:col-span-1 sm:col-span-1">
                 <form  @submit.prevent="update" class="mr-5 ml-5 mt-5 mb-5">
                    <h2>Basic Stat</h2> 
                    <div class="grid grid-cols-4 gap-3 ">
                        <div class="form-control">
                            <label class="label">Name</label> 
                            <select class="select select-bordered select-primary bg-base-content dark:bg-base-100 w-full max-w-xs" v-model="form.character_id">
                                <option  :value="form.character_id"> {{build.character.name}} </option> 
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="label">Ascension</label> 
                            <select id="asc1" class="select select-bordered bg-base-content dark:bg-base-100 w-full max-w-xs" v-model="form.ascension"  >
                                <option  value="1">1</option>
                                <option  value="2">2</option>
                                <option  value="3">3</option>
                                <option  value="4">4</option>
                                <option  value="5">5</option>
                                <option  value="6">6</option>
                            </select>
                            <p class="text-warning" v-if="errors.ascension">{{ errors.ascension }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Selected Lv</label> 
                            <select v-model="form.char_lv" class="select select-bordered bg-base-content dark:bg-base-100 w-full max-w-xs"  v-on:click="selected()" :disabled="selectCostumeLv" :class="selectCostumeLv ? 'opacity-50' : 'bg-base-content dark:bg-base-100' ">
                                <option  value="20">20</option>
                                <option  value="40">40</option>
                                <option  value="50">50</option>
                                <option  value="60">60</option>
                                <option  value="70">70</option>
                                <option  value="80">80</option>
                                <option  value="90">90</option> 
                            </select>
                            <p class="text-warning" v-if="errors.char_lv">{{ errors.char_lv }}</p>
                        </div>
                            <div class="form-control">
                            <label class="label">Add Lv 
                            <input  @click="costumeLv = !costumeLv" v-on:click="selectCostumeLv = !selectCostumeLv" type="checkbox"  class="toggle "></label> 
                            <input v-model="form.char_lv"  placeholder="Character Lv"  class="input input-bordered bg-base-content dark:bg-base-100" :disabled="costumeLv" :class="costumeLv ? 'opacity-50' : 'bg-base-content dark:bg-base-100' " type="number" >
                            <p class="text-warning" v-if="errors.char_lv">{{ errors.char_lv }}</p>
                        </div>
                        
                        <div class="form-control">
                            <label class="label">Max HP</label> 
                            <input v-model="form.hp" placeholder="Max HP"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
                            <p class="text-warning" v-if="errors.hp">{{ errors.hp }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Attack</label> 
                            <input v-model="form.atk" placeholder="Attack"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
                            <p class="text-warning" v-if="errors.atk">{{ errors.atk }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Defense</label> 
                            <input v-model="form.defense"  placeholder="Defense" class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
                            <p class="text-warning" v-if="errors.defense">{{ errors.defense }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">EM</label> 
                            <input v-model="form.em"  placeholder="Elemental Mastery"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
                            <p class="text-warning" v-if="errors.em">{{ errors.em }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Constellation</label> 
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.conste" >
                                <option value="0">C0</option> 
                                <option  value="1">C1</option>
                                <option  value="2">C2</option>
                                <option  value="3">C3</option>
                                <option  value="4">C4</option>
                                <option  value="5">C5</option>
                                <option  value="6">C6</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="label">Normal Attack</label>
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.talent1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                            <div class="form-control">
                            <label class="label">Element Skill</label>
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.talent2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                        </div>
                            <div class="form-control">
                            <label class="label">Element Burst</label>
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.talent3">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                        </div>
                    </div><br>
                    <h2>Team Comp (optional)</h2>
                    <div class="flex gap-4">
                        <div class="form-control w-72">
                            <label class="label">Team</label>
                                <vSelect multiple
                                v-model="form.party_id" 
                                :options="characterOptions" label="name" 
                                :reduce="characters => characters.id" 
                                :selectable="() => form.party_id.length < 3"
                                class=" bg-white text-black dark:bg-base-100 dark:text-white" placeholder="Select Team"
                                >
                                <template v-slot:option="option" >
                                <div class="flex items-center">
                                    <img v-if="option.char_rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                    <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                    {{ option.name }}
                                    </div>
                                </template>
                                </vSelect>
                        </div>
                    </div>
                    <br>
                        <h2>Equipment</h2>
                    <div class="flex flex-wrap gap-4">
                        <div class="form-control w-1/4">
                            <label class="label">Main Weapon</label>
                            <vSelect
                            v-model="form.weapon_id"
                            :options="weaponOptions" label="name"
                            :reduce="weapons => weapons.id"
                            class="bg-white text-black dark:bg-base-100 dark:text-white" placeholder="Choose Main Weapon"
                            >
                            <template v-slot:option="option" >
                            <div class="flex items-center">
                                <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                {{ option.name }}
                                </div>
                            </template>
                            </vSelect>
                            <p class="text-warning" v-if="errors.weapon_id">{{ errors.weapon_id }}</p>
                           
                        </div>
                       <div  class="form-control w-1/4 ">
                            <label class="label">4PCS Artifact </label>
                                <vSelect 
                                v-model="form.four_pcs_art" 
                                :options="artifactOptions" label="name" @option:selected="modalOpen()"
                                :reduce="artifacts => artifacts.id" :disabled="set4ArtDisabled" :class="set4ArtDisabled ? 'opacity-50' : 'bg-white' "
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Choose Artifact"
                                >
                                </vSelect>
                            <input type="checkbox" id="my-modal-2" class="modal-toggle"> 
                            <div class="modal cursor-pointer" >
                                <div class="modal-box relative overflow-y-auto max-h-[90vh] w-2/4 bg-white text-black dark:bg-base-100 dark:text-white"  style="max-width:100%;">
                                    <label for="my-modal-2" class="absolute top-0 right-0"><vue-feather type="x" size="24" class="xl:px-8 xl:py-4 lg:px-6 lg:py-3"></vue-feather></label>
                                    <h2 class="text-center">Select Artifact</h2><br>
                                    <div  v-for="art in artifacts" :key="art.id" >
                                        <div v-if="form.four_pcs_art == art.id ">
                                            <div class="flex flex-wrap">
                                                <tabs v-model="active">
                                                    <tab>5 Stars</tab>
                                                    <tab>4 Stars</tab>
                                                </tabs>
                                            </div>
                                            <tab-panels v-model="active">
                                                <tab-panel >
                                                    <div  class="flex flex-wrap justify-center gap-10  xl:gap-4 lg:gap-8">
                                                        <div v-for="data in art.pcs" :key="data.id">
                                                            <div v-if="data.rarity == '5'">
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Flower of Life'" >
                                                                    <label for="flower">
                                                                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input type="checkbox" id="flower" :true-value="data.id" v-model="form.flower_id" />
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Plume of Death'">
                                                                    <label for="plume">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input  type="checkbox" id="plume" :true-value="data.id" v-model="form.plume_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Sands of Eon'">
                                                                    <label for="sand">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="sand"  type="checkbox" :true-value="data.id" v-model="form.sand_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Goblet of Eonothem'">
                                                                    <label for="goblet">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="goblet" type="checkbox" :true-value="data.id" v-model="form.goblet_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Circlet of Logos'">
                                                                    <label for="circlet">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="circlet" type="checkbox" :true-value="data.id" v-model="form.circlet_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tab-panel>
                                                <tab-panel >
                                                    <div  class="flex flex-wrap justify-center gap-10  xl:gap-4 lg:gap-8">
                                                        <div v-for="data in art.pcs" :key="data.id">
                                                            <div v-if="data.rarity == '4'">
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Flower of Life'" >
                                                                    <label for="flower">
                                                                    <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input type="checkbox" id="flower" :true-value="data.id" v-model="form.flower_id" />
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Plume of Death'">
                                                                    <label for="plume">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input  type="checkbox" id="plume" :true-value="data.id" v-model="form.plume_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Sands of Eon'">
                                                                    <label for="sand">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="sand"  type="checkbox" :true-value="data.id" v-model="form.sand_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Goblet of Eonothem'">
                                                                    <label for="goblet">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="goblet" type="checkbox" :true-value="data.id" v-model="form.goblet_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Circlet of Logos'">
                                                                    <label for="circlet">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input id="circlet" type="checkbox" :true-value="data.id" v-model="form.circlet_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tab-panel>
                                            </tab-panels>
                                        </div>
                                    </div>
                                      
                                    <div class="modal-action">
                                    <label for="my-modal-2" class="btn">Close</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-control w-1/4 ">
                            <label class="label">2PCS Artifact</label>
                                <vSelect multiple v-if="form.four_pcs_art" :disabled="form.four_pcs_art"
                                v-model="form.two_pcs_art" 
                                :options="artifactOptions" label="name"  @option:selected="modalPcs()"
                                :selectable="() => form.two_pcs_art.length < 2"
                                :reduce="artifacts => artifacts.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Select 2 Artifact Set"
                                />
                                <vSelect multiple v-else 
                                v-model="form.two_pcs_art" 
                                :options="artifactOptions" label="name"  @option:selected="modalPcs()"
                                :selectable="() => form.two_pcs_art.length < 2"
                                :reduce="artifacts => artifacts.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Select 2 Artifact Set"
                                />
                            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                        <div class="modal">
                        <div class="modal-box w-11/12 max-w-5xl overflow-y-auto max-h-[90vh]">
                        <label for="my-modal-3" class="absolute top-0 right-0"><vue-feather type="x" size="24" class="xl:px-8 xl:py-4 lg:px-6 lg:py-3"></vue-feather></label>
                            <div  v-for="art in artifacts" :key="art.id" >
                                        <div v-if="form.two_pcs_art.includes(art.id)">
                                            <div class="flex flex-wrap">
                                                <tabs v-model="active">
                                                    <tab>5 Stars</tab>
                                                    <tab>4 Stars</tab>
                                                </tabs>
                                            </div>
                                            <tab-panels v-model="active">
                                                <tab-panel >
                                                    <div  class="flex flex-wrap justify-center gap-10 xl:gap-4 lg:gap-8">
                                                        <div v-for="data in art.pcs" :key="data.id">
                                                            <div v-if="data.rarity == '5'">
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Flower of Life'" >
                                                                    <label for="flower">
                                                                    <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input type="checkbox" class="checkbox checkbox-lg" :true-value="data.id" v-model="form.flower_id" />
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Plume of Death'">
                                                                    <label for="plume">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input  type="checkbox" class="checkbox checkbox-lg" :true-value="data.id" v-model="form.plume_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Sands of Eon'">
                                                                    <label for="sand">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg"  type="checkbox" :true-value="data.id" v-model="form.sand_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Goblet of Eonothem'">
                                                                    <label for="goblet">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg" type="checkbox" :true-value="data.id" v-model="form.goblet_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Circlet of Logos'">
                                                                    <label for="circlet">
                                                                        <img v-if="data.rarity == '5'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg" type="checkbox" :true-value="data.id" v-model="form.circlet_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tab-panel>
                                                <tab-panel >
                                                    <div  class="flex flex-wrap justify-center gap-10  xl:gap-4 lg:gap-8 sm:gap-5">
                                                        <div v-for="data in art.pcs" :key="data.id">
                                                            <div v-if="data.rarity == '4'">
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Flower of Life'" >
                                                                    <label for="flower">
                                                                    <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input type="checkbox" class="checkbox checkbox-lg" :true-value="data.id" v-model="form.flower_id" />
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Plume of Death'">
                                                                    <label for="plume">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label>
                                                                    <input  type="checkbox" class="checkbox checkbox-lg" :true-value="data.id" v-model="form.plume_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Sands of Eon'">
                                                                    <label for="sand">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg"  type="checkbox" :true-value="data.id" v-model="form.sand_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Goblet of Eonothem'">
                                                                    <label for="goblet">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg" type="checkbox" :true-value="data.id" v-model="form.goblet_id">
                                                                </div>
                                                                <div class="item w-32 h-32" v-if="data.relictype == 'Circlet of Logos'">
                                                                    <label for="circlet">
                                                                        <img v-if="data.rarity == '4'" :src="data.icon" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain'}"/>
                                                                    </label> 
                                                                    <input class="checkbox checkbox-lg" type="checkbox" :true-value="data.id" v-model="form.circlet_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tab-panel>
                                            </tab-panels>
                                        </div>
                                    </div>


                            <div class="modal-action">
                            <label for="my-modal-3" class="btn">Close!</label>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="form-control w-1/4">
                             <label class="label">Refinement</label>
                             <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.refinement" >
                                <option  value="1">1</option>
                                <option  value="2">2</option>
                                <option  value="3">3</option>
                                <option  value="4">4</option>
                                <option  value="5">5</option>
                            </select>
                            <p class="text-warning" v-if="errors.refinement">{{ errors.refinement }}</p>
                        </div>
                         <div class="form-control w-1/4">
                            <label class="label">Main Sand </label> 
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.main_sand" >
                                <option  value="ATK">ATK</option>
                                <option  value="DEF">DEF</option>
                                <option  value="HP">HP</option>
                                <option  value="Elemental Mastery">Elemental Mastery</option>
                                <option  value="Energy Recharge">Energy Recharge</option>
                            </select>
                            <p class="text-warning" v-if="errors.main_sand">{{ errors.main_sand }}</p>
                        </div>
                            <div class="form-control w-1/4">
                            <label class="label">Main Goblet </label> 
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.main_goblet" >
                                <option  value="ATK">ATK</option>
                                <option  value="DEF">DEF</option>
                                <option  value="HP">HP</option>
                                <option  value="Elemental Mastery">Elemental Mastery</option>
                                <option v-if="build.character.element == 'Pyro'"  value="Pyro DMG Bonus">Pyro DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Hydro'"  value="Hydro DMG Bonus">Hydro DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Anemo'"  value="Anemo DMG Bonus">Anemo DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Electro'"  value="Electro DMG Bonus">Electro DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Dendro'"  value="Dendro DMG Bonus">Dendro DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Cryo'"  value="Cryo DMG Bonus">Cryo DMG Bonus</option>
                                <option v-else-if="build.character.element == 'Geo'"  value="Geo DMG Bonus">Geo DMG Bonus</option>
                                <option  value="Physical DMG Bonus">Physical DMG Bonus</option>
                            </select>
                            <p class="text-warning" v-if="errors.main_goblet">{{ errors.main_goblet }}</p>
                        </div>
                            <div class="form-control w-1/4">
                            <label class="label">Main Circlet </label> 
                            <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.main_circlet" >
                                <option  value="ATK">ATK</option>
                                <option  value="DEF">DEF</option>
                                <option  value="HP">HP</option>
                                <option  value="CRIT Rate">CRIT Rate</option>
                                <option  value="CRIT DMG">CRIT DMG</option>
                                <option  value="Elemental Mastery">Elemental Mastery</option>
                                <option  value="Healing Bonus">Healing Bonus</option>
                            </select>
                            <p class="text-warning" v-if="errors.main_circlet">{{ errors.main_circlet }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="grid grid-flow-col grid-cols-5 gap-4">
                        <div class="form-control">
                            <label class="label">Flower</label>
                            <v-select class="bg-white text-black dark:bg-base-100 dark:text-white" v-model="form.flower_id" :options="flowerOptions" label="name" placeholder="Auto Select"
                                :reduce="flower => flower.id" >
                                <template v-slot:option="option" >
                                    <div class="flex items-center">
                                        <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                        {{ option.name }}
                                    </div>
                                </template>
                            </v-select>
                            <p class="text-warning" v-if="errors.flower_id">{{ errors.flower_id }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Plume</label>
                                <vSelect 
                                v-model="form.plume_id"
                                :options="plumeOptions" label="name"
                                :reduce="plume => plume.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Auto Select From Artifact">
                                <template v-slot:option="option" >
                                    <div class="flex items-center">
                                        <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                        {{ option.name }}
                                    </div>
                                </template>
                                </vSelect>
                                <p class="text-warning" v-if="errors.plume_id">{{ errors.plume_id }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Sands</label>
                                <vSelect 
                                v-model="form.sand_id"
                                :options="sandOptions" label="name"
                                :reduce="sand => sand.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Auto Select From Artifact">
                                <template v-slot:option="option" >
                                    <div class="flex items-center">
                                        <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                        {{ option.name }}
                                    </div>
                                </template>
                                </vSelect>
                                <p class="text-warning" v-if="errors.sand_id">{{ errors.sand_id }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Goblet</label>
                                <vSelect 
                                v-model="form.goblet_id"
                                :options="gobletOptions" label="name"
                                :reduce="goblet => goblet.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Auto Select From Artifact">
                                <template v-slot:option="option" >
                                    <div class="flex items-center">
                                        <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                        {{ option.name }}
                                    </div>
                                </template>
                                </vSelect>
                                <p class="text-warning" v-if="errors.goblet_id">{{ errors.goblet_id }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Circlet</label>
                                <vSelect 
                                v-model="form.circlet_id"
                                :options="circletOptions" label="name"
                                :reduce="circlet => circlet.id" 
                                class="bg-white  text-black dark:bg-base-100 dark:text-white" placeholder="Auto Select From Artifact">
                                <template v-slot:option="option" >
                                    <div class="flex items-center">
                                        <img v-if="option.rarity == '5'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg5() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '4'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg4() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '3'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg3() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else-if="option.rarity == '2'" :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg2() + ')', backgroundSize:'contain' }"/> 
                                        <img v-else :src="option.icon" class="w-10 h-10" :style="{ backgroundImage: 'url(' + bg1() + ')', backgroundSize:'contain' }"/> 
                                        {{ option.name }}
                                    </div>
                                </template>
                                </vSelect>
                                <p class="text-warning" v-if="errors.circlet_id">{{ errors.circlet_id }}</p>
                        </div>
                    </div>
                
                    <br>
                    <h2>Advance Stat</h2>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="form-control">
                            <label class="label">CRIT Rate</label> 
                            <input placeholder="Critical Rate" v-model="form.c_rate" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                            <p class="text-warning" v-if="errors.c_rate">{{ errors.c_rate }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">CRIT Damage</label> 
                            <input placeholder="Critical Damage" v-model="form.c_damage" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                            <p class="text-warning" v-if="errors.c_damage">{{ errors.c_damage }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">E.Recharge</label> 
                            <input placeholder="Energy Recharge" v-model="form.er" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                            <p class="text-warning" v-if="errors.er">{{ errors.er }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Healing Bonus</label> 
                            <input placeholder="Healing Bonus" v-model="form.healing_bonus" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                        </div>
                        <div class="form-control">
                            <label class="label">Elemental Damage</label> 
                            <input placeholder="Elemental Damage" v-model="form.elemental_dmg" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                            <p class="text-warning" v-if="errors.elemental_dmg">{{ errors.elemental_dmg }}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">Physical Damage</label> 
                            <input placeholder="Physical Damage" v-model="form.physical_dmg" class="input  input-bordered bg-base-content dark:bg-base-100" type="text" >
                            <p class="text-warning" v-if="errors.physical_dmg">{{ errors.physical_dmg }}</p>
                        </div>
                    </div>
                    <br>
                    <h2>Other</h2>
                    <div class="flex gap-4">
                        <div class="form-control">
                            <label for="">Name</label>
                            <input type="text" placeholder="Your name/watermark" class="input input-bordered bg-base-content dark:bg-base-100" v-model="form.name">
                        </div>
                        <div class="form-control">
                            <label for="">Video Source</label>
                            <input type="text" placeholder="Paste Link YT or Other Sosmed" class="input input-bordered bg-base-content dark:bg-base-100" v-model="form.source">
                        </div>
                    </div>
                    <div class="flex">
                        <div v-if="$page.props.auth.user" class="form-control">
                            <label class="label">Status</label>
                             <select class="select select-bordered w-full max-w-xs bg-base-content dark:bg-base-100" v-model="form.status" >
                                <option selected="selected" value="draft">draft</option>
                                <option  value="publish">publish</option>
                            </select>
                        </div>
                        <div v-else class="form-control" >
                            <label class="label">Status</label>
                            <select class="select bg-base-content dark:bg-base-100" v-model="form.status" >
                            <option value="draft" selected = "selected">draft</option>

                            </select>
                        </div>
                    </div>
                    <br>
                    
                    <button class="btn btn-success">Save</button>
                    
                </form>
            </div>
            <div class="box ">
                <div class="artboard phone-5 artboard-demo card shadow-xl image-full bg-accent-content	 dark:bg-base-100">
                        <div class=""  >
                            <figure>
                                <img :src="showAvatar() + build.character.avatar" >
                            </figure> 
                            <div class="">
                                <h3 class="text-center text-black dark:text-white absolute inset-x-0 top-0 mt-5">{{build.character.name}} Lv {{form.char_lv}}
                                    <br> <p>{{form.name}}</p>
                                </h3>
                                <Equip :build="build" :artifacts="artifacts" :artifactPcs="artifactPcs" :weapons="weapons"
                                v-model:weapon_id="form.weapon_id"
                                v-model:refinement="form.refinement"
                                v-model:flower_id="form.flower_id"
                                v-model:plume_id="form.plume_id"
                                v-model:sand_id="form.sand_id"
                                v-model:goblet_id="form.goblet_id"
                                v-model:circlet_id="form.circlet_id"
                                v-model:main_sand="form.main_sand"
                                v-model:main_goblet="form.main_goblet"
                                v-model:main_circlet="form.main_circlet"
                                ></Equip>
                                <Party :build="build" :characters="characters"
                                v-model:party_id="form.party_id" 
                                v-model:party_two="form.party_two" 
                                v-model:party_three="form.party_three" 
                                v-model:healing_bonus="form.healing_bonus" 
                                v-model:elemental_dmg="form.elemental_dmg" 
                                v-model:physical_dmg="form.physical_dmg" 
                                >
                                </Party>

                               
                                <Conste :build="build" v-model:conste="form.conste"></Conste>
                                <Talent :build="build"
                                v-model:talent1="form.talent1"
                                v-model:talent2="form.talent2"
                                v-model:talent3="form.talent3"
                                />
                            </div>
                            <div class="card absolute inset-x-0 bottom-0 mt-5">
                                <div class="bg-base-content text-black dark:bg-dark-eval-3 dark:text-white" >
                                    <section class="px-2 py-2" ref="printcontent">
                                        <Stats :build="build"
                                        v-model:hp="form.hp"
                                        v-model:atk="form.atk"
                                        v-model:defense="form.defense"
                                        v-model:em="form.em"
                                        v-model:c_rate="form.c_rate"
                                        v-model:c_damage="form.c_damage"
                                        v-model:healing_bonus="form.healing_bonus"
                                        v-model:er="form.er"
                                        v-model:elemental_dmg="form.elemental_dmg"
                                        v-model:physical_dmg="form.physical_dmg"
                                        v-model:main_goblet="form.main_goblet"
                                        />
                                    </section>
                                </div>
                            </div>
                        </div> 
                    </div>
            </div>
        </div>
        </template>
    </Guest>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Guest from '@/Layouts/Guest.vue'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import Conste from './Component/edit/Conste.vue';
import Party from './Component/edit/Party.vue'
import Equip from './Component/edit/Equip.vue';
import Talent from './Component/edit/Talent.vue';
import Stats from './Component/edit/Stats.vue';
import VueFeather from 'vue-feather';
import { ref } from "vue";
import Tabs from '@/Shared/Tabs';
import Tab from '@/Shared/Tab';
import TabPanels from '@/Shared/TabPanels';
import TabPanel from '@/Shared/TabPanel';
export default {
    components:{
        Head, Link,
        Guest,
        vSelect, Tab, Tabs, TabPanel, TabPanels,
        Conste, Party, Equip, Talent, Stats, VueFeather,
    },
    props:{
        errors: Object,
        build: Object,
        characters: Object,
        artifacts: Object,
        artifactPcs: Object,
        flowers: Object,
        plumes: Object,
        sands: Object,
        goblets: Object,
        circlets: Object,
        constellations: Object,
        weapons: Object,
    },
     data(){
        return{
            check: true,
            costumeLv:true,
            selectCostumeLv:false,
            fourpcs: true,
            twopcs: true,
            characterOptions: this.characters,
            weaponOptions: this.weapons,
            artifactOptions: this.artifacts,
            artOptions: this.arts,
            flowerOptions: this.flowers,
            plumeOptions: this.plumes,
            sandOptions: this.sands,
            gobletOptions: this.goblets,
            circletOptions: this.circlets,
            isOpen: false,

        }
    },
    setup(props) {
            const form = useForm({
                _method: 'PUT',
                character_id: props.build.character_id,
                ascension: props.build.ascension,
                char_lv: props.build.char_lv,
                weapon_id: props.build.weapon_id,
                refinement: props.build.refinement,
                four_pcs_art: props.build.four_pcs_art,
                two_pcs_art: props.build.two_pcs_art,
                flower_id: props.build.flower_id,
                plume_id: props.build.plume_id,
                sand_id: props.build.sand_id,
                goblet_id: props.build.goblet_id,
                circlet_id: props.build.circlet_id,
                main_sand: props.build.main_sand,
                main_goblet: props.build.main_goblet,
                main_circlet: props.build.main_circlet,
                talent1: props.build.talent1,
                talent2: props.build.talent2,
                talent3: props.build.talent3,
                conste: props.build.conste,
                party_id: props.build.party_id,
                hp: props.build.hp,
                atk: props.build.atk,
                defense: props.build.defense,
                em: props.build.em,
                c_rate: props.build.c_rate,
                c_damage: props.build.c_damage,
                healing_bonus: props.build.healing_bonus,
                er: props.build.er,
                elemental_dmg: props.build.elemental_dmg,
                physical_dmg: props.build.physical_dmg,
                source: props.build.source,
                name: props.build.name,
                status: 'draft',
                
            });
            const active = ref(0);
            return {
                form, active
            };
        },
        computed:{
            
        },
        methods:{
            update(){
                console.log(this.form);
                this.$inertia.post(route('updateBuild', this.build.id), this.form)
            },
            input() {
                 console.log("input")
            },
            change() {
            console.log("change")
            },
            check(e) {
                document.querySelector('#cek').checked = true;
                console.log(e)
            },
            showAvatar() {
                return "/storage/images/icon/avatar/";
            }, 
            showCharacterIcon(){
                return "/storage/images/icon/character/";
            },
            showConstellation() {
                return "/storage/images/icon/constellation/";
            },
            showIconWeapon() {
                return "/storage/images/icon/weapon/";
            },
            showIconArtifact() {
                return "/storage/images/icon/artifact/";
            },
            bg5(){
                return "../image/rarity/Background_Item_5_Star.png"
            },
            bg4(){
                return "../image/rarity/Background_Item_4_Star.png"
            },
            bg3(){
                return "../image/rarity/Background_Item_3_Star.png"
            },
            bg2(){
                return "../image/rarity/Background_Item_2_Star.png"
            },
            bg1(){
                return "../image/rarity/Background_Item_1_Star.png"
            },
            modalOpen: function () {
                document.querySelector('#my-modal-2').checked = true;
            },
            modalPcs: function () {
                document.querySelector('#my-modal-3').checked = true;
            },
            modalClose: function () {
                document.querySelector('#my-modal-2').checked = false;
            },

        },
        
}
</script>

<style>
    .vs__selected{
        color: #22c55e;
    }
    .vs__clear{
        fill: black;
    }
    .vs__open-indicator{
        fill:black;
    }
</style>