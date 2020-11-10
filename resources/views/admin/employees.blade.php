@extends('layouts.admin-layout')
@section('content')
    

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-user-tag icons"></i>California Staff Members</h1>
          <br>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                Staff Members Details
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Employee by ID" onkeyup="filterProduct(this, '.row-product')"/>
                </div>
                <div class="table-responsive overflow-y">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Employee ID</th>
                            <th class="bg-blue">Employee Name</th>
                            <th class="bg-blue">Employee Email</th>
                            <th class="bg-blue">Date Hired</th>
                            <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="bg-blue">Employee ID</th>
                          <th class="bg-blue">Employee Name</th>
                          <th class="bg-blue">Employee Email</th>
                          <th class="bg-blue">Date Hired</th>
                          <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($employees as $employee)    
                          <tr class="row-product">
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->employee_name }}</td>
                            <td>{{ $employee->employee_email }}</td>
                            <td>{{ $employee->date_hired }}</td>
                          <td class="text-center" data-toggle="modal" data-target="#modal{{$employee->employee_id}}"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove employee"></i></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <hr class="sidebar-divider d-none d-md-block">


        <!-- ADD NEW EMPLOYEE CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-user-plus icons"></i>Add New Employee</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                Specify Employee Details
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form action="{{ route('add-employee') }}" METHOD="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="">Employee Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Name" name="employee_name" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Employee Age</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Employee Age" name="employee_age" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Employee Email</label>
                                    <input type="email" class="form-control" id="exampleInputText1" placeholder="Enter Employee Email" name="employee_email" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Employee</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
  
        </div>


        <!-- DELETE EMPLOYEE INFO MODAL -->

        @foreach ($employees as $employee)
          <div class="modal fade" id="modal{{$employee->employee_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove {{$employee->employee_name}}?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Remove" below if you are ready to remove your employee.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('remove-employee') }}">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="employee_id" value="{{$employee->employee_id}}">
                  <input type="submit" value="Remove" name="Submit" class="btn btn-primary "/>
                </form>
              </div>
            </div>
            </div>
          </div>
        @endforeach
@endsection