<?php
require_once('../includes/kbinc.php');
session_start();

doAdminHeader();


$cust_id = $_REQUEST['cust_id'];


echo "<h3>".getCustomerName($cust_id)."</h3>";

echo "<form action=\"adminCustPage.php?cust_id=".$cust_id."\" method=\"post\"><input type=\"hidden\" name=\"cust_id\" id=\"cust_id\" value=\"".$cust_id."\" />"; ?>
<label for="title">Title:</label>
<input type="text" name="title" id="title" data-mini="true" /> 
<label for="paragraph1">Paragraph 1:</label>
<textarea name="paragraph1" id="paragraph1"></textarea>
<label for="paragraph2">Paragraph 2</label>
<textarea name="paragraph2" id="paragraph2"></textarea>
<label for="paragraph3">Paragraph 3</label>
<textarea name="paragraph3" id="paragraph3"></textarea>
<input type="hidden" name="submitted" id="submitted" value="submitted"/>
<button type="submit" name="submit" value="submit" data-theme="b">Submit</button>
</form>

<?php doHTMLfooter(); ?>
