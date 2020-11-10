@extends('layouts.admin-layout')
@section('content')
    
        <!-- ADD entry log CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-plus-circle icons"></i>New Entry Log</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  Specify Customer ID
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form action="{{ route('add-new-log') }}" method="POST">
                              @csrf
                                <div class="form-group">
                                  <label for="">Customer ID</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer ID" name="customer_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="enter" value="enter">Enter Gym</button>
                                <button type="submit" class="btn btn-primary btn-block" name="exit" value="exit">Exit Gym</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>



        <!-- Begin Page Content -->
        <div class="container-fluid">
            

          <!-- Page Heading -->
          <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-clipboard icons"></i>California Log</h1>
          <br>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                California Customer Log Details
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Customer ID</th>
                            <th class="bg-blue">Customer Name</th>
                            <th class="bg-blue">Date Entry</th>
                            <th class="bg-blue">Date Exit</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th class="bg-blue">Customer ID</th>
                            <th class="bg-blue">Date Entry</th>
                            <th class="bg-blue">Customer Name</th>
                            <th class="bg-blue">Date Exit</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($logs as $log)
                          <tr class="row-product">
                              <td>{{ $log->customer_id }}</td>
                              <td>{{ $log->customer_name }}</td>
                              <td>{{ $log->date_entry }}</td>
                              <td>{{ $log->date_exit }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        
@endsection