////add new line for testing update a file
//for new branch 2 testing
//update on remote
<?php require "header.php";
if(isset($_GET['active']) && isset($_GET['is_js_confirmed']))
{
	$result=mysql_query("UPDATE Authorization SET active='".$_GET['active']."' WHERE code='".$_GET['code']."'" );	
}
elseif(isset($_GET['delete']) && isset($_GET['is_js_confirmed']))
{
	mysql_query("DELETE FROM Authorization WHERE code='".$_GET['delete']."'");	
}

?>
Authorization Code :
		<?php 
		$q = mysql_query("SELECT * FROM Authorization");
		?>
		<?=mysql_num_rows($q)?>
			<table cellspacing=0 width="100%"><tr><td bgcolor="#68a4e2" width="5%">&nbsp;</td><td width="30%" bgcolor="#68a4e2" class="contenttableheader">Code</td><td width="20%" bgcolor="#68a4e2" class="contenttableheader">Active</td><td width="15%" bgcolor="#68a4e2" class="contenttableheader">&nbsp;</td><td width="15%" bgcolor="#68a4e2" class="contenttableheader">&nbsp;</td><td width="15%" bgcolor="#68a4e2" class="contenttableheader">&nbsp;</td></tr>
			<?php
			while($row = mysql_fetch_array($q)) {
				echo "<tr><td class=\"contenttable\">&nbsp;</td><td class=\"contenttable\">" . $row['code'] . "</td><td class=\"contenttable\">" . $row['active']. "</td><td class=\"contenttable\"><a href=\"".$_SERVER['PHP_SELF']."?active=1&code=".$row['code']."\" onclick=\"confirmLink(this,'Are you sure you want to active this code?');\">Active</a></td><td class=\"contenttable\"><a href=\"".$_SERVER['PHP_SELF']."?active=0&code=".$row['code']."\" onclick=\"confirmLink(this,'Are you sure you want to inactive this code?');\">Inactive</a></td><td class=\"contenttable\"><a href=\"".$_SERVER['PHP_SELF']."?delete=".$row['code']."\" onclick=\"confirmLink(this,'Are you sure you want to delete this code?');\">Delete</a></td></tr>";
			}
			?>
		</table>
<?php require "footer.php"; ?>


