
<div id="message" class="w3-deep-purple" style="position:fixed;bottom:0;right:0;width:100%;text-align:left;padding-left:50px;padding-bottom:5px;">
	       	
			<?php
                if(isset($_GET['msg']))
                {
					echo '<div style="text-align:right"><input class="w3-btn w3-deep-purple w3-text-black w3-hover-black" type="button" value="&times;" onclick="closeMsg()" /></div>';
                    echo '</br>'.$_GET['msg'].'</br>';
                }
                ?>
				
</div>
		<footer class="w3-black w3-container" style="margin-top:10px;">
			<div class="w3-center w3-xxlarge w3-text-white"> &emsp;&emsp;&emsp;&emsp;&emsp; Student Record Management System &emsp;&emsp;&emsp;&emsp;&emsp; <a href="../index.php"><span title="go to Home">&#8962;</span></a></div>
			<div class="w3-text-aqua">By 18bce220,18bce217,18bce260<br>&emsp;&emsp;Contact : 18bce220@nirmauni.ac.in</div>
		</footer>

<script>
	function closeMsg(){
		document.getElementById('message').style.display='none';
	}
</script>