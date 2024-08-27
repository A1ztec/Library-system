<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        if ($request->has('search')) {
            $users = User::where('name', 'like', '%' . $request->search . '%' )
                ->where('usertype' , 'admin')
                ->paginate(20);
        } else {
            $users = User::where('usertype', 'admin')->paginate(20);
        }
        return view('Admin.user.index', compact('users'));
    }

    public function create()
    {

        return view('admin.user.create', );
    }

    public function store(Request $request)
    {

        $record = $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required',
            'password' => 'required|confirmed|min:8',

        ]);
        $record['password'] = bcrypt($request->password);
      $user = User::create($record);
        $user->usertype = 'admin';
        $user->save();
        flash()->success('User added successfully');
        return redirect(route('user.index'));

    }

    public function edit(User $user)
    {
        return view('Admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|numeric|digits:11',
            'address' => 'required',
            'password' => 'nullable|confirmed|min:8',

        ]);

        if ($request->password != null) {
            $request['password'] = bcrypt($request->password);
        } else {
            $request['password'] = $user->password;
        }

        flash()->success('User updated successfully');
        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {

        $user->delete();
        flash()->success('User deleted successfully');
        return back();
    }
}


