<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Kelas Kamar</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($kelas_kamar as $kk){ ?>
              <form method="post" action="<?php echo base_url().'kamar_kelas/kamar_kelas_edit_aksi'; ?>">
                  <div class="form-group">
                    <label class="control-label col-md-3">Kelas Kamar</label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $kk->id_kelas_kamar; ?>" name="id_kelas_kamar">
                            <input type="text" class="form-control" placeholder="" name="nama_kelas_kamar" value="<?php echo $kk->nama_kelas_kamar; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="UPDATE">
                        </div>
                  </div>
              </form>
              <?php } ?>
        
            
          </div>
        </div>
        
      </div>

   </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>