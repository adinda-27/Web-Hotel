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
            User Edit</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($user as $u){ ?>
              <form method="post" action="<?php echo base_url().'admin/user_edit_aksi'; ?>">
                <div class="form-group">
                      <label class="control-label col-md-3">User Group</label>
                      <div class="col-md-9">
                      <select name="id_user_group" class="form-control">
                        <option value="id_user_group"> Pilih User Group</option>
                        <?php foreach ($user_group as $ug) {?>
                          <option value="<?php echo $ug->id_user_group; ?>"><?php echo $ug->nama_user_group ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama User</label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                            <input type="text" class="form-control" placeholder="" name="nama_user" value="<?php echo $u->nama_user; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Email User</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="email_user" value="<?php echo $u->email_user; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Tlp User</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="tlp_user" value="<?php echo $u->tlp_user; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Username</label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="username_user" value="<?php echo $u->username_user; ?>">
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