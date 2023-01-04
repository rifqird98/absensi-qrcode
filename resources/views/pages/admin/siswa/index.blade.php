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
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">
                    List of Product
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <a href="{{  route('product.create') }}" class="btn btn-primary mb-3">
                                + Tambah Product Baru
                            </a> --}}
                                <form action="/import-siswa" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <p><i>*masukkan file excel</i></p>
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="file" name="file" class="form-control mb-3" required>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="card border-0 shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0 rounded"
                                                id="crudTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="border-0 rounded-start">ID</th>
                                                        <th class="border-0">QrCode</th>
                                                        <th class="border-0">Nisn</th>
                                                        <th class="border-0">Foto</th>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Kelas</th>
                                                        <th class="border-0">No Hanphone</th>
                                                        <th class="border-0">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('addon-script')
    <script>
        // AJAX DataTablenn
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'qrcode',
                    name: 'qrcode'
                },
                {
                    data: 'nis',
                    name: 'nis'
                },
                {
                    data: 'foto',
                    name: 'foto'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'kelas.kelas',
                    name: 'kelas.kelas'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
