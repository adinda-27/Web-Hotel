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
                    
                      <?php echo form_open_multipart('operator/new_reservasi_out_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                        <?php

                        if ($waktu==0) {

                          $total_bayar = $harga_kamar * 0.5;

                        }
                        else {

                          $total_bayar = $harga_kamar * $waktu;
                        }



                        ?>
                        <input type="hidden" name="waktu" value="<?php echo $waktu;?>">
                        <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi;?>">
                        <input type="hidden" name="status_reservasi" value="<?php echo $status_reservasi;?>">
                        <input type="hidden" name="id_kamar" value="<?php echo $id_kamar;?>">
                        <h3 class="form-section">Informasi</h3>
                        <hr>
                        <div class="card-body">
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama_reservasi" value="<?php echo $nama_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Telp</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="tlp_reservasi" value="<?php echo $tlp_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Alamat</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="alamat_reservasi" value="<?php echo $alamat_reservasi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                        
                          
                        </div>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Tanggal Masuk</label>
                              <div class="col-md-9">
                                 <input class="form-control form-control-inline input-medium date-picker" name="tgl_reservasi_masuk" id="tgl_reservasi_masuk" size="16" type="text" value="<?php echo tgl_indo($tgl_reservasi_masuk);?>" disabled/>
                                                              
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Tanggal Keluar</label>
                              <div class="col-md-9">
                                 <input class="form-control form-control-inline input-medium date-picker" name="tgl_reservasi_keluar" id="tgl_reservasi_keluar" size="16" type="text" value="<?php echo tgl_indo($tgl_reservasi_keluar);?>" disabled/>
                                                              
                              </div>
                            </div>
                          </div>
                          
                        </div>
                    
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Kamar</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="no_kamar" value="<?php echo $no_kamar;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Harga Kamar/hari</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="harga_kamar" value="<?php echo rupiah($harga_kamar);?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>

                        <h3 class="form-section">Pembayaran</h3>
                        <hr>
                        <div class="card-body">
                          <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Total Bayar</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="total_bayar" id="total_bayar" value="<?php echo $total_bayar;?>" readonly>
                                
                              </div>
                            </div>
                          </div>

                          
                          
                        </div>

                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Uang Bayar</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="uang_bayar" id="uang_bayar" value="" >
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Uang Kembali</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="kembalian" id="kembalian" value="" >
                                
                              </div>
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
                                <button type="submit" class="btn btn-success">Bayar</button>
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