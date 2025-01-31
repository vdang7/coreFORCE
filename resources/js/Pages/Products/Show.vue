<script setup>
import Layout from "@/Layouts/Layout.vue";
import Container from "@/Components/Container.vue";
import Cart from "@/Components/Cart.vue";
import { CheckIcon, StarIcon } from "@heroicons/vue/20/solid";
import { ShieldCheckIcon } from "@heroicons/vue/24/outline";

const origin = window.location.origin;

defineProps({
    product: {
        type: Array,
        required: true,
    },
});

import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm();

const addToCart = (id) => {
    form.productId = id;
    form.post(route("cart.store", { id }), {
        onSuccess: () => {
            console.log("Product added to cart");
        },
        onError: () => {
            console.error("Failed to add to cart");
        },
    });
};
</script>

<template>
    <Layout>
        <div class="bg-gray-50">
            <div
                class="mx-auto relative max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
            >
                <div class="lg:max-w-lg lg:self-end lg:sticky lg:top-4">
                    <p class="font-medium text-primary-500">Best seller</p>
                    <div class="mt-4">
                        <h1
                            class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                        >
                            {{ product.name }}
                        </h1>
                    </div>

                    <section aria-labelledby="information-heading" class="mt-4">
                        <h2 id="information-heading" class="sr-only">
                            Product information
                        </h2>

                        <div class="flex items-center">
                            <p class="text-lg text-gray-900 sm:text-xl">
                                ${{ product.price }}
                            </p>

                            <div class="ml-4 border-l border-gray-300 pl-4">
                                <h2 class="sr-only">Reviews</h2>
                                <div class="flex items-center">
                                    <div>
                                        <div class="flex items-center">
                                            <StarIcon
                                                v-for="rating in [
                                                    0, 1, 2, 3, 4,
                                                ]"
                                                :key="rating"
                                                class="text-secondary-400 size-5 shrink-0"
                                                aria-hidden="true"
                                            />
                                        </div>
                                        <p class="sr-only">5 out of 5 stars</p>
                                    </div>
                                    <p class="ml-2 text-sm text-gray-500">
                                        15,040 reviews
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 space-y-6">
                            <p class="text-base text-gray-500">
                                {{ product.description }}
                            </p>
                        </div>

                        <div class="mt-6 flex items-center">
                            <CheckIcon
                                class="size-5 shrink-0 text-primary-500"
                                aria-hidden="true"
                            />

                            <p class="ml-2 text-sm text-gray-500">
                                In stock and ready to ship
                            </p>
                        </div>
                    </section>

                    <button
                        @click="addToCart(product.id)"
                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-primary-600 px-8 py-3 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                    >
                        Add to cart
                    </button>

                    <div class="mt-6 text-center">
                        <div class="group inline-flex text-base font-medium">
                            <ShieldCheckIcon
                                aria-hidden="true"
                                class="mr-2 size-6 shrink-0 text-gray-400"
                            />
                            <span class="text-gray-500">100% satisfaction</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:self-center">
                    <img
                        :alt="product.name"
                        :src="`${origin}/${product.image}`"
                        class="aspect-[16/9] w-full rounded-lg object-cover"
                    />
                </div>
            </div>
        </div>
    </Layout>
</template>
