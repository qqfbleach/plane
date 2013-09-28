<script type="text/javascript" src="jquery.js"></script>
	<script>
	function test(){
	alert($i);}
	</script>
<button id="bu" onclick="test()">click</button>
<?php
require_once("config/config.php");

        // connect to database
        if (($connection = mysql_connect("127.0.0.1", "root", "nupt2013")) === FALSE)
            die("Could not connect to database");
   
        // select database
        if (mysql_select_db("plain", $connection) === FALSE)
            die("Could not select database");


        
		$sql = sprintf("SELECT uid,score FROM  name ORDER BY score  DESC limit 5");
        $result = mysql_query($sql);	
		//$row = mysql_fetch_array($result);
		
		while($arr= mysql_fetch_array($result)){
			$temp[$arr['uid']]=$arr['score'];

		}
		$backdata[0]=$temp;
	//	$backdata[1]=$_POST["score"];
		echo "hello";
		echo json_encode($temp);
			//print_r($backdata);	   
//echo $backdata;
	
			exit;
        


// some code


?>
	
		
