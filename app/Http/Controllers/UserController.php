<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
        // $request->session()->flush();
        // dd('halaman profile');
    }

    public function index()
    {
        $user = User::where('status', 'active')->where('role_id', 2)->get();
        return view('user', ['user' => $user]);
    }

    public function registeredUser()
    {
        $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUser' => $registeredUser]);
    }

    public function detail($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('detail-user', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('/user')->with('status', 'User berhasil diaktifkan');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('delete-user', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('/user')->with('status', 'User berhasil dihapus');
    }

    public function view()
    {
        $view = User::onlyTrashed()->get();
        return view('view-user', ['view' => $view]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('/user')->with('status', 'User berhasil dikembalikan');
    }
}
