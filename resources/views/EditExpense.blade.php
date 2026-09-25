<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Edit Expense</title>

  <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
</head>

<body>
  <div class="container mt-5">

    <div class="row justify-content-center">

      <div class="col-md-7">

        <div class="card shadow">

          <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Expense</h4>
          </div>

          <div class="card-body">
            @if(session('Success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>
            @endif
            <form action="{{route('Expenses.update', $expenses->id)}}" method="post">

              @csrf
              @method('PUT')
              <!-- Title -->
              <div class="mb-3">
                <label for="title" class="form-label">
                  Expense Title
                </label>

                <input type="text" name="Title" id="title" class="form-control" placeholder="Enter expense title"
                  value="{{$expenses->Title}}" required>
              </div>


              <!-- Amount -->
              <div class="mb-3">
                <label for="amount" class="form-label">
                  Amount
                </label>

                <input type="number" name="Amount" id="amount" class="form-control" placeholder="Enter amount"
                  step="0.01" value="{{$expenses->Amount}}" required>
              </div>


              <!-- Category -->
              <div class="mb-3">
                <label for="category" class="form-label">
                  Category
                </label>

                <select name="Category" id="category" class="form-select" required value="{{$expenses->Category}}">
                  <option value="">Select Category</option>
                  <option value="Food">Food</option>
                  <option value="Transport">Transport</option>
                  <option value="Shopping">Shopping</option>
                  <option value="Bills">Bills</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Other">Other</option>
                </select>
              </div>


              <!-- Date -->
              <div class="mb-3">
                <label for="Date" class="form-label">
                  Expense Date
                </label>

                <input type="date" name="Date" id="date" class="form-control" required value="{{$expenses->Date}}">
              </div>


              <!-- Payment Method -->
              <div class="mb-3">
                <label for="payment_method" class="form-label">
                  Payment Method
                </label>

                <select name="payement_method" id="payment_method" class="form-select" required required
                  value="{{$expenses->payement_method}}">
                  <option value="CASH">Cash</option>
                  <option value="UPI">UPI</option>
                  <option value="CREDITCARD">Credit Card</option>
                </select>
              </div>



              <!-- Buttons -->
              <div class="d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                  Save Expense
                </button>

                <button type="reset" class="btn btn-secondary">
                  Reset
                </button>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

  <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>