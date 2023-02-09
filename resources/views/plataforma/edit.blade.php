@extends('layout.adminlte')
@section('content')
<div class="">
<form action="{{url('plataforma/'.$plataforma->id)}}" method="post"
enctype="multipart/form-data"
>
    @csrf
    {{method_field('PATCH')}}
    @include('plataforma.form', ['modo'=>'Editar'])

</form>
</div>
@endsection
