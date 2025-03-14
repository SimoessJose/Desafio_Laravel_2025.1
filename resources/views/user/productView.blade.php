<x-app-layout>
    <form action="/checkout" method="POST">

        <div class="bg-gray-100 dark:bg-gray-800 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">


                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $product->image) }}"
                                alt="Product Image">
                        </div>
                    </div>


                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h2>

                        <div class="grid mb-4 gap-4 grid-cols-1">
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                                <span class="text-gray-600 dark:text-gray-300">${{ $product->price}}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Quantity in stock:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->quantity }}</span>
                            </div>

                            <div>

                                <span class="font-bold text-gray-700 dark:text-gray-300">Choose the amount:</span>
                                <div>
                                    <input type="number" name="quantity_input"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[20%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Amount" min="1" max="{{ $product->quantity }}" required />
                                </div>
                            </div>

                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Category:</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->category }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Announced by:</span>
                                <span class="text-gray-600 dark:text-gray-300">
                                    {{ $product->creator->name ?? 'Sistema' }}
                                </span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 dark:text-gray-300">Contact announcer:</span>
                                <span class="text-gray-600 dark:text-gray-300">
                                    {{ $product->creator->number ?? 'Sistema' }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-center bg-gray-100 dark:bg-gray-800 py-8">
            <div class="w-[20%] px-2">

                @csrf
                <input type="hidden" name="product" value="{{ json_encode($product) }}">
                @if(is_user())

                    <button type="submit" class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold 
                                       hover:bg-gray-800 dark:hover:bg-gray-700">Buy</button>
                @endif
    </form>
    </div>
    </div>
</x-app-layout>