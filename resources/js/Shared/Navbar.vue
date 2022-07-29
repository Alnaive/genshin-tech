<template>
<div class="navbar bg-base-100">
  <div class="flex-none">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>
  </div>
  <div class="flex-1">
    <Link :href="route('welcome')" class="btn btn-ghost normal-case text-xl">Genshin-Tech</Link>
  </div>
  <div class="flex-none">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
    </button>
  </div>
</div>
</template>

<script>
import { defineComponent, onMounted, onUnmounted, Transition } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { useFullscreen } from '@vueuse/core'
import {
    SunIcon,
    MoonIcon,
    SearchIcon,
    MenuIcon,
    XIcon,
    ArrowsExpandIcon
} from '@heroicons/vue/outline'
import {
    handleScroll,
    isDark,
    scrolling,
    toggleDarkMode,
    sidebarState,
} from '@/Composables'
import Button from '@/Components/Button'
import ApplicationLogo from '@/Components/ApplicationLogo'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import { ArrowsInnerIcon } from '@/Components/Icons/outline.jsx'

export default {
    components: {
        ApplicationLogo,
        Button,
        BreezeDropdown,
        BreezeDropdownLink,
        Link,
        // icons
        SunIcon,
        MoonIcon,
        SearchIcon,
        MenuIcon,
        XIcon,
        ArrowsInnerIcon,
        ArrowsExpandIcon
    },

    setup() {
        const { isFullscreen, toggle: toggleFullScreen } = useFullscreen()

        onMounted(() => {
            document.addEventListener('scroll', handleScroll)
        })
        onUnmounted(() => {
            document.removeEventListener('scroll', handleScroll)
        })

        return {
            scrolling,
            isDark,
            toggleDarkMode,
            isFullscreen,
            toggleFullScreen,
            sidebarState,
        }
    },
}
</script>
