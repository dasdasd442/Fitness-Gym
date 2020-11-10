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
                  Specify Customer ID
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form>
                              <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter New Email">
                              </div>
                              <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password">
                              </div>
                              <div class="form-group">
                                <label for="">Re-enter Password:</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Re-enter Password">
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