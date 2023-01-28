@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/archivo')}}" method="post" enctype="multipart/form-data">
@csrf
    @include('archivo.form', ['modo'=>'Guardar'])
</form>
</div>
<script src="{{asset("js/archivo.js")}}"></script>
@endsection