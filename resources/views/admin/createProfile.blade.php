<x-app-layout>

    <body class="bg-gradient-to-r from-indigo-800 to-blue-900 min-h-screen flex items-center justify-center p-4">

        <form action="{{ route('storeProfile') }}" enctype="multipart/form-data" method="POST" class="space-y-4">
            @csrf
            <div
                class="font-std mb-10 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">

                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row justify-between mb-5 items-start">
                        <h2 class="mb-5 text-4xl font-bold text-blue-900">Criar novo Perfil</h2>
                        <div class="text-center">
                            <div>
                                <img id="profileImage"
                                    src="https://t3.ftcdn.net/jpg/00/64/67/80/360_F_64678017_zUpiZFjj04cnLri7oADnyMH0XBYyQghG.webp"
                                    alt="Foto de Perfil"
                                    class="rounded-full w-32 h-32 mx-auto border-4 border-indigo-800 mb-4 transition-transform duration-300 hover:scale-105 ring ring-gray-300">
                                <input type="file" name="image" id="upload_profile" hidden
                                    onchange="previewImage(event)">

                                <label for="upload_profile" class="inline-flex items-center">
                                    <svg data-slot="icon" class="w-5 h-5 text-blue-700" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <button onclick="document.getElementById('upload_profile').click()" type="button"
                                class="bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300 ring ring-gray-300 hover:ring-indigo-300">
                                Alterar Foto de Perfil
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="balance" class="block text-sm font-medium text-gray-700">Saldo</label>
                        <input type="number" name="balance" id="balance"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="space-y-4 bg-gray-50 p-6 rounded-xl shadow-inner mt-6">
                        <h3 class="text-lg font-semibold text-indigo-800 mb-4">Endereço</h3>
                        <div class="flex items-center gap-2">
                            <div class="flex-1">
                                <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                <input type="text" name="cep" id="cep"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <button type="button" id="validateCepBtn" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-900 transition-colors duration-300 h-10 mt-6">
                                Validar
                            </button>
                        </div>
                        <div>
                            <label for="street" class="block text-sm font-medium text-gray-700">Logradouro</label>
                            <input type="text" name="street" id="street"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                            <input type="text" name="city" id="city"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                            <input type="text" name="state" id="state"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700">Número</label>
                            <input type="text" name="address_number" id="number"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="complement" class="block text-sm font-medium text-gray-700">Complemento</label>
                            <input type="text" name="complement" id="complement"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>


                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="tel" name="number" id="phone"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                        <input type="text" name="cpf" id="cpf"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="datebirth" class="block text-sm font-medium text-gray-700">Data de
                            Nascimento</label>
                        <input type="date" name="date_birth" id="datebirth"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"><a
                                href="{{ route('userIndex') }}">Cancelar</a></button>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700">Salvar
                            Alterações</button>
                    </div>

        </form>
        </div>

        </div>

    </body>

    </html>

<script>
document.getElementById('validateCepBtn').addEventListener('click', async () => {
    const cep = document.getElementById('cep').value.replace(/\D/g, ''); // remove caracteres não numéricos

    if (!cep) {
        alert('Digite um CEP primeiro.');
        return;
    }

    try {
        // Usando ViaCEP como exemplo de API pública
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (!data.erro) {
            // Preenche os campos do formulário
            document.getElementById('street').value = data.logradouro || '';
            document.getElementById('city').value = data.localidade || '';
            document.getElementById('state').value = data.uf || '';
        } else {
            alert('CEP não encontrado.');
        }
    } catch (error) {
        console.error(error);
        alert('Erro na conexão com o servidor.');
    }
});
</script>


    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                const imgElement = document.getElementById('profileImage');
                imgElement.src = reader.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</x-app-layout>
