<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin=new Admin([
            "name"=>$request->post("name"),
            "email"=>$request->post("email"),
            "password"=>bcrypt($request->post("password")),
        ]);
        if ($admin->save())
        {
            return redirect('admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin  $admin)
    {
        //
        
    }
    public function logout()
    {
        echo "logout";
        Auth::guard('admin')->logout();
    }
    public function login(Request $request)
    {
        // dd($request->password);
        $data=[
            "email"=>$request->email,
            "password"=>$request->password
        ];
        if (Auth::guard('admin')->attempt($data)) {
            echo "okkkkkkkkkkkkkkkkkkkkkkk ";
            echo "<a href='".route("admin.logout")."'>logout</a>";
        } else {
            echo "nottt okkkkkkkkkkkkkkkkkk";
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
