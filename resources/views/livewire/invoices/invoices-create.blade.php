<div>

    <label for="" style="margin-bottom: 10px">FACTURA</label>

    <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
        style="text-align: left; margin-top: 10px">
        Provedor: {{ $provedor }}
    </label>

    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3">

            <button type="button" wire:click='search'>
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </div>
        <input type="search" id="default-search"
            class="block  p-3 ps-10  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe para buscar..." required style="width:500px" wire:model='searchs' />
        @error('suppliers')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

    </div>

    @if ($showSquare)
        <div class="backdrop" id="backdrop"></div>
        <div class="overlay-square">
            <div style="text-align: right">

                <button type="button" wire:click='search'
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    X
                </button>

            </div>
            @foreach ($supplierss as $item)
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="3" class="p-0">
                                    @if ($item->status == 'active')
                                        <button type="button" wire:click='selecionar({{ $item->id }})'
                                            class="w-full text-left py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 
                                            @if ($item->status != 'inactive') hover:bg-gray-100 hover:text-blue-700 @endif
                                            focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                            wire:click='buscar'>
                                            <div class="flex justify-between">
                                                <span class="font-medium dark:text-white">{{ $item->id }} -
                                                    {{ $item->name }}</span>

                                                <span
                                                    class="font-medium text-blue  -400 dark:text-blue-400">Activo</span>
                                            </div>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endif

    <div style="width: 99%; display: flex; margin-top: 30px">
        <div style="width: 49%; margin-right: 2%">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                style="text-align: left">Concepto</label>
            <select id="Concepto" name="Concepto" required wire:model='Concepto'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Seleccione una opcion</option>
                @foreach ($conceptos as $item)
                    <option value="{{ $item->id }}">
                        @if ($item->type == 'payment')
                            PAGO
                        @elseif ($item->type == 'credit_note')
                            NOTA DE CREDITO
                        @else
                            FACTURA
                        @endif

                    </option>
                @endforeach
            </select>
            @error('Concepto')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div style="width: 49%">
            <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                style="text-align: left">
                Folio
            </label>
            <input type="text" id="name" wire:model='folio'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required />
            @error('folio')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div style="width: 99%; display: flex; margin-top: 30px">

        <div style="width: 49%; display: flex; margin-right:2%">

            <div style="width: 49%; margin-right: 2%">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Fecha De Factura
                </label>
                <input type="date" id="Fecha" wire:model='fechaActual' disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required style="width: 100%; " />
                @error('fechaActual')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div style="width: 49%; ">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Dias De Credito
                </label>
                <select id="moneda" name="moneda" required wire:model.live='Credit'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1" disabled selected>Seleccione una opcion</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="60">60</option>
                    <option value="90">90</option>

                </select>
                @error('Credit')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div style="width: 49%">
            <div style="width: 49%">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Fecha De Vencimiento
                </label>
                <input type="date" id="Fecha" wire:model='FechaRes' disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required style="width: 100%; " />
                @error('FechaRes')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
    <div style="width: 99%; display: flex; margin-top: 30px">

        <div style="width: 49%; display: flex; margin-right:2%">

            <div style="width: 49%; margin-right: 2%">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Total Factura
                </label>
                <input type="number" wire:model.live='number'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required style="width: 100%; " min="1" step="0.01" />
                @error('number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div style="width: 49%; ">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Moneda
                </label>
                <select id="moneda" name="moneda" required wire:model='moneda' disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected>{{ $moneda }}</option>
                    <option value="USD">Dólar (USD)</option>
                    <option value="MXN">Peso Mexicano (MXN)</option>
                </select>
                @error('moneda')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div style="width: 49%; display: flex">
            <div style="width: 49%; margin-right: 2%">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    Tipo de Cambio
                </label>
                <input type="number" id="Fecha" wire:model.live='cambio'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required style="width: 100%; " @if ($moneda == 'MXN' || $moneda == '') disabled @endif step="0.01" />
                @error('cambio')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div style="width: 49%; ">
                <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    style="text-align: left">
                    MXN
                </label>
                <input type="text" id="Fecha" wire:model='total' disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required style="width: 100%; " value="{{ $total }}" />
                @error('total')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div style="width: 99%; display: flex; margin-top: 30px">
        <div style="width: 49%; margin-right: 2%">
            <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                style="text-align: left">
                Observaciones
            </label>
            <input type="text" id="Fecha" wire:model='observations'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required style="width: 100%; " />
            @error('observations')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div style="width: 49%; ">
            <label for="Nombre Del Provedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                style="text-align: left">
                Subir archivo pdf
            </label>
            <input type="file" id="Fecha" wire:model='file'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required style="width: 100%; " />
            @error('file')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="bg-white w-11/12 max-w-5xl mx-auto p-4 " style="width: 99%; text-align: right">

        <button
            class=" mt-1    text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            wire:click='save'>
            Guardar</button>

    </div>
    <style>
        .overlay-square {
            padding: 10px;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 60%;
            height: auto;
            background-color: white;
            box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            transform: translate(-50%, -50%);
        }

        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Oscurece la parte trasera */
            z-index: 1000;
            /* Debajo del modal */
        }

        /* Ocultar la capa y el modal por defecto */
        .hidden {
            display: none;
        }
    </style>
</div>
