<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $views = kehadiran::latest('jam')->take(3)->get();
        return view('pages.scan.home', compact('views'));
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
        $currentTime = Carbon::now('Asia/Jakarta');


        $siswa = siswa::with('kelas')->where('nis', $request->StudentNumber)->first()->id;

        if ($currentTime->format('H:i') >= "07:00") {

            $data = kehadiran::all()
                ->where('id_siswa', $siswa)->first();
            $data->status = 2;
            $data->jam = $currentTime->format('H:i');
            $data->save();
        } else {
            $data = kehadiran::all()
                ->where('id_siswa', $siswa)->first();
            $data->status = 1;
            $data->jam = $currentTime->format('H:i');
            $data->save();
        }
        return response()->json([
            // 'success' => $student_exam,
            'success' => 'Absensi Sukses',
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function insert()
    {
        $coba = siswa::all();
        //$currentTime = Carbon::now('Asia/Jakarta');

        foreach ($coba as $item) {

            kehadiran::create([
                'id_siswa' => $item->id,
                'id_kelas' => $item->id_kelas,
                'status' => 0,
            ]);
        }

     return \redirect()->back();
    }
}
