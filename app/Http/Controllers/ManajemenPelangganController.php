<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenPelangganController extends Controller
{
    //
    public function index(){
        $member = Member::all();
        return view('pages.pelanggan.index',compact('member'));
    }

    public function json(Request $request){
        $member = Member::all();
        return DataTables::of($member)
        ->addColumn('action', function ($row) {
            $btn = '<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm">Delete</button>';
            $btn = $btn.'<a href="manajemen_pelanggan/'. $row->id .'/edit" class="m-1 edit btn btn-primary btn-sm">Edit</a>';
            return $btn;
        })->toJson();
    }

    public function create(){
        return view('pages.pelanggan.create');
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
       $request->validate([
           'nama' => 'required',
           'alamat' => 'required',
           'jenis_kelamin' => 'required',
           'tlp' => 'required',
       ]);
       Member::create($request->all());
       Alert::success('Berhasil', 'Data berhasil disimpan');
       return redirect()->route('manajemen_pelanggan.index');
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
        $member = Member::findOrFail($id);
        return view('pages.pelanggan.edit',compact('member'));
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
        $data = $request->all();
        $member = Member::findOrFail($id);

        $member->update($data);
        Alert::success('Berhasil', 'Data member berhasil diperbarui');
        return redirect()->route('manajemen_pelanggan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::findOrFail($id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        $data->delete();
    }
}
