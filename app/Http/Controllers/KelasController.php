<?php

namespace App\Http\Controllers;

use App\Imports\KelasImport;
use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $no = 1;
        $data = kelas::withCount('siswa')->paginate(10); 
        return view('pages.admin.kelas.index', compact('data', 'no'));
    }

    public function detail(Request $request, $id)
    {
        if (request()->ajax()) {
            // $query = Product::with(['user', 'category']);
            $data = siswa::with('kelas')->where('id_kelas',$id);
            
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
                ->rawColumns(['action','foto'])
                ->make();
        }

        return view('pages.admin.kelas.detail');

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
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = kelas::findOrFail($id);

        $item->update($data);

        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas)
    {
        $data = kelas::findOrFail($kelas);
        $data->delete();

        return \redirect()->back();
    }

    public function import(Request $request)
    {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataKelas', $namafile);


        Excel::import(new KelasImport, \public_path('/DataKelas/'.$namafile));

        return \redirect()->back();
    }
}
