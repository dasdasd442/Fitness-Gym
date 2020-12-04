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
                California Services Details
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-y">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Service ID</th>
                            <th class="bg-blue">Service Name</th>
                            <th class="bg-blue">Service Price</th>
                            <th class="bg-blue">Service Status</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="bg-blue">Service ID</th>
                          <th class="bg-blue">Service Name</th>
                          <th class="bg-blue">Service Price</th>
                          <th class="bg-blue">Service Status</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($services as $service)
                          <tr class="row-product">
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#service{{ $service->service_id}}" title="Click to see more details">{{ $service->service_id }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#service{{ $service->service_id}}" title="Click to see more details">{{ $service->service_name }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#service{{ $service->service_id}}" title="Click to see more details">{{ $service->service_price }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#service{{ $service->service_id}}" title="Click to see more details">
                            @if ($service->service_status == 'full')
                              <span class="text-danger">{{ $service->service_status }}</span>
                            @else
                              <span class="text-success">{{ $service->service_status }}</span>
                            @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        
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
                            <th class="bg-blue">Product Status</th>
                            <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="bg-blue">Product ID</th>
                          <th class="bg-blue">Product Name</th>
                          <th class="bg-blue">Product Price</th>
                          <th class="bg-blue">Product Stock</th>
                          <th class="bg-blue">Product Status</th>
                          <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($products as $product)
                          <tr class="row-product">
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#product{{ $product->product_id}}" title="Click to see more details">{{ $product->product_id }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#product{{ $product->product_id}}" title="Click to see more details">{{ $product->product_name }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#product{{ $product->product_id}}" title="Click to see more details">{{ $product->product_price }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#product{{ $product->product_id}}" title="Click to see more details">{{ $product->product_stock }}</td>
                            <td   style="cursor: pointer;" data-toggle="modal" data-target="#product{{ $product->product_id}}" title="Click to see more details">
                            @if ($product->product_status == 'unavailable')
                              <span class="text-danger">{{ $product->product_status }}</span>
                            @else
                              <span class="text-success">{{ $product->product_status }}</span>
                            @endif
                            </td>
                            <td class="text-center" data-toggle="modal" data-target="#edit{{ $product->product_id }}"><i class="fas fa-edit fa-2x text-primary  icon-animation" title="edit info"></i></td>
                            <td class="text-center" data-toggle="modal" data-target="#delete{{ $product->product_id }}"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove product"></i></td>
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
                            <form action="{{ route('add-new-product') }}" method="POST">
                              @csrf
                                <div class="form-group">
                                  <label for="">Product Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="product_name" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Product Price</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="product_price" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Stock</label>
                                    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Product Stock" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1');" name="product_stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="product_description"></textarea>
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
        @foreach ($products as $product)
          <div class="modal fade" id="edit{{ $product->product_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('update-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="modal-body">
                              <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="product_name">
                              </div>
                              <div class="form-group">
                                <label for="">Product Price</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="product_price">
                              </div>
                              <div class="form-group">
                                  <label for="">Product Stock</label>
                                  <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Product Stock" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1');" name="product_stock">
                              </div>
                              <div class="form-group">
                                  <label for="">Product Image</label>
                                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image">
                              </div>
                              <div class="form-group">
                                  <label for="">Product Description</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="product_description"></textarea>
                              </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                  </form>
                </div>
              </div>
          </div>
        @endforeach


         <!-- MORE INFO ABOUT PRODUCT  -->
         @foreach ($products as $product)
          <div class="modal fade" id="product{{ $product->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mw-100 w-75" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $product->product_name }}</span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-lg">
                        <div class="card1 py-4 px-4">
                          <img src="../{{ $product->product_image }}" style="width: 100%; border-radius: 5px;"/>
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="card text-dark bg-light mb-3">
                          <div class="card-header">More Details</div>
                          <div class="card-body">
                            <p><b>Product Price: </b><span class="mx-2 text-info">Php {{ $product->product_price}}</span></p>
                            <p><b>Product Stock:</b><span class="mx-2 text-info">{{ $product->product_stock}}</span></p>
                            <p><b>Product Status:</b> <span class="mx-2 text-info">{{ $product->product_status}}</span></p>
                            <p><b>Product Description:</b> <span class="mx-2 text-info">{{ $product->product_description}}</span></p></p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
         @endforeach

         <!-- MORE INFO ABOUT SERVICES -->
         @foreach ($services as $service)
          <div class="modal fade" id="service{{ $service->service_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mw-100 w-75" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $service->service_name }}</span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-lg">
                        <div class="card1 py-4 px-4">
                          <img src="../{{ $service->class_image }}" style="width: 100%; border-radius: 5px;"/>
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="card text-dark bg-light mb-3">
                          <div class="card-header">More Details</div>
                          <div class="card-body">
                            <p><b>Service Price: </b><span class="mx-2 text-info">Php {{ $service->service_price}}</span></p>
                            <p><b>Service Status:</b> 
                              @if ($service->service_status == 'full')
                                <span class="mx-2 text-danger">{{ $service->service_status}}</span></p>
                              @else
                              <span class="mx-2 text-info">{{ $service->service_status}}</span></p>
                              @endif

                            <p><b>Service Description:</b> <span class="mx-2 text-info">{{ $service->class_description}}</span></p></p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

          <!-- DELETE PRODUCT -->
          @foreach ($products as $product)
            <div class="modal fade" id="delete{{$product->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Remove {{$product->product_name}}?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Remove" below if you are ready to make product unavailable.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form method="POST" action="{{ route('remove-product') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                    <input type="hidden" name="product_stock" value="{{ $product->product_stock }}">
                    <input type="submit" value="Remove" name="Submit" class="btn btn-primary "/>
                  </form>
                </div>
              </div>
              </div>
            </div>
          @endforeach
           
@endsection