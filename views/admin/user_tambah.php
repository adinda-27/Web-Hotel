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
            User Tambah</div>

          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url().'admin/user_tambah_aksi'; ?>">
                <div class="row">
                  <div class="col-lg-7 col-sm-8 ">
                  <div class="form-group">
                      <label class="col-lg-12">User Group</label>
                      <div class="col-md-9">
                      <select name="id_user_group" class="form-control">
                        <option value="id_user_group">-Pilih User Group-</option>
                        <?php foreach ($user as $u) {?>
                          <option value="<?php echo $u->id_user_group; ?>"><?php echo $u->nama_user_group ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>
                  <div class="form-group">
                    <label class="col-lg-12">Nama User</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="masukkan nama user" name="nama_user">
                        </div>
                  </div>
                   <div class="form-group">
                    <label class="col-lg-12">Email User</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="masukkan nama user" name="email_user">
                        </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-12">Tlp User</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="masukkan nama user" name="tlp_user" min="1">
                        </div>
                  </div> 
                </div>

                <div class="col-lg-4 col-sm-4">
                  <div class="form-group">
                    <label class="col-lg-12">Username</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="masukkan nama user" name="username_user">
                        </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-12">Password</label>
                       <div class="col-md-9">
                            <input type="Password" class="form-control" placeholder="masukkan nama user" name="password_user">
                        </div>
                  </div>
                   <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="SAVE">
                        </div>
                  </div>
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