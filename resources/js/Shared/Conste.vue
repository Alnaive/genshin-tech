<template>
    <section  v-if="conste == 'C1'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="conste == 'C2'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="conste == 'C3'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                                        <img :src="showConstellation() + character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="conste == 'C4'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="conste == 'C5'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c5_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

    <section v-else-if="conste == 'C6'" @change="$emit('update:conste', $event.target.value)" :value="conste"> 
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c2_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c3_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c4_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c5_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="showConstellation() + character.constellation.c6_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
    </section>

   <section v-else>
        <ul  class="menu w-12 py-1 gap-1  bg-transparent  absolute right-2 top-16" >
        <li>
            <div class="avatar">
                <div class="rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c1_icon + ')', backgroundSize:'contain' }">
                    <!-- <img @change="$emit('update:conste', $event.target.value)" :value="conste" :src="showConstellation() + character.constellation.c1_icon"> -->
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                    <!-- <img :src="showConstellation() + character.constellation.c1_icon" style="width:20px; height:20px; margin-top:8px; margin-left:10px"> -->
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c2_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li> 
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c3_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c4_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c5_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        <li>
            <div class="avatar">
                <div class=" rounded-full w-10 h-10" :style="{ backgroundImage: 'url(' + showConstellation() + character.constellation.c6_icon + ')', backgroundSize:'contain' }">
                    <img :src="lock()" style="width:20px; height:20px; margin-top:8px; margin-left:10px">
                </div>
            </div>
        </li>
        </ul>
        
   </section>
</template>

<script>
import {  useForm } from '@inertiajs/inertia-vue3';

export default {
    props: ['character','conste'],
     setup(props) {
            const form = useForm({
                
                conste: '',
               
            });
            return {
                form
            };
        },
    methods:{
          showConstellation() {
                return "/storage/images/icon/constellation/";
            },
            lock(){
                return "../image/attribute/lock.png"
            },
    }
}
</script>