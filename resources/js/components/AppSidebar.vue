<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LayoutGrid, Image as ImageIcon, Video } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Participantes',
        href: '/participantes',
        icon: ImageIcon,
    },

];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset" class="bg-[#00367e] text-white">
        <!-- Logo centrado -->
        <SidebarHeader class="py-6 flex justify-center items-center border-b border-[#ffb300]">
            <Link :href="route('dashboard')" class="flex justify-center">
            <AppLogo class="h-14 w-auto" />
            </Link>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter class="border-t border-[#ffb300] px-4 py-3 text-xs text-center text-white">
            <div class="w-full">
                <p>Sistema de Gestión - Audita 2025</p>
                <p class="text-[#ffb300] font-semibold">Desarrollado por el equipo técnico</p>
            </div>
            <NavUser />
        </SidebarFooter>
    </Sidebar>

    <!-- Contenido principal -->
    <slot />
</template>
