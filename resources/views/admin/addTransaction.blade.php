@extends('layouts.admin-layout')
@section('content')
        <!-- ADD new transaction CONTENT  -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-file-invoice icon-animation text-info icons"></i>Current Transaction: {{ $latest_transaction_id }}</h1>
            <br />

            <div id="myTransaction">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3"> 
                    Specify Order Details
                </div>
                <div class="card-body">
                  <div class="modal-body">
                      <div id="modRow" class="d-flex justify-content-center row">
                          <div class="col">
                              <form method="POST" action="{{ route('add-new-order') }}">
                                @csrf
                                <div class="form-group">
                                  <label for="">Customer ID:</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer ID (Optional)" name="customer_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="border-top border-bottom py-2 rounded">
                                  <div class="row">
                                    <div class="form-group col-sm">
                                      <label for="">Product ID:</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product ID" name="product_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                    <div class="form-group col-sm">
                                      <label for="">Service ID:</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service ID" name="service_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="">Quantity:</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" required name="total_qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <input type="hidden" name="current_transaction_id" value="{{ $latest_transaction_id }}" />
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTransaction">Add to Cart</button>
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
                      <div class="col-sm">
                      <b>Customer: 
                        @if ($orders)
                          @if ($orders[0]->customer_id)
                           <span class="text-info">{{ $orders[0]->customer_name }}</span>
                          @else
                            <span class="text-info">Walk In</span>
                          @endif
                        @endif
                      </b>
                      </div>
                    </div>
                    <div class="modal-body">
                        <div id="modRow" class="d-flex justify-content-center row">
                            <div class="col">
                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Item ID</th>
                                      <th scope="col">Item Name</th>
                                      <th scope="col">Item Price</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Option</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $total = 0?>
                                    @foreach ($orders as $index => $order)
                                      <tr>
                                        <th scope="row">{{$index + 1}}</th>
                                        @if ($order->product_id)
                                          <td>{{ $order->product_id }}</td>
                                          <td>{{ $order->product_name }}</td>
                                          <td>{{ $order->product_price }}</td>
                                        @elseif ($order->service_id)
                                          <td>{{ $order->service_id }}</td>
                                          <td>{{ $order->service_name }}</td>
                                          <td>{{ $order->service_price }}</td>
                                        @endif
                                        <td>{{ $order->total_qty }}</td>
                                        <td>
                                          <form action="{{ route('remove-order') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                            <input type="hidden" name="current_transaction_id" value="{{ $order->transaction_id }}">
                                            <button class="btn" style="border: 0px; background"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove order"></i></button>
                                          </form>
                                        </td>
                                      </tr>

                                      <?php $total += $order->order_amount ?>
                                        
                                    @endforeach
                                  </tbody>
                                  <caption class="text-right lead font-weight-bold mx-5">Total: <span style="color: #19b0b8; font-weight: bold;">Php {{ $total }}</span></caption>
                                </table>
                            </div>
                        </div>
                        
                          
                          <div class="form-group">
                              <label for="customer_amount">Amount in Peso:</label>
                              <input id="customer_amount" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                          </div>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#checkoutTransaction" title="Check out Transaction">Checkout</button>
                          
                          <button class="btn btn-danger" data-toggle="modal" data-target="#transaction{{ $latest_transaction_id }}" title="Cancel Transaction">Cancel</button>
                        <br />
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <div class="modal fade" id="checkoutTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog w-75" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Transaction Details</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-lg">
                      <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                         <div class="row">
                           <div class="col-sm">
                            <b>Transaction ID: <span class="text-info">{{ $latest_transaction_id }}</span></b>
                            <br />
                            
                           @if ($orders)
                            @if ($orders[0]->customer_id)
                              <b>Customer ID: <span class="text-info">{{ $order->customer_id }}</span></b><br/>
                              <b>Customer Name: <span class="text-info">{{ $order->customer_name }}</span></b>
                            @else
                              <b>Customer ID: <span class="text-info">Walk In</span></b>  
                              <b>Customer Name: <span class="text-info">Walk In</span></b>  
                            @endif
                           @endif
                           </div>
                           <div class="col-sm">
                            <b>Emp ID: <span class="text-info">{{ $transaction->employee_id }}</span></b>
                            <br />
                            <b>Emp Name: <span class="text-info">{{ $transaction->employee_name }}</span></b>
                            <br />
                            <b>Date: <span class="text-info">{{ $transaction->transaction_date }}</span></b>
                           </div>
                         </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive overflow-y-2">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>Item ID</th>
                                      <th>Item Name</th>
                                      <th>Item Price</th>
                                      <th>Quantity</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @foreach ($orders as $order)
                                      
                                        <tr class="member-name">
                                          @if ($order->product_id)
                                          <td>{{ $order->product_id }}</td>
                                          <td>{{ $order->product_name }}</td>
                                          <td>{{ $order->product_price }}</td>
                                        @elseif ($order->service_id)
                                          <td>{{ $order->service_id }}</td>
                                          <td>{{ $order->service_name }}</td>
                                          <td>{{ $order->service_price }}</td>
                                        @endif
                                        <td>{{ $order->total_qty }}</td>
                                        </tr>
                                        
                                    @endforeach
                              </tbody>
                            </table>
                          </div>
                          
                          <form method="POST" action="{{ route('finish-transaction') }}">
                            @csrf
                            <div class="card text-white bg-dark mb-3 mt-3">
                              <div class="card-body">
                                
                                  <div class="form-group row">
                                    <label for="totalPayment" class="col-form-label">Total in Php</label>
                                    <div class="col-sm text-danger">
                                      <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="totalPayment" value="{{ $total }}" name="total_payment" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="staticAmountPaid" class="col-form-label">Amount Paid in Php</label>
                                    <div class="col-sm text-danger">
                                      <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="staticAmountPaid" name="amount_paid" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="change" class=" col-form-label">Amount Change in Php</label>
                                    <div class="col-sm">
                                      <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="change" name="amount_change" required>
                                    </div>
                                  </div>
                                
                              </div>
                            </div>
                            <input type="hidden" name="transaction_id" value="{{ $latest_transaction_id }}">
                            <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutTransaction" title="Check out Transaction">Checkout</button>
                          </form>

                          <script>
                            // the total payment user needs to pay
                            let totalPayment = document.querySelector('#totalPayment');
                            // change
                            let change = document.querySelector('#change');
                            // where it reflects
                            let final_amount = document.querySelector('#staticAmountPaid');
                            // customer input
                            let customer_amount = document.querySelector('#customer_amount');
                            customer_amount.addEventListener('input', function (e) {
                              console.log(customer_amount.value);
                              final_amount.value = customer_amount.value;
                              change.value = (customer_amount.value - totalPayment.value).toFixed(2);
                            });

                          </script>
                        </div>

                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>



        <!-- MODAL FOR TRANSACTION CANCELLATION -->
        <div class="modal fade" id="transaction{{ $latest_transaction_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cancel Transaction?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Remove" below if you are ready to cancel transaction.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form method="POST" action="{{ route('remove-transaction') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="transaction_id" value="{{ $latest_transaction_id }}">
                <input type="submit" value="Remove" name="Submit" class="btn btn-primary "/>
              </form>
            </div>
          </div>
          </div>
        </div>

        <script>
          function showTransactionForm() {
            let div = document.querySelector('#myTransaction');
            if (div.style.display == 'none') {
                div.style.display = 'block';
            }
          }
        </script>



@endsection