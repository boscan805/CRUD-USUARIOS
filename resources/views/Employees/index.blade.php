@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="container" style="padding-left: 300px; border-radius:10%;">
    <br> <br>
<a href="{{ url('Employees/create')}}" class="btn btn-success ">Nuevo Empleado</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th style="color: white;">ID</th>
            <th style="color: white;">Name</th>
            <th style="color: white;">Surname</th>
            <th style="color: white;">Role</th>
            <th style="color: white;">Email</th>
            <th style="color: white;">Image</th>
            <th style="color: white;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->Name }}</td>
            <td>{{ $employee->Surname}}</td>
            <td>{{ $employee->Role }}</td>
            <td>{{ $employee->Email}}</td>
            <td>
                <img src="{{ asset('storage'). '/'. $employee->Image}}" style="width:100; border-radius:10%; ">
            </td>
            <td>
              
                
                <a href="{{ url('/Employees/' .$employee->id. '/edit') }}" class="btn btn-danger">Edit</a>
                
                <form action="{{ url('/Employees/' .$employee->id) }}" method="POST" class="d-inline ">
                    @csrf
                    {{ method_field('DELETE') }}
                <input type="submit"  value="Delete" onclick="return confirm('Are you sure you want to delete this employee?')" class="btn btn-primary">
                </form>
            </td>

            
        </tr>
    @endforeach

    </tbody>

</table>

{!! $employees->links() !!}
</div>