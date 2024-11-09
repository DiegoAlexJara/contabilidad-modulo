<div>

    <div class="items-center p-4">
        @if (session()->has('message'))
            <div class="mt-2 text-green-500">{{ session('message') }}</div>
        @endif

        <div class="bg-white w-11/12 max-w-5xl mx-auto p-4 b-10 border-gray-300" style="width: 99%; display: flex; ">
            <div style="width: 45%; margin-right: 10%">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">Nombre
                    Del Provedor</label>
                <input type="text" id="name" wire:model='name'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre" required value='{{ $this->Idprovedor->name }}' />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div style="width: 45%">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">Moneda</label>
                <select id="moneda" name="moneda" required wire:model='moneda'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{-- <option value="{{ $moneda }}">
                        @if ($moneda == 'USD')
                            Dólar (USD)
                        @else
                            Peso Mexicano (MXN)
                        @endif
                    </option> --}}
                    <option value="USD">Dólar (USD)</option>
                    <option value="MXN">Peso Mexicano (MXN)</option>
                </select>
                @error('moneda')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="bg-white w-11/12 max-w-5xl mx-auto p-4 b-10 border-gray-300" style="width: 99%; display: flex; ">
            <div style="width: 45%">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">Estatus </label>
                <select id="moneda" name="status" required wire:model='status'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="bg-white w-11/12 max-w-5xl mx-auto p-4 " style="width: 99%; text-align: right">
            @if ($status == 'active' )
            <button
                class=" mt-1    text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                    
                wire:click='delete'>
                ELIMINAR</button>
                @endif
            <button
                class=" mt-1    text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                wire:click='edit'>
                EDITAR</button>
        </div>
    </div>


</div>
