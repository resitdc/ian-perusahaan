<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Perusahaan</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?= base_url("assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"); ?>">

  <link rel="stylesheet" href="<?= base_url("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/plugins/daterangepicker/daterangepicker.css"); ?>">

  <script src="<?= base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/moment/moment.min.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.js"); ?>"></script>
  <script src="<?= base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"); ?>"></script>
  
  <script src="<?= base_url("assets/plugins/sweetalert2/sweetalert2.min.js"); ?>"></script>

  <script src="<?= base_url("assets/dist/js/adminlte.js"); ?>"></script>
  <script src="<?= base_url("assets/dist/js/pages/dashboard.js"); ?>"></script>
  <script>
    function openModalDelete(myObject) {
      const modalDelete = $("#modal-delete");
      const primaryKey = $(myObject).data("id");
      let deleteUrl = $(myObject).attr("delete-url");
      modalDelete.attr("delete-url", deleteUrl);
      modalDelete.attr("primary-key", primaryKey);

      $("#modal-delete").modal('show');
    }

    function deleteData(myObject) {
      let myModal = $(myObject).parents("div.modal");
      let deleteUrl = myModal.attr("delete-url");
      let primaryKey = myModal.attr("primary-key");

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
      $.ajax({
        type      : "GET",
        url       : deleteUrl,
        data      : { id: primaryKey },
        dataType  : 'JSON',
        success: function(response){
          if(response.success){
            $("#modal-delete").modal("toggle");            
            Toast.fire({
              type: 'info',
              title: response.message
            });
            getData(response.table);
          }else{
            Toast.fire({
              type: 'warning',
              title: response.message
            });
          }
        },
        error: function(){
          Toast.fire({
            type: 'error',
            title: "TERJADI KESALAHAN TIDAK TERDUGA"
          });
        }
      })
    }

    function getData(tableUrl, reload) {
      const tableSettings = {
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true,
      };
      $.ajax({
        type      : "GET",
        url       : tableUrl,
        dataType  : 'HTML',
        success: function(response){
          $("#tableData tbody").html(response);
          // let tableData = $('#tableData').DataTable(tableSettings);
        },
        error: function(){
          
        }
      })
    }
    function saveData(myNode){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      let myModal = $(myNode).parents("div.modal");
      let myForm = $(myNode).parents("form");
      let formData = myForm.serialize();
      let formMethod = myForm.attr("method")
      let formAction = myForm.attr("action")
      
      $.ajax({
        type      : formMethod,
        url       : formAction,
        data      : formData,
        dataType  : 'JSON',
        success: function(response){
          if(response.success){
            $(myModal).modal("toggle");            
            Toast.fire({
              type: 'info',
              title: response.message
            });
            getData(response.table);
          }else{
            Toast.fire({
              type: 'warning',
              title: response.message
            });
          }
        },
        error: function(){
          Toast.fire({
            type: 'error',
            title: "TERJADI KESALAHAN TIDAK TERDUGA"
          });
        }
      })
    }
    function open_form(a) {
      var t = $(a).attr("data-source"),
        i = $(a).attr("data-frame");
        if (void 0 === (e = $(a).attr("data-id"))) var e = "";
        if ("large" == i) i = "#modal-large";
        else i = "#modal-default";
        void 0 === t ? bootbox.alert("data target tidak ditemukan!!<br>Harap periksa button form anda.") : ($(i).modal({
            backdrop: "static",
            keyboard: !1
        }), $(i).find(".modal-content").html('<div class="box"><div class="modal-body"></div><div class="overlay"><i class="fa fa-spinner fa-spin"></i></div></div>'), $.ajax({
            url: t,
            data: {
                id: e
            },
            dataType: "html",
            type: "POST",
            success: function(a) {
                $("div .overlay:last").remove(), "LOGINFORM" == a.substring(4, 13) || "quick_login" == a.substring(1, 12) ? location.reload() : $(i).find(".modal-content").html(a)
            },
            error: function(a) {
                $("div .overlay:last").remove(), $(i).modal("toggle");
                var t = a.responseText;
                "" == t ? bootbox.alert("Maaf, telah terjadi kesalahan dalam sistem!!") : "quick_login" == t || "quick_login" == t.substring(1, 12) || "LOGINFORM" == t.substring(4, 13) ? location.reload() : bootbox.alert(t), $("body").css("margin", "0")
            }
        }))
    }
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url("assets/images/logo.png") ?>" alt="PERUSAHAAN LOGO" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url("assets/images/logo.png"); ?>" alt="PERUSAHAAN LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WEB PERUSAHAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url() ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url("karyawan") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url("golongan") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Golongan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= site_url("lembur") ?>" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Lembur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url("cuti") ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Cuti
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url("penggajian") ?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Penggajian
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="modal fade" id="modal-delete" delete-url="" primary-key="">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class= "modal-body">
          <h3 class="text-center">Are you sure want delete this data ?</h2>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
          <button type="button" class="btn btn-danger" onclick="deleteData(this)">YES</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <div class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" id="modal-large">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-search">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
  </div>
  <div class="content-wrapper">
    <?= isset($contents)?$contents:'' ?>
  </div>
</div>
</body>
</html>
