<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabela de Gerenciamento de Admins') . " do Usuário: " . \Auth::guard('admin')->user()->name }}
        </h2>
    </x-slot>

    <div x-data="{ deleteAdminId: null }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    <th>
                                        <a href="{{ route('createAdminProfile') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $admin->image) }}" alt="">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('viewAdminProfile', $admin->id) }}" class="ml-2 text-green-600 hover:text-green-900">View</a>
                                            <a href="{{ route('editAdminProfile', $admin->id) }}" class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <button type="button"
                                                x-on:click.prevent="deleteAdminId = {{ $admin->id }}; $dispatch('open-modal', 'confirm-admin-deletion')"
                                                class="ml-2 text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-modal name="confirm-admin-deletion" focusable>
            <form method="post" x-bind:action="'{{ route('deleteAdmin', '') }}/' + deleteAdminId"  class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    Tem certeza de que deseja excluir este administrador?
                </h2>

                <div class="mt-6 flex justify-end">
                    <button type="button" class="mr-4 text-gray-600 hover:text-gray-900" x-on:click="$dispatch('close')">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Deletar</button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>