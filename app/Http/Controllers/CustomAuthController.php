<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $villes = Ville::all();
        return view('etudiant.create',['villes'=>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
          
      
        $request->validate([
            'name' => 'required|min:2',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
          
            'address' => 'required|',
            'birthday'=> 'required|date',
            'ville'=> 'required|numeric',



        
        ]);
    
        // $user = new User;
        
        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        // $etudiant = new Etudiant();
        $etudiant = Etudiant::create([
            'id'=>$user->id,
            "name" => $request->name,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "birthday"=>$request->birthday,
            "ville_id"=> $request->ville,
            "address"=>$request->address
            
        ]);
        
       

        // $to_name = $request->name;
        // $to_email = $request->email;
        // $body="<a href=''>Cliquez ici pour confirmer</a>";

        // Mail::send('email.mail', $data = [
        //     'name' => $to_name,
        //     'body' => $body
        // ],
        // function($message) use ($to_name, $to_email){
        //     $message->to($to_email, $to_name)->subject('Courriel test laravel');
        // }
        // );

        return redirect(route('login'))->withSuccess(trans('lang.confirmed_sign-up'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function authentication(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password' => 'required|min:6|max:20',
            
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                      ->withErrors(trans('auth.failed'))
                      ->withInput();
         endif;

         $user = Auth::getProvider()->retrieveByCredentials($credentials);
     
         Auth::login($user, $request->get('remember'));

        //  return view('etudiant.show', $user->id);
        return redirect(route('etudiant.show', $user->id))->with('succes', 'connecte');
    }

  

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function tempPassword(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->get();
        $user = $user[0];
        $tempPass = str::random(25);
        $user->temp_password = $tempPass;
        $user->save();
        $userId = $user->id;

        $link = "<a href='http://127.0.0.1:8000/new-password/".$userId."/".$tempPass."'>Cliquez ici pour réinitialiser votre mot de passe</a>";

        //http://localhost:8000/new-password/23/ORar0RQHfrzkoqWFSLSyXedrt
       // return $link;
       $to_email = $user->email;
       $to_name = $user->name;

       Mail::send('email.mail', $data = [
                        'name' => $to_name,
                        'body' => $link
                    ],
            function($message) use ($to_name, $to_email){
                $message->to($to_email, $to_name)->subject('Reset PassWOrd');
            }
            );

            return redirect()->back()->withSuccess(trans('check email to change password'));



  

    }
    public function newPassword(User $user, $tempPassword){
        if ($user->temp_password === $tempPassword) {
            return view ('auth.new-password');
        }
        return redirect('forgot-password')->withErrors('Les identifiants ne correspondent pas');   
    }


    public function storeNewPassword(User $user, $tempPassword, Request $request){
        if ($user->temp_password === $tempPassword) {
           $request->validate([
            'password'=>'required|min:6|confirmed'
           ]);
           $user->temp_password = null;
           $user->password = Hash::make($request->password);
           $user->save();
           return redirect(route('login'))-> withSuccess(trans('lang.passChangeSuccess'));

        }
        return redirect('forgot-password')->withErrors('Les identifiants ne correspondent pas');   
    }
    
}
