<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\fileExists;
class UserController extends Controller
{
    public function index()
    {
        $users =User::get();
        return view('admin.Pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $filename ?? '',
        ]);
        if($request->type == 'viewer')
        {
            $user->attachRole('viewer');
        }
        else if($request->type == 'editor')
        {
            $user->attachRole('editor');
        }
        else if($request->type == 'admin')
        {
            $user->attachRole('admin');
        }
        Alert::success('Success Title', 'User Was Created');
        return redirect(route('admin.user.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin.Pages.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);
        if($request->file('image')){
            if(fileExists(public_path('images/' . $user->image)))
            {
                File::delete(public_path('images/' . $user->image));
            }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        $user->update($data);
        if($request->type == 'viewer')
        {
            $user->attachRole('viewer');
        }
        else if($request->type == 'editor')
        {
            $user->attachRole('editor');
        }
        else if($request->type == 'admin')
        {
            $user->attachRole('admin');
        }
        Alert::success('Success Title', 'User Was Updated');
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Success Title', 'User Was Deleted');
        return redirect(route('admin.user.index'));

    }
}
