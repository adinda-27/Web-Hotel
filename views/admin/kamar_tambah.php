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
            Tambah Kamar</div>

          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url().'admin/kamar_tambah_aksi'; ?>">
                  <div class="form-group">
                      <label class="control-label col-md-3">Kelas Kamar</label>
                      <div class="col-md-9">
                      <select name="id_kelas_kamar" class="form-control">
                        <option value="id_kelas_kamar">-Pilih Kelas Kamar-</option>
                        <?php foreach ($kelas_kamar as $kk) {?>
                          <option value="<?php echo $kk->id_kelas_kamar; ?>"><?php echo $kk->nama_kelas_kamar ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor Kamar</label>
                       <div class="col-md-9">
                            <input type="number" class="form-control" placeholder="masukkan nomor kamar" name="no_kamar" min="1">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Harga Kamar</label>
                       <div class="col-md-9">
                            <input type="number" class="form-control" placeholder="masukkan harga kamar" name="harga_kamar" min="1">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Keterangan Kamar</label>
                       <div class="col-md-9">
                            <textarea name="fasilitas_kamar" rows="10" id="summernote" ></textarea>

                        </div>
                  </div>
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="SAVE">
                        </div>
                  </div>
              </form>
        
            
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