<script setup>
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { useForm } from "@inertiajs/vue3";
import { computed, defineEmits, defineProps } from "vue";

const props = defineProps({
    open: {
        type: Boolean,
        required: true,
    },
    cart: {
        type: Array,
        required: true,
    }
});

const subTotal = computed(() => {
    return props.cart.reduce((total, cartItem) => {
        return total + cartItem.product.price;
    }, 0);
});

const uniqueCartItems = computed(() => {
    const map = new Map();
    props.cart.forEach((item) => map.set(item.product.id, item));
    return Array.from(map.values());
});

const emit = defineEmits(["close"]);

const closeCart = () => {
    emit("close");
};

const form = useForm();

const addProductToCart = (id) => {
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

const removeProductFromCart = (id) => {
    form.delete(route("cart.destroy", { id }), {
        onSuccess: () => {
            console.log("Product removed from cart");
        },
        onError: () => {
            console.error("Failed to remove product to cart");
        },
    });
};
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog class="relative z-10" @close="closeCart">
            <TransitionChild
                as="template"
                enter="ease-in-out duration-500"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in-out duration-500"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div
                        class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                    >
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enter-from="translate-x-full"
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0"
                            leave-to="translate-x-full"
                        >
                            <DialogPanel
                                class="pointer-events-auto w-screen max-w-md"
                            >
                                <div
                                    class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl"
                                >
                                    <div
                                        class="flex-1 overflow-y-auto px-4 py-6 sm:px-6"
                                    >
                                        <div
                                            class="flex items-start justify-between"
                                        >
                                            <DialogTitle
                                                class="text-lg font-medium text-gray-900"
                                                >Your shopping cart</DialogTitle
                                            >
                                            <div
                                                class="ml-3 flex h-7 items-center"
                                            >
                                                <button
                                                    type="button"
                                                    class="relative -m-2 p-2 text-gray-400 hover:text-gray-500"
                                                    @click="closeCart"
                                                >
                                                    <span
                                                        class="absolute -inset-0.5"
                                                    />
                                                    <span class="sr-only"
                                                        >Close panel</span
                                                    >
                                                    <XMarkIcon
                                                        class="size-6"
                                                        aria-hidden="true"
                                                    />
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-8">
                                            <div class="flow-root">
                                                <ul
                                                    role="list"
                                                    class="-my-6 divide-y divide-gray-200"
                                                >
                                                    <li
                                                        v-for="cartItem in uniqueCartItems"
                                                        :key="
                                                            cartItem.product.id
                                                        "
                                                        class="flex py-6"
                                                    >
                                                        <div
                                                            class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200"
                                                        >
                                                            <img
                                                                :src="cartItem.product.image"
                                                                :alt="
                                                                    cartItem
                                                                        .product
                                                                        .name
                                                                "
                                                                class="size-full object-cover"
                                                            />
                                                        </div>

                                                        <div
                                                            class="ml-4 flex flex-1 flex-col"
                                                        >
                                                            <div>
                                                                <div
                                                                    class="flex justify-between text-base font-medium text-gray-900"
                                                                >
                                                                    <h3>
                                                                        <a
                                                                            :href="`${route(
                                                                                'products.show',
                                                                                {
                                                                                    slug: cartItem
                                                                                        .product
                                                                                        .slug,
                                                                                }
                                                                            )}`"
                                                                            >{{
                                                                                cartItem
                                                                                    .product
                                                                                    .name
                                                                            }}</a
                                                                        >
                                                                    </h3>
                                                                    <p
                                                                        class="ml-4"
                                                                    >
                                                                        ${{
                                                                            cartItem
                                                                                .product
                                                                                .price
                                                                        }}
                                                                    </p>
                                                                </div>
                                                                <p
                                                                    class="mt-1 text-sm text-gray-500"
                                                                >
                                                                    Best seller
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="flex flex-1 items-end justify-between text-sm"
                                                            >
                                                                <p
                                                                    class="text-gray-500"
                                                                >
                                                                    Qty
                                                                    {{
                                                                        cart.filter(
                                                                            (
                                                                                item
                                                                            ) =>
                                                                                item
                                                                                    .product
                                                                                    .id ===
                                                                                cartItem
                                                                                    .product
                                                                                    .id
                                                                        ).length
                                                                    }}
                                                                </p>
                                                                <div
                                                                    class="flex space-x-5"
                                                                >
                                                                    <button
                                                                        type="button"
                                                                        @click="addProductToCart(cartItem.product.id)"
                                                                        class="group font-medium text-primary-600 hover:text-secondary-600 flex items-center justify-center"
                                                                    >
                                                                        <span class="border border-primary-200 group-hover:border-secondary-200 size-5 rounded-full flex justify-center items-center mr-2">
                                                                            <span class="group-hover:text-secondary-600 text-[1rem] translate-y-[-0.05rem]">+</span>
                                                                        </span>Add
                                                                    </button>
                                                                    <button
                                                                        type="button"
                                                                        @click="removeProductFromCart(cartItem.id)"
                                                                        class="group font-medium text-gray-600 hover:text-secondary-600 flex items-center justify-center"
                                                                    >
                                                                        <span class="border border-gray-200 group-hover:border-secondary-200 size-5 rounded-full flex justify-center items-center mr-2">
                                                                            <span class="group-hover:text-secondary-600 text-[1rem] translate-y-[-0.05rem]">&#8722;</span>
                                                                        </span>Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="border-t border-gray-200 px-4 py-6 sm:px-6"
                                    >
                                        <div
                                            class="flex justify-between text-base font-medium text-gray-900"
                                        >
                                            <p>Subtotal</p>
                                            <p>${{ subTotal.toFixed(2) }}</p>
                                        </div>
                                        <p class="mt-0.5 text-sm text-gray-500">
                                            Shipping and taxes calculated at
                                            checkout.
                                        </p>
                                        <div class="mt-6">
                                            <a
                                                href="#"
                                                class="flex items-center justify-center rounded-md border border-transparent bg-primary-700 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-primary-600"
                                                >Checkout</a
                                            >
                                        </div>
                                        <div
                                            class="mt-6 flex justify-center text-center text-sm text-gray-500"
                                        >
                                            <p>
                                                or{{ " " }}
                                                <button
                                                    type="button"
                                                    class="font-medium text-primary-600 hover:text-primary-500"
                                                    @click="closeCart"
                                                >
                                                    Continue Shopping
                                                    <span aria-hidden="true">
                                                        &rarr;</span
                                                    >
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
