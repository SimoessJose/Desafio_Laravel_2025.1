<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function purchase()
    {
        $products = Transaction::where('buyer_id', logged_user()->id)->paginate(10);
        
        return view('user.purchaseTable', compact('products'));
    }

    public function purchasePdf()
    {
        $products = Transaction::where('buyer_id', logged_user()->id)->with('product')->get();

        $pdf = Pdf::loadView('user.purchase-pdf', compact('products'));
        return $pdf->stream('Relatorio_Compras.pdf');
    }

    public function sales()
    {   
        if(is_admin()) {
            $salesAll = Transaction::paginate(10);
            return view('user.salesTable', compact('salesAll'));
        }else{

            $sales = Transaction::whereHas('product', function ($query) {
                $query->where('user_id', logged_user()->id);
            })->paginate(10);
            
            return view('user.salesTable', compact('sales'));
        }
    }

    public function salesPdf()
    {
        if (is_admin()) {
            $sales = Transaction::all();
            $pdf = Pdf::loadView('user.sales-pdf', compact('sales'));
            return $pdf->stream('Relatorio_Vendas.pdf');
        } else {

            $sales = Transaction::whereHas('product', function ($query) {
                $query->where('user_id', logged_user()->id);
            })->get();

            $pdf = Pdf::loadView('user.sales-pdf', compact('sales'));
            return $pdf->stream('Relatorio_Vendas.pdf');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
