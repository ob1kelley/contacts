<?php
require_once('../includes/kbinc.php');
session_start();

doHTMLheader(); ?>
<ul data-role="listview" data-inset="true" data-mini="true">
<li>
<a href="index.php">Contacts</a>
</li></ul>
<?php


$cust_id = $_REQUEST['cust_id'];


echo "<h3>".getCustomerName($cust_id)."</h3>";

echo "<form action=\"customerPage.php?cust_id=".$cust_id."\" method=\"post\"><input type=\"hidden\" name=\"cust_id\" id=\"cust_id\" value=\"".$cust_id."\" />"; ?>

<label for="paragraph1">Paragraph 1:</label>
<textarea name="paragraph1" id="paragraph1"></textarea>
<label for="paragraph2">Paragraph 2</label>
<textarea name="paragraph2" id="paragraph2"></textarea>
<label for="paragraph3">Paragraph 3</label>
<textarea name="paragraph3" id="paragraph3"></textarea>
<input type="hidden" name="submitted" id="submitted" value="submitted"/>
<button type="submit" name="submit" value="submit" data-theme="a">Submit</button>
</form>

<?php doHTMLfooter(); ?>
