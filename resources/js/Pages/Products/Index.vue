<script setup>
import Container from "@/Components/Container.vue";
import Layout from "@/Layouts/Layout.vue";

defineProps({
    products: {
        type: Array,
    },
});
</script>

<template>
    <Layout>
        <Container>
            <section class="pt-10 pb-16 sm:pb-24">
                <div>
                    <div class="md:flex md:items-center md:justify-between">
                        <div>
                            <p
                                class="text-secondary-600 mb-2 block font-medium"
                            >
                                Winter special
                            </p>
                            <h2
                                class="text-6xl sm:text-7xl font-bold tracking-tight text-gray-900"
                            >
                                Best sellers
                            </h2>
                        </div>
                        <a
                            href="#"
                            class="block mt-3 md:mt-0 text-sm font-medium text-primary-600 hover:text-primary-500"
                        >
                            Shop the collection
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
