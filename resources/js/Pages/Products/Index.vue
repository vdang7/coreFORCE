<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Container from "@/Components/Container.vue";
import Layout from "@/Layouts/Layout.vue";
import { GiftIcon } from "@heroicons/vue/24/outline";
import { Head } from "@inertiajs/vue3";

defineProps({
    products: {
        type: Array,
    },
});
</script>

<template>
    <Layout>
        <Head>
            <title>coreFORCE</title>
        </Head>

        <Container>
            <section class="pt-24 pb-16 sm:pb-24">
                <div>
                    <div
                        class="space-y-3 sm:flex sm:items-center sm:justify-between sm:space-y-0"
                    >
                        <div>
                            <p
                                class="text-base/7 font-semibold text-secondary-600 flex"
                            >
                                <GiftIcon class="w-4 mr-2 text-secondary-600" />
                                Winter special
                            </p>
                            <h2
                                class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl sm:text-balance"
                            >
                                Best sellers
                            </h2>
                        </div>
                        <p
                            href="#"
                            class="text-sm font-medium text-primary-600 flex"
                        >
                            <svg
                                class="w-4 h-[1.1rem] mr-3 text-primary-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512"
                            >
                                <path
                                    fill="currentColor"
                                    d="M499.6 11.3c6.7-10.7 20.5-14.5 31.7-8.5s15.8 19.5 10.6 31L404.8 338.6c2.2 2.3 4.3 4.7 6.3 7.1l97.2-54.7c10.5-5.9 23.6-3.1 30.9 6.4s6.3 23-2.2 31.5l-87 87-71.4 0c-13.2-37.3-48.7-64-90.5-64s-77.4 26.7-90.5 64l-79.6 0L42.3 363.7c-9.7-6.7-13.1-19.6-7.9-30.3s17.4-15.9 28.7-12.4l97.2 30.4c3-3.9 6.1-7.7 9.4-11.3L107.4 236.3c-6.1-10.1-3.9-23.1 5.1-30.7s22.2-7.5 31.1 .1L246 293.6c1.5-.4 3-.8 4.5-1.1l13.6-142.7c1.2-12.3 11.5-21.7 23.9-21.7s22.7 9.4 23.9 21.7l13.5 141.9L499.6 11.3zM64 448s0 0 0 0l448 0s0 0 0 0l32 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32s14.3-32 32-32l32 0zM288 0c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-48c0-13.3 10.7-24 24-24z"
                                />
                            </svg>
                            Power in every shot
                        </p>
                    </div>

                    <div
                        class="mt-12 sm:mt-16 grid grid-cols-2 gap-x-4 gap-y-10 md:grid-cols-4"
                    >
                        <div
                            v-for="product in products"
                            :key="product.id"
                            class="group relative"
                        >
                            <div
                                class="h-56 w-full overflow-hidden bg-gray-200 lg:h-72 xl:h-80"
                            >
                                <img
                                    :alt="product.name"
                                    :src="product.image"
                                    class="size-full object-cover group-hover:scale-110 transition-transform"
                                />
                            </div>

                            <h3 class="mt-4 text-sm font-medium text-gray-900">
                                <a
                                    :href="`${route('products.show', {
                                        slug: product.slug,
                                    })}`"
                                >
                                    <span class="absolute inset-0"></span>
                                    {{ product.name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-700">
                                ${{ product.price }}
                            </p>
                        </div>
                        <div
                            class="bg-white relative flex items-center justify-center h-56 w-full lg:h-72 xl:h-80 text-sm"
                        >
                            <ApplicationLogo
                                class="w-4 h-auto absolute bottom-4 right-4"
                            />
                            More coming soon.
                        </div>
                    </div>
                </div>
            </section>
        </Container>
    </Layout>
</template>
