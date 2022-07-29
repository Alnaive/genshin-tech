<template>
    <PerfrectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <div v-if="!$page.props.auth.user"></div>
        <div v-else-if="$page.props.auth.user.role == 'admin'">
            <SidebarLink 
            title="Dashboard"
            :href="route('Dashboard')"
            :active="route().current('Dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>
        </div>
        <SidebarLink title="Home" :href="route('welcome')" :active="route().current('welcome')">
            <template #icon>
                    <vue-feather type="home" size="24"></vue-feather>
            </template>
        </SidebarLink>
        <hr>
        <SidebarLink
        title="Character" :href="route('character')" :active="route().current('character')">
            <template #icon>
                <img src="https://cdn.discordapp.com/attachments/462583582431510528/943893367387988048/n5s6DYBAG0im6vlSAeQAAAAAElFTkSuQmCC.png" alt="">
            </template>
        </SidebarLink>
        <!-- <SidebarCollapsible title="Items">
            <SidebarCollapsibleItem :href="route('Artifacts.index')" title="Artifact" :active="route().current('Artifacts.index')" />
            <SidebarCollapsibleItem :href="route('Weapons.index')" title="Weapon" :active="route().current('Weapons.index')" />
            <SidebarCollapsibleItem href="#" title="Talent" :active="true" />
        </SidebarCollapsible> -->

        <!-- Examples -->
        
        <!-- <hr>
        <SidebarLink
            title="Article"
            href="https://github.com/kamona-wd/kui-laravel-breeze"
        >
        </SidebarLink> -->
           
        <!-- Collapsible examples
        <SidebarCollapsible title="Users" :active="$page.url.startsWith('/users')">
            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="$page.url === '/users/index'" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="$page.url === '/users/create'" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Users" :active="usePage().url.value.startsWith('/users')">
            <template #icon>
                <UserIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="route().current('users.index')" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="route().current('users.create')" />
        </SidebarCollapsible> -->
    </PerfrectScrollbar>
</template>

<script>
import PerfrectScrollbar from '@/Components/PerfectScrollbar'
import SidebarLink from '@/Shared/Sidebar/SidebarLink.vue'
import { DashboardIcon } from '@/Components/Icons/outline.jsx'
import SidebarCollapsible from '@/Shared/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Shared/Sidebar/SidebarCollapsibleItem.vue'
import VueFeather from 'vue-feather';

export default {
    components: {
        PerfrectScrollbar,
        SidebarLink,
        DashboardIcon,
        SidebarCollapsible,
        SidebarCollapsibleItem,
        VueFeather,
    },

}
</script>
