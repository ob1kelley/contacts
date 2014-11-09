<?php
require_once('../includes/kbinc.php');
session_start();

doHTMLheader();

?>
<ul data-role="listview" data-inset="true" data-mini="true">
<li>
<a href="index.php">Contacts</a>
</li></ul>

<form action="index.php" method="post">
<label for="contact_name">Contact Name:</label>
<input type="text" name="contact_name" id="contact_name" data-mini="true" />
<label for="contact_company">Contact Company:</label>
<input type="text" name="contact_company" id="contact_company" data-mini="true" /> 
<label for="street">Street Address:</label>
<input type="text" name="street" id="street" data-mini="true" />
<label for="city_state_zip">City, State, Zip:</label>
<input type="text" name="city_state_zip" id="city_state_zip" data-mini="true" />
<label for="contact_phone">Contact Phone:</label>
<input type="text" name="contact_phone" id="contact_phone" data-mini="true" />
<label for="contact_email">Contact Email:</label>
<input type="text" name="contact_email" id="contact_email" data-mini="true" />
<label for="contact_notes">Notes:</label>
<input type="text" name="contact_notes" id="contact_notes" data-mini="true" />
<input type="hidden" name="addContact" id="addContact"/>
<button type="submit" name="submit" value="submit" data-theme="a">Submit</button>
</form>


<?php
doHTMLfooter(); 
?>