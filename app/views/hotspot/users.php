<div class="content-mikman text-center">
  <h4>List Hotspot User</h4>
</div>

  <div class="menu-under-responsive text-center">
    <span class="badge badge-info" id="btnlist"><a class="normal">List</a></span>
    <span class="badge badge-info" id="btnadd"><a class="normal">Add</a></span>
    <span class="badge badge-info" id="btn-generate"><a class="normal">Generate</a></span>
  </div>

	<!-- List User -->
  <div class="content-mikman" id="listuser">
		<div class="table-responsive">
      <table class="table table-bordered" id="table">
        <thead class="bg-primary text-white">
          <tr>
            <th>Nama</th>
            <th>Profil</th>
            <th>Uptime</th>
            <th>Bytes in</th>
            <th>Bytes Out</th>
						<th>Action</th>
          </tr>
        </thead>
        <tbody>
					<?php
					if(!is_null($data['list'])){
						foreach ($data['list'] as $key => $value) {
							echo "<tr>";
							echo "<td>". $value[0] . "</td>";
							echo "<td>". $value[1] . "</td>";
							echo "<td>". $value[2] . "</td>";
							echo "<td>". $value[3] . "</td>";
							echo "<td>". $value[4] . "</td>";
							echo "<td>". $value[5] . "</td>";
							echo "</tr>";
						}
					}
					?>
        </tbody>
      </table>
    </div>
  </div>

	<!-- Add User-->
	<div class="content-mikman" id="adduser" style="display:none">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<form id="formadduser" method="POST">
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Username</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="username" id="username">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="password" id="password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Uptime</label>
						<div class="col-md-10">
							<input type="number" class="form-control" name="uptime" id="uptime">
						</div>
					</div>
					<button type="button" class="btn btn-success" id="btnaddsave">Save</button>
					<button type="button" class="btn btn-danger" id="btnaddclose">Close</button>
				</form>
			</div>
		</div>
	</div>
