<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\kelas;
use App\Models\Rekap;
use App\Models\siswa;
use App\Models\kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $jumlah_ket = kehadiran::all()->where('keterangan', '=', null)->count();

        $kelas = kelas::all();
        $data  = kehadiran::with(['kelas', 'siswa'])->get();
        return view('pages.piket.kehadiran', compact('kelas', 'data','jumlah_ket'));
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
        //hadir

        $jumlah_ket = kehadiran::all()->where('keterangan','=',null)->count();

        if ($request->keterangan == 1 && $request->class != 'all') {

            $data = kehadiran::with(['kelas', 'siswa'])
                ->where('id_kelas', $request->class)
                ->whereIn('status', [1, 2])
                ->get();
        } elseif ($request->keterangan == 0 && $request->class != 'all') {

            $data = kehadiran::with(['kelas', 'siswa'])
                ->where('id_kelas', '=', $request->class)
                ->where('status', 0)
                ->get();
        } elseif ($request->class == 'all' && $request->keterangan == 1) {

            $data = kehadiran::with(['kelas', 'siswa'])->where('status', $request->keterangan)->orWhere('status', 2)->get();
        } elseif ($request->class == 'all' && $request->keterangan == 0) {

            $data = kehadiran::with(['kelas', 'siswa'])->where('status', $request->keterangan)->get();
        }

        $kelas = kelas::all();
        return view('pages.piket.kehadiran', compact('data', 'kelas','jumlah_ket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(kehadiran $kehadiran)
    {
        //
    }

    public function keterangan(Request $request, $id)
    {
        $item = kehadiran::findOrFail($id);
        $item->keterangan = $request->keterangan;
        $item->save();

        return \redirect()->back();
    }

    public function rekap()
    {
        $currentDate = Carbon::now('Asia/Jakarta');
        $currentDate->toDateString();
        $tanggal = date("y-m-d", strtotime($currentDate));

        $data = kehadiran::all();
        foreach ($data as $item) {

            Rekap::create([
                'id_siswa' => $item->id_siswa,
                'id_kelas' => $item->id_kelas,
                'jam' => $item->jam,
                'tanggal' => $tanggal,
                'status' => $item->status,
                'keterangan' => $item->keterangan
            ]);
        }

        kehadiran::truncate();
        return \redirect()->back();
    }
}
