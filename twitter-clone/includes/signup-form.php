<?php 
if (isset($_POST['signup'])) {

	$screenName = $_POST['screenName'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$error = '';

	if (empty($screenName) || empty($password) || empty($email) ) {
		$error = "All fields are required";
		} else {
			$email      = $getFromUser->checkInput($email);
			$screenName = $getFromUser->checkInput($screenName);
			$password    = $getFromUser->checkInput($password);

			if (!filter_var($email)) {
				
				$error = 'invalid email format';
			} elseif (strlen($screenName) > 15) {
				$error = 'name must be between 6-15 characters';
			} elseif (strlen($password) < 5) {
				$error = ' password is too short!';
			} else{
				if ($getFromUser->checkEmail($email) === true) {
					$error = 'email already taken';			
				} else {
				$user_id = $getFromUser->register('users', array('email' => $email, 'password' => md5($password), 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
				$_SESSION['user_id'] = $user_id;
				header('Location: includes/signup.php?step=1');
				exit();
				}
			}
		}
}

 ?>

<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
		<?php 
		if (isset($error)) {
			
			echo ' <li class="error-li">
	   <div class="span-fp-error">'.$error.'</div>
	    </li> ';
		}
		?>

	</ul> 
</div>
</form>


