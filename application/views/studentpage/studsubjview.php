<div class="container">
	<div class="col-md-12 lg-12 xs-12 sm-12">
		<p style="font-family: 'Century Gothic'; font-size: 2rem; vertical-align: middle;" class="animated bounceInLeft">
			Grades for the Subject: <?php echo $this->uri->segment(3); ?><br>
			<h6 class="animated bounceInLeft">Please click "Confirm" once you see your grades</h6>
			</p>
			<br>
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
			<td id="update_btn"><?php if($row->MidtermGradeConfirmed == 0) { $StudNo = $row->StudNo; $tblName = str_replace(".","",str_replace("_","",$this->uri->segment(3))); 
				echo "<center><input type=\"button\" onclick=\"disablewhenclicked('".$StudNo."', '".$tblName."')\" id=\"btnConfirm\" value='Confirm'></input></center>"; } else { echo 'Confirmed'; } ?></td>
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
		<div class="col-md-8 animated fadeIn">
			<center>
			<?php echo '<a class="btnGoBack hvr-backward" href="'.base_url().'main/student_page.html">
						<i class="fas fa-arrow-circle-left" style="margin-right: 5px;"></i>Go Back</a>'; ?>

			<?php echo '<a class="btnPrint hvr-grow-shadow" href="'.base_url().'main/student_page.html">
						<i class="fas fa-print" style="margin-right: 5px;"></i>Print</a>'; ?>
			</center>

		</div>
		<div class="col-md-2"></div>
</div>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-3.3.1.min.js"></script>

<script>
	function disablewhenclicked(StudNo, tblName) {
    	$("#btnConfirm").attr('disabled', 'disabled');

    	jQuery.ajax({
        url: "../updateMidtermGradeConfirmation",
        data: 'StudNo='+StudNo+'&tblName='+tblName,
        type: "POST",
        success:function(data){
        	if(data == 1) {
	        	alert('Midterm Grade has been confirmed.');
	        }
	        else {
	        	alert('Error in confirming midterm grade.');
	        }
    	},
        error:function (){}
    	});
 	}

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