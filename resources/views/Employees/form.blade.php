<br>
<br>
<br>
<label for="Name" style="color: aliceblue;">Name</label>
    <input type="text"  name="Name" id="Name" value="{{ isset($employee->Name)? $employee->Name:'' }}" class="form-control">
<br>
    <label for="Surname"  style="color: aliceblue;">Surname</label>
    <input type="text"  name="Surname" id="Surname"  value="{{ isset($employee->Surname)? $employee->Surname :'' }}" class="form-control">
<br>
    <label for="Role"  style="color: aliceblue;">Role</label>
    <input type="text"  name="Role" id="Role"  value="{{  isset ($employee->Role)? $employee->Role :''}}" class="form-control">
<br>
    <label for="Email"  style="color: aliceblue;">Email</label>
    <input type="text"  name="Email" id="Email"  value="{{ isset ($employee->Email)? $employee->Email :'' }}" class="form-control">
<br>
    <label for="Image"  style="color: aliceblue;">Image</label>
    
    <input type="file"  name="Image" id="Image"  value="{{  isset ($employee->Image)? $employee->Image:'' }}" class="form-control">
<br>

    <input type="submit" value="Guardar" class="btn btn-success">
<br>
<br>

<a href="{{ url('/Employees/') }}" class="btn btn-danger">Regresar</a>
