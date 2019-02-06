<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'parent_user'   => ['required','exists:users,id'],
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(isset($data['parent_user']) || $data['parent_user'] != ''){
            $parent = \App\User::find($data['parent_user']);

            if(!$parent){
                exit;
            }

            $parent_binary = DB::table('binary_trees')->where('child',$parent_id)->first();
            $parent_id = $data['parent_user'];

            //Check parent's child count
        }else{
            $parent_id = 0;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($user){
            //Create tree
            $tree = DB::table('trees')->insert(
                [
                    'parent' => $parent_id,
                    'child'  => $user->id,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]
            );

            //Create a path based on parent's path
            if(isset($parent_binary)){
                $path_to_parent = $parent_binary->path_to_me;
                $path_to_me     = $path_to_parent.$user->id.",";
            }else{
                $path_to_parent = ',0,';
                $path_to_me     = $path_to_parent.$user->id.",";
            }

            $depth_to_me = rtrim(ltrim($path_to_me,','),',');
            $depth_to_me = explode(',', $depth_to_me);
            $depth_to_me = count($depth_to_me);

            //Create binary tree
            $binary = DB::table('binary_trees')->insert(
                [
                    'parent'        => $parent_id,
                    'child'         => $user->id,
                    'path_to_parent'=> $path_to_parent,
                    'path_to_me'    => $path_to_me,
                    'depth_to_me'   => $depth_to_me,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ]
            );
            
        }

        return $user;
    }
}
