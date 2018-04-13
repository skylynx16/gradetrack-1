<!--START ------------------------------ Backup Error --------------------------------------------------------- -->
<?php
    if ($this->session->flashdata('msg')){ //change!
        echo '<div class="backupErrorMsg2">';
        echo $this->session->flashdata('msg');
        echo "</div>";
    }
?>
<!--END -------------------------------- Backup Error ----------------------------------------------------------- -->

<!--START ------------------------------ Success Messages --------------------------------------------------------- -->
<?php
    if ($this->session->flashdata('msgsuccess')){ //change!
        echo '<div class="SuccessMsg">';
        echo $this->session->flashdata('msgsuccess');
        echo "</div>";
    }
?>
<!--END -------------------------------- Success Messages ----------------------------------------------------------- -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>

		<div class="col-md-8">
			<center>
				<div class="welcome-container animated fadeIn">
					Welcome <?php echo $this->session->userdata('FName'); ?>!
				</div>
				<p class="main-welcome-subtitle animated bounceInUp "> Subjects</p>

			<?php
			    foreach($subjects as $row) :
			    {
					echo "<a href='".base_url()."main/createtable/".$row->ESubjCode."'>";
					echo '<div class="btnSubject animated bounceInUp">';
					echo $row->ESubjCode." - ".$row->Description;
					echo '</div>';
					echo "</a><br>";
			    }
			    endforeach;
			?>
		</div>
		<div class="col-md-2 col-sm-2 col-2"></div>
	</div>
</div>
	