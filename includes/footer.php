</div>
<script type="text/javascript" src="<?php echo _ROOT."includes/footer.js"; ?>"></script>
<div id="footer">
	Copyright &copy;2014 - Adam Vanden Huevel, Sean Waite, Austin Lemieux
    <?php
		$generalPages=array();
		$adminPages=array();
		$custPages=array();
		$techPages=array();
		if(isset($_SESSION['role'])){
			$level=$_SESSION['role'];
		}else{
			$level=0;
		}
	?>
</div>
</div>