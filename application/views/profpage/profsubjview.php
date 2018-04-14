<div class="container">
	<div class="row">
		<div class="col-md-12 lg-12 xs-12 sm-12">
			<?php echo $this->uri->segment(3); ?>
			<table class="table table-bordered" id="user_tbl">
					<tr id="user_tbl_head">
						<td id="user_tbl_data">Student No.</td>
						<td id="user_tbl_data">Student Name</td>
						<td id="user_tbl_data">Percentage Midterm Grade</td>
						<td id="user_tbl_data">Decimal Midterm Grade</td>
						<td id="user_tbl_data">Confirm Midterm Grade</td>
						<td id="user_tbl_data">Percentage Pre-final Grade</td>
						<td id="user_tbl_data">Decimal Pre-Final Grade</td>
						<td id="user_tbl_data">Percentage Final Grade</td>
						<td id="user_tbl_data">Decimal Final Grade</td>
					</tr>
				<?php if(isset($rec_from_db)) : foreach($rec_from_db as $row) : ?>
					<tr id="user_tbl_content">
						<td id="user_tbl_data"><?php echo $row->StudNo; ?></td>
						<td id="user_tbl_data"><?php echo $row->StudName; ?></td>
						<td id="user_tbl_data"><?php echo $row->PercMidtermGrade; ?></td>
						<td id="user_tbl_data"><?php echo $row->DecMidtermGrade; ?></td>
						<td id="user_tbl_data"><?php if($row->MidtermGradeConfirmed == 0){ echo 'Unconfirmed'; } else {echo 'Confirmed';} ?></td>
						<!--<td id="update_btn"><a href="<?php echo base_url();?>main/">Confirm</a></td> for student side-->
						<td id="user_tbl_data"><?php echo $row->PercPreFinalGrade; ?></td>
						<td id="user_tbl_data"><?php echo $row->DecPreFinalGrade; ?></td>
						<td id="user_tbl_data"><?php echo $row->PercFinalGrade; ?></td>
						<td id="user_tbl_data"><?php echo $row->DecFinalGrade; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</table>			
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<center>
			<?php echo '<a class="btnGoBack hvr-backward" href="'.base_url().'main/professor_page.html">
						<i class="fas fa-arrow-circle-left" style="margin-right: 5px;"></i>Go Back</a>'; ?>
			</center>
		</div>
<!-- *********************************************** IMPORT *********************************************************** -->
		<div class="col-md-4">
			<center>
			<form method="post" id="import_form" enctype="multipart/form-data">
			   <p><label>Select Excel File</label>
			   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
			   <br />
			   <input type="submit" name="import" value="Import" class="btn btn-info" />
			</form>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/import/1">
						<i class="fas fa-upload" style="margin-right: 5px;"></i></i>Import Gradesheet for Midterm Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/import/2">
						<i class="fas fa-upload" style="margin-right: 5px;"></i></i>Import Gradesheet for Pre-final Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/import/3">
						<i class="fas fa-upload" style="margin-right: 5px;"></i></i>Import Gradesheet for Final Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/import/4">
						<i class="fas fa-upload" style="margin-right: 5px;"></i></i>Import Whole Gradesheet</a>'; ?>
			</center>
		</div>
<!-- *********************************************** END IMPORT *********************************************** -->

<!-- *********************************************** EXPORT *********************************************** -->
		<div class="col-md-4">
			<center>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/1/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Midterm Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/2/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Pre-final Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/3/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Final Grades</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/4/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Whole Template</a>'; ?>
			</center>
		</div>
<!-- *********************************************** END EXPORT *********************************************** -->
</div>

<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-3.3.1.min.js"></script>

<script>
$('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>main/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    alert(data);
   }
  })
 });
</script>