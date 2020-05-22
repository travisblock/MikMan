      <div class="row">
        <div class="col-md-6">
          <div class="col-lg-12 bg-light pb-3">
            <h5 class="text-center p-3">Add router</h5>
            <form method="POST" action="<?= BASEURL; ?>ControlRouter/add" id="formRouter">
              <div class="form-group row">
                <label class="col-lg-2 col-form-label">IP</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="ip" id="ip">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label">User</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="user" id="user">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                  <input type="password" class="form-control" name="pass" id="pass">
                </div>
              </div>
              <button type="button" class="btn btn-success" id="save">Save</button>
              <button type="submit" class="btn btn-primary">Connect</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-lg-12 bg-light">
            <h6 class="text-center">Setting Admin</h6>
          </div>
        </div>
      </div>
