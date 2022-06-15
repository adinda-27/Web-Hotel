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
        
        <form action="<?php echo base_url().'admin/kamar_gambar_tambah_aksi' ?>" method="post" enctype="multipart/form-data">
          
          <div class="form-group">
                <div class="col-md-9">
                    <label class="font-weight-bold">Gambar</label>
                    <input type="hidden" value="<?php echo $id_kamar; ?>" name="id_kamar">
                    <input type="file" class="form-control" name="nama_kamar_gambar" required="required">
                </div>
          </div>
          <div class="form-group">
                  <div class="col-md-9">
                      NOTE!
                  </div>
          </div>
          <div class="form-group">
                  <div class="col-md-9">
                      File hanya dalam format gif,jpg,png,jpeg dengan max size 3 MB, File gambar tidak boleh kosong
                  </div>
            </div>
          
          <div class="form-group">
                  <div class="col-md-9">
                            <input type="submit" name="submit" class="btn btn-success " value="UPDATE">
                  </div>
          </div>
      </form>
        </div>
        


      </div>

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Gambar Kamar</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <center>
                      <h3>Nomer Kamar : <?php echo $no_kamar;  ?> </h3>
                      <h3>Harga Kamar : <?php echo rupiah($harga_kamar); ?> </h3>
                      <h3>Kelas Kamar : <?php echo $nama_kelas_kamar ?> </h3>
                      </center>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="15%">Aksi</th>
            <th width="13%">Gambar Kamar</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($kamar_gambar->result_array() as $tampil){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td>
               <a  href="<?php echo base_url();?>admin/kamar_gambar_delete/<?php echo $tampil['id_kamar_gambar'];?>/<?php echo $tampil['id_kamar'];?>" onclick="return confirm('Yakin Ingin Menghapus?')"> <i class="fa fa-times"></i></a>
              </td>
              <td>
                <img src="<?php echo base_url();?>/assets/images/<?php echo $tampil['nama_kamar_gambar'];?>" alt="" style="width:80px; height:80px;">
              </td>
              
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>


          </div>
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