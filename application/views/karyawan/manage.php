<form action="<?= $save_url ?>" method="POST">
  <div class="box">
    <div class="modal-header box">
      <h4 class="modal-title"><?= $form_title ?></h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>NIP</label>
        <input type="text" class="form-control" name="nip" value="<?= isset($detail_data["nip"]) ? $detail_data["nip"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control" name="nik" value="<?= isset($detail_data["nik"]) ? $detail_data["nik"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= isset($detail_data["nama"]) ? $detail_data["nama"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="pria">Laki - Laki</option>
          <option value="wanita">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" value="<?= isset($detail_data["tempat_lahir"]) ? $detail_data["tempat_lahir"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= isset($detail_data["tanggal_lahir"]) ? $detail_data["tanggal_lahir"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Telp</label>
        <input type="text" class="form-control" name="telpon" value="<?= isset($detail_data["telpon"]) ? $detail_data["telpon"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Agama</label>
        <input type="text" class="form-control" name="agama" value="<?= isset($detail_data["agama"]) ? $detail_data["agama"] : "" ?>" <?= $detail ? "readonly" : "" ?>>
      </div>
      <div class="form-group">
        <label>Status Nikah</label>
        <select name="status_nikah" class="form-control">
          <option value="belum nikah">Belum Nikah</option>
          <option value="nikah">Nikah</option>
        </select>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= isset($detail_data['alamat']) ? $detail_data['alamat'] : "" ?></textarea>
      </div>
      <div class="form-group">
        <label>Golongan</label>
        <select name="golongan_id" class="form-control">
          <?php
            foreach($list_golongan as $golongan){
          ?>
          <option value="<?= $golongan['id'] ?>"><?= $golongan['nama_golongan'] ?></option>
          <?php
            }
          ?>
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
