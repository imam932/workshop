<div class="row">
  <div class="col-md-12">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>IP Address</th>
          <th>Referrer</th>
          <th>Browser</th>
          <th>Platform</th>
          <th>Location</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        foreach ($log as $row) {
          $time = new DateTime($row->date);
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $time->format("Y/m/d") . " at " . $time->format("H:i") ?></td>
              <td><?= $row->ip ?></td>
              <td><?= $row->ref ?></td>
              <td><?= $row->browser ?></td>
              <td><?= $row->platform ?></td>
              <td><?= $row->location ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>