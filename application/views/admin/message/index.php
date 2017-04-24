<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="message">

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>E-mail</th>
          <th>Date</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        foreach ($message as $row) {
          $time = new DateTime($row->date);
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->email; ?></td>
            <td><?= $time->format('d/m/Y'); ?></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="<?=base_url()?>admin/message/detail/<?=$row->id_message?>" class="btn btn-primary btn-sm">Details </a>
                <a href="<?=base_url()?>admin/message/delete/<?=$row->id_message?>" class="btn btn-danger btn-sm"> Delete
                </a>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
