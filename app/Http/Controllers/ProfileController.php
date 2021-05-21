<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function listProfile() {
        $profiles = Profile::orderBy('descricao')->get();        
        
        return view('listProfile', ['profiles' => $profiles]);
    }

    public function viewProfile(Profile $profile) {                            
        return view('viewProfile', ['profile' => $profile]);
    }

    public function addProfile() {                     
        return view('viewProfile');
    }

    // Diferente da tela de cadastro de cliente, fiz aqui já tipando o objeto na propriedade
    public function storeProfile(Request $request) {        
        $profile             = new Profile();
        $profile->descricao  = $request->input('descricao');
        $profile->save();
        return redirect()->route('listProfile');
    }

    public function editProfile(Profile $profile, Request $request) {
                
        $profile->descricao  = $request->input('descricao');
        $profile->save();

        return redirect()->route('listProfile');
    }

    public function deleteProfile(int $profileid) {
        $profile = Profile::find($profileid, ['id']);
        $profile->delete();
        return redirect()->route('listProfile');
    }
}
