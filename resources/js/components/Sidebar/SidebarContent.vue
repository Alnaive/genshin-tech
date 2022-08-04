<template>
    <PerfrectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>
        <hr>
        <SidebarLink title="Artifact" :href="route('Artifacts.index')" :active="route().current('Artifacts.index')"></SidebarLink>
        <SidebarLink title="Build" :href="route('Builds.index')" :active="route().current('Builds.index')"></SidebarLink>
        <SidebarLink title="Characters" :href="route('Characters.index')" :active="route().current('Characters.index')"></SidebarLink>
        <SidebarLink :href="route('Weapons.index')" title="Weapon" :active="route().current('Weapons.index')" />
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
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon } from '@/Components/Icons/outline.jsx'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'

export default {
    components: {
        PerfrectScrollbar,
        SidebarLink,
        DashboardIcon,
        SidebarCollapsible,
        SidebarCollapsibleItem,
    },
}
</script>
