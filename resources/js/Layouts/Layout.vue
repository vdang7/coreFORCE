<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Cart from "@/Components/Cart.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { ShoppingBagIcon } from "@heroicons/vue/24/outline";
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const page = usePage();
const cart = computed(() => page.props.cart);
const isAuthenticated = computed(() => page.props.auth.user);
const openCart = ref(false);
defineExpose({ openCart });
const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-50">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div
                            class="flex"
                            :class="
                                !isAuthenticated
                                    ? 'sm:w-full sm:justify-between'
                                    : ''
                            "
                        >
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link href="/">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex sm:items-center"
                            >
                                <NavLink
                                    :href="route('products.create')"
                                    :active="route().current('products.create')"
                                >
                                    Add product
                                </NavLink>
                                <NavLink
                                    v-if="isAuthenticated"
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                    Dashboard
                                </NavLink>
                                <NavLink
                                    v-if="!isAuthenticated"
                                    :href="route('login')"
                                    :active="route().current('login')"
                                >
                                    Sign in
                                </NavLink>
                                <NavLink
                                    v-if="!isAuthenticated"
                                    :href="route('register')"
                                    :active="route().current('register')"
                                >
                                    Sign up
                                </NavLink>
                                <!-- Cart -->
                                <div
                                    v-if="cart"
                                    class="flow-root"
                                    :class="isAuthenticated ? 'hidden' : ''"
                                >
                                    <button
                                        @click="openCart = true"
                                        class="group flex items-center p-2"
                                    >
                                        <ShoppingBagIcon
                                            class="size-6 shrink-0 text-gray-400 group-hover:text-primary-400"
                                            aria-hidden="true"
                                        />
                                        <span
                                            class="ml-2 text-sm font-medium text-gray-700 group-hover:text-primary-700"
                                            >{{ cart.length }}</span
                                        >
                                        <span class="sr-only"
                                            >items in cart, view bag</span
                                        >
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            v-if="isAuthenticated"
                            class="hidden sm:ms-6 sm:flex sm:items-center"
                        >
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
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
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                            <div v-if="cart" class="flow-root">
                                <button
                                    @click="openCart = true"
                                    class="group flex items-center p-2"
                                >
                                    <ShoppingBagIcon
                                        class="size-6 shrink-0 text-gray-400 group-hover:text-primary-400"
                                        aria-hidden="true"
                                    />
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700 group-hover:text-primary-700"
                                        >{{ cart.length }}</span
                                    >
                                    <span class="sr-only"
                                        >items in cart, view bag</span
                                    >
                                </button>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            :href="route('products.create')"
                            :active="route().current('products.create')"
                        >
                            Add product
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            v-if="isAuthenticated"
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            v-if="!isAuthenticated"
                            :href="route('login')"
                            :active="route().current('login')"
                        >
                            Sign in
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            v-if="!isAuthenticated"
                            :href="route('register')"
                            :active="route().current('register')"
                        >
                            Sign up
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div
                        v-if="isAuthenticated"
                        class="border-t border-gray-200 pb-1 pt-4"
                    >
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <Cart
                    v-if="cart"
                    :open="openCart"
                    @close="openCart = false"
                    :cart="cart"
                />
                <slot @openCart="openCart = true" :open="openCart" />
            </main>
        </div>
    </div>
    <svg
        class="bg-gray-50 -ml-0.5"
        viewBox="0 0 2003 209"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <g clip-path="url(#clip0_312_187)">
            <path
                class="text-gray-900"
                d="M117.706 208.435C79.822 208.435 50.835 199.729 30.745 182.318C10.655 164.715 0.61 138.694 0.61 104.254C0.61 70.0053 10.655 44.0797 30.745 26.477C50.835 8.87433 79.822 0.168661 117.706 0.359992L221.026 0.933984V37.67H120.863C95.9897 37.67 77.526 42.9317 65.472 53.455C53.418 63.9783 47.391 80.9113 47.391 104.254C47.391 127.597 53.418 144.625 65.472 155.34C77.526 165.863 95.9897 171.125 120.863 171.125H223.896V208.435H117.706ZM330.476 208.435C293.931 208.435 265.614 199.729 245.524 182.318C225.434 164.715 215.389 138.694 215.389 104.254C215.389 70.0053 225.434 44.1753 245.524 26.764C265.614 9.16133 294.601 0.359992 332.485 0.359992H384.145C422.029 0.359992 451.016 9.16133 471.106 26.764C491.196 44.1753 501.241 70.0053 501.241 104.254C501.241 138.694 491.196 164.715 471.106 182.318C451.016 199.729 422.507 208.435 385.58 208.435H330.476ZM335.642 37.67C314.404 37.67 297.854 41.4967 285.991 49.15C274.128 56.8033 266.666 68.953 263.605 85.599H453.025C449.964 68.953 442.502 56.8033 430.639 49.15C418.776 41.4967 402.226 37.67 380.988 37.67H335.642ZM336.503 171.125H380.988C402.417 171.125 418.968 167.298 430.639 159.645C442.502 151.992 449.964 139.746 453.025 122.909H263.605C266.666 139.746 274.128 151.992 285.991 159.645C297.854 167.298 314.691 171.125 336.503 171.125ZM509.755 207V1.79499H681.668C702.906 1.79499 719.36 7.15232 731.032 17.867C742.894 28.5817 748.826 44.845 748.826 66.657C748.826 85.2163 744.521 99.7577 735.911 110.281C727.301 120.804 715.055 127.405 699.175 130.084L746.53 207H694.296L650.385 131.519H555.675V207H509.755ZM676.215 39.105H555.675V93.922L676.215 94.209C684.633 94.209 691.043 92.1043 695.444 87.895C700.036 83.6857 702.332 76.6063 702.332 66.657C702.332 56.5163 700.036 49.437 695.444 45.419C691.043 41.2097 684.633 39.105 676.215 39.105ZM763.212 207V1.79499H988.22V39.105H809.132V84.451H971.574V121.761H809.132V169.69H988.22V207H763.212Z"
                fill="currentColor"
            />
            <path
                class="text-gray-900"
                d="M1016.79 207L993.832 1.79499H1039.75L1056.68 151.609L1113.8 107.698V1.79499H1159.72V107.985L1216.26 151.609L1233.48 1.79499H1279.4L1256.44 207H1217.98L1136.76 141.277L1055.25 207H1016.79ZM1264.96 207L1357.37 1.79499H1428.26L1520.67 207H1470.74L1451.22 163.663H1334.41L1314.9 207H1264.96ZM1351.06 126.353H1434.57L1394.68 37.67H1390.95L1351.06 126.353ZM1523.58 207V1.79499H1695.5C1716.73 1.79499 1733.19 7.15232 1744.86 17.867C1756.72 28.5817 1762.65 44.845 1762.65 66.657C1762.65 85.2163 1758.35 99.7577 1749.74 110.281C1741.13 120.804 1728.88 127.405 1713 130.084L1760.36 207H1708.12L1664.21 131.519H1569.5V207H1523.58ZM1690.04 39.105H1569.5V93.922L1690.04 94.209C1698.46 94.209 1704.87 92.1043 1709.27 87.895C1713.86 83.6857 1716.16 76.6063 1716.16 66.657C1716.16 56.5163 1713.86 49.437 1709.27 45.419C1704.87 41.2097 1698.46 39.105 1690.04 39.105ZM1777.04 207V1.79499H2002.05V39.105H1822.96V84.451H1985.4V121.761H1822.96V169.69H2002.05V207H1777.04Z"
                fill="currentColor"
            />
        </g>
        <defs>
            <clipPath id="clip0_312_187">
                <rect width="2003" height="209" fill="white" />
            </clipPath>
        </defs>
    </svg>
</template>
