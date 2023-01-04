
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btng-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('users.store') }}" method="POST">
                  @method('POST')
                  @csrf
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="name" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email User</label>
                            <input type="text" class="form-control" name="email" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Password User</label>
                            <input type="password" class="form-control" name="password" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Roles</label>
                            <select name="role" required class="form-control">
                                <option value="admin">Admin</option>
                                <option value="scan">Scanner</option>
                                <option value="staf">Guru Staf</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="row my-3">
                        <div class="col text-right">
                          <button
                            type="submit"
                            class="btn btn-primary px-5"
                          >
                            Save Now
                          </button>
                        </div>
                    </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>