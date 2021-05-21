<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function listUser() {
        // $user = new User();
        // $user->name = 'Denis teste';
        // $user->email = 'mail@mail.com';
        // $user->password = Hash::make('123');
        // $user->save();

        // echo '<h1>Listagem de usuário</h1>';
        

        // $users = User::all();        
        
        $users = DB::table('users')                 
                 ->leftJoin('profiles', 'users.profile_id', '=', 'profiles.id')
                 ->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at', 'profiles.descricao as profile')
                 ->orderBy('name')
                 ->get();

        // dd($users);            
                
        return view('listUser', ['users' => $users]);
    }

    public function viewUser(int $userid) {
        $user = User::leftJoin('profiles', 'users.profile_id', '=', 'profiles.id')
                 ->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at', 'users.profile_id', 'profiles.descricao as profile')
                 ->find( $userid, ['id']);

        $profile = Profile::orderBy('descricao')->get();
                 

        return view('viewUser', ['user' => $user, 'profiles' => $profile]);
    }

    public function addUser() {
        $profile = Profile::orderBy('descricao')->get();
                 
        return view('viewUser', ['profiles' => $profile]);
    }

    /*public function addUser() {
        $user = new User();
        $user->name = 'Denis teste';
        $user->email = 'mail@mail.com';
        $user->password = Hash::make('123');
        $user->save();

        echo '<h1>Usuário cadastrado</h1>';
      
    }*/

    public function storeUser(Request $user) {
        $this->validate($user, ['profile_id' => 'required|integer'], ['profile_id.required' => 'O campo de profile é obrigatório', 'profile_id.integer' => 'O valor deve ser inteiro']);
        
        if ($user->has('id'))
            $userGet         = User::find($user->id, ['id']);
        else
            $userGet         = new User();
        $userGet->name       = $user->input('name');
        $userGet->email      = $user->input('email');
        $userGet->profile_id = $user->input('profile_id');
        if (trim($user->input('password')) != '')
            $userGet->password = Hash::make(($user->input('password')));       
        $userGet->save();

        return redirect()->route('listUser');
    }

    // Se passa-se o metodo via post, delete, etc, poderia passar como parametro a variavel ja tipada
    // e nao precisaria fazer o find para o delete, pois poderia já passar o obejto user preenchido e já chamar o delete
    
    /* publlic function deleteUser(User user) {
        $user->delete();
        return redirect()->route('lisUser');
    }*/

    public function deleteUser(int $userid) {
        $user = User::find($userid, ['id']);
        $user->delete();
        return redirect()->route('listUser');
    }

    public function joinUser(int $userid) {
        $user = User::where('id', $userid)->first();

        if ($user) {
            $profile = $user->Perfil()->first();
            $posts  = $user->Posts()->get();

            echo '<h1>Dados do usuário</h1>' . 
                 "<p><b>Name:</b> {$user->name} <b>Email:</b> {$user->email}</p>";

            if ($profile)
                echo "<p><b>Perfil:</b> {$profile->descricao}</p>";

            if ($posts) {
                echo "<h1>Posts deste usuário</h1>";
                foreach($posts as $post) {
                    echo "<p>{$post->id} -  {$post->titulo}</p>";
                }
            }

            
        }
        
    }
}
