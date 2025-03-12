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
                    <div class="p-6 text-gray-900">
                        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
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

                                        @if(is_admin())
                                            <th>
                                                <a href="{{ route('createProfile') }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</a>
                                            </th>
                                        
                                        @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if(is_admin()){
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
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('viewProfile', $user->id) }}"
                                                    class="ml-2 text-green-600 hover:text-green-900">View</a>
                                                <a href="{{ route('editProfile', $user->id) }}"
                                                    class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <button type="button"
                                                    x-on:click.prevent="deleteUserId = {{ $user->id }}; $dispatch('open-modal', 'confirm-user-deletion')"
                                                    class="ml-2 text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    }
                                @else{
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ asset('storage/' . logged_user()->image) }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ logged_user()->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ logged_user()->number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ logged_user()->cpf }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ logged_user()->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('viewProfile', logged_user()->id) }}"
                                                class="ml-2 text-green-600 hover:text-green-900">View</a>
                                            <a href="{{ route('editProfile', logged_user()->id) }}"
                                                class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <button type="button"
                                                x-on:click.prevent="deleteUserId = {{ logged_user()->id }}; $dispatch('open-modal', 'confirm-user-deletion')"
                                                class="ml-2 text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    }
                                @endif

                            </tbody>
                        </table>
                        @if(is_admin()){
                            <div>
                                {{ $users->links() }}
                            </div>
                        }
                        @endif
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