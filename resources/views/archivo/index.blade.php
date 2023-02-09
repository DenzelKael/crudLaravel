@extends('layout.adminlte')
@section('content_header')
    <h1>Guardar Extracto Bancario</h1>
@stop
@section('content')
    <div class="row ">
        <div class="card mr-2 col-12 col-lg-3">
            <div class="card-body">
                <div class=" bg-opacity-10  rounded">
                    <form action="{{ url('/archivo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('archivo.form', ['modo' => 'Guardar'])
                    </form>
                </div>
            </div>
        </div>
        @include('archivo.table_archivo')
    </div>

@endsection
