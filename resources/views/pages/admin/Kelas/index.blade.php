  @extends('layouts.main')
  @section('content')
      @include('includes.scriptdatatable')
      <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
              <div class="dashboard-heading">
                  <h2 class="dashboard-title">kelas</h2>
                  <p class="dashboard-subtitle">
                      List of kelas
                  </p>
              </div>
              <div class="dashboard-content">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-body">
                                  <form action="/import" method="POST" enctype="multipart/form-data">
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
                                      <table class="table table-hover scroll-horizontal-vertical w-100 mb-3">
                                          <thead>
                                              <tr>
                                                  <th>No</th>
                                                  <th>Nama Kelas</th>
                                                  <th>Jumlah siswa</th>
                                                  <th>Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($data as $item)
                                                  <tr>
                                                      <td>{{ $no++ }}</td>
                                                      <td>{{ $item->kelas }}</td>
                                                      <td>{{ $item->siswa_count }}</td>
                                                      <td>
                                                          <div class="row">
                                                              <div class="col-2">
                                                                  <div class="dropdown">
                                                                      <button class="btn btn-secondary dropdown-toggle"
                                                                          type="button" id="dropdownMenuButton1"
                                                                          data-bs-toggle="dropdown" aria-expanded="false">
                                                                          Aksi
                                                                      </button>
                                                                      <ul class="dropdown-menu"
                                                                          aria-labelledby="dropdownMenuButton1">
                                                                          <li><a class="dropdown-item"
                                                                                  data-bs-toggle="modal"
                                                                                  data-bs-target="#editmodal{{ $item->id }}"
                                                                                  href="{{ route('kelas.edit', $item->id) }}">edit</a>
                                                                          </li>
                                                                          <form
                                                                              action="{{ route('kelas.destroy', $item->id) }}"
                                                                              method="post">
                                                                              @method('DELETE')
                                                                              @csrf
                                                                              <button class="dropdown-item"
                                                                                  type="submit">Delete</button>
                                                                          </form>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                              <div class="col-2">

                                                                  <a href="{{ route('detail', $item->id) }}"
                                                                      class="btn btn-primary">Detail</a>
                                                              </div>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  @include('pages.admin.Kelas.edit')
                                              @endforeach
                                          </tbody>
                                      </table>
                                      {{ $data->links('pagination::bootstrap-4') }}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
