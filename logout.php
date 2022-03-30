<?php session_start();?>
<html><title>Session Closed. Thank you!</title>
<body>
<div align="center">
  <p>Thank you <?php echo $_SESSION['myusername'];	// display's user
		if(!$_SESSION['myusername']){ 		// will direct to login.html if no session
   		header("location:login.html");
		}?>
  <?php session_destroy();?></p>

  <p> <span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium; "><span class="Apple-style-span" style="font-family: verdana, arial, helvetica, sans-serif; text-align: -webkit-center; font-size: x-small; "><b>You've been logged out. Thanks for using the system!</b><span class="Apple-converted-space">&nbsp;</span><br>
        <br>

        <a href="login.html">Click here to log in again</a></span></span> </p>
</div>
</body>
</html>