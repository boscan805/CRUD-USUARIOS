@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<form action="/Employees" method="post">
    @csrf

    @include('Employees.form')
</form>
@endsection