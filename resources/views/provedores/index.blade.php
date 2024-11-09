@extends('components.app-layots')
@section('title')
    PROVEDORES
@endsection
@push('estyls')
    <link rel="stylesheet" href="{{ asset('css/provedores-index.css') }}">
@endpush

@section('content')
    <div class=" p-4 sm:ml-64 ">
        @if (session('message'))
            <div id="success-message" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                {{ session('message') }}
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('success-message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 5000); // 5000 milisegundos = 5 segundos
            </script>
        @endif
        @livewire('suppliers.provedores-index')


    </div>
@endsection

@push('JS')
@endpush
