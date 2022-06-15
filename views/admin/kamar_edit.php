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
            Edit Kamar</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($kamar as $k){ ?>
              <form method="post" action="<?php echo base_url().'admin/kamar_edit_aksi'; ?>">
                  <div class="form-group">
                      <label class="control-label col-md-3">Kelas Kamar</label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $k->id_kamar; ?>" name="id_kamar">
                      <select name="id_kelas_kamar" class="form-control">
                        <option value="<?php echo $k->id_kelas_kamar; ?>"> kelas saat ini : <?php echo $k->nama_kelas_kamar ?></option>
                        <?php foreach ($kelas_kamar as $kk) {?>
                          <option value="<?php echo $kk->id_kelas_kamar; ?>"><?php echo $kk->nama_kelas_kamar ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor Kamar</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="no_kamar" value="<?php echo $k->no_kamar; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Harga Kamar</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="harga_kamar" value="<?php echo $k->harga_kamar; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Keterangan Kamar</label>
                       <div class="col-md-9">
                            <textarea type="textarea" id="summernote" rows="10" class="form-control" name="fasilitas_kamar" value=""><?php echo $k->fasilitas_kamar; ?></textarea>
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