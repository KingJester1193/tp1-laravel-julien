<?php

namespace App\Http\Controllers;
use App\models\Etudiant;
use App\models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
    public function index(){
        $etudiants = Etudiant::all();
        return view("etudiant.index",["etudiants"=>$etudiants]);
    }

    public function show(Etudiant $etudiant){
       
        return view("etudiant.show",["etudiant"=>$etudiant]);
    }

    public function edit(Etudiant $etudiant){
   
        $villes = Ville::all();
        return view("etudiant.edit",["etudiant"=> $etudiant, "villes"=>$villes]);
    }



    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\BlogPost  $blogPost
    //  * @return \Illuminate\Http\Response
     
    public function update(Request $request, Etudiant $etudiant)
    {
        //

        $etudiant->update([
            "nom" => $request->nom,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "date_naissance"=>$request->date,
            "villeId"=> $request->ville,
            "adresse"=>$request->adresse
        ]);
        return redirect(route('etudiant.show',$etudiant->id));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\BlogPost  $blogPost
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Etudiant $etudiant)
    {
        
        $etudiant->delete();
        return redirect(route('etudiant.index'))->withSuccess('destruction reussie');
    }
    
    
    public function create(){
        $villes = Ville::all();
        return view("etudiant.create",["villes"=>$villes]);
    }


    public function store(Request $request){
      $etudiant = Etudiant::create([
            "nom" => $request->nom,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "date_naissance"=>$request->date,
            "villeId"=> $request->ville,
            "adresse"=>$request->adresse
            
        ]);
      return  redirect(route("etudiant.show",["etudiant"=>$etudiant]));
    }
}
