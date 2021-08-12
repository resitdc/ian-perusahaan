<form action="<?= $save_url ?>" method="POST">
  <div class="box">
    <div class="modal-header box">
      <h4 class="modal-title"><?= $form_title ?></h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control">
          <?php
            foreach($list_karyawan as $karyawan){
          ?>
          <option value="<?= $karyawan['id'] ?>"><?= $karyawan['nama'] ?></option>
          <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tanggal Cuti</label>
        <input type="date" class="form-control" name="tanggal_cuti" value="<?= isset($detail_data["tanggal_cuti"]) ? $detail_data["tanggal_cuti"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="number" class="form-control" name="jumlah" value="<?= isset($detail_data["jumlah"]) ? $detail_data["jumlah"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
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
