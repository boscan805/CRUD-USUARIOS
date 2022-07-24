@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

<form action="{{ url('/Employees/' .$employee->id) }}" method="POST" enctype="multipart/form-data">
@csrf
{{ method_field ('PATCH')}}
    @include('Employees.form')
</form>

@endsection
