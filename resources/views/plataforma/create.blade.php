@extends('layout.adminlte')
@section('content')
<div class="">
<form action="{{url('/plataforma')}}" method="post" enctype="multipart/form-data">
@csrf
    @include('plataforma.form', ['modo'=>'Crear'])
</form>
</div>
@endsection