<?php 
include 'quoteForm.php';
echo $mailBody;
?>
<p>Hello, <strong><?php echo $message; ?></strong>
	Here is the information you are sending:
</p>
<table border="0">
<h4><script>document.writeln(todays_date);</script></h4>
   <tr>
      <td>Name </td>
      <td>Address </td>
      <td>Phone</td>
      <td>Email</td>
      <td>Time</td>
      <td>Service</td>
      <td>Owner</td>
   </tr>
   <tr>
   	<?php
	/*if (isset($btnSubmit)) {*/
	echo $result;
	echo $name.''.$address.''.$phone.''.$email;
       print( "<td>$name</td>
        	<td>$address</td>
        	<td>$phone</td>
        	<td>$email</td>
			<td>$timeVisit</td>
			<td>$service</td>
			<td>$owner</td>" );/*}*/
   	?>
   </tr>
</table>  
</html>