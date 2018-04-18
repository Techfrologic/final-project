<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Login</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8849-1" />
<style>
	label {
		display: inline-block;

	}
</style>
</head>
<body>
<h1>College Internships</h1>
<h2>Register / Log In</h2>
<p>New users, please complete the form to
register as a user.</p>
<hr />
<h3>New User  Registration</h3>
<form method="post" action="RegisterUser.php">
<p>Enter your name:
<label> First</label>
<input type="text" name="first" />
</p>
<p>
<label>Last:</label>
<input type="text" name="last" />
</p>
<p>
<label>Enter your street address</label>
<input type="text" name="address" />
</p>
<p>
<label>
Enter your City: 
</label>
<input type="text" name="city" />
</p>
<p>
<label>Enter your state: </label>
<input type="text" name="state"/>
</p>
<p>
<label>Enter your zipcode: </label>
<input type="text" name="zipcode"/>
</p>
<p>
<label>Enter your e-mail address:</label>
<input type="text" name="email" />
</p>
<p>
<label>Enter a password for your account:</label>
<input type="password" name="password" />
</p>
<p><label>Confirm your password:</label>
<input type="password" name="password2" />
</p>
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