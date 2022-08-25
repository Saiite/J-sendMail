<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Le formulaire d'envoi du message</title>
</head>
<body>
<h1>HELLO!</h1>
<H1> {{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name'}}  a  validé son courrier avec succès</H1>


</div>
<p>nous vous remercions !</p>
</body>
</html>
