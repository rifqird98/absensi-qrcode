@extends('layouts.main')

@section('title')
    Store Dashboard
@endsection

@section('content')
    @include('includes.scriptdatatable')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Rekap Absensi</h2>
                <p class="dashboard-subtitle">
                    List of Rekap data
                </p>
                <form class="mb-3 p-3" action="{{ route('rekap-data.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="class">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggalawal">
                    </div>
                    <div class="form-group mb-3">

                        <label for="class">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggalakhir">
                    </div>
                    <div class="form-group mb-3">
                        <label for="class">Kelas</label>
                        <select class="form-control" name="class" required>
                            <option value="all">Semua kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit">Cek Absensi</button>
                    </div>
                </form>
            </div>
            @isset($data)
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="badge bg-primary badge-md">Rekap Absen : <b>{{ $tgl['mulai'] }}</b> - <b>{{ $tgl['akhir'] }}</b>  </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover scroll-horizontal-vertical w-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>Nis</th>
                                                    <th>Nama</th>
                                                    <th>kelas</th>
                                                    <th>Jumlah Hadir</th>
                                                    <th>Jumlah Terlambat</th>
                                                    <th>Jumlah Izin</th>
                                                    <th>Jumlah Sakit</th>
                                                    <th>Jumlah Tanpa Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->siswa->first()->nis }}</td>
                                                        <td>{{ $item->siswa->first()->nama }}</td>
                                                        <td>{{ $item->siswa->first()->kelas->kelas }}</td>
                                                        <td>{{ $item->jumlah_hadir }}</td>
                                                        <td>{{ $item->jumlah_terlambat }}</td>
                                                        <td>{{ $item->jumlah_izin }}</td>
                                                        <td>{{ $item->jumlah_sakit }}</td>
                                                        <td>{{ $item->jumlah_alpha }}</td>
                                                        <td>
                                                            <a href="{{ route('detail-absen', $item->id_siswa) }}"
                                                                class="btn btn-primary">Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>

@endsection
