<x-app-layout>
    <form action="{{ route('productsSearch') }}" method="GET" class="mb-4">
        <div class="bg-gray-100 dark:bg-gray-800 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover"
                                src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg"
                                alt="Product Image">
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h2>

                        <div class="grid mb-4 gap-4 grid-cols-1">
                            <div class="mr-4">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                                <span class="text-gray-600 dark:text-gray-300">${{ $product->price }}</span>
                            </div>
                            <div class="mr-4">
                                <span class="font-bold text-gray-700 dark:text-gray-300">Quantity:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->quantity }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Category:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->category }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Announced by:</span>
                                <span
                                    class="text-gray-600 dark:text-gray-300">{{ $product->creator->name ?? 'Sistema' }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Contact announcer:</span>
                                <span
                                    class="text-gray-600 dark:text-gray-300">{{ $product->creator->number ?? 'Sistema' }}</span>
                            </div>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                                {{ $product->description }}
                            </p>
                        </div>

                        <div class="flex -mx-2 justify-center self-baseline">
                            <div class="w-1/2 px-2 mt-24">
                                <button
                                    class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>