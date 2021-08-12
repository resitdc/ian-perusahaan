<form action="<?= $save_url ?>" method="POST">
  <div class="box">
    <div class="modal-header box">
      <h4 class="modal-title"><?= $form_title ?></h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama Golongan</label>
        <input type="text" class="form-control" name="nama_golongan" value="<?= isset($detail_data["nama_golongan"]) ? $detail_data["nama_golongan"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Gaji Pokok</label>
        <input type="number" class="form-control" name="gaji_pokok" value="<?= isset($detail_data["gaji_pokok"]) ? $detail_data["gaji_pokok"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Tunjangan Istri</label>
        <input type="number" class="form-control" name="tunjangan_istri" value="<?= isset($detail_data["tunjangan_istri"]) ? $detail_data["tunjangan_istri"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Tunjangan Anak</label>
        <input type="number" class="form-control" name="tunjangan_anak" value="<?= isset($detail_data["tunjangan_anak"]) ? $detail_data["tunjangan_anak"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Tunjangan Transport</label>
        <input type="number" class="form-control" name="tunjangan_transport" value="<?= isset($detail_data["tunjangan_transport"]) ? $detail_data["tunjangan_transport"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Tunjangan Makan</label>
        <input type="email" class="form-control" name="tunjangan_makan" value="<?= isset($detail_data["tunjangan_makan"]) ? $detail_data["tunjangan_makan"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
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
