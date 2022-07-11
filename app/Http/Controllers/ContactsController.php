<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() //get
    {
        $contacts = Contact::all(); //je récup un tableau d'objet normal
        return view('contacts.index', ["contacts" => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create() //get
    {
        return view('contacts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request) //post
    {
        $request->validate(
            [
                //récupérer les données
                "lastname" => 'string',
                "firstname" => 'string',
                "phone" => 'string',
                "email" => 'email:rfc,dns' //verifier que email existe bien, accepté par laravel
            ],

            [
                //message d'erreurs (pas oublier d'insérer la boucle erreur sous le formulaire)
                "lastname.string" => "Le nom n'est pas valide",
                "firstname.string" => "Le prénom n'est pas valide",
                "phone.string" => "Le numéro n'est pas valide",
                "email.email" => "L'email n'est pas valide",
            ]
        );

        //envoyer les données dans la bdd
        Contact::create([
            "lastname" => $request->lastname,
            "firstname" => $request->firstname,
            "phone" => $request->phone,
            "email" => $request->email
        ]);

        //créer une vue success pour renvoyer un message de validation
        return view('contacts.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id) //get
    {
        $contact = Contact::findorfail($id); //je donne l'id et je récupère l'élément associé
        return view('contacts.show', ["contact" => $contact]);
    }


    /**
     * Show the form for editing the specified resource. Affiche un seul id en particulier
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id) //get
    {
        $contact = Contact::findorfail($id);
        return view('contacts.edit', ["contact" => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id) //put
    {
        $contact = Contact::findOrFail($id);

        $contact->lastname = $request->lastname;
        $contact->firstname = $request->firstname;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id) //delete
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return view('contacts.delete');
    }
}
