<script setup>
import Container from "@/Components/Container.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Layout from "@/Layouts/Layout.vue";
import { PhotoIcon } from "@heroicons/vue/24/solid";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const inputClass =
    "mt-2 w-full border-gray-300 focus:border-secondary-500 focus:ring-secondary-500 rounded-md shadow-sm";

let currentImageName = ref("");

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
    currentImageName.value = file.name;
};

const form = useForm({
    name: "",
    description: "",
    price: "",
    quantity: "",
    image: null,
});

const submit = () => {
    form.post(route("products.store"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Layout>
        <section class="pt-24 pb-16 sm:pb-24">
            <Container class="isolate relative">
                <div
                    class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl"
                    aria-hidden="true"
                >
                    <div
                        class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-secondary-400 to-primary-400 opacity-30"
                        style="
                            clip-path: polygon(
                                74.1% 44.1%,
                                100% 61.6%,
                                97.5% 26.9%,
                                85.5% 0.1%,
                                80.7% 2%,
                                72.5% 32.5%,
                                60.2% 62.4%,
                                52.4% 68.1%,
                                47.5% 58.3%,
                                45.2% 34.5%,
                                27.5% 76.7%,
                                0.1% 64.9%,
                                17.9% 100%,
                                27.6% 76.8%,
                                76.1% 97.7%,
                                74.1% 44.1%
                            );
                        "
                    />
                </div>
                <p
                    class="text-base/7 font-semibold text-primary-600 text-center"
                >
                    Hello
                </p>
                <h2
                    class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl sm:text-balance text-center"
                >
                    Add a product
                </h2>
                <form
                    @submit.prevent="submit"
                    class="rounded-xl border border-gray-200 mt-16 space-y-4 bg-white px-10 pt-7 pb-7 max-w-2xl mx-auto"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    <div>
                        <InputLabel for="name" value="Product name" />
                        <input
                            :class="inputClass"
                            type="text"
                            v-model="form.name"
                            required
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="description"
                            value="Product description"
                        />
                        <textarea
                            :class="inputClass"
                            v-model="form.description"
                            required
                        ></textarea>
                    </div>

                    <div>
                        <InputLabel for="price" value="Product price" />
                        <input
                            :class="inputClass"
                            type="number"
                            step=".01"
                            v-model="form.price"
                        />
                    </div>

                    <div>
                        <InputLabel for="quantity" value="Product quantity" />
                        <input
                            :class="inputClass"
                            type="number"
                            v-model="form.quantity"
                        />
                    </div>

                    <div>
                        <label
                            for="product-image"
                            class="block text-sm/6 font-medium text-gray-900"
                            >Product photo</label
                        >
                        <div
                            class="mb-8 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                        >
                            <div class="text-center">
                                <PhotoIcon
                                    class="mx-auto size-12 text-gray-300"
                                    aria-hidden="true"
                                />
                                <div class="text-sm/6 text-gray-600">
                                    <label
                                        for="image"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500"
                                    >
                                        <span>Upload a photo</span>
                                        <input
                                            id="image"
                                            name="image"
                                            type="file"
                                            @change="handleFileChange"
                                            class="sr-only"
                                        />
                                    </label>
                                    <p
                                        v-if="currentImageName"
                                        class="mt-2 text-gray-600"
                                    >
                                        Selected Image: {{ currentImageName }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input
                        type="submit"
                        value="Add product"
                        class="bg-primary-600 cursor-pointer hover:-translate-y-1 hover:translate-x-1 transition-transform hover:bg-primary-700 text-white rounded-full px-4 py-1.5 font-medium ml-auto block"
                    />
                </form>
            </Container>
        </section>
    </Layout>
</template>
