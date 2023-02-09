@extends('layout.adminlte')

@section('content')
    <div class="">
        <div class=" p-3 bg-opacity-10">
            {{--     <div class="alert alert-success alert-dismissible fade-show" role="alert">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" disabled aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
        </div> --}}
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @include('archivo.table_archivo', ['card_lg'=>'12'])

        </div>
    </div>
@endsection
