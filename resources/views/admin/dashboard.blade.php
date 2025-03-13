<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class=" py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex gap-20">
                    @if(is_admin())
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('adminIndex') }}">Ir para Tabela de Gerenciamento de Admins</a>
                            </button>
                        </div>
                    @endif
                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="{{ route('userIndex') }}">Ir para Tabela de Gerenciamento de Usuarios</a>
                        </button>
                    </div>

                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="{{ route('productIndex') }}">Ir para Tabela de Gerenciamento de Produtos</a>
                        </button>
                    </div>
                    @if(is_user())
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('withdrawView', logged_user()->id) }}">Ir para Area de Saque</a>
                            </button>
                        </div>
                       
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('purchase') }}">Ir para Area de Gerenciamento de Compras</a>
                            </button>
                        </div>

                        @endif  
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('sales') }}">Ir para Area de Gerenciamento de Vendas</a>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>