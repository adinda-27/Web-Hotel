<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("operator/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("operator/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("operator/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
    <?php //$this->load->view("operator/_partials/breadcrumb.php") ?>

   

    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-success">
           
            <i class="fas fa-table"></i>
            Proses Check Out</div>
          
          <div class="card-body">
              
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                    
                      <?php echo form_open_multipart('operator/new_reservasi_perpanjang_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">

                        <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi;?>">
                        <h3 class="form-section"></h3>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Tanggal Masuk</label>
                              <div class="col-md-9">
                                 <input class="form-control form-control-inline input-medium date-picker" name="tgl_reservasi_masuk" id="tgl_reservasi_masuk" size="16" type="text" value="<?php echo $tgl_reservasi_masuk;?>" readonly/>
                                                              
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Tanggal Keluar</label>
                              <div class="col-md-9">
                                <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control" type="text" name="tgl_reservasi_keluar" id="tgl_reservasi_keluar" placeholder="Tanggal Perpanjang" autocomplete="off" value="<?php echo $tgl_reservasi_keluar;?>">

                                            

                                                        </div>
                                                              
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Nomer Kamar</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="no_kamar" value="<?php echo $no_kamar;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama_reservasi" value="<?php echo $nama_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Tlp</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="tlp_reservasi" value="<?php echo $tlp_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Alamat</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="alamat_reservasi" value="<?php echo $alamat_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        


                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Perpanjang</button>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                    <?php echo form_close();?>  
                    

          </div>
        </div>
      </div>

    

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("operator/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("operator/_partials/scrolltop.php") ?>
<?php $this->load->view("operator/_partials/modal.php") ?>
<?php $this->load->view("operator/_partials/js.php") ?>

</body>
</html>