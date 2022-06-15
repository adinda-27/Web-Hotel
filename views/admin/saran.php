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
            Kritik & Saran</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Kritik/Saran</th>
            <th>Aksi</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($saran as $s){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $s->nama_saran; ?></td>
              <td><?php echo $s->email_saran; ?></td>
              <td><?php echo $s->tlp_saran; ?></td>
              <td><?php echo $s->isi_saran; ?></td>
              <td><a href="<?php echo base_url().'admin/deletesaran/'.$s->id_saran;?>"
     onclick="return confirm('Delete Saran?');"><i class="fa fa-times"></i></a></td>
              
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>
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