@extends('layouts.admin-layout')
@section('content')
    
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h1 mb-2 text-gray-800"><i class="fab fa-shopify icons"></i>California Shop</h1>
          <br>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                California Product Details
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Product by ID" onkeyup="filterProduct(this, '.row-product')"/>
                </div>
                <div class="table-responsive overflow-y">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Product ID</th>
                            <th class="bg-blue">Product Name</th>
                            <th class="bg-blue">Product Price</th>
                            <th class="bg-blue">Product Stock</th>
                            <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="bg-blue">Product ID</th>
                          <th class="bg-blue">Product Name</th>
                          <th class="bg-blue">Product Price</th>
                          <th class="bg-blue">Product Stock</th>
                          <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr class="row-product">
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary  icon-animation" title="edit info"></i></td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary  icon-animation" title="edit info"></i></td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                            <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary  icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <td>22</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>33</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Brielle Williamson</td>
                          <td>Integration Specialist</td>
                          <td>New York</td>
                          <td>61</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                        <tr class="row-product">
                          <td>Herrod Chandler</td>
                          <td>Sales Assistant</td>
                          <td>San Francisco</td>
                          <td>59</td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit fa-2x text-primary icon-animation" title="edit info"></i></td>
                          <td class="text-center" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



        <hr class="sidebar-divider d-none d-md-block">


        <!-- ADD PRODUCT CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-plus-circle icons"></i>Add New Product</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  Specify Product Details
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form>
                                <div class="form-group">
                                  <label for="">Product Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                  <label for="">Product Price</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Price">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Stock</label>
                                    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Product Stock">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
  
        </div>


        <!-- EDIT PRODUCT INFO MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Product Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form>
                    <div class="modal-body">
                        
                            <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                            <label for="">Product Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group">
                                <label for="">Product Stock</label>
                                <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Product Stock">
                            </div>
                            <div class="form-group">
                                <label for="">Product Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label for="">Product Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

@endsection