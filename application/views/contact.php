<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8">
    <p>
      Kami akan merasa sengang apabila anda berkenan memberikan masukan, saran,
      ataupun kritikan yang bersifat membangun yang berkaitan dengan <b>Workshop Riset Informatika</b>,
      untuk memberikan masukan, saran, maupun kritikan, anda dapat menuliskan pada kotak form di bawah ini.
      Silahkan tuliskan identitas anda seperti Nama, E-mail, dan pesan yang ingin di sampaikan.<br>
      Apabila ada pertanyaan seputar <b>Workshop Riset Informatika</b>
      dapat menghubungi contant yang tertera di samping.
    </p>
    <hr>

    <?php if(isset($message)) { ?>
    <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

    <?php if(isset($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form class="" action="<?= base_url() ?>Contact/sendMessage" method="post">
      <div class="form-group">
        <div class="form-inline">
          <div class="form-group">
            <label for="Nama">Nama <b class="red">*</b></label>
            <input type="text" name="name" class="form-control" id="" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="E-mail">E-Mail <b class="red">*</b></label>
            <input type="email" name="email" class="form-control" id="" placeholder="example@gmail.com">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="Pesan">Pesan <b class="red">*</b></label>
        <textarea name="message" class="form-control" rows="4" cols="80" placeholder="Pesan yang ingin di sampaikan"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">KIRIM</button>
    </form>
  </div>

  <div class="row col-lg-4 col-md-4 col-sm-4">
    <div class="container-fluid contact_panel">
      <label for="email" class="contact">E-Mail</label>
      <p>wripolinema@gmail.com</p>
      <hr>
      <label for="Telepon" class="contact">Telepon</label>
      <p>085-730-269-938</p>
      <hr>
      <label for="Alamat" class="contact">Alamat</label>
      <p>Jl. Soekarno Hatta No. 9 Malang, <br>
        Politeknik Negeri Malang</p>
        <hr>
      </div>
    </div>
  </div>
