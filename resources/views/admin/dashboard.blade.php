<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if(is_admin())
                        <div>
                            <a href="{{ route('adminIndex') }}"
                                class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                                Ir para Tabela de Gerenciamento de Admins
                            </a>
                        </div>

                        <div>
                            <a href="{{ route('userIndex') }}"
                                class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                                Ir para Tabela de Gerenciamento de Usuários
                            </a>
                        </div>
                    @endif

                    @if(is_user())
                        <div>
                            <a href="{{ route('withdrawView', logged_user()->id) }}"
                                class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                                Ir para Área de Saque
                            </a>
                        </div>

                        <div>
                            <a href="{{ route('purchase') }}"
                                class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                                Ir para Área de Gerenciamento de Compras
                            </a>
                        </div>
                    @endif
                    <div>
                        <a href="{{ route('productIndex') }}"
                            class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                            Ir para Tabela de Gerenciamento de Produtos
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('sales') }}"
                            class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                            Ir para Área de Gerenciamento de Vendas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>