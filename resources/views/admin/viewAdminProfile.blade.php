<x-app-layout>



    <body class="bg-gradient-to-r from-indigo-800 to-blue-900 min-h-screen flex items-center justify-center p-4">


        <div
            class="font-std mb-10 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">

            <div class="flex flex-col">
                <div class="flex flex-col mb-5 items-start">
                    <h2 class="mb-5 text-4xl font-bold text-blue-900">View Admin Profile</h2>
                    <div class="text-center">
                        <div>
                            <img src="{{ asset('storage/' . $admin->image)  }}" alt="Profile Picture"
                                class="rounded-full w-32 h-32 mx-auto border-4 border-indigo-800 mb-4 transition-transform duration-300 hover:scale-105 ring ring-gray-300">
                        </div>
                        
                    </div>
                </div>

                <form class="space-y-4">

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{$admin->name}}">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{$admin->email}}">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{$admin->password}}">
                    </div>
                    <div>
                        <label for="Address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{$admin->address}}">
                    </div>


                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="tel" name="number" id="phone"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{$admin->number}}">
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">CPF</label>
                        <input type="text" name="cpf" id="cpf"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ $admin->cpf }}">
                    </div>


                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Datebirth</label>
                        <input type="date" name="date_birth" id="datebirth"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ $admin->date_birth }}">
                    </div>




                    <div class="flex justify-end space-x-4">

                        <button type="button"
                            class="px-4 py-2 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700"><a
                                href="{{ route('adminIndex') }}">Back</button>
                    </div>
                </form>
            </div>

        </div>

    </body>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</x-app-layout>