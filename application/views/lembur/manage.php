<form action="<?= $save_url ?>" method="POST">
  <div class="box">
    <div class="modal-header box">
      <h4 class="modal-title"><?= $form_title ?></h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>NIP</label>
        <input type="text" class="form-control" name="nama_golongan" value="<?= isset($detail_data["nama_golongan"]) ? $detail_data["nama_golongan"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control" name="nama_golongan" value="<?= isset($detail_data["nama_golongan"]) ? $detail_data["nama_golongan"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama_golongan" value="<?= isset($detail_data["nama_golongan"]) ? $detail_data["nama_golongan"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="" class="form-control">
          <option value="pria">Laki - Laki</option>
          <option value="wanita">Perempuan</option>
        </select>
      </div>


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <?php
      if(!$detail){
      ?>
      <button type="button" class="btn btn-primary" onclick="saveData(this)">Save changes</button>
      <?php
      }
      ?>
    </div>
  </div>
</form>
