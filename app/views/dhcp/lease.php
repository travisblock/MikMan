<div class="content-mikman text-center">
  <h4>DHCP Lease</h4>
</div>

  <!-- <div class="menu-under-responsive text-center">
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users">List</a></span>
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users/add">Add</a></span>
    <span class="badge badge-primary"><a class="normal" href="<?= BASEURL; ?>users/generate">Generate</a></span>
  </div> -->

  <div class="content-mikman">
		<div class="table-responsive">
      <table class="table table-bordered" id="table">
        <thead class="bg-primary text-white">
          <tr>
            <th>Server</th>
            <th>Address</th>
            <th>Mac</th>
          </tr>
        </thead>
        <tbody>
					<?php
					if(!is_null($data['lease'])){
						foreach ($data['lease'] as $key => $value) {
							echo "<tr>";
							echo "<td>". $value['server'] . "</td>";
							echo "<td>". $value['address'] . "</td>";
							echo "<td>". $value['mac'] . "</td>";
							echo "</tr>";
						}
					}
					?>
        </tbody>
      </table>
    </div>
  </div>
