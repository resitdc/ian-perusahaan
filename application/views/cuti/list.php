<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>List Cuti</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Lembur</h3>
      <button type="button" class="btn btn-sm btn-primary float-right" data-source="<?= $form_add; ?>" data-id="" data-toggle="tooltip" title="Add Data" onClick="open_form(this);">Add Data</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tableData" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="30px">No</th>
          <th>NIK Karyawan</th>
          <th>Nama Karyawan</th>
          <th>Tanggal Cuti</th>
          <th>Jumlah</th>
          <th width="220px">Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>

<script>
  $(function () {
    getData("<?= $table ?>");
  });
</script>