@extends('layout.adminlte')
@section('content')
<div class="card col-12">
<form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
@csrf
    @include('producto.form', ['modo'=>'Crear'])
</form>
</div>
@endsection