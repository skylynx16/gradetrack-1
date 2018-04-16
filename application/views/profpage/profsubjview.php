<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p style="font-family: 'Century Gothic'; font-size: 2rem; vertical-align: middle;" class="animated bounceInLeft">
				Grades for the Subject: <?php echo $this->uri->segment(3); ?>
			</p>
		</div>
		<div class="col-md-6">
			<p style="text-align:center; vertical-align:middle;" class="animated bounceInRight">
			<?php echo '<a class="btnGoBack2 hvr-backward" href="'.base_url().'main/professor_page.html">
						<i class="fas fa-arrow-circle-left" style="margin-right: 5px;"></i>Go Back</a>'; ?>
		</div>
	</div>
<br>
<center>
	<div class="row">
		<div class="col-md-12 lg-12 xs-12 sm-12">
			<table class="table table-bordered animated flipInX" id="user_tbl">
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

	<br>
<!-- *********************************************** IMPORT MIDTERM *********************************************************** -->
<div class="animated fadeIn">		
	<div class="row">
		<div class="col-md-6">
			<form method="post" id="import_form1" enctype="multipart/form-data">
			   <h5>Import Gradesheet for Midterm Grades</h5><br>
			   <p style="text-align:center; vertical-align:middle;">
			   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
			   <input type="submit" name="import" value="Import" class="btn btn-info" />
			   </p>
			</form>
		</div>
		<div class="col-md-6">
			<p style="text-align:center; vertical-align:middle;">
				<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/1/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Midterm Grades</a>'; ?>
			</p>
		</div>
	</div>
	<hr>
<!-- *************************************************** END MIDTERM *********************************************************** -->

<!-- *********************************************** IMPORT PRE-FINAL *********************************************************** -->
	<div class="row">
		<div class="col-md-6">
			<form method="post" id="import_form2" enctype="multipart/form-data">
				<h5>Import Gradesheet for Pre-final Grades</h5><br>
				<p style="text-align:center; vertical-align:middle;">
				<input type="file" name="file" id="file" required accept=".xls, .xlsx" />
				<input type="submit" name="import" value="Import" class="btn btn-info" />
			   </p>
			</form>
		</div>
		<div class="col-md-6">
			<p style="text-align:center; vertical-align:middle;">
				<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/2/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Pre-final Grades</a>'; ?>
			</p>
		</div>
	</div>
	<hr>
<!-- ************************************************ END PRE-FINAL *********************************************************** -->

<!-- *********************************************** IMPORT FINAL *********************************************************** -->
	<div class="row">
		<div class="col-md-6">
			<form method="post" id="import_form3" enctype="multipart/form-data">
			   <h5>Import Gradesheet for Final Grades</h5><br>
			   <p style="text-align:center; vertical-align:middle;">
			   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
			   <input type="submit" name="import" value="Import" class="btn btn-info" />
			   </p>
			</form>
		</div>
		<div class="col-md-6">
			<p style="text-align:center; vertical-align:middle;">
				<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/3/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template for Final Grades</a>'; ?>
			</p>
		</div>
	</div>
	<hr>
<!-- *********************************************** END FINAL*********************************************************** -->

<!-- *********************************************** IMPORT WHOLE *********************************************************** -->
	<div class="row">
		<div class="col-md-6">
			<form method="post" id="import_form4" enctype="multipart/form-data">
			   <h5>Import Whole Gradesheet</h5><br>
			   <p style="text-align:center; vertical-align:middle;">
			   <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
			   <input type="submit" name="import" value="Import" class="btn btn-info" />
			   </p>
			</form>
		</div>
		<div class="col-md-6">
			<p style="text-align:center; vertical-align:middle;">
				<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/export/4/'.$this->uri->segment(3).'">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Whole Template</a>'; ?>
			</p>
		</div>
	</div>
<!-- *********************************************** END WHOLE *********************************************** -->
</div>
</center>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-3.3.1.min.js"></script>


<script>
	$('#import_form1').on('submit', function(event){
		event.preventDefault();
	  	$.ajax({
	  		url:"<?php echo base_url(); ?>main/import1/<?php echo $this->uri->segment(3); ?>",
	   		method:"POST",
	   		data:new FormData(this),
	   		contentType:false,
	   		cache:false,
	   		processData:false,
	   		success:function(data){
	    		$('#file').val('');
	    		alert(data);
	    		location.reload(); 
	   		}
	  	})
	});

	$('#import_form2').on('submit', function(event){
		event.preventDefault();
	  	$.ajax({
	  		url:"<?php echo base_url(); ?>main/import2/<?php echo $this->uri->segment(3); ?>",
	   		method:"POST",
	   		data:new FormData(this),
	   		contentType:false,
	   		cache:false,
	   		processData:false,
	   		success:function(data){
	    		$('#file').val('');
	    		alert(data);
	    		location.reload(); 
	   		}
	  	})
	});

	$('#import_form3').on('submit', function(event){
		event.preventDefault();
	  	$.ajax({
	  		url:"<?php echo base_url(); ?>main/import3/<?php echo $this->uri->segment(3); ?>",
	   		method:"POST",
	   		data:new FormData(this),
	   		contentType:false,
	   		cache:false,
	   		processData:false,
	   		success:function(data){
	    		$('#file').val('');
	    		alert(data);
	    		location.reload(); 
	   		}
	  	})
	});

	$('#import_form4').on('submit', function(event){
		event.preventDefault();
	  	$.ajax({
	  		url:"<?php echo base_url(); ?>main/import4/<?php echo $this->uri->segment(3); ?>",
	   		method:"POST",
	   		data:new FormData(this),
	   		contentType:false,
	   		cache:false,
	   		processData:false,
	   		success:function(data){
	    		$('#file').val('');
	    		alert(data);
	    		location.reload(); 
	   		}
	  	})
	});

	//Back to top script
	$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('#scroll').fadeIn();
        }else{
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>