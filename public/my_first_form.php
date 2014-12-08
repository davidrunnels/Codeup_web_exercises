<?php
var_dump($_POST);
var_dump($_GET);
?>
<html>
<head>
	<title>My First Form</title>
</head>
<body>
	<form method="POST" action="/my_first_form.php">
		<p>
			<label for="username">Guest ID<br></label>
			<input id="username" name="username" type="text">
		</p>
		<p>
			<label for="password">Secret Code<br></label>
			<input id="password" name="password" type="password">
		</p>
		<p>       
			<button type="submit">Login</button>
		</p>
		<textarea id="email_body" name="email_body" rows="5" cols="40">Content Here</textarea>

		<h2>Send E-mail to David:</h2>

		<input type="checkbox" id="save_copy" name="save_copy" value="yes" checked>
		<label for="save_copy">Save a copy of the e-mail to my sent folder<br></label><br>
		<form action="MAILTO:david.runnels@gmail.com" method="post" >
			Name:
			<br>
			<input type="text" name="name" value="your name"><br>
			E-mail:<br>
			<input type="text" name="mail" value="your email"><br>
			Comment:<br>
			<input type="text" name="comment" value="your comment" size="50"><br>
			<input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>
			<label for="mailing_list">Sign me up for the mailing list!</label><br>

			<h2>Multiple Choice Test</h2>
			<p>What is the third letter of the alphabet?</p>
			<label><input type="radio" id="q1a" name="q1" value="a">a</label>
			<label><input type="radio" id="q1b" name="q1" value="b">b</label>
			<label><input type="radio" id="q1c" name="q1" value="c">c</label>
			<label><input type="radio" id="q1d" name="q1" value="d">d</label><br>
			<p>The last question was?</p>
			<label><input type="radio" id="q2a" name="q2" value="easy">easy</label>
			<label><input type="radio" id="q2b" name="q2" value="silly">silly</label>
			<label><input type="radio" id="q2c" name="q2" value="juvenile">juvenile</label>
			<label><input type="radio" id="q2d" name="q2" value="annoying">annoying</label><br>
			<p>Who are your favorite members of the Justice League?</p>
			<label><input type="checkbox" id="jl1" name="os[]" value="batman"> Batman</label>
			<label><input type="checkbox" id="jl2" name="os[]" value="greenLantern"> Green Lantern</label>
			<label><input type="checkbox" id="jl3" name="os[]" value="superman"> Superman</label>
			<label><input type="checkbox" id="jl4" name="os[]" value="theFlash"> The Flash</label>
			<label><input type="checkbox" id="jl5" name="os[]" value="wonderWoman"> Wonder Woman</label>
			<label><input type="checkbox" id="jl6" name="os[]" value="aquaman"> Aquaman</label>
			<label><input type="checkbox" id="jl7" name="os[]" value="cyborg"> Cyborg</label>

			<input type="submit" value="Send"><br><br>

			<label for="satisfaction">Are you enjoying my webpage? </label>
			<select id="satisfaction" name="satisfaction">
				<option selected>Yes</option>
				<option>No</option>
			</select>

		</form>

	</body>
	</html>