<?php

session_start();

if (empty($_SESSION['inicjuj']))
{
  session_regenerate_id();
  unset($_SESSION['zalogowany']);
  $_SESSION['inicjuj'] = true;
}
elseif(isset($_GET['logout']))
{
  session_unset();
}

if(!empty($_SESSION['zalogowany']) || (!empty($_POST['haslo']) && crypt($_POST['haslo'],'!@R@#FWjgd409GER%GadHf8885wDF%^#$$%^G')=='!@CbCxEyGgFc.'))
{
  $_SESSION['zalogowany'] = true;
  if ($_SERVER['SCRIPT_FILENAME']==__FILE__) {
    header("HTTP/1.1 303 See Other");
    header("Location: http://".$_SERVER['HTTP_HOST']);
    die();
  }
}
else
{ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<title>Zaloguj się</title>
</head>
<body>
<form method="post" style="
    max-width:360px;
    margin-top: calc(50vh - 62px);
    margin-left: auto;
    margin-right: auto;
    ">
  <div class="form-group">
    <label for="haslo">Hasło</label>
    <input type="password" class="form-control" name="haslo" id="haslo" />
  </div>
  <div class="text-center mt-3">
    <input type="submit" value="Zaloguj" class="btn btn-outline-dark" />
  </div>
</body>
</html>
<?php		
	die();
}