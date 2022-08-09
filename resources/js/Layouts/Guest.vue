<template>
<div class="drawer bg-gray-100 dark:bg-dark-eval-1">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
  <div class="drawer-content  bg-gray-100 dark:bg-dark-eval-1 flex flex-col">
    <!-- Navbar -->
    <div class="w-full navbar bg-white dark:bg-base-300">
      <div class="container mx-auto"> 
        <div class="flex-none lg:hidden">
        <label for="my-drawer-3" class="btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </label>
      </div> 
      <div class="flex-1 px-2 mx-2">
        <Link :href="route('welcome')" class="btn btn-ghost normal-case font-bold text-xl">Genshin-Tech</Link>
         <Button
                iconOnly
                variant="secondary"
                type="button"
                @click="toggleDarkMode"
                v-slot="{ iconSizeClasses }"
                class="md:hidden mt-1"
                srText="Toggle dark mode"
            >
                <MoonIcon
                    v-show="!isDark"
                    aria-hidden="true"
                    :class="iconSizeClasses"
                />
                <SunIcon
                    v-show="isDark"
                    aria-hidden="true"
                    :class="iconSizeClasses"
                />
            </Button>
            <Button
                iconOnly
                variant="secondary"
                type="button"
                @click="toggleDarkMode"
                v-slot="{ iconSizeClasses }"
                class="hidden md:inline-flex"
                srText="Toggle dark mode"
            >
                <MoonIcon
                    v-show="!isDark"
                    aria-hidden="true"
                    :class="iconSizeClasses"
                />
                <SunIcon
                    v-show="isDark"
                    aria-hidden="true"
                    :class="iconSizeClasses"
                />
            </Button>
      </div>
      <div class="flex-none hidden lg:block">
        <ul class="flex flex-row space-x-3">
          <!-- Navbar menu content here -->
          <li><Link :href="route('explore')" class="btn btn-ghost normal-case text-md "><VueFeather type="search" size="24" ></VueFeather> Explore</Link></li>
          <li><Link :href="route('character')" class="btn btn-ghost normal-case text-md "><img src="https://cdn.discordapp.com/attachments/462583582431510528/943893367387988048/n5s6DYBAG0im6vlSAeQAAAAAElFTkSuQmCC.png" alt="">Character</Link></li>
          <li><!-- Dropdwon -->
            <BreezeDropdown align="right" width="48" v-if="$page.props.auth.user">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button 
                            class="btn btn-ghost normal-case inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md  hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:bg-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200"
                        >
                            {{ $page.props.auth.user.name }}

                            <svg
                                class="ml-2 -mr-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </span>
                </template>
                <template #content>
                    <BreezeDropdownLink
                        :href="route('dashboard')"
                        as="button"
                    >
                        Dashboard
                    </BreezeDropdownLink>
                    <BreezeDropdownLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </BreezeDropdownLink>
                </template>
            </BreezeDropdown>
            </li>
        </ul>
      </div>
      </div>
    </div>
    <!-- Page content here -->
    <div class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-eval-1 dark:text-gray-100 lg:flex lg:flex-col lg:items-center">
        <!-- Page Heading -->
            <header v-if="$slots.header">
                <div class="p-4 sm:p-6">
                    <slot name="header" />
                </div>
            </header>
        <main class="flex-1 px-4 sm:px-6">
            <slot />
        </main>
        <br>
        <PageFooter />
    </div>
  </div> 
  <div class="drawer-side ">
    <label for="my-drawer-3" class="drawer-overlay"></label> 
    <ul class="menu p-4 overflow-y-auto w-80 bg-white dark:bg-base-300 ">
      <!-- Sidebar content here -->
      <li><Link :href="route('explore')" class="btn btn-ghost normal-case text-md "><VueFeather type="search" size="24" class="mr-1"></VueFeather> Explore</Link></li>
      <li><Link :href="route('character')" class="btn btn-ghost normal-case text-md"><img src="https://cdn.discordapp.com/attachments/462583582431510528/943893367387988048/n5s6DYBAG0im6vlSAeQAAAAAElFTkSuQmCC.png" alt="">Character</Link></li>
          <li><!-- Dropdwon -->
            <BreezeDropdown align="right" width="48" v-if="$page.props.auth.user">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button 
                            class="btn btn-ghost normal-case inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md  hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:bg-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200"
                        >
                            {{ $page.props.auth.user.name }}

                            <svg
                                class="ml-2 -mr-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </span>
                </template>
                <template #content>
                    <BreezeDropdownLink
                        :href="route('dashboard')"
                        as="button"
                    >
                        Dashboard
                    </BreezeDropdownLink>
                    <BreezeDropdownLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </BreezeDropdownLink>
                </template>
            </BreezeDropdown>
            </li>
      
    </ul>
    
  </div>
</div>


</template>

<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/inertia-vue3'
import PageFooter from '@/Components/PageFooter.vue'
import Button from '@/Components/Button.vue'
import { toggleDarkMode, isDark } from '@/Composables'
import { MoonIcon, SunIcon } from '@heroicons/vue/outline'
import Navbar from '@/Shared/Navbar.vue'
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import VueFeather from 'vue-feather';

export default {
    components: {
        ApplicationLogo,
        Link,
        PageFooter,
        Button,
        MoonIcon,
        SunIcon,
        Navbar,
         BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        VueFeather,
    },

    setup() {
        return {
            toggleDarkMode,
            isDark,
        }
    },
}
</script>
