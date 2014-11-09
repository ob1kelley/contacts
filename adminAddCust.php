<?php
require_once('../includes/kbinc.php');
session_start();

doAdminHeader();

?>
<a href="admin.php" class="ui-btn">Home</a>

<form action="admin.php" method="post">
<label for="cust_name">Customer Name:</label>
<input type="text" name="cust_name" id="cust_name" data-mini="true" />
<label for="cust_street">Street Address:</label>
<input type="text" name="cust_street" id="cust_street" data-mini="true" /> 
<label for="city_state_zip">City State Zip:</label>
<input type="text" name="city_state_zip" id="city_state_zip" data-mini="true" />
<label for="contact1">On Site Contact:</label>
<input type="text" name="contact1" id="contact1" data-mini="true" />
<label for="contact1_phone">Contact Phone:</label>
<input type="text" name="contact1_phone" id="contact1_phone" data-mini="true" />
<input type="hidden" name="addCustomer" id="addCustomer"/>
<button type="submit" name="submit" value="submit" data-theme="b">Submit</button>
</form>
<?php
doHTMLfooter(); 
?>