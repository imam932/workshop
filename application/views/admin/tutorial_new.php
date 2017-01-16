<!-- Page Heading -->
<div class="row">
  <div class="col-lg-9">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
          <input type="text" name="title" class="form-control" id="" placeholder="Title">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
          <select class="form-control" name="">
            <option value="">Category</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <textarea name="description" class="form-control summernote"></textarea>
    </div>

    <div class="right">
      <input type="submit" name="simpan" id="input" class="btn btn-primary" value="Upload">
      <a href="<?= base_url() ?>admin/Tutorial" class="btn btn-danger">Cancel</a>
    </div>
  </div>
</div>
