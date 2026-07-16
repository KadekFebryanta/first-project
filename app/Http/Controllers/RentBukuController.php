<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RentalLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RentBukuController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $buku = Buku::all();
        return view('rent-buku', ['users' => $users], ['buku' => $buku]);
    }

    public function store(Request $request)
    {
        $request['rental_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $buku = Buku::findOrFail($request->buku_id)->only('status');

        if ($buku['status'] != 'in stock') {
            Session::flash('message', 'Tidak bisa rental, karena buku tidak tersedia'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('rent-buku');
        }
        else {
            $count = RentalLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
            ->count();
            
            if ($count >= 3) {
                Session::flash('message', 'Tidak bisa rental, karena penyewa sudah mencapai batas rental buku'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('rent-buku');
            }
            else {
                try {
                    // process insert to rental_logs table
                    DB::beginTransaction();
                    // process update buku table    
                    RentalLogs::create($request->all());
                    $buku = Buku::findOrFail($request->buku_id);
                    $buku->status = 'not available';
                    $buku->save();
                    DB::commit();
    
                    Session::flash('message', 'Buku berhasil dirental!!'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect('rent-buku');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBuku ()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $buku = Buku::all();
        return view('return-buku', ['users' => $users, 'buku' => $buku]);
    }

    public function save (Request $request)
    {
        $rent = RentalLogs::where('user_id', $request->user_id)->where('buku_id', $request->buku_id)
        ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            // akan return buku
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Buku berhasil dikembalikan !!'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('return-buku');
        } else {
            // eror notifikasi muncul
            Session::flash('message', 'Gagal mengembalikan buku !!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('return-buku');
        }
    }
}
