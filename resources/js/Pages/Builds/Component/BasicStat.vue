<template>
    <div class="form-control">
        <label class="label">Name</label> 
        <select class="select select-bordered select-primary bg-base-content dark:bg-base-100 w-full max-w-xs" >
            <option selected="selected" :value="form.character_id"> {{character.name}} </option> 
        </select>
    </div>
    <div class="form-control">
        <label class="label">Ascension</label> 
        <select id="asc1" class="select select-bordered bg-base-content dark:bg-base-100 w-full max-w-xs"  v-on:click="selected()" @change="$emit('update:ascension', $event.target.value)" >
            <option  value="1">1</option>
            <option  value="2">2</option>
            <option  value="3">3</option>
            <option  value="4">4</option>
            <option  value="5">5</option>
            <option selected="selected" value="6">6</option>
        </select>
        <p class="text-warning" v-if="errors.ascension">{{ errors.ascension }}</p>
    </div>
    <div class="form-control">
        <label class="label">Selected Lv</label> 
        <select @change="$emit('update:char_lv', $event.target.value)" class="select select-bordered bg-base-content dark:bg-base-100 w-full max-w-xs"  v-on:click="selected()" :disabled="selectCostumeLv" :class="selectCostumeLv ? 'opacity-50' : 'bg-base-content dark:bg-base-100' ">
            <option  value="20">20</option>
            <option  value="40">40</option>
            <option  value="50">50</option>
            <option  value="60">60</option>
            <option  value="70">70</option>
            <option  value="80">80</option>
            <option selected="selected" value="90">90</option> 
        </select>
        <p class="text-warning" v-if="errors.char_lv">{{ errors.char_lv }}</p>
    </div>
        <div class="form-control">
        <label class="label">Add Lv 
        <input  @click="costumeLv = !costumeLv" v-on:click="selectCostumeLv = !selectCostumeLv" type="checkbox"  class="toggle "></label> 
        <input @input="$emit('update:char_lv', $event.target.value)"  placeholder="Character Lv"  class="input input-bordered bg-base-content dark:bg-base-100" :disabled="costumeLv" :class="costumeLv ? 'opacity-50' : 'bg-base-content dark:bg-base-100' " type="number" >
        <p class="text-warning" v-if="errors.char_lv">{{ errors.char_lv }}</p>
    </div>
    
    <div class="form-control">
        <label class="label">Max HP</label> 
        <input placeholder="Max HP"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" @input="$emit('update:hp', $event.target.value)" >
        <p class="text-warning" v-if="errors.hp">{{ errors.hp }}</p>
    </div>
    <div class="form-control">
        <label class="label">Attack</label> 
        <input @input="$emit('update:atk', $event.target.value)"  placeholder="Attack"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
        <p class="text-warning" v-if="errors.atk">{{ errors.atk }}</p>
    </div>
    <div class="form-control">
        <label class="label">Defense</label> 
        <input @input="$emit('update:defense', $event.target.value)"  placeholder="Defense" class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
        <p class="text-warning" v-if="errors.defense">{{ errors.defense }}</p>
    </div>
    <div class="form-control">
        <label class="label">EM</label> 
        <input @input="$emit('update:em', $event.target.value)"  placeholder="Elemental Mastery"  class="input  input-bordered bg-base-content dark:bg-base-100" type="number" >
        <p class="text-warning" v-if="errors.em">{{ errors.em }}</p>
    </div>
</template>

<script>
import {ref} from 'vue';
export default {
    props: ['character','errors'],
    data(){
        return{
            costumeLv:true,
            selectCostumeLv:false,
           
        }
    },
     setup(props) {
            const form = ref({
                character_id: props.character.id,
                asension: '',
                char_lv: '',
                hp: '',
                atk: '',
                defense: '',
                em: '',
               
            });
            return {
                form
            };
        },
    methods: {
        
    },
}
</script>