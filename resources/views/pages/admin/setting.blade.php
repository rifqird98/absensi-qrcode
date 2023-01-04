@extends('layouts.main')

@section('title')
    Setting
@endsection

@section('content')
<!-- Section Content -->
<div class="row p-5">
    <div class="col-12">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Pengaturan Sistem Absensi</h2>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Jam Masuk Sekolah</label>
                            <input class="form-control"  type="time" placeholder="Enter your first name" name="jammasuk" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Jam Terakhir Absen</label>
                            <input class="form-control" type="time" placeholder="Also your last name" name="jamterlambat" required>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Tahun Ajaran</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <input data-datepicker="" class="form-control" name="tahunajaran" type="text" placeholder="dd/mm/yyyy" required>                                               
                         </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender">Pilih Tahun Ajaran</label>
                        <select class="form-select mb-0" aria-label="Gender select example">
                            <option selected>Ajaran</option>
                            <option value="1">2022-2023</option>
                            <option value="2">2023-2024</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" ype="email" placeholder="name@company.com" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone">Phone Wa</label>
                            <input class="form-control" ype="number" placeholder="+12-345 678 910" required>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
            </form>
        </div>
        <div class="card card-body border-0 shadow mb-4 mb-xl-0">
            <h2 class="h5 mb-4">Alerts & Notifications</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Company News</h3>
                        <p class="small pe-4">Get Rocket news, announcements, and product updates</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="user-notification-1">
                            <label class="form-check-label" for="user-notification-1"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Account Activity</h3>
                        <p class="small pe-4">Get important notifications about you or activity you've missed</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="user-notification-2" checked>
                            <label class="form-check-label" for="user-notification-2"></label>
                        </div>                                            
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                    <div>
                        <h3 class="h6 mb-1">Meetups Near You</h3>
                        <p class="small pe-4">Get an email when a Dribbble Meetup is posted close to my location</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="user-notification-3" checked>
                            <label class="form-check-label" for="user-notification-3"></label>
                        </div> 
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection