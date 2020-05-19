
      <!-- <div class="content-mikman">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div> -->

      <div class="row">
        <div class="col-md-6">
          <div class="col-lg-12 bg-light pb-3">
            <h5 class="text-center p-3">Add router</h5>
            <form method="POST" action="<?= BASEURL; ?>Router/add" id="formRouter">
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
            <h6 class="text-center">Setting roter</h6>

          </div>
        </div>
      </div>
