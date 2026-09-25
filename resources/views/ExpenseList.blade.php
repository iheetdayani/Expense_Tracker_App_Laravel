<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExpenseList</title>
  <link rel="stylesheet" href='../bootstrap-5.0.2-dist/css/bootstrap.min.css'>
</head>

<body>
  <div class="container mt-5">
    <form action="{{ route('Expenses.index') }}" method="GET">
      <input type="text" name="search" placeholder="Search by name" class="form-control">

      <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
  </div>
  <div class="container mt-5">
    <table class="table table table-striped-columns table-borded table-hover">
      <thead class="table table-header bg-dark text-white table-bordered">
        <th>Title</th>
        <th>Amount</th>
        <th>Category</th>
        <th>Date</th>
        <th>Payement Method</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($expenses as $exp)

          <tr>
            <td>{{ $exp->Title }}</td>
            <td>{{ $exp->Amount }}</td>
            <td>{{ $exp->Category }}</td>
            <td>{{ $exp->Date }}</td>
            <td>{{ $exp->payement_method }}</td>
            <td>
              <a href="{{ route('Expenses.edit', $exp->id) }}" class="btn btn-warning">
                Edit
              </a>
              <form action="{{ route('Expenses.destroy', $exp->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

</body>

</html>