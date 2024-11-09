@extends('components.app-layots')
@section('title')
    INICIO
@endsection
@push('estyls')
    {{-- <link rel="stylesheet" href="{{ asset('css/-index.css') }}"> --}}
@endpush

@section('content')
    <div class=" p-4 sm:ml-64 " style="margin-bottom: 10px">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
            </div>
            <a href="{{ route('provedores.index') }}">
                <button
                    class="block  p-3 ps-10  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    Regresar
                </button>
            </a>
        </div>
    </div>
    @livewire('suppliers.provedores-create')
@endsection
@push('JS')
@endpush
