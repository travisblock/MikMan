<div class="content-mikman text-center">
  <h4><?= ucfirst($data['menu']); ?> Hotspot User</h4>
</div>

  <div class="menu-under-responsive text-center">
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users">List</a></span>
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users/add">Add</a></span>
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users/generate">Generate</a></span>
  </div>

<?php
if($data['menu'] == "list"){
  ?>
  <div class="content-mikman">
    <div class="table responsive">
			<div id="alert_message"></div>
      <table class="table table-bordered" id="tableUser">
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
        <tbody id="tableData">
					<!-- <tr>
						<td>User1</td>
						<td>Server1</td>
						<td>10m</td>
						<td>1024</td>
						<td>512</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td>udin2</td>
						<td>Server1</td>
						<td>10m</td>
						<td>1024</td>
						<td>512</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td>Umam3</td>
						<td>Server1</td>
						<td>10m</td>
						<td>1024</td>
						<td>512</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td>Mamu4</td>
						<td>Server1</td>
						<td>10m</td>
						<td>1024</td>
						<td>512</td>
						<td>Delete</td>
					</tr> -->
        </tbody>
      </table>
    </div>
  </div>
  <?php
}
