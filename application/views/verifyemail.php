<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> Email Verifications </title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	</head>
	<body>
		<div style="text-align:center; background-color: #f7f7f7; padding: 20px;">
			<h2 style="color: #605ca8;">Incidence Report</h2>
		</div>
		<h2 align="center"> 
			<?php
			if($this->session->flashdata('message_success') != ""){
				echo "<p style='color: green;'>EMAIL VERIFIED</p>";
			}elseif($this->session->flashdata('message_error') != ""){
				echo "<p style='color: red;'>EMAIL VERIFICATION FAILED</p>";
			}elseif($this->session->flashdata('message_verified_error') != ""){
				echo "<p style='color: orange; text-align:center;'>ALREADY VERIFIED.</p>";
			}else{
				echo "<p style='color: red;'>Something Went wrong.</p>";
			}
			?>
		</h2>
		<div style="text-align:center;">
			<img src="https://gallery.mailchimp.com/8872355c3dbd6fc95b320913c/images/1bd13d8b-40f3-47b5-8f83-6fb007c0976e.jpg" width="40%">
		</div>
		<!-- <p style="text-align:center;"> -->
			<?php
			if($this->session->flashdata('message_success') != ""){
				echo "<p style='color: green; text-align:center;'>".$this->session->flashdata('message_success')."</p>";
			}elseif($this->session->flashdata('message_error') != ""){
				echo "<p style='color: red; text-align:center;'>".$this->session->flashdata('message_error')."</p>";
			}elseif($this->session->flashdata('message_verified_error') != ""){
				echo "<p style='color: orange; text-align:center;'>".$this->session->flashdata('message_verified_error')."</p>";
			}else{
				echo "<p style='color: red; text-align:center;'>Something Went wrong.</p>";
			}
			?>
		<!-- </p> -->
		<!-- <div style="text-align:center;margin-top: 35px;margin-bottom: 30px;">
			<a style="background-color: #F7CE3E;padding: 10px;color: #fff;font-size: 26px;font-weight: bold;border-radius: 6px;">Verify your email</a>
		</div> -->
		<div style="text-align:center; background-color: #605ca8;">
			<div style="padding-top: 30px;">
				<a><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-facebook-48.png" width="24px"></a>&nbsp;&nbsp;&nbsp;
				<a><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-twitter-48.png" width="24px"></a>&nbsp;&nbsp;&nbsp;
				<a><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-instagram-48.png" width="24px"></a>&nbsp;&nbsp;&nbsp;
				<a><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/outline-light-link-48.png" width="24px"></a>&nbsp;&nbsp;&nbsp;
			</div>
			<div style="padding-top: 30px;border-bottom:3px solid;margin-left: 30%;margin-right: 30%;"></div>
			<div style="padding-top: 30px;padding-bottom: 30px;color:#fff;">
				<em>Copyright © 2019 Incidence Report, All rights reserved.</em>
			</div>
		</div>
	</body>
</html>