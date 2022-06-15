<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'asset/dist/summernote.min.js'?>"></script>

<script src="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>


<script type="text/javascript">
var date = new Date();
date.setDate(date.getDate());
 $('.form_date').datetimepicker({

        language:  'id',

        weekStart: 1,

        todayBtn:  1,



  autoclose: 1,

  todayHighlight: 1,

  startView: 2,

  minView: 2,

  startDate: date,

  forceParse: 0

    });

</script>


<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "300px",
		styleWithSpan: false
	});
});
function postForm() {

	$('textarea[name="content"]').html($('#summernote').code());
}
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $("#uang_bayar").focus();

     $("#uang_bayar").keyup(function(e) {

      var total_bayar =  $("#total_bayar").val();
      var uang_bayar =  $("#uang_bayar").val();

      var kembalian = uang_bayar - total_bayar;

      $("#kembalian").val(kembalian);


                  
         });
  });
</script>