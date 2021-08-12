<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>List Data</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Golongan</h3>
      <button type="button" class="btn btn-sm btn-primary float-right" data-source="<?= $form_add; ?>" data-id="" data-toggle="tooltip" title="Add Data" onClick="open_form(this);">Add Data</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="30px">No</th>
          <th>Nama</th>
          <th width="30%">Gaji Pokok</th>
          <th width="220px">Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach($list_data as $detail) {
          ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $detail['nama_golongan']; ?></td>
            <td><?= $detail['gaji_pokok']; ?></td>
            <td>
              <button type="button" class="btn btn-info btn-sm" data-source="<?= $form_detail; ?>" data-id="<?= $detail['id'] ?>" data-toggle="tooltip" title="Add Data" onClick="open_form(this);"> DETAIL </button>
              <button type="button" class="btn btn-success btn-sm" data-source="<?= $form_edit; ?>" data-id="<?= $detail['id'] ?>" data-toggle="tooltip" title="Add Data" onClick="open_form(this);"> EDIT </button>
              <button type="button" class="btn btn-danger btn-sm" data-id="<?= $detail["id"] ?>"> DELETE </button>
            </td>
          </tr>
          <?php
            $i++;
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>