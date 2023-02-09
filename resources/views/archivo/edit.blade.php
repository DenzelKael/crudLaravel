@extends('layout.adminlte')
@section('content')
<div class="container">
<form action="{{url('archivo/'.$archivo->id)}}" method="post"
enctype="multipart/form-data"
>
    @csrf
    {{method_field('PATCH')}}
    @include('archivo.form', ['modo'=>'Editar'])

</form>
</div>
<script src="{{asset("js/archivo.js")}}"></script>
@endsection