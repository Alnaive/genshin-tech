<template>
    <div v-for="character in characters" :key="character.id">
                        <div v-if="character.element == 'Pyro'">
                            <div v-show="!pyroHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Pyro.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Hydro'">
                            <div v-show="!hydroHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Hydro.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Anemo'">
                            <div v-show="!AnemoHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Anemo.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Electro'">
                            <div v-show="!ElectroHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Electro.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Dendro'">
                            <div v-show="!DendroHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Dendro.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Cryo'">
                            <div v-show="!CryoHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Cryo.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="character.element == 'Geo'">
                            <div v-show="!GeoHidden"  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img src="image/element/Element_Geo.png" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div  class="avatar m-3  cursor-pointer transition duration-100  hover:shadow-xl rounded-xl ">
                                <div  class=" mb-3 rounded-btn w-24 h-24">
                                    <Link :href="route('Characters.show', { id: character.slug })">
                                    <img :src="showCharIcon() + character.char_icon" class="object-contain md:object-scale-down" />
                                    </Link>
                                    <div class="avatar absolute top-0 right-0 w-7 h-7">
                                        <img :src="showElement()" class="object-contain md:object-scale-down" />
                                    </div>
                                    <div class="w-full bg-green-500 overflow-hidden absolute bottom-0 text-center">
                                        <kbd v-if="character.char_name == 'Kaedehara Kazuha'">Kazuha</kbd>
                                        <kbd v-else-if="character.char_name =='Raiden Shogun'">Raiden</kbd>
                                        <kbd v-else>{{character.char_name}}</kbd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</template>
<script>
export default {
    props:['characters'],
        data(){
        return{
                pyroHidden: false,
                hydroHidden: false,
                AnemoHidden: false,
                ElectroHidden: false,
                DendroHidden: false,
                CryoHidden: false,
                GeoHidden: false,

             params: {
                    search: null,
                    pyro:null,
                    hydro:null,
                    gg:'',
                    element:null,
                    element1:null,
                },
                
        }
    },
    methods:{
         showCharIcon() {
            return "/storage/images/icon/character/";
        },
        showElement(){
            const ele = this.character.element;
            if(ele == "Cryo"){
                return "image/element/Element_Cryo.png"
            } else if(ele == "Geo"){
                return "image/element/Element_Geo.png"
            } else if(ele == "Dendro"){
                return "image/element/Element_Dendro.png"
            } else if(ele == "Anemo"){
                return "image/element/Element_Anemo.png"
            } else if(ele == "Electro"){
                return "image/element/Element_Electro.png"
            } else if(ele == "Hydro"){
                return "image/element/Element_Hydro.png"
            } else if(ele == "Pyro"){
                return "image/element/Element_Pyro.png"
            }
        },
    }
}
</script>