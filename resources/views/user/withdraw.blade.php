<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Withdraw Area') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center ">
        <div class="mt-8 p-10 bg-gray-800 w-full max-w-md rounded-lg shadow-lg">
            <form action="{{ route('withdraw', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="text-center">
                    <label class="block text-sm font-medium text-gray-300">Your Balance:</label>
                    <h1 class="font-bold text-2xl text-white mt-1">${{ number_format($user->balance, 2) }}</h1>
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-300">Amount to withdraw:</label>
                    @error('balance')
                        <p class="text-red-500 text-xs mb-1">{{ $message }}</p>
                    @enderror
                    <input type="number" name="balance" step="any" placeholder="Enter amount" min="1" max="{{ $user->balance }}"
                        class="w-full p-2.5 text-sm rounded-lg border border-gray-600 bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500 shadow-md" />
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition duration-200">
                        Withdraw
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
