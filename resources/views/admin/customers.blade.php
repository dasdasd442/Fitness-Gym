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
                        <td data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;">{{$customer->customer_id}}</td>
                        <td data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;">{{$customer->customer_name}}</td>
                        <td data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;">{{$customer->customer_email}}</td>

                        @if ($customer->customer_status == 'Expired' || $customer->customer_status == 'No Subscription')
                          <td data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;" class="text-danger">{{$customer->customer_status}}</td>
                        @else
                          <td data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;" class="text-success">{{$customer->customer_status}}</td>
                        @endif

                        <td class="text-center" data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;">{{$customer->membership_start_date}}</td>
                        <td class="text-center" data-toggle="modal" data-target="#customer{{ $customer->customer_id}}" title="Click to add membership" style="cursor: pointer;">{{$customer->membership_end_date}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- ADD Customer CONTENT  -->
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
                                  <label for="">Customer Email</label>
                                  <input type="email" class="form-control" id="exampleInputText1" placeholder="Enter Customer Email" name="customer_email" required/>
                              </div>
                              <button type="submit" class="btn btn-primary">Add Customer</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>


        @foreach ($customers as $customer)
        <div id="customer{{  $customer->customer_id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-plus icons md"></i>Renew Membership</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="row">
                        <form action="{{ route('renew-membership') }}" method="POST">
                          @csrf
                          <div class="form-check col">
                            <input class="form-check-input" type="radio" name="membership_type" id="exampleRadios1" value="Regular" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Regular Membership
                            </label>
                          </div>
                          <div class="form-check col">
                            <input class="form-check-input" type="radio" name="membership_type" id="exampleRadios2" value="Premium">
                            <label class="form-check-label" for="exampleRadios2">
                              Premium Membership
                            </label>
                          </div>
                            <br />
                          <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}"/>
                            <input type="submit" value="Update Membership" class="btn btn-primary fullbtn" />
                        </form>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>
            
        @endforeach
@endsection