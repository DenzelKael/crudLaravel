@extends('layout.adminlte')
@section('content')
<div class="container-fluid">
<form action="{{url('/archivo')}}" method="post" enctype="multipart/form-data">
@csrf
    @include('archivo.form', ['modo'=>'Guardar'])
</form>
</div>
<script src="{{asset("js/archivo.js")}}"></script>
@endsection