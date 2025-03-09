<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabela de Gerenciameto de Admins') . " do Usuario: " . \Auth::guard('admin')->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CPF
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                    <th>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">+</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="https://i.pravatar.cc/150?img=1" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $admin->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $admin->number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $admin->cpf }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $admin->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-wrap text-sm font-medium">
                                            <a href="#" class="ml-2 text-green-600 hover:text-green-900">View</a>
                                            <a href="#" class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                    <div>
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>