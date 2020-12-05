@extends('layouts.admin-layout')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-hotel icons"></i>California Classes</h1>
          <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                California Classes Details
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Class by ID" onkeyup="filterProduct(this, '.row-product')" required/>
                </div>
                <div class="table-responsive overflow-y">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Class ID</th>
                            <th class="bg-blue">Class Name</th>
                            <th class="bg-blue">Class Instructor</th>
                            <th class="bg-blue">Class Schedule</th>
                            <th class="bg-blue">Class Time</th>
                            <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="bg-blue">Class ID</th>
                            <th class="bg-blue">Class Name</th>
                            <th class="bg-blue">Class Instructor</th>
                            <th class="bg-blue">Class Schedule</th>
                            <th class="bg-blue">Class Time</th>
                            <th colspan=2 class="bg-blue text-center">Options</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($classes as $class)
                          <tr class="row-product">
                              <td  style="cursor: pointer;" data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_id }}</td>
                              <td  style="cursor: pointer;" data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_name }}</td>
                              <td  style="cursor: pointer;" data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->employee_name }}</td>
                              <td  style="cursor: pointer;" data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_schedule }}</td>
                              <td  style="cursor: pointer;" data-toggle="modal" data-target="#class{{ $class->class_id}}" title="Click to see more details">{{ $class->class_time }}</td>
                              <td style="cursor: pointer;" class="text-center" data-toggle="modal" data-target="#edit{{ $class->class_id}}"><i class="fas fa-edit fa-2x text-primary  icon-animation" title="edit info"></i></td>
                              <td style="cursor: pointer;" class="text-center" data-toggle="modal" data-target="#delete{{ $class->class_id}}"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove class"></i></td>
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


        <!-- ADD Class CONTENT  -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-plus-circle icons"></i>Add A New Class</h1>
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  Specify Class Details
              </div>
              <div class="card-body">
                <div class="modal-body">
                    <div id="modRow" class="d-flex justify-content-center row">
                        <div class="col">
                            <form action="{{ route('add-new-class') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                  <label for="">Class Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Class Name" name="class_name" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Class Instructor ID</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Instructor ID" name="class_instructor_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Class Price</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Price" name="class_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                  required>
                                </div>
                                <div class="form-group">
                                  <label for="">Class Max Members</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="class_max_number">
                                </div>
                                <div class="form-group">
                                    <label for="">Class Schedule</label>
                                    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Class Schedule" name="class_schedule" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Class Time</label>
                                  <input type="text" class="form-control" id="exampleFormControlFile1" placeholder="Enter Class Time" name="class_time" required>
                              </div>
                                <div class="form-group">
                                    <label for="">Class Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="class_image">
                                </div>
                                <div class="form-group">
                                    <label for="">Class Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="class_description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Class</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

        </div>


        <!-- EDIT CLASS INFO MODAL -->
        @foreach ($classes as $class)
            <div class="modal fade" id="edit{{$class->class_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog mw-100 w-75" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Class Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('update-class') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">

                        <div class="form-group">
                          <label for="">Class Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Class Name" name="class_name">
                        </div>
                        <div class="form-group">
                          <label for="">Class Instructor</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Instructor ID" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="class_instructor_id">
                        </div>
                        <div class="form-group">
                          <label for="">Class Price</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="class_price">
                        </div>
                        <div class="form-group">
                          <label for="">Class Max Members</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Max Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="class_max_member">
                        </div>
                        <div class="form-group">
                            <label for="">Class Schedule</label>
                            <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Class Schedule" name="class_schedule">
                        </div>
                        <div class="form-group">
                          <label for="">Class Time</label>
                          <input type="text" class="form-control" id="exampleFormControlFile1" placeholder="Enter Class Time" name="class_time">
                      </div>
                        <div class="form-group">
                            <label for="">Class Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="class_image">
                        </div>
                        <div class="form-group">
                            <label for="">Class Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="class_description"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="this.form.preventDefault();">Close</button>
                      <input type="hidden" name="class_id" value="{{ $class->class_id }}"/>
                      <input class="btn btn-primary" type="submit" value="Save Changes"/>
                      </div>
                  </form>
                </div>
              </div>
          </div>
            
        @endforeach

        <!-- MORE INFO ABOUT CLASS  -->
        @foreach ($classes as $class)
          <div class="modal fade" id="class{{ $class->class_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mw-100 w-75" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class {{ $class->class_name }}: <span>{{ $class->class_cur_number }}/{{ $class->class_max_number }}</span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-lg">
                        <div class="card1 py-4 px-4">
                          <img src="../{{ $class->class_image }}" style="width: 100%; border-radius: 5px;"/>
                        </div>
                      </div>
                      <div class="col-lg">
                        <div class="card text-dark bg-light mb-3">
                          <div class="card-header">More Details</div>
                          <div class="card-body">
                            <p><b>Class Price: </b><span class="mx-2 text-info">Php {{ $class->class_price}}</span></p>
                            <p><b>Class Schedule:</b><span class="mx-2 text-info">{{ $class->class_schedule}}</span></p>
                            <p><b>Class Time:</b> <span class="mx-2 text-info">{{ $class->class_time}}</span></p>
                            <p><b>Class Status:</b> <span class="mx-2 text-info">{{ $class->class_status}}</span></p>
                            <p><b>Class Description:</b> <span class="mx-2 text-info">{{ $class->class_description}}</span></p></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="modRow" class="d-flex justify-content-center row my-2">
                      <div class="col">
                         
                          <div class="card text-dark bg-light mb-3">
                            <div class="card-header"><b>Add a New Class Member</b></div>
                            <div class="card-body">
                            <form action="{{ route('add-new-class-member') }}" method="POST">
                              @csrf
                                <div class="form-group">
                                  <label for="">Enter Customer ID</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer ID" name="customer_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <input type="hidden" name="class_id" value="{{ $class->class_id }}">
                                <button type="submit" class="btn btn-primary full-btn">Add Member</button>
                            </form>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-header"><b>Class Members</b></div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Members by ID" onkeyup="filterProduct(this, '.member-name')"/>
                  </div>
                    <div class="table-responsive overflow-y">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Members ID</th>
                                <th>Members Name</th>
                                <th>Members Email</th>
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($customerclass as $detail)
                            @if ($detail->class_id == $class->class_id)
                              <tr class="member-name">
                                <td>{{ $detail->customer_id }}</td>
                                <td>{{ $detail->customer_name }}</td>
                                <td>{{ $detail->email }}</td>
                                <form action="{{ route('remove-class-member') }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" name="customer_id" value="{{ $detail->customer_id }}" />
                                  <input type="hidden" name="customerclass_id" value="{{ $detail->id }}" />
                                  <input type="hidden" name="class_id" value="{{ $detail->class_id }}" />
                                  <input type="hidden" name="class_cur_number" value="{{ $class->class_cur_number }}" />
                                  <td class="text-center"><button class="btn" style="border: 0px; background"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove member"></i></button></td>
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
            
        @endforeach


        <!-- DELETE CLASS ENTIRELY -->
        @foreach ($classes as $class)
          <div class="modal fade" id="delete{{$class->class_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove {{$class->class_name}}?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Remove" below if you are ready to remove this class.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('remove-class-entirely') }}">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="class_id" value="{{$class->class_id}}">
                  <input type="submit" value="Remove" name="Submit" class="btn btn-primary "/>
                </form>
              </div>
            </div>
            </div>
          </div>
        @endforeach


@endsection