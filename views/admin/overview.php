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


    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-bed"></i>
        </div>
        <div class="mr-5"><?php echo $this->m_hotel->get_data('kamar')->num_rows(); ?> TOTAL KAMAR SELURUHNYA</div>
        </div>
       
      </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-bed"></i>
        </div>
        <div class="mr-5"><?php echo $this->m_hotel->kamarkosong()->num_rows(); ?> TOTAL KAMAR KOSONG</div>
        </div>
       
      </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-bed"></i>
        </div>
        <div class="mr-5"><?php echo $this->m_hotel->kamarisi()->num_rows(); ?> TOTAL KAMAR TERISI</div>
        </div>
       
      </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-envelope"></i>
        </div>
        <div class="mr-5"><?php echo $this->m_hotel->get_data('saran')->num_rows(); ?> TOTAL KRITIK & SARAN</div>
        </div>
        
      </div>
      </div>

      <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-bed"></i>
        </div>
        <div class="mr-5" align="center"><?php echo $this->db->query('SELECT * from reservasi where status_reservasi=1')->num_rows(); ?> TOTAL CHECK-IN </div>
        </div>
       
      </div>
      </div>

      <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-bed"></i>
        </div>
        <div class="mr-5" align="center"><?php echo $this->db->query('SELECT * from reservasi where status_reservasi=2')->num_rows(); ?> TOTAL CHECK-OUT</div>
        </div>
       
      </div>
      </div>

        

    </div>

    <!-- Area Chart Example-->
    <hr style="border: 1px solid">
    <div class="card mb-3">
          <div class="card-header bg-success">
            <i class="fas fa-table"></i>
            Pemesanan Baru</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="13%">Aksi</th>
            <th width="15%">Nama</th>
            <th width="15%">Telp</th>
            <th width="15%">Alamat</th>
            <th width="15%">Tgl Masuk</th>
            <th width="15%">Tgl Keluar</th>
            <th width="15%">Kamar</th>
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
               <a  class="btn btn-success" href="<?php echo base_url().'admin/new_reservasi_in/'.$r->id_reservasi?>/1"> IN</a> 
              </td>
              <td><?php echo $r->nama_reservasi; ?></td>
              <td><?php echo $r->tlp_reservasi; ?></td>
              <td><?php echo $r->alamat_reservasi; ?></td>
              <td><?php echo $r->tgl_reservasi_masuk; ?></td>
              <td><?php echo $r->tgl_reservasi_keluar; ?></td>
              <td><?php echo $r->no_kamar; ?></td>
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>
          </div>
        </div>
      </div>
<hr style="border: 1px solid">
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-success">
            <i class="fas fa-table"></i>
            Data Kamar Kosong</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="13%">No Kamar</th>
            <th width="15%">Harga Kamar</th>
            <th width="15%">Kelas Kamar</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($kamar as $k){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k->no_kamar; ?></td>
              <td><?php echo rupiah($k->harga_kamar); ?></td>
              <td><?php echo $k->nama_kelas_kamar; ?></td>
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