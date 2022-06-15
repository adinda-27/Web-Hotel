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
            Data Kamar</div>

          <div class="card-body">
            <div class="table-responsive">
              <a class="btn btn-success " href="kamar_tambah">Add <i class="fa fa-plus"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="15%">Aksi</th>
            <th width="13%">No Kamar</th>
            <th width="15%">Harga Kamar</th>
            <th width="15%">Kelas Kamar</th>
            <th width="15%">Gambar Kamar</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($kamar as $k){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td>
                <a  href="<?php echo base_url().'admin/kamar_edit/'.$k->id_kamar; ?>"
                <i class="fa fa-edit"></i></a> &nbsp;
                <a  href="<?php echo base_url().'admin/kamar_delete/'.$k->id_kamar;?>" onclick="return confirm('Yakin Ingin Menghapus ?')"> <i class="fa fa-times"></i></a>
              </td>
              <td><?php echo $k->no_kamar; ?></td>
              <td><?php echo rupiah($k->harga_kamar); ?></td>
              <td><?php echo $k->nama_kelas_kamar; ?></td>
              <td>
                <a  class="btn btn-success" href="<?php echo base_url().'admin/kamar_gambar/'.$k->id_kamar?>"><i class="fa fa-image"></i></a>
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