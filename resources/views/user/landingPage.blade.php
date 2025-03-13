<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Welcome to my
                    E-commerce</h2>
                <p class="mb-4 font-light"></p>
                <p class="mb-4 font-medium"></p>
            </div>
        </div>
    </section>

    <form action="{{ route('productsSearch') }}" method="GET" class="mb-4">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                </div>
                <div class="flex gap-4">
                    <input type="text" name="query" id="table-search" value="{{ request()->input('query') }}"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items"><button type="submit"
                        class="px-4 py-2 bg-gray-700 text-white rounded-lg">Buscar</button>

                    <select name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[20%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Todas as Categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class=" p-6 text-gray-900 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if(isset($products) && $products->count() > 0)
                        @foreach ($products as $product)
                            <div
                                class="w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="p-8 rounded-t-lg bg-cover h-60 w-full object-cover"
                                        src="{{ asset('storage/' . $product->image) }}" alt="product image" />
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="#">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mb-4">
                                            {{ $product->name}}
                                        </h5>
                                    </a>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">R$
                                            {{ $product->price}}</span>
                                        <a href="{{ route('user.productView', $product->id) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buy</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <p class="text-gray-500">Nenhum produto encontrado.</p>
                    @endif

                </div>
                {{$products->links()}}
            </div>

    </form>
    </div>
    </div>
</x-app-layout>