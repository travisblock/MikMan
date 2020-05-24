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
      <table class="table">
        <thead>
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

        </tbody>
      </table>
    </div>
  </div>
  <?php
}
