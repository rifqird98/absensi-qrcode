<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            // $query = Product::with(['user', 'category']);
            $data = siswa::with('kelas');
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group dropup">
                            <div class="dropdown">
                            <button type="button" 
                            class="btn btn-primary dropdown-toggle mr-1 mb-1"
                            type="button" 
                            id="action' .  $item->id . '" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"> 
                            Aksi
                            </button>
                            
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('siswa.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('siswa.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('foto', function ($item) {
                    return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 40px;"/>' : '';
                })
                ->editColumn('qrcode', function ($item) {
                    return $item->nis ? QrCode::generate($item->nis)  : '';
                })
                ->rawColumns(['action','foto','qrcode'])
                ->make();
        }

        return view('pages.admin.siswa.index');

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
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        //
    }

    
    public function importSiswa(Request $request)
    {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataSiswa', $namafile);


        Excel::import(new SiswaImport, \public_path('/DataSiswa/'.$namafile));

        return \redirect()->back();
    }
}
