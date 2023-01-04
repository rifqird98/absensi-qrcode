@extends('layouts.laravel-nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 text-center">
                <div class="card border-light mb-3">
                    <div class="card-header">Scan QrCode</div>
                    <div class="card-body">
                        <input id="Student_Number" disabled type="text" class="form-control shadow-none rounded-0 mb-3"
                            name="Student_Number" value="{{ old('Student_Number') }}" required autocomplete="Student_Number"
                            placeholder="Student Number scan">
                        {{-- Qrcode --}}
                        <video id="preview" class="w-100"></video>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <form action="/insert" method="GET">
                                @csrf
                                <button class="btn btn-primary">Insert Data Absensi</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="StudentExamTable">
                            @isset($views)
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="row">#</th>
                                            <th scope="row">Nama</th>
                                            <th scope="row">Kelas</th>
                                            <th scope="row">Jam Hadir</th>
                                            <th scope="row">Present</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($views as $item)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $item->siswa->first()->nama }}</td>
                                                <td>{{ $item->kelas->first()->kelas }}</td>
                                                <td>{{ $item->jam }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-success">Hadir</span>
                                                    @elseif($item->status == 2)
                                                        <span class="badge bg-warning">Terlambat</span>
                                                    @else
                                                        <span class="badge bg-danger">Belum Absen</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script type="text/javascript">
        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 5,
            mirror: false
        });

        scanner.addListener('scan', function(content) {
            // alert(content);
            document.getElementById('Student_Number').value = content;
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let StudentNumber = content;
                // console.log(StudentNumber);
                var data = {

                    'StudentNumber': StudentNumber,

                };
                $.ajax({
                    type: "POST",
                    url: `scanQrcode`,
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $("#StudentExamTable").load(location.href + " #StudentExamTable");
                        toastr.success(response.success);
                    }
                });
            });
            //window.location.href=content;
        });


        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    </script>
@endpush
