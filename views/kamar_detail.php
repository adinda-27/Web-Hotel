<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("tamu/navbar.php") ?>

<div id="wrapper">

  <div id="content-wrapper">

    <div class="container-fluid">


      <!-- search box-->
        <div class="container-fluid">
          
        <h2 >Info Kamar</h2>
        <hr style="border: 1px solid">
        <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>

                <?php 
                  
                        if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Check In SUCCESS</span>  
                                        </div>";

                          }

                       
              ?>
      <!--end search box-->



    


<div class="row">

    <div class="col-lg-3 col-sm-4 hidden-xs">
          <div class="search-form"><h4><span class="fa fa-search"></span> Search for</h4>
                <?php echo form_open('Welcome/cari');?>
              <div class="row">
              <div class="col-lg-12">
                  <select class="form-control" name="id_kelas_kamar">
                    <option value="">Pilih Kelas Kamar</option>
                    <?php
                    foreach ($kelas_kamar->result_array() as $value) { ?>
                        <option value="<?php echo $value['id_kelas_kamar']; ?>"><?php echo $value['nama_kelas_kamar'] ?></option>
                    <?php
                    }
                    ?>
                   
                  </select>
                  </div>
              </div>
              <button class="btn btn-primary">Find Now</button>

              <?php echo form_close();?>
            </div>
      </div>

<div class="col-lg-9 col-sm-8 ">

  <?php
  foreach ($kamar->result_array() as $value) {
    $id_kamar         = $value['id_kamar'];
    $no_kamar      = $value['no_kamar'];
    $harga_kamar      = $value['harga_kamar'];
    $fasilitas_kamar  = $value['fasilitas_kamar'];
    $nama_kelas_kamar = $value['nama_kelas_kamar'];
    $status_kamar = $value['status_kamar'];
  }
  ?>

<h3>Nomor Kamar : <?php echo $no_kamar;?></h3>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
         <?php
        $no=0;
        foreach ($kamar_gambar->result_array() as $value) { ?>
           <?php
            if ($no==0) { ?>

             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
            }
            else { ?>

             <li data-target="#myCarousel" data-slide-to="<?php echo $no;?>" class=""></li>
             <?php
            }
            ?>
       
         <?php
        $no++;
        }
       
        ?>
      </ol>
      <div class="carousel-inner">
       
        <?php
        $no=0;
        foreach ($kamar_gambar->result_array() as $value) { ?>

            

            <?php
            if ($no==0) { ?>
              <div class="item active">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="properties" alt="properties" />
              </div>

            <?php
            }
            else { ?>

              <div class="item">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="properties" alt="properties" />
              </div> 
            <?php
            }
            ?>

        <?php
        $no++;
        }
       
        ?>
       
        

        
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  <div class="spacer"><h4><span class="fa fa-th-list"></span> Informasi Kamar</h4>
  <p><?php echo $fasilitas_kamar;?></p> 
  </div>
  
  

  </div>


  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo rupiah($harga_kamar);?></p>
 
  
 
</div>

    <h6><span class="fa fa-home"></span> <?php echo $nama_kelas_kamar;?></h6>
    <div class="listing-detail">
    
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">

  <?php

  if ($status_kamar==0) { ?>

  <h6><span class="fa fa-envelope"></span> Pemesanan Kamar</h6>
  <?php echo form_open('welcome/reservasi/','role="form"'); ?>
    <input type="hidden" name="id_kamar" value="<?php echo $id_kamar;?>">
     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_reservasi_masuk" placeholder="Tanggal Chek In" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
      <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_reservasi_keluar" placeholder="Tanggal Chek Out" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
                <input type="text" class="form-control" name="nama_reservasi" placeholder="Nama"/>
                <input type="number" class="form-control" name="tlp_reservasi" placeholder="Tlp"/>
                <textarea rows="6" class="form-control" name="alamat_reservasi" placeholder="Alamat"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Booking Kamar</button>
     
      <?php echo form_close();?>

  <?php
  }
  else { ?>

  <div class='alert alert-danger'>
                                           <span>Kamar Not Avaliable</span>  
                                        </div>

  <?php
  }

  ?>
  </div>
 </div>         
</div>
  </div>
</div>

    <!-- /.iron-card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("tamu/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/js.php") ?>
    
</body>
</html>