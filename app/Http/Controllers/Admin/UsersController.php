<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        //dd($request);
        $userUpdate = $user->fill($request->validated())->save();

        if($userUpdate)
        {
            return redirect()->route('admin.users.index')
                ->with('success', trans('messages.admin.users.update.success'));
        }

        return back()->with('error', trans('messages.admin.users.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            if(request()->ajax()){
                $user->delete();

                return response()->json(['success' => true]);
            }
        } catch (\Exception $error) {
            return response()->json(['success' => false]);
        }
    }
}
