@extends('layouts.admin-layout')
@section('content')
        <!-- ADD entry log CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-user-cog icons"></i>Your Personal Settings</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  Specify Details
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                          <form method="POST" action="{{ route('change-details') }}">
                              @csrf
                              <div class="form-group">
                                <label for="">Email:</label>
                                @if (session('error') == 'Password does not match.')
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter New Email" name="email" value="{{ session('email') }}">
                                @else
                                  @if (session('non-unique') == 'Email is already taken.')
                                    <input type="email" class="form-control border-danger" id="exampleInputEmail1" placeholder="Enter New Email" name="email" >
                                    <label class="text-danger">Email is already taken.</label>
                                  @else
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter New Email" name="email">
                                  @endif
                                @endif

                              </div>
                              <div class="form-group">
                                <label for="">Password:</label>
                                @if (session('error') == 'Password does not match.')
                                  <input type="password" class="form-control border-danger" id="exampleInputEmail1" placeholder="Enter New Password" name="password">
                                @else
                                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password" name="password">
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="">Re-enter Password:</label>
                                @if (session('error') == 'Password does not match.')
                                  <input type="password" class="form-control border-danger" id="exampleInputEmail1" placeholder="Re-enter Password" name="confirm_password">    
                                  <label class="text-danger">Password does not match.</label>
                                @else
                                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Re-enter Password" name="confirm_password">
                                @endif
                              </div>
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>


        <!-- /.container-fluid -->


@endsection