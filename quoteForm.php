<?php
/*info email*/
$infoEmail = "info@zenitheco.ca";
$subject = "Quote request";


/*Checking inputs*/
$name = check_input($_POST["name"], "Enter your name");
$address = check_input($_POST["address"], "Enter your address");
$phone = check_input($_POST["phone"], "Enter your phone number");
$clientEmail = check_input($_POST["email"]);
$timeVisit = check_input($_POST["timeVisit"], "Select itme");
$service = check_input($_POST["service"], "Select the service you require");
$owner = check_input($_POST["owner"], "Check owner or tenant");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $clientEmail))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message ="

Name: $name
Address: $address
Phone: $phone
Email: $clientEmail
Time to visit: $timeVisit
Service: $service, $owner
";

/* Send the message using mail() function */
mail($infoEmail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: result.php');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit <a href="quoteForm.html">here</a> to try again</p>

</body>
</html>
<?php
exit();
}

/*
if (!isset($_POST['btnSubmit'])) {
		echo "Please, submit the form!";
	}


if(empty($name)||empty($address) || empty($phone) || empty($clientEmail) || empty($timeVisit) || empty($service) || empty($owner)) 
{
    echo "All the fields are mandatory!";
    exit;
}

if(IsInjected($clientEmail)) {
	echo "Bad email value!";
    exit;	
}


$subject = "Quote info";
$mailBody = "This message is from: $name.\n Name: $name\n Email: $clientEmail\n Address: $address\n Phone: $phone\n Time for visit: $timeVisit\n Type of service: $service\n
			Owner? $owner\n";
mail($from, $subject, $mailBody);
/*$thankMessage = "<p>Thank you! Your information has been sent.</p>";*/
/*header('Location: result.php');*/

?>	
<!--Quote form starts here-->
<html>
<title>Get a QUOTE</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-social.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Scripts/jquery.js"></script>
<script src="Scripts/script.js"></script>
<script type="text/javascript" src="Scripts/superfish.js"></script>
<script type="text/javascript" src="Scripts/jquery.responsivemenu.js"></script>
<script type="text/javascript" src="Scripts/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="" src="Scripts/jquery.easing.1.3.js"></script>
<script src="Scripts/jquery.ui.totop.js"></script>
<script src="Scripts/camera.js"></script>
<script type="text/javascript" src="Scripts/jquery.mobile.customized.min.js"></script>
<script language="javascript" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	var todays_date = new Date();
	<!--document.writeln(todays_date);-->
	var newWindow = null;
	function shutitDown() {
		if (newWindow && !newWindow.closed) {
			newWindow.close();
		}}
</script>

<?php
/*echo "<body>";
echo "<div class='container'>";
echo "<div class='jumbotron'>";
echo "	<form action='quoteForm.php' method='post'>";
echo "<h3 align='center'><img src='Images/Zenith_Logo.png'/></h3><br />";
echo "<h3 align='center'>Please enter the information to get a <strong>FREE</strong> quote or consultation</h3>";
echo "<div class='form-group'>";
		echo "<label>Name: </label>";
        echo "<input type='text' class='form-control' name='name' value='Enter your name' />";
		echo "<h4>$nameError</h4>";
		echo "<label>Home Address</label>";
        echo "<input type='text' class='form-control' name='address' value='1234 Street Name, City, Province, POSTAL CODE' />";
		echo "<label>Phone: </label>";
        echo "<input type='tel' class='form-control' name='phone' valuer='(123) 123-4567'/>";
		echo "<label>Email address</label>";
        echo "<input type='email' class='form-control' name='email' value='joedoe@somemail.com'/>";
		echo "<label>Best time to visit you: </label>";
        echo "<select class='form-control' name='timeVisit'>";
        	echo "<option>Morning</option>";
            echo "<option>Afternoon</option>";
            echo "<option>Evening</option>";
        echo "</select>";
		echo "<label for='problem'>Tell us about your problem: </label>";
        echo "<select class='form-control' name='service'>";
        	echo "<option value='AC'>-Air Conditioner</option>";
            echo "<option value='Furnace'>-Furnace</option>";
            echo "<option value='Furnace & AC'>-Furnace & AC</option>";
            echo "<option value='Water Heater'>-Water Heater</option>";
        echo "</select>";
		echo "<label for='homeowner'>Are you...</label>";
        echo "<div>";
        	echo "<label class='checkbox-inline'>";
        		echo "<input type='radio' name='owner' value='homeowner' checked='checked'/> Homeowner";
        	echo "<input type='radio' name='owner' value='tenant'/> Tenant  <strong>?</strong>";
        	echo "</label>";
        echo "</div>";
		echo "<div class='col-sm-offset-2 col-sm-10'>";
        	echo "<input type='submit' class='btn btn-danger' name='btnSubmit'><a href='result.php'></a></button>";
        echo "</div>";
		echo "<h3 align='center'>We'll contact you ASAP.</h3></p> ";  
    echo "</div>";
echo "</form>";
echo "</body>";	*/


function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>       