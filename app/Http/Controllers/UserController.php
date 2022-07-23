<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('id', 'DESC')->get();
        return view('backend.user.index', compact('users'));
    }

    public function userStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('users')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('users')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully update status', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'string|required',
            'username' => 'string|nullable',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:4|required',
            'phone' => 'string|nullable',
            'photo' => 'nullable',
            'address' => 'string|nullable',
            'role' => 'required|in:admin,seller,customer',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $status = User::create($data);
        if ($status) {
            return redirect()->route('user.index')->with('success', 'User create successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('backend.user.edit', compact(['user']));
        } else {
            return back()->with('error', 'User no found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $this->validate($request, [
                'full_name' => 'string|required',
                'username' => 'string|nullable',
                'email' => 'email|required|exists:users,email',
                'phone' => 'string|nullable',
                'photo' => 'nullable',
                'password' => 'nullable',
                'address' => 'string|nullable',
                'status' => 'nullable|in:active,inactive',
                'role' => 'required|in:admin,seller,customer',
            ]);
            $data = $request->all();

            $status = $user->fill($data)->save();
            if ($status) {
                return redirect()->route('user.index')->with('success', 'User successfully updated');
            } else {
                return back()->with('error', 'Something went wrong');
            }
        } else {
            return back()->with('eror', 'User not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $status = $user->delete();
            if ($status) {
                return redirect()->route('user.index')->with('success', 'User delete successfully');
            }
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
