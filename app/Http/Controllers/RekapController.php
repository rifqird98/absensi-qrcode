<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\kelas;
use App\Models\Rekap;
use App\Models\kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = kelas::all();
        return view('pages.admin.rekap-absensi.index', compact('kelas'));
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

        $kelas = kelas::all();
        $tgl = [
            'mulai' => $request->tanggalawal,
            'akhir' => $request->tanggalakhir
        ];
        if ($request->class == 'all') {
            $data = Rekap::with(['siswa.kelas'])
                ->select(DB::raw('id_siswa,
                SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as jumlah_hadir, 
                SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as jumlah_terlambat, 
                SUM(CASE WHEN keterangan = "izin" THEN 1 ELSE 0 END) as jumlah_izin, 
                SUM(CASE WHEN keterangan = "sakit" THEN 1 ELSE 0 END) as jumlah_sakit, 
                SUM(CASE WHEN keterangan = "alpha" THEN 1 ELSE 0 END) as jumlah_alpha'))
                ->whereBetween('tanggal', [$request->tanggalawal, $request->tanggalakhir])
                ->groupBy('id_siswa')
                ->get();
            return view('pages.admin.rekap-absensi.index', compact('data', 'kelas','tgl'));
        } else {
            $data = Rekap::with(['siswa.kelas'])
                ->select(DB::raw('id_siswa,
                SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as jumlah_hadir, 
                SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as jumlah_terlambat, 
                SUM(CASE WHEN keterangan = "izin" THEN 1 ELSE 0 END) as jumlah_izin, 
                SUM(CASE WHEN keterangan = "sakit" THEN 1 ELSE 0 END) as jumlah_sakit, 
                SUM(CASE WHEN keterangan = "alpha" THEN 1 ELSE 0 END) as jumlah_alpha'))
                ->whereBetween('tanggal', [$request->tanggalawal, $request->tanggalakhir])
                ->where('id_kelas', $request->class)
                ->groupBy('id_siswa')
                ->get();

            return view('pages.admin.rekap-absensi.index', compact('data', 'kelas','tgl'));
        }
    }

    public function detail($id)
    {

        $data = Rekap::all()->where('id_siswa', $id);
        return view('pages.admin.rekap-absensi.detail', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
}
