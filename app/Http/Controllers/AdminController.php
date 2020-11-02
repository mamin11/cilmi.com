<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function dashboard() 
     {
         //this function returns is for the main admin area
        //return view('dashboard')->with('episodes', $episodes);
        return view('admin.dashboard');
     }

     public function login()
     {
         
     }

    public function adminPanel()
    {
        //this function is for the manage admins area
        return view('admin.adminPanel');
    }

    public function viewAdmins() 
    {
        //this function is for viewing a list of admins
        //
        //return a collection of admins
        //loop through them in the template
        //link id of each to edit and delete buttons

        $admins = User::orderBy('name')->paginate(12); 
        return view('admin.adminsList')->with('admins', $admins);
    }

    public function createAdminForm()
    {
        //this function is for providing the create admin form
        //handles get request
        $roles = Role::orderBy('name')->get(); 
         return view('admin.createAdmin')->with('roles', $roles);
    }

    public function createAdmin(Request $request)
    {
        //this function is for creating an admin
        //handles the post request

        $admin = User::create([
            'name' => $request->input('adminName'),
            'email' => $request->input('adminEmail'),
            'password' => Hash::make($request->input('adminPassword')),
            'role_id' => $request->input('adminRole')
        ]);

        Session::flash('message', 'Successfully created!'); 
        Session::flash('alert-class', 'text-success'); 

        return back();

        // var_dump($admin);
        // return view('admin.success')->with([
        //     'admin'=> $admin,
        //     'message' => 'created'
        // ]);
    }

    public function editAdminForm($id) 
    {
        //this function is for editing an admin
        $admin = User::find($id);
        $adminRole = $admin->role_id;
        $roles = Role::orderBy('name')->get();


        return view('admin.editAdmin')->with([
            'roles' => $roles,
            'admin' => $admin,
            'adminRole' => $adminRole
            ]);
    }

    public function editAdmin($id, Request $request) 
    {
        //this function is for editing an admin
        //retrieve the admin data
        $admin = User::find($id);
        $roles = Role::orderBy('name')->get();

        //message to be flashed
        Session::flash('message', 'Successfully updated!'); 
        Session::flash('alert-class', 'text-success');

        //update the records
        $admin->name = $request->input('adminName');
        $admin->email = $request->input('adminEmail');
        $admin->role_id = $request->input('adminRole');

        //save the changes
        $admin->save();

        //var_dump($admin);

        return back();
    }

    public function deleteAdmin($id) 
    {
        //this function is for deleting an admin
        $admin = User::find($id);
        $admin->delete();

        Session::flash('message', 'Successfully deleted!'); 
        Session::flash('alert-class', 'text-danger'); 


        return back();

        //var_dump($admin);
    }

    public function store(Request $request)
    {
        //
    }

}
