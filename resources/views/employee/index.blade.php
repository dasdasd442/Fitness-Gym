@extends('layouts.employee-layout')

@section('content')
<div>
    <!-- Customers -->
    <div id="california-customers" class="card m-5-bottom small-card fix-height">
        <div class="flex-1">
            <h2><i class="fas fa-user-friends icons"></i>California Customers</h2>
            <h2 class="h2-click" title="add a customer" data-toggle="modal" data-target="#addCustomer"><i class="fas fa-user-plus"></i></h2>
        </div>
        <div class="container flex no-padding">
            <input type="text" placeholder="Search Customer by ID" onkeyup="filterCustomers(this, '.row-customer')"/>
            <div class="table-div">
                <table id="data">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr class="row-customer">
                                <td data-toggle="modal" data-target="#customer{{ $customer->customer_id }}" title="Click to see more details">{{ $customer->customer_id }}</td>
                                <td data-toggle="modal" data-target="#customer{{ $customer->customer_id }}" title="Click to see more details">{{ $customer->customer_name }}</td>
                                @if ($customer->customer_status == 'Expired' || $customer->customer_status == 'No Subscription')
                                    <td data-toggle="modal" data-target="#customer{{ $customer->customer_id }}" class="text-danger" title="Click to see more details">{{ $customer->customer_status }}</td>
                                @else
                                    <td data-toggle="modal" data-target="#customer{{ $customer->customer_id }}" style="color: #28a745;" title="Click to see more details">{{ $customer->customer_status }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Classes -->
    <div id="california-classes" class="card m-5-bottom small-card">
        <div class="flex-1">
            <h2><i class="fas fa-hotel icons"></i>California Classes</h2>
            <h2 class="h2-click" title="add a class" data-toggle="modal" data-target="#addClass"><i class="fas fa-plus-circle"></i></h2>
        </div>
        <div class="container flex no-padding">
            <input type="text" placeholder="Search Class by ID" onkeyup="filterCustomers(this, '.row-classes')"/>
            <div class="table-div">
                <table id="data">
                    <thead>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Class Instructor</th>
                            <th>Class Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr class="row-classes">
                                <td data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_id}}</td>
                                <td data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_name}}</td>
                                <td data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->employee_name}}</td>
                                
                                @if ($class->class_status == 'receiving')
                                    <td data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details" style="color: #28a745;">{{ $class->class_status}}</td>
                                @else
                                    <td data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details" class="text-danger">{{ $class->class_status}}</td>
                                @endif
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Shop -->
    <div id="california-shop" class="card m-5-bottom small-card">
        <div class="flex-1">
            <h2><i class="fab fa-shopify icons"></i>California Shop</h2>
            <h2 class="h2-click" title="add a product" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus-circle"></i></h2>
        </div>
        <div class="container flex no-padding">
            <input type="text" placeholder="Search Product or Service by ID" onkeyup="filterCustomers(this, '.row-product')"/>
            <div class="table-div">
                <table id="data">
                    <thead>
                        <tr>
                            <th>Product | Service ID</th>
                            <th>Product | Service Name</th>
                            <th>Product | Service Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr class="row-product">
                                <td data-toggle="modal" data-target="#service{{ $service->service_id }}">{{ $service->service_id }}</td>
                                <td data-toggle="modal" data-target="#service{{ $service->service_id }}">{{ $service->service_name }}</td>
                                @if ($service->service_status == 'available')
                                    <td data-toggle="modal" data-target="#service{{ $service->service_id }}" style="color: #28a745;">{{ $service->service_status }}</td>
                                @else
                                    <td data-toggle="modal" data-target="#service{{ $service->service_id }}" class="text-danger">{{ $service->service_status }}</td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($products as $product)
                            <tr class="row-product">
                                <td data-toggle="modal" data-target="#product{{ $product->product_id }}">{{ $product->product_id }}</td>
                                <td data-toggle="modal" data-target="#product{{ $product->product_id }}">{{ $product->product_name }}</td>
                                @if ($product->product_status == 'available')
                                    <td data-toggle="modal" data-target="#product{{ $product->product_id }}" style="color: #28a745;">{{ $product->product_status }}</td>
                                @else
                                    <td data-toggle="modal" data-target="#product{{ $product->product_id }}" class="text-danger">{{ $product->product_status }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Entry log -->
    <div id="entry-log" class="card m-5-bottom small-card fix-height">
        <div class="flex-1">
            <h2><i class="fas fa-clipboard icons"></i>Entry log</h2>
            <h2 class="h2-click" title="add new log" data-toggle="modal" data-target="#addEntryLog"><i class="fas fa-plus-circle"></i></h2>
        </div>
        <div class="container flex no-padding">
            <input type="text" placeholder="Search Customer by ID" onkeyup="filterCustomers(this, '.entry-log')"/>
            <div class="table-div">
                <table id="data">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Date Entry</th>
                            <th>Date Exit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr class="entry-log">
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

    <!-- Settings -->
    <div id="settings" class="card m-5-bottom">
        <h2><i class="fas fa-user-cog icons"></i>Your Personal Settings</h2>
            <div class="form-control">
                <input type="email" name="user_email" placeholder="Email: {{ $authenticatedUser->email }}" required disabled>
                <button class="btn btn-primary half-btn" data-toggle="modal" data-target="#myModal3">Update Email</button>
            </div>
            <div class="form-control">
                <input type="password" name="user_password" placeholder="Password: {{ $authenticatedUser->password }}" required disabled>
                <button class="btn btn-primary half-btn" data-toggle="modal" data-target="#myModal4">Update Password</button>
            </div>
    </div>


    <!--------------------------- MODAL --------------------------->
    
    <!--------------------- Customers INFO MODAL --------------------->
    @foreach ($customers as $customer)
        <div id="customer{{ $customer->customer_id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-user-check icons md"></i>Customer Information</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="col">
                        <div class="grid-1">
                            <div>
                                <h3>Customer ID:<span class="text-support m-2">{{ $customer->customer_id }}</span></h3>
                                <h3>Customer Name:<span class="text-support m-2">{{ $customer->customer_name }}</span></h3>
                                <h3>Age: <span class="text-support m-2">{{ $customer->customer_age }}</span></h3>
                                <h3>Email: <span class="text-support m-2">{{ $customer->email }}</span></h3>
                                <h3>Membership Start Date: <span class="text-support m-2">{{ $customer->membership_start_date }}</span></h3>
                                <h3>Membership End Date: <span class="text-support m-2">{{ $customer->membership_end_date }}</span></h3>
                                <h3>Membership Status: 
                                    @if ($customer->customer_status == 'Expired' || $customer->customer_status == 'No Subscription')
                                        <span class="text-danger m-2">{{ $customer->customer_status }}</span>
                                    @else
                                        <span class="text-success m-2" style="color: #28a745;">{{ $customer->customer_status }}</span>
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                </div>
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-edit icons md"></i>Renew Membership</h2>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div>
                            <form action="{{ route('e-renew-membership') }}" method="POST">
                                @csrf
                                <div>
                                    <label>
                                    <input type="radio" name="membership_type" id="reg" value="Regular" checked />
                                      Regular Membership
                                    </label>
                                  </div>
                                  <div>
                                    <label>
                                    <input type="radio" name="membership_type" id="prem" value="Premium" />
                                      Premium Membership
                                    </label>
                                  </div>
                                <br />
                                <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}" />
                                <input type="submit" value="Renew Membership" class="btn btn-primary fullbtn" />
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



    <!--------------------- CLASSES INFO MODAL --------------------->
    @foreach ($classes as $class)
        <div id="class{{ $class->class_id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-info-circle icons md"></i>Class Information</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <div class="grid">
                                <div class="card cursor">
                                    <h4>{{ $class->class_name }}</h4>
                                    <img src="../{{ $class->class_image }}"/>
                                </div>
                                <div>
                                    <h3>Class ID:<span class="text-support m-2">{{ $class->class_id }}</span></h3>
                                    <h3>Class Instructor: <span class="text-support m-2">{{ $class->employee_name }}</span></h3>
                                    <h3>Current Members: <span class="text-support m-2">{{ $class->class_cur_number }}/{{ $class->class_max_number }}</span></h3>
                                    <h3>Schedule: <span class="text-support m-2">{{ $class->class_schedule }}</span></h3>
                                    <h3>Time: <span class="text-support m-2">{{ $class->class_time }}</span></h3>
                                    <h3>Class Price:<span class="text-support m-2">{{ $class->class_price }}</span></h3>
                                    <br />

                                    <form action="{{ route('e-remove-class') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="class_id" value="{{$class->class_id}}">
                                        <input type="submit" class="btn fullbtn" value="Delete Class" />
                                    </form>
                                </div>
                            </div>
                            <br />
                            <div>
                                <div class="modal-header">
                                    <h2 class="modal-title"><i class="fas fa-plus-circle icons md"></i>Add New Class Member</h2>
                                </div>
                                <div class="modal-body">
                                    <div id="modRow" class="d-flex justify-content-center row">
                                        <div class="col">
                                            <form action="{{ route('e-add-member') }}" method="POST">
                                                @csrf
                                                <div class="form-control">
                                                    <input class="full" type="text" name="customer_id" placeholder="Enter Customer ID" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                                <input type="hidden" name="class_id" value="{{ $class->class_id }}">
                                                <input type="submit" value="Add Member" class="btn btn-primary fullbtn" />
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                
                                <div class="modal-header">
                                    <h2 class="modal-title"><i class="fas fa-user icons md"></i>Class Members</h2>
                                </div>
                                <div class="form-control">
                                    <input type="text" class="full" placeholder="Search Member by ID" onkeyup="filterCustomers(this, '.row-classes1')"/>
                                </div>
                                <div class="table-div" id="modal-overflow">
                                    <table id="data">
                                        <thead>
                                            <tr>
                                                <th>Member's ID</th>
                                                <th>Member's Name</th>
                                                <th>Member's Email</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customerclass as $detail)
                                                @if ($detail->class_id == $class->class_id)
                                                <tr class="row-classes1">
                                                    <td>{{ $detail->customer_id }}</td>
                                                    <td>{{ $detail->customer_name }}</td>
                                                    <td>{{ $detail->email }}</td>
                                                    <form action="{{ route('e-remove-class-member') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="customer_id" value="{{ $detail->customer_id }}" />
                                                        <input type="hidden" name="customerclass_id" value="{{ $detail->id }}" />
                                                        <input type="hidden" name="class_id" value="{{ $detail->class_id }}" />
                                                        <input type="hidden" name="class_cur_number" value="{{ $class->class_cur_number }}" />
                                                        <td class="text-center"><button class="btn" style="border: 0px; background: none;"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove member"></i></button></td>
                                                      </form>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-edit icons md"></i>Edit Class Information</h2>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form action="{{ route('e-update-class') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-control">
                                    <input class="full" type="text" name="class_name" placeholder="Enter Class Name" >
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="class_instructor_id" placeholder="Enter Instructor ID"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="class_price" placeholder="Enter Class Price"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="class_max_member" placeholder="Enter Class Max Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="class_schedule" placeholder="Enter New Schedule">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="class_time" placeholder="Enter New Class Time">
                                </div>
                                <div class="form-control">
                                    <input type="file" name="class_image" class="full" title="upload image"/>
                                </div>
                                <input type="hidden" name="class_id" value="{{ $class->class_id }}"/>
                                <input type="submit" value="Update Class Information" class="btn btn-primary fullbtn" />
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




    <!--------------------- SHOP/PRODUCT INFO MODAL --------------------->
    @foreach ($products as $product)
        <div id="product{{ $product->product_id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-info-circle icons md"></i>Product Information</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <div class="grid">
                                <div class="card cursor">
                                    <h4>{{ $product->product_name }}</h4>
                                    <img src="../{{ $product->product_image }}"/>
                                </div>
                                <div>
                                    <h3>Product ID:<span class="text-support m-2">{{ $product->product_id }}</span></h3>
                                    <h3>Product Name:<span class="text-support m-2">{{ $product->product_name }}</span></h3>
                                    <h3>Product Description: <span class="text-support m-2">{{ $product->product_description }}</span></h3>
                                    <h3>Product Price: <span class="text-support m-2">Php {{ $product->product_price }}</span></h3>
                                    <h3>Product Stocks: <span class="text-support m-2">{{ $product->product_stock }}</span></h3>
                                    <h3>Product Status: <span class="text-support m-2">{{ $product->product_status }}</span></h3>
                                    <br />
                                    <form action="{{ route('e-remove-product') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <input type="submit" class="btn fullbtn" value="Remove Product" />
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-edit icons md"></i>Edit Product Information</h2>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form action="{{ route('e-update-product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-control">
                                    <input class="full" type="text" name="product_name" placeholder="Enter New Product Name">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="product_price" placeholder="Enter New Product Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" name="product_stock" placeholder="Enter New Product Stock" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="form-control">
                                    <input type="file" name="product_image" class="full" title="upload image"/>
                                </div>
                                <div class="form-control">
                                    <input class="full" type="text" placeholder="Enter New Product Description" required disabled>
                                    <textarea class="full product-textarea" name="product_description"></textarea>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <input type="submit" value="Update Product" class="btn btn-primary fullbtn" />
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


    @foreach ($services as $service)
        <div id="service{{ $service->service_id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><i class="fas fa-info-circle icons md"></i>service Information</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <div class="grid">
                                <div class="card cursor">
                                    <h4>{{ $service->service_name }}</h4>
                                    <img src="../{{ $service->class_image }}"/>
                                </div>
                                <div>
                                    <h3>Service ID:<span class="text-support m-2">{{ $service->service_id }}</span></h3>
                                    <h3>Service Name:<span class="text-support m-2">{{ $service->service_name }}</span></h3>
                                    <h3>Service Description: <span class="text-support m-2">{{ $service->class_description }}</span></h3>
                                    <h3>Service Price: <span class="text-support m-2">Php {{ $service->service_price }}</span></h3>
                                    <h3>Service Status: <span class="text-support m-2">{{ $service->service_status }}</span></h3>
                                    <br />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
    @endforeach



    
    <!--------------------- Settings UPDATE MODAL --------------------->
    <!-- Email -->
    <div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="modal-title"><i class="fas fa-plus icons md"></i>Update</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="modRow" class="d-flex justify-content-center row">
                <div class="col">
                    <form action="{{ route('e-update-email') }}" method="POST">
                        @csrf
                        <div class="form-control">
                            <input class="full" type="email" name="email" placeholder="Enter New Email" required>
                        </div>
                        <input type="submit" value="Update Email" class="btn btn-primary fullbtn" />
                    </form>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>

    <!-- Password -->
    <div id="myModal4" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="modal-title"><i class="fas fa-plus icons md"></i>Update</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="modRow" class="d-flex justify-content-center row">
                <div class="col">
                    <form action="{{ route('e-update-password') }}" method="POST">
                        @csrf
                        <div class="form-control">
                            <input class="full" type="password" name="password" placeholder="Enter New Password" required>
                        </div>
                        <div class="form-control">
                            <input class="full" type="password" name="confirm_password" placeholder="Re-enter Password" required>
                        </div>
                        <input type="submit" value="Update Password" class="btn btn-primary fullbtn" />
                    </form>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>














    <!--------------------- FUNCTIONALITY MODALS --------------------->
    <!--------------------- ADD CUSTOMER MODAL --------------------->
    <div id="addCustomer" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-user-plus icons md"></i>Add a Customer</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="col">
                        <form method="POST" action="{{ route('e-add-customer') }}">
                            @csrf
                            <div class="form-control">
                                <input class="full" type="text" name="customer_name" placeholder="Enter Customer Full Name" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="customer_age" placeholder="Enter Customer Age" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="form-control">
                                <input class="full" type="email" name="email" placeholder="Enter Customer Email" required>
                            </div>
                            <input type="submit" value="Add Customer" class="btn btn-primary fullbtn" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>

    <!--------------------- ADD CLASS MODAL --------------------->
    <div id="addClass" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-plus-circle icons md"></i>Add a New Class</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="col">
                        <form action="{{ route('e-add-class') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-control">
                                <input class="full" type="text" name="class_name" placeholder="Enter New Class Name" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="class_instructor_id" placeholder="Enter New Instructor ID" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="class_price" placeholder="Enter New Class Price" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="class_schedule" placeholder="Enter New Schedule" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="class_time" placeholder="Enter New Class Time" required>
                            </div>
                            <div class="form-control">
                                <input type="file" name="class_img" class="full" title="upload image"/>
                            </div>
                            <input type="submit" value="Add Class" class="btn btn-primary fullbtn" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
    
    <!--------------------- ADD PRODUCT MODAL --------------------->
    <div id="addProduct" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-plus-circle icons md"></i>Add a New Product</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="col">
                        <form action="{{ route('e-add-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-control">
                                <input class="full" type="text" name="product_name" placeholder="Enter New Product Name" required>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="product_price" placeholder="Enter New Product Price" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" name="product_stock" placeholder="Enter New Product Stock" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="form-control">
                                <input type="file" name="product_image" class="full" title="upload image"/>
                            </div>
                            <div class="form-control">
                                <input class="full" type="text" placeholder="Enter New Product Description" required disabled>
                                <textarea class="full" name="product_description"></textarea>
                            </div>
                            <input type="submit" value="Add Product" class="btn btn-primary fullbtn" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>


    <!--------------------- ADD ENTRY LOG MODAL --------------------->
    <div id="addEntryLog" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><i class="fas fa-user-plus icons md"></i>Add New Entry Log</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                    <div class="col">
                        <form action="{{ route('e-add-log') }}" method="POST">
                            @csrf
                            <div class="form-control">
                                <input class="full" type="text" name="customer_id" placeholder="Enter Customer ID" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                            </div>
                            <button type="submit" name="enter" value="enter" class="btn btn-primary fullbtn">Enter Gym</button>
                            <br /><br />
                            <button type="submit" name="exit" value="exit" class="btn btn-primary fullbtn">Exit Gym</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
</div>
@endsection