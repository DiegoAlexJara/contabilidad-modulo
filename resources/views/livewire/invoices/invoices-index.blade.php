<div>
    <div class="inline-flex" style="margin: 10px">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <input type="search" wire:model.live="search"
                class="block  p-3 ps-10  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar por folio" required style="width:500px" />
        </div>
    </div>
    <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 tables" style="width: 100%; ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">FOLIO</th>
                <th scope="col" class="px-6 py-3">MONEDA</th>
                <th scope="col" class="px-6 py-3">PROVEEDOR</th>
                <th scope="col" class="px-6 py-3">TIPO CAMBIO</th>
                <th scope="col" class="px-6 py-3">MONTO TOTAL</th>
                <th scope="col" class="px-6 py-3">SALDO PENDIENTE</th>
                <th scope="col" class="px-6 py-3">FECHA EMISION</th>
                <th scope="col" class="px-6 py-3">EXPIRACION</th>
                <th scope="col" class="px-6 py-3">ARCHIVO</th>
                <th scope="col" class="px-6 py-3">ESTATUS</th>
                @can('delete invoices')
                    <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $key => $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $item->folio }}</td>
                    <td class="px-6 py-4">{{ $item->currency }}</td>
                    <td class="px-6 py-4">{{ $item->provider->name }}</td>
                    <td class="px-6 py-4">${{ number_format($item->exchange_rate, 2) }}</td>
                    <td class="px-6 py-4">${{ number_format($item->total_amount, 2) }}</td>
                    <td class="px-6 py-4">${{ number_format($item->pending_amount, 2) }}</td>
                    <td class="px-6 py-4">{{ $item->emition_at }}</td>
                    <td class="px-6 py-4">{{ $item->expiration_at }}</td>
                        <td class="px-6 py-4 uppercase">
                            @if ($item->archive && $item->archive->path)
                                <a href="{{ Storage::disk($item->archive->disk)->url($item->archive->path) }}">Link</a>
                            @endif
                        </td>
                    <td class="px-6 py-4 uppercase">{{ $item->status }}</td>
                    <td>
                        @can('delete invoices')
                            @if ($item->status != 'cancel')
                                <button type="button" wire:click='deleteInvoice({{ $item->id }})'
                                    wire:confirm='Estas seguro de cancelar la factura?'
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="align-items: center" class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>
