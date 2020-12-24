<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UserController extends Controller
{
    //
    public function index(){
        return "Hello Laravel Controllers";
    }

    public function create(){
        $user = new User;
        $user->name = 'Hiren Dave';
        $user->email = 'hiren@dave.com';
        $user->password = 'hiren';
        $user->save();
        echo 'New User is Created';
    }

    public function update($id){
        $user = User::find($id);
        $user->name = 'Hiren J. Dave';
        $user->save();
        echo 'User is Updated';
    }

    public function read(){
        $users = User::all();

        foreach ($users as $user) {
            echo $user->name.'</br>';
        }
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        echo 'User is deleted';
    }
}
