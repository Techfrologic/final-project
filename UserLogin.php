<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Login</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8849-1" />
</head>
<body>
<h1>College Internships</h1>
<h2>Register / Log In</h2>
<p>New users, please complete the top form to
register as a user. Returning users, please complete
the second form to log in.</p>
<hr />
<h3>New User  Registration</h3>
<form method="post" action="RegisterUser.php">
<p>Enter your name: First
<input type="text" name="first" />
Last:
<input type="text" name="last" /></p>
<p>Enter your e-mail address:
<input type="text" name="email" /></p>
<p>Enter a password for your account:
<input type="password" name="password" /></p>
<p>Confirm your password:
<input type="password" name="password2" /></p>
<p><em>(Passwords are case-sensitive and
must be at least 6 characters long)</em></p>
<input type="reset" name="reset"
value="Reset Registration Form" />
<input type="submit" name="register"
value="Register" />
</form>
<hr />
</body>
</html>