<?php
$i = 1;
foreach($list_data as $detail) {
?>
<tr>
  <td><?= $i; ?></td>
  <td><?= $detail['nik']; ?></td>
  <td><?= $detail['nama']; ?></td>
  <td><?= $detail['tanggal_lembur']; ?></td>
  <td><?= $detail['jumlah']; ?></td>
  <td>
    <button type="button" class="btn btn-success btn-sm" data-source="<?= $form_edit; ?>" data-id="<?= $detail['id'] ?>" data-toggle="tooltip" title="Add Data" onClick="open_form(this);"> EDIT </button>
    <button type="button" class="btn btn-danger btn-sm" delete-url="<?= $delete_url; ?>" data-id="<?= $detail["id"] ?>" onclick="openModalDelete(this)"> DELETE </button>
  </td>
</tr>
<?php
  $i++;
  }
?>