<script>
import { computed, inject, watchEffect, getCurrentInstance } from "vue";

export default {
    name: "Tab",
    setup(props) {
        const instance = getCurrentInstance();
        const { tabs, selectTab, active } = inject("tabsState", {
            tabs: [],
            selectTab: () => {},
        });
        const index = computed(() =>
            tabs.value.findIndex((target) => target.uid === instance.uid)
        );
        const isActive = computed(() => index.value === active.value);

        const activeteTab = () => {
            selectTab(index.value);
        };

        watchEffect(() => {
            if (index.value === -1) {
                tabs.value.push(instance);
            }
        });

        return {
            activeteTab,
            isActive,
        };
    },
};
</script>

<template>
    <div
        :class="
            isActive
                ? 'border-b-4 border-green-500 box-content'
                : 'border-b-2 border-white'
        "
        class="flex items-center px-6 py-3 rounded-tl-md rounded-tr-md overflow-hidden cursor-pointer"
        @click="activeteTab"
    >
        <slot />
    </div>
</template>
