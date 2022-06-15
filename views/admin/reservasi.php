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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
    <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

   

    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-success">
           
            <i class="fas fa-table"></i>
            Pemesanan</div>
             <?php 
                  
                          if($this->session->flashdata('in')){
                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check IN SUCCESS</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('out')){

                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check OUT SUCCESS</span>  
                                        </div>";

                          }
                          else if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Baru SUCCESS</span>  
                                        </div>";

                          }

                          else if($this->session->flashdata('perpanjang')){

                            echo "<div class='alert alert-success'>
                                           <span>Perpanjang SUCCESS</span>  
                                        </div>";

                          }
                          
                        
              ?>
          <div class="card-body">
            <div class="table-responsive">
               <a class="btn btn-success " href="new_reservasi_tambah">Add <i class="fa fa-plus"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="29%" >Aksi</th>
            <th >Nama</th>
            <th >Telp</th>
            <th >Alamat</th>
            <th width="12%">Tgl Masuk</th>
            <th width="12%">Tgl Keluar</th>
            <th >Kamar</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($reservasi as $r){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td>
                
               

                <?php
                        if ($r->status_reservasi == 0) { ?>

                         <a  class="btn btn-success" href="<?php echo base_url().'admin/new_reservasi_in/'.$r->id_reservasi?>/1">Proses Check-IN</a> 
                        <?php
                        }
                        else if ($r->status_reservasi == 1) { ?>
                           <a  class="btn btn-danger" href="<?php echo base_url().'admin/new_reservasi_out/'.$r->id_reservasi?>/2"> Proses Check-OUT</a> 
                           <a  class="btn btn-primary" href="<?php echo base_url().'admin/new_reservasi_perpanjang/'.$r->id_reservasi?>">PERPANJANG</a> 
                        <?php
                        }
                        else { ?>
                          <span class="label label-success">CHECK OUT SUCCESS</span>
                        <?php
                        }
                        ?>
              </td>
              <td><?php echo $r->nama_reservasi; ?></td>
              <td><?php echo $r->tlp_reservasi; ?></td>
              <td><?php echo $r->alamat_reservasi; ?></td>
              <td><?php echo $r->tgl_reservasi_masuk; ?></td>
              <td><?php echo $r->tgl_reservasi_keluar; ?></td>
              <td><?php echo $r->no_kamar; ?></td>
            <?php 
          }
          ?>
        </tbody> 
            </table>
          </div>
        </div>
      </div>
<hr style="border: 1px solid">

    

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