@extends('layouts.employee-layout')

@section('content')
<div>

    <!-- Transaction -->
    <div id="california-transactions" class="card m-5-bottom small-card ">
        <div class="flex-1">
            <h2><i class="fas fa-file-invoice icons"></i>Today's Transactions</h2>
            
            <h2 class="h2-click" title="add a new transaction">
                <form method="POST" action="{{ route('e-add-transaction') }}">
                    @csrf
                    <button type="submit" style="border: 0px; text-align: center; color: #19b0b8; background-color: white;">
                      <i class="fas fa-plus-circle icon-animation fa-2x text-info" style="font-size: 36px; cursor: pointer;"></i>
                    </button></h2>
                  </form>
        </div>

        <div class="container flex">
            <div class="card cursor color1">
                <h4># of Transactions (This day)</h4>
                <h1>{{ $todaysTransactions[0]->num_of_transaction }}</h1>
            </div>
            <div class="card cursor color2">
                <h4>Today's Earnings</h4>
                <h1>Php {{ number_format($dailyEarnings[0]->earnings, 2, '.', ',') }}</h1>
            </div>                   
        </div>
    </div>                
</div>
    
@endsection


@section('transaction-content')

@if (session('showIt') == 'show' || $displayMe == 'show')
    <section id="transaction">
        <div class="container">
            <hr style="width: 100%;">
            <br />
        <h2><i class="fas fa-file-invoice icons"></i>Current Transaction: {{ $latest_transaction_id }}</h2>
        </div>
        <div class="container grid grid-2-only top-align">
            <!-- Orders -->
            <div id="california-customers" class="card m-5-bottom small-card">
                <div class="flex-1">
                    <h2><i class="fas fa-file-invoice icons"></i>Add an Order</h2>
                </div>
                <div class="container">
                    <form action="{{ route('e-add-order') }}" method="POST">
                        @csrf
                        <div class="form-control">
                            <input type="text" placeholder="Enter Customer ID (Optional)" name="customer_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                        </div>
                        <div class="form-control">
                            <input type="text" class="half-btn" style="width: 48%;" placeholder="Enter Product ID" name="product_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/> | 
                            <input type="text" class="half-btn" style="width: 48%;" placeholder="Enter Service ID" name="service_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                        </div>
                        <div class="form-control">
                            <input type="text" class="fullbtn" placeholder="Enter Quantity" name="total_qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
                        </div>
                        <input type="hidden" name="current_transaction_id" value="{{ $latest_transaction_id }}" />
                        <input type="submit" value="Add to Cart" class="btn btn-primary fullbtn" />
                    </form>
                </div>
            </div>


            <div class="card m-5-bottom small-card">
                <div class="flex-1">
                    <h2><i class="fas fa-file-invoice icons"></i>Items on Cart</h2>
                </div>
                <div class="container no-padding">
                    <div class="form-control">
                        <h3>Customer: 
                            @if ($orders)
                                @if ($orders[0]->customer_id)
                                    <span class="text-info">{{ $orders[0]->customer_name }}</span>
                                @else
                                    <span class="text-info">Walk In</span>
                                @endif
                            @endif
                        </h3>
                        <table id="data">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Quantity</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach ($orders as $index => $order)
                                      <tr class="row-classes">
                                        @if ($order->product_id)
                                          <td>{{ $order->product_id }}</td>
                                          <td>{{ $order->product_name }}</td>
                                          <td>{{ $order->product_price }}</td>
                                        @elseif ($order->service_id)
                                          <td>{{ $order->service_id }}</td>
                                          <td>{{ $order->service_name }}</td>
                                          <td>{{ $order->service_price }}</td>
                                        @endif
                                        <td class="text-center">{{ $order->total_qty }}</td>
                                        <td class="text-center">
                                          <form action="{{ route('e-remove-order') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                            <input type="hidden" name="current_transaction_id" value="{{ $order->transaction_id }}">
                                            <button class="btn" style="border: 0px; background: none;"><i class="fas fa-trash fa-2x text-danger icon-animation" title="remove order"></i></button>
                                          </form>
                                        </td>
                                      </tr>

                                      <?php $total += $order->order_amount ?>
                                        
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <p>Total: <span style="color: #19b0b8; font-weight: bold;">Php {{ $total }}</span></p>
                    </div>
                    <div>
                        <div class="form-control">
                            <input id="customer_amount" type="text" class="full" id="exampleInputEmail1" placeholder="Enter Customer Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                        <input type="submit" value="Check out" class="btn btn-primary fullbtn" data-toggle="modal" data-target="#checkout" style="margin-bottom: 2px;"/>
                        
                        <button class="btn btn-danger full" data-toggle="modal" data-target="#transaction{{ $latest_transaction_id }}" title="Cancel Transaction">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div id="checkout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="modal-title"><i class="fas fa-info-circle icons md"></i>Details</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="modRow" class="d-flex justify-content-center row">
                <div class="col">
                    <div>
                        <b>Transaction ID: <span class="text-info" style="color: #19b0b8;">{{ $latest_transaction_id }}</span></b>
                        <br />
                        <b>Emp ID: <span class="text-info" style="color: #19b0b8;">{{ $transaction->employee_id }}</span></b>
                        <br />
                        <b>Emp Name: <span class="text-info" style="color: #19b0b8;">{{ $transaction->employee_name }}</span></b>
                        <br />
                        @if ($orders)
                            @if ($orders[0]->customer_id)
                                <b>Customer ID: <span class="text-info" style="color: #19b0b8;">{{ $orders[0]->customer_id }}</span></b><br/>
                                <b>Customer Name: <span class="text-info" style="color: #19b0b8;">{{ $orders[0]->customer_name }}</span></b><br />
                            @else
                                <b>Customer ID: <span class="text-info" style="color: #19b0b8;">Walk In</span></b><br />
                                <b>Customer Name: <span class="text-info" style="color: #19b0b8;">Walk In</span></b><br />
                            @endif
                        @endif
                        <b>Date: <span class="text-info" style="color: #19b0b8;">{{ $transaction->transaction_date }}</span></b>
                    </div>
                    <form method="POST" action="{{ route('e-finish-transaction') }}">
                        @csrf
                        <div class="form-control">
                            <label for="totalPayment" class="col-form-label">Total in Php</label>
                            <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="totalPayment" value="{{ $total }}" name="total_payment" required>
                        </div>
                        <div class="form-control">
                            <label for="staticAmountPaid" class="col-form-label">Amount Paid in Php</label>
                            <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="staticAmountPaid" name="amount_paid" required>
                        </div>
                        <div class="form-control">
                            <label for="change" class=" col-form-label">Amount Change in Php</label>
                            <input type="text" readonly class="form-control-plaintext border-bottom disable_focus" id="change" name="amount_change" required>
                        </div>
                        <input type="hidden" name="transaction_id" value="{{ $latest_transaction_id }}">
                        <button type="submit" class="btn btn-primary full" data-toggle="modal">Checkout</button>
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
            <div class="modal-footer">
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
            <form method="POST" action="{{ route('e-remove-transaction') }}">
              @csrf
              @method('DELETE')
              <input type="hidden" name="transaction_id" value="{{ $latest_transaction_id }}">
              <input type="submit" value="Remove" name="Submit" class="btn btn-primary "/>
            </form>
          </div>
        </div>
        </div>
      </div>
@endif

@endsection