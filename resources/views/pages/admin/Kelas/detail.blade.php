@extends('layouts.main')

@section('title')
    Store Dashboard
@endsection

@section('content')
@include('includes.scriptdatatable')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
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
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nisn</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>No Hanphone</th>
                                        <th>Aksi</th>
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
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nis', name: 'nis' },
                { data: 'foto', name: 'foto' },
                { data: 'nama', name: 'nama' },
                { data: 'kelas.kelas', name: 'kelas.kelas' },
                { data: 'no_hp', name: 'no_hp' },
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