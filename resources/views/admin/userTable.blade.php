<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabela de Gerenciamento de Usuários') }}
        </h2>
    </x-slot>

    <div x-data="{ deleteUserId: null }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <div class="p-6 text-gray-900">
                            <table class="min-w-full divide-y divide-gray-200 overflow-x-auto overflow-y-auto">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            CPF</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>


                                        <th>
                                            <a href="{{ route('createProfile') }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</a>
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ asset('storage/' . $user->image) }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $user->number }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->cpf }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-wrap text-sm font-medium gap-20">
                                                <a href="{{ route('viewProfile', $user->id) }}"
                                                    class="ml-2 text-green-600 hover:text-green-900">View</a>
                                                <a href="{{ route('editProfile', $user->id) }}"
                                                    class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <a href="{{ route('contact.index', $user->id) }}"
                                                    class="ml-2 text-indigo-600 hover:text-indigo-900">Contact</a>
                                                <button type="button"
                                                    x-on:click.prevent="deleteUserId = {{ $user->id }}; $dispatch('open-modal', 'confirm-user-deletion')"
                                                    class="ml-2 text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" x-bind:action="'{{ url('/delete') }}/' + deleteUserId" class="p-6">
                @csrf
                @method('delete')
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this user?
                </h2>
                <div class="mt-6 flex justify-end">
                    <button type="button" class="mr-4 text-gray-600 hover:text-gray-900"
                        x-on:click="$dispatch('close')">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                </div>
            </form>
        </x-modal>

    </div>
</x-app-layout>