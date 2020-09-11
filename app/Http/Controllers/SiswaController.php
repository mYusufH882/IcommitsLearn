<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::where('role', '=', 'siswa')->get();
        return view('admin.siswa.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
            'address' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'picture' => 'default.png',
            'role' => 'siswa'
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = User::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $siswa = $user::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $user::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Diubah!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Dihapus!!!');
    }
}
