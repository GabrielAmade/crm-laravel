<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', ["invoices" => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "title" => "string",
                "date" => "date",
                "priceht" => "numeric",
                "tva" => "numeric",
            ],

            [
                "title.string" => "Le titre de votre facture est invalide",
                "date.date" => "La date est incorrect",
                "priceht.numeric" => "Veuillez entrer uniquement des chiffres",
                "tva.numeric" => "Veuillez entrer uniquement des chiffres",
            ]
        );

        $new_date = $request->date;
        $number_rand = rand(0, 9) . rand(0, 9);
        $new_number = $new_date . '-' . $number_rand;

        Invoice::create([
            "title" => $request->title,
            "date" => $request->date,
            "number" => $new_number,
            "priceht" => $request->priceht,
            "tva" => $request->tva,
            "pricettc" => $request->priceht * (1 + $request->tva / 100),
        ]);


        return view('invoices.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findorfail($id);
        return view('invoices.show', ["invoice" => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findorfail($id);
        return view('invoices.edit', ["invoice" => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $invoice = Invoice::findorfail($id);
        $invoice->title = $request->title;
        $invoice->date = $request->date;
        $invoice->priceht = $request->priceht;
        $invoice->tva = $request->tva;

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findorfail($id);

        $invoice->delete();

        return view('invoices.delete');
    }
}
