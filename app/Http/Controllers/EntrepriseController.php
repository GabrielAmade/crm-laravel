<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Env;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', ["entreprises" => $entreprises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprises.form');
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
                "name" => "string",
                "status" => "string",
                "siren" => "numeric|digits_between:9,9",
                "email" => "email:rfc,dns",
                "phone" => "string"
            ],

            [
                "name.string" => "Le nom est invalide",
                "status.string" => "Le statut juridique est invalide",
                "siren.numeric" => "Le numéro SIREN doit contenir des chiffres uniquement",
                "siren.digits_between" => "Le numéro SIREN doit contenir 9 chiffres",
                "email.email" => "L'adresse email est invalide",
                "phone.string" => "Le numéro de téléphone est invalide"
            ]
        );

        Entreprise::create([
            "name" => $request->name,
            "status" => $request->status,
            "siren" => $request->siren,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        return view('entreprises.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprise = Entreprise::findorfail($id);
        return view('entreprises.show', ["entreprise" => $entreprise]); //je récupère les infos depuis l'id récupéré dans le findorfail
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise = Entreprise::findorfail($id);
        return view('entreprises.edit', ["entreprise" => $entreprise]);
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
        $entreprise = Entreprise::findorfail($id);
        $entreprise->name = $request->name;
        $entreprise->status = $request->status;
        $entreprise->siren = $request->siren;
        $entreprise->email = $request->email;
        $entreprise->phone = $request->phone;

        $entreprise->save();

        return redirect()->route('entreprises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entreprise = Entreprise::findorfail($id);

        $entreprise->delete();

        return view('entreprises.delete');
    }
}
