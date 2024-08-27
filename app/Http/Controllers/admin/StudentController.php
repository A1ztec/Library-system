<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{

    public function index(Request $request)
    {

        if ($request->has('search')) {
            $users = User::where('id', 'like', '%' . $request->search . '%' )
                ->where('usertype' , 'user')
                ->paginate(20);
        } else {
            $users = User::where('usertype', 'user')->paginate(20);
        }
        return view('Admin.student.index', compact('users'));
    }


     public function show(User $student)
     {
         $user = $student;
         return view('Admin.student.show', compact('user'));
     }




    public function destroy(User $user)
    {

        $user->delete();
        flash()->success('User deleted successfully');
        return back();
    }
}


