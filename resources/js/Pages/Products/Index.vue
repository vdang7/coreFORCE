<script setup>
import Container from "@/Components/Container.vue";
import Layout from "@/Layouts/Layout.vue";
import { GiftIcon } from "@heroicons/vue/24/outline";
import { Head } from '@inertiajs/vue3';

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
                    <div class="space-y-3 sm:flex sm:items-center sm:justify-between sm:space-y-0">
                        <div>
                            <p class="text-base/7 font-semibold text-secondary-600 flex">
                                <GiftIcon class="w-4 mr-2 text-secondary-600"/>
                                Winter special
                            </p>
                            <h2
                                class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl sm:text-balance"
                            >
                                Best sellers
                            </h2>
                        </div>
                        <a
                            href="#"
                            class="block text-sm font-medium text-primary-600 hover:text-primary-500"
                        >
                            A collection to be created
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
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
                    </div>
                </div>
            </section>
        </Container>
    </Layout>
</template>
