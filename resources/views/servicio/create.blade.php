@extends('layout.adminlte')
@section('content')
<div class="container">
<form action="{{url('/servicio')}}" method="post" enctype="multipart/form-data">
@csrf
    @include('servicio.form', ['modo'=>'Crear'])
</form>
</div>
@endsection