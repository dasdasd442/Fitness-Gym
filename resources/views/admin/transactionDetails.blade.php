@extends('layouts.admin-layout')
@section('content')
        <!-- ADD new transaction CONTENT  -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <br />
            <h1 class="h1 mb-2 text-gray-800">
              <form method="POST" action="{{route('add-new-transaction') }}">
                @csrf
                <button type="submit" class="btn"  style="border: 0px; text-align: center;">
                  <i class="fas fa-plus-circle icon-animation fa-2x text-info"></i>
                </button>Add A New Transaction</h1>
              </form>
            <br />
            <br />
            <h1 class="h1 mb-2 text-gray-800"><i class="fas fa-file-invoice icons"></i>Shop Transactions</h1>
            <br />
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                California transactions Details
            </div>
            <div class="card-body">
                <div class="table-responsive overflow-y">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th class="bg-blue">Transaction ID</th>
                            <th class="bg-blue">Customer</th>
                            <th class="bg-blue">Employee</th>
                            <th class="bg-blue">Transaction Date</th>
                            <th class="bg-blue">Total Payment</th>
                            <th class="bg-blue">Amount Received</th>
                            <th class="bg-blue">Status</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th class="bg-blue">Transaction ID</th>
                            <th class="bg-blue">Customer</th>
                            <th class="bg-blue">Employee</th>
                            <th class="bg-blue">Transaction Date</th>
                            <th class="bg-blue">Total Amount</th>
                            <th class="bg-blue">Amount Received</th>
                            <th class="bg-blue">Status</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        
                        @foreach ($transactions as $transaction)
                            @foreach ($orders as $order)
                              @if ($order->transaction_id == $transaction->transaction_id)
                                <tr class="row-product">
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">{{ $transaction->transaction_id }}</td>
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">{{ $order->customer_id }}</td>
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">{{ $transaction->employee_id }}</td>
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">{{ $transaction->transaction_date }}</td>
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">Php {{ number_format($transaction->total_payment, 2, '.', ',') }}</td>
                                  <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details">Php {{ number_format($transaction->amount_paid, 2, '.', ',') }}</td>
                                  @if ($transaction->status == 'completed')
                                    <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details"><span class="text-success">{{ $transaction->status }}</span></td>
                                  @else
                                    <td   style="cursor: pointer;" data-toggle="modal" data-target="#transaction{{ $transaction->transaction_id}}" title="Click to see more details"><span class="text-danger">{{ $transaction->status }}</span></td>  
                                  @endif
                                </tr>
                                @break
                              @endif
                            @endforeach
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- More Transaction Details -->
        @foreach ($transactions as $transaction)

          @foreach ($orders as $order)
            <div class="modal fade" id="transaction{{ $transaction->transaction_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog mw-100 w-75" role="document">
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
                            <div class="card-header"><b>Transaction ID: {{ $transaction->transaction_id }}</b></div>
                            <div class="card-body">
                              <div class="table-responsive overflow-y">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                      <tr>
                                          <th>Order ID</th>
                                          <th>Employee Name</th>
                                          <th>Customer Name</th>
                                          <th>Item Name</th>
                                          <th>Item Price</th>
                                          <th>Total Quantity</th>
                                          <th>Total Amount</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @foreach ($orders as $order)
                                          @if ($order->transaction_id == $transaction->transaction_id)
                                            <tr class="member-name">
                                              <td>{{ $order->order_id }}</td>
                                              <td>{{ $transaction->employee_name }}</td>
                                              <td>{{ $order->customer_name }}</td>
                                              @if ($order->product_id)
                                                <td>{{ $order->product_name }}</td>
                                                <td>Php {{ number_format($order->product_price, 2, '.', ',') }}</td>
                                              @elseif ($order->service_id)
                                                <td>{{ $order->service_name }}</td>
                                                <td>Php {{ number_format($order->service_price, 2, '.', ',') }}</td>
                                              @endif
                                              <td>{{ $order->total_qty }}</td>
                                              <td>Php {{ number_format($order->order_amount, 2, '.', ',') }}</td>
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
                  </div>
                </div>
              </div>
            </div>
          @endforeach
            
        @endforeach

        <script>
          function showTransactionForm() {
            let div = document.querySelector('#myTransaction');
            if (div.style.display == 'none') {
                div.style.display = 'block';
            }
          }
        </script>


@endsection