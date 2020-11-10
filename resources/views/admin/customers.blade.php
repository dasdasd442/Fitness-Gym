@extends('layouts.admin-layout')
@section('content')
    
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-user-friends icons"></i>California Customers Details</h1>
          <br />
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="bg-blue ">Customer ID</th>
                      <th class="bg-blue ">Customer Name</th>
                      <th class="bg-blue ">Customer Email</th>
                      <th class="bg-blue ">Customer Status</th>
                      <th class="bg-blue text-center">Membership Start Date</th>
                      <th class="bg-blue text-center">Membership End Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="bg-blue">Customer ID</th>
                      <th class="bg-blue">Customer Name</th>
                      <th class="bg-blue">Customer Email</th>
                      <th class="bg-blue">Customer Status</th>
                      <th class="bg-blue text-center">Membership Start Date</th>
                      <th class="bg-blue text-center">Membership End Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($customers as $customer)
                      <tr>
                        <td>{{$customer->customer_id}}</td>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->customer_status}}</td>
                        <td class="text-center">{{$customer->membership_start_date}}</td>
                        <td class="text-center">{{$customer->membership_end_date}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- ADD PRODUCT CONTENT  -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <br />
          <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-plus-circle icons"></i>Add New Customer</h1>
          <br />
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                Specify Customer Details
            </div>
            <div class="card-body">
              <div class="modal-body">
                  <div id="modRow" class="d-flex justify-content-center row">
                      <div class="col">
                            <form method="POST" action="{{ route('add-customer') }}">
                              @csrf
                              <div class="form-group">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer Name" name="customer_name" required>
                              </div>
                              <div class="form-group">
                                <label for="">Customer Age</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Customer Age" name="customer_age" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                              <div class="form-group">
                                  <label for="">Product Email</label>
                                  <input type="email" class="form-control" id="exampleInputText1" placeholder="Enter Customer Email" name="customer_email" required/>
                              </div>
                              <button type="submit" class="btn btn-primary">Add Customer</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>

@endsection