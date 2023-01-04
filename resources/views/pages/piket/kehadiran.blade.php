@extends('layouts.laravel-nav')
@section('title')
    Scanner Absensi
@endsection
@section('content')
    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('kehadiran.store') }}" method="POST">
                            @csrf
                            <div class="form-group p-2">
                                <label for="class">Kelas</label>
                                <select class="form-control" id="class" name="class" required>
                                    <option value="all">Semua kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-2">
                                <label for="option">Keterangan</label>
                                <select class="form-control" id="option" name="keterangan" required>
                                    <option value="1">Hadir</option>
                                    <option value="0">Belum Absen</option>
                                </select>
                            </div>
                            <div class="float-right form-group p-2">
                                <button class="btn btn-primary" type="submit">Cari Data</button>
                            </div>
                        </form>

                    </div>
                </div>
                {{-- @isset($data) --}}
                <div class="card mt-3">
                    <div class="card-header">
                        @if ($jumlah_ket == 0)
                            <a href="{{ route('rekap') }}" class="btn btn-primary"> Simpan Data</a>
                            @else
                            <i>* input semua keterangan jangan sampai ada  data <b>belum absen</b>
                            <br>* Jika data keterangan sudah terisi semua maka akan muncul tombol simpan data
                            <br>* Silahkan diklik untuk merekap data absensi
                            </i>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>kelas</th>
                                            <th>status</th>
                                            <th>Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp

                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $item->siswa->first()->nis }}</td>
                                                <td>{{ $item->siswa->first()->nama }}</td>
                                                <td>{{ $item->kelas->first()->kelas }}</td>
                                                <td>
                                                    @if ($item->keterangan == null)
                                                        @if ($item->status == 1)
                                                            <span class="badge badge-lg bg-success">Hadir</span>
                                                        @elseif($item->status == 2)
                                                            <span class="badge badge-lg bg-warning">Terlambat</span>
                                                        @else
                                                            <span class="badge badge-lg bg-danger">Belum Absen</span>
                                                        @endif
                                                    @elseif($item->keterangan == 'izin')
                                                        <span class="badge badge-lg bg-success"> Izin </span>
                                                    @elseif($item->keterangan == 'sakit')
                                                        <span class="badge badge-lg bg-warning">Sakit</span>
                                                    @else
                                                        <span class="badge badge-lg bg-danger">Alpha</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <a href="{{ route('keterangan', $item->id) }}?keterangan=izin"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fa fa-check">I</i>
                                                        </a>
                                                        <a href="{{ route('keterangan', $item->id) }}?keterangan=sakit"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-times">S</i>
                                                        </a>
                                                        <a href="{{ route('keterangan', $item->id) }}?keterangan=alpha"
                                                            class="btn btn-danger  btn-sm">
                                                            <i class="fa fa-times">A</i>
                                                        </a>
                                                    @else
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endisset --}}
            </div>
        </div>
    </div>
@endsection
