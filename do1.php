<?php
require_once("config/config.php");

	if (isset($_POST["user"]) )
    { 
        // connect to database
        if (($connection = mysql_connect("localhost", "root", "nupt2013")) === FALSE)
            die("Could not connect to database");
   
        // select database
        if (mysql_select_db("plain", $connection) === FALSE)
            die("Could not select database");

        // prepare SQL
        $sql = sprintf("SELECT * FROM name WHERE username='%s'",
                       mysql_real_escape_string($_POST["user"]));

        // execute query
        $result = mysql_query($sql);
        if ($result === FALSE)
            die("Could not query database");

        // check whether we found a row
        if (mysql_num_rows($result) == 1)
			echo json_encode("user is already existed");
		else
		{
			//echo "valid-row2";
            // fetch row
			$sql1 = sprintf("INSERT INTO  name  (`username`,`score`) VALUES ('%s','%s')",
                       mysql_real_escape_string($_POST["user"]),mysql_real_escape_string($_POST["score"]));
			   $result1 = mysql_query($sql1);
				   //echo "insert sucess";
		//$backdata=array('gamescore'=>'1000','user'=>'qqf');
		$sql = sprintf("SELECT username,score FROM  name ORDER BY score  DESC limit 5");
        $result = mysql_query($sql);	
		//$row = mysql_fetch_array($result);
		
		while($arr= mysql_fetch_array($result)){
			$temp[$arr['username']]=$arr['score'];

		}
		$backdata[0]=$temp;
		$backdata[1]=$_POST["au"];
		
		echo json_encode($backdata);
			//print_r($backdata);	   
//echo $backdata;

			exit;
        }
	}

// some code


?>