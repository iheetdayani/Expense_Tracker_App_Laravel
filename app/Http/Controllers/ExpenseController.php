<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $expenses = Expense::where('Title', 'like', '%' . $search . '%')->get();

        return view('ExpenseList', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Addexpense');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:25',
            'Amount' => 'required|numeric|min:0',
            'Date' => 'required|date',
            'Category' => 'required|string',
            'payement_method' => 'required|in:UPI,CASH,CREDITCARD'
        ]);

        $expense = [
            'Title' => $request->Title,
            'Amount' => $request->Amount,
            'Category' => $request->Category,
            'Date' => $request->Date,
            'payement_method' => $request->payement_method
        ];

        Expense::create($expense);
        return redirect()->route("Expenses.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::find($id);

        return view('ExpenseList', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expenses = Expense::find($id);

        return view("EditExpense", compact('expenses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expenses = Expense::find($id);
        $expenses->update([
            'Title' => $request->Title,
            'Amount' => $request->Amount,
            'Category' => $request->Category,
            'Date' => $request->Date,
            'payement_method' => $request->payement_method

        ]);
        return redirect()->route('Expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);

        $expense->delete();

        return redirect()
            ->route('Expenses.index')
            ->with('Success', 'Expense Deleted Successfully');
    }
}
