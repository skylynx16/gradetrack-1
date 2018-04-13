<div class="container-fluid">
	<div class="col-md-12 lg-12 xs-12 sm-12">
		<table class="table table-bordered" id="user_tbl">
				<tr id="user_tbl_head">
					<td id="user_tbl_data">Student No.</td>
					<td id="user_tbl_data">Student Name</td>
					<td id="user_tbl_data">Percentage Midterm Grade</td>
					<td id="user_tbl_data">Decimal Midterm Grade</td>
					<td id="user_tbl_data">Confirm Midterm Grade</td>
					<td id="user_tbl_data">Percentage Pre-Final Grade</td>
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

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center>
			<?php echo '<a class="btnGoBack hvr-backward" href="'.base_url().'main/professor_page.html">
						<i class="fas fa-arrow-circle-left" style="margin-right: 5px;"></i>Go Back</a>'; ?>

			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/professor_page.html">
						<i class="fas fa-upload" style="margin-right: 5px;"></i></i>Import Gradesheet</a>'; ?>
			<?php echo '<a class="btnImpExp hvr-grow-shadow" href="'.base_url().'main/professor_page.html">
						<i class="fas fa-download" style="margin-right: 5px;"></i>Download Template</a>'; ?>
						</center>
		</div>
		<div class="col-md-2"></div>
</div>