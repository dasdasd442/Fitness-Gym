@extends('layouts.admin-layout')
@section('content')
        <!-- ADD new transaction CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-file-invoice icons"></i>Add A New Transaction</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  Specify Order Details
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form>
                              <div class="form-group">
                                <label for="">Customer ID:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer ID (Optional)">
                              </div>
                              <div class="form-group">
                                <label for="">Product ID:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product ID">
                              </div>
                              <div class="form-group">
                                <label for="">Quantity:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Quantity">
                              </div>
                              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTransaction">Proceed</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Checkout-ed items  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Items on Cart
                </div>
                <div class="card-body">
                  <div class="modal-body">
                      <div id="modRow" class="d-flex justify-content-center row">
                          <div class="col">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Option</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove order"></i></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                    <td><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove order"></i></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                    <td><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove order"></i></td>
                                  </tr>
                                </tbody>
                                <caption class="text-right lead font-weight-bold mx-5">Total: <span style="color: #19b0b8; font-weight: bold;">Php 549.92</span></caption>
                              </table>
                          </div>
                      </div>
                      <form>
                        <div class="form-group">
                            <label for="">Amount in Peso:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount">
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTransaction">Checkout</button>
                    </form>
                      <br />
                      <div>
                          <p class="lead font-weight-bold">Change: <span style="color: #19b0b8; font-weight: bold;">Php 40.25</span></p>
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- /.container-fluid -->

@endsection