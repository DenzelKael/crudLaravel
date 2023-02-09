@extends('layout.adminlte')
@section('content')
<div class="">
<form action="{{url('servicio/'.$servicio->id)}}" method="post"
enctype="multipart/form-data"
>
    @csrf
    {{method_field('PATCH')}}
    @include('servicio.form', ['modo'=>'Editar'])

</form>
</div>
@endsection
