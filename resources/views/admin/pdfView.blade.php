<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>California Fitness Gym Sales Report</title>
</head>
<body>
        <h4 align=center>California Fitness Gym Earnings Report</h4><br />
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Total Quantity</th>
                <th scope="col">Total Payment</th>
                <th scope="col">Transaction Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->transaction_id }}</th>
                        <td>{{ $transaction->employee_name }}</td>
                        @if ($transaction->product_id)
                            <td>{{ $transaction->product_name }}</td>
                            <td>{{ $transaction->product_price }}</td>
                        @elseif ($transaction->service_id)
                            <td>{{ $transaction->service_name }}</td>
                            <td>{{ $transaction->service_price }}</td>
                        @endif
                        <td>{{ $transaction->total_qty }}</td>
                        <td>{{ $transaction->total_payment }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
          </table>
          
        
</body>


</html>