@extends('components.app-layots')
@section('title')
    INICIO
@endsection
@push('estyls')
    {{-- <link rel="stylesheet" href="{{ asset('css/-index.css') }}"> --}}
@endpush

@section('content')
    <div class=" p-4 sm:ml-64 " style="text-align: left">

        <div class="bg-white w-11/12 max-w-5xl mx-auto p-4 b-10 border-gray-300" style="width: 99%;padding: 40px">
            @livewire('invoices.invoices-create')
        </div>
    </div>

    </div>
@endsection
@push('JS')
@endpush
