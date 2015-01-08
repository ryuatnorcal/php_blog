<?php
	$option=$_GET['option'];
	$feldName=$_POST['Feld'];
	$var=$_POST['var'];
	$dataType=$_POST['data_type'];
	$tableName=$_POST['tableName'];
	$address='masterContents.php?type=table&option='.$option;
	$username="tester_sql";
	$password="ghasjkp";
	$database="tester";
	$perpage = 3;
	$hostName="ryu.keepskatinbro.com";
	$con=mysql_connect($hostName, $username, $password) 
	or die("Epic FAIL!");
	mysql_select_db($database);
		


	function getOptionCreaete($database)
	{
		print "<h3>CREATE NEW DATA BASE FELD </h3>".
			  "you can create new data base feld here <br />".
			  "You can check which data Type is allowed at following web page <br />".
			  "<a href='http://w3schools.com/sql/sql_datatypes.asp' targt_blank>check data type!</a>".
			  "<table><form method = 'post' action='masterContents.php?id=createDB&type=table'>".
			  "<tr><td>Feld Name : </td><td> <input type='text' name='Feld' value='".$database."' /></td></tr>".
			  "<tr><td>Variable Name :</td><td> <input type='text' name='var' /></td></tr>".
			  "<tr><td>Data type :</td><td><input type='text' name='data_type' /></td></tr>".
			  "<tr><td>Table Name :</td><td><input type='text' name='tableName' /></td></tr></table><br />".
			  "<input type='submit' value='Create!' />".
			  "<input type='reset' value='Reset!' />".
			  "<form>";
	}
	
	function getOptionDelete($database)
	{
		print "<h3>DELETE DATA BASE FELD </h3>".
			  "you can delete data base feld here ".
			  "<table><form method = 'post' action='masterContents.php?id=deleteDB&type=table'>".
			  "<tr><td>Table Name :</td><td><input type='text' name='tableName' /></td></tr>".
			  "<tr><td>Variable Name :</td><td><input type='text' name='var' /></td></tr></table><br />".
			  "<input type='submit' value='Delete!' />".
			  "<input type='reset' value='Reset!' />".
			  "<form>";
	}
	
	function getOptionChangeDt($database)
	{
		print "<h3>CHANGE DATA BASE FELD DATA TYPE </h3>".
			  "you can chagne data base feld data type here ".
			  "<table><form method = 'post' action='masterContents.php?id=editDB&type=table'>".
			  "<tr><td>Feld Name :</td><td><input type='text' name='Feld' value='".$database."' /></td></tr>".
			  "<tr><td>Variable Name :</td><td><input type='text' name='var' /></td></tr>".
			  "<tr><td>Table Name :</td><td><input type='text' name='tableName' /></td></tr>".
			  "<tr><td>Data type :</td><td><input type='text' name='data_type' /></td></tr></table>".
			  "<input type='submit' value='Change!' />".
			  "<input type='reset' value='Reset!' />".
			  "<form>";
	}
	
	function createFeld($tableName,$fledName,$var,$dataType)
	{
		strtoupper($dataType);
		$query="ALTER TABLE " .$tableName. " ADD " .$fledName." " .$dataType;
		mysql_query($query); 
		mysql_close($con);
		print "<h3>CREATE NEW DATA BASE FELD </h3>";
		if(!$query)
		{	print "The feld was not created <br />".mysql_error();	}
		else
		{	print $fledName. " has created at ".$tableName; }
	}
	
	function deleteFeld($tableName,$fledName,$var)
	{
		strtoupper($dataType);
		$query="ALTER TABLE " .$tableName. " DROP COLUMN " .$var;
		mysql_query($query); 
		mysql_close($con);
		print "<h3>DELETE DATA FROM BASE FELD </h3>";
		if(!$query)
		{	print "The feld was not created ".mysql_error();	}
		else
		{	print $fledName. " has deleted from ".$tableName; }
	}
	
	function changeDatatype($tableName,$fledName,$var,$dataType)
	{
		strtoupper($dataType);
		$query="ALTER TABLE " .$tableName." ALTER COLUMN ".$fledName. " ". $dataType;
		mysql_query($query); 
		mysql_close($con);
		print "<h3>CHANGE DATA TYPE @ BASE FELD </h3>";
		if(!$query)
		{	print "The feld was not created ".mysql_error();	}
		else
		{	print $fledName. " has changed at ".$tableName; }
	}
	
?>