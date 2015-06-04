<?php
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username=$_POST["name"];
		$useremail=$_POST["email"];
		$userpass=$_POST["password"];

		$sql="SELECT uid FROM user WHERE email='$useremail'";
		$query=mysql_query($sql);

		if(!$row=mysql_fetch_array($query))
		{
			$sql="INSERT INTO user (name, email, pass, tid) 
				VALUES ('$username', '$useremail', '$userpass', '0')";
			mysql_query ($sql);

			session_start();
			$_SESSION["is_login"]=true;
			$_SESSION["login_user"]=$useremail;
			$_SESSION["user_id"]=$row["id"];
			header("location: index.php");
		}
		else {
			header("location: index.php");
			echo '<div id="somedialog" class="dialog">
                                      <div class="dialog__overlay"></div>
                                      <div class="dialog__content">
                                          <form class="form" role="form" method="post" action="signup.php" accept-charset="UTF-8" id="login-nav">
                                              <div class="form-group">
                                                  <label class="sr-only" for="name">User name</label>
                                                  <input type="text" class="form-control" id="name" name="name" placeholder="姓名" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="email">Email address</label>
                                                  <input type="email" class="form-control" id="email" name="email" placeholder="信箱" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="pass">Password</label>
                                                  <input type="password" class="form-control" id="pass" name="password" placeholder="密碼" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-success">註冊</button>
                                                  <button  type="button" class="btn btn-success" data-dialog-close>取消</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>';
			/*echo "<div style='backgroun-color:#123532; width:200px; height:200px '></div>"; */
		}
	}
?>