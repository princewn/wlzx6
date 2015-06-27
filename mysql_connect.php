
<?php
mysql_query("SET NAMES utf8");

	function createDB(){
	    $dbc=mysql_connect('localhost','donahue','090232');

		if(mysql_select_db('wlzx',$dbc)){
			return true;
		}
		else{
			$sql = "CREATE DATABASE wlzx";
			if(mysql_select_db('wlzx',$dbc))
			{
			   echo "<script>console.log('DB built');</script>";
			   return true;
			}
			else{
				echo "<script>console.log('fail DB building');</script>";
			    return false;
			}
				
		}
        mysql_close($dbc);
	}



    function createtable(){
	    $dbc=mysql_connect('localhost','donahue','090232');
	
		$con = mysql_connect('localhost','donahue','090232');
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
		else{
		  echo "<script>console.log('DB connect');</script>";
		}
		mysql_select_db("wlzx", $dbc);		
		$sqlLogin = "CREATE TABLE IF NOT EXISTS `login` (
		  `username` varchar(20) NOT NULL,
		  `password` varchar(100) NOT NULL,
		  `emailAddress` varchar(50) NOT NULL,
		  `hash` varchar(1000) DEFAULT NULL,
		  `confirmed` varchar(1000) DEFAULT NULL
		)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		//echo $sqlLogin."<br />";
		if(mysql_query($sqlLogin,$con))
		{
		   echo "<script>console.log('login table built');</script>";
		}
		else{
			echo "<script>console.log('fail login table building');</script>";
		}
		
		
		$sqlMessage = "CREATE TABLE IF NOT EXISTS `message` (
		  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
		  `quote` varchar(2000) NOT NULL,
		  `source` varchar(200) NOT NULL,
		  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `reply` varchar(2000) NOT NULL,
		  PRIMARY KEY (`quote_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;";
		//echo $sqlMessage."<br />";
		if(mysql_query($sqlMessage,$con))
		{
		   echo "<script>console.log('Message table built');</script>";
		}
		else{
			echo "<script>console.log('fail Message  table building');</script>";
		}
		
		
		$sqlQuotes = "CREATE TABLE IF NOT EXISTS `quotes` (
		  `quote_id` int(15) NOT NULL AUTO_INCREMENT,
		  `quote` varchar(2000) NOT NULL,
		  `detail` varchar(10000) NOT NULL,
		  `source` varchar(100) NOT NULL,
		  `favorite` int(2) unsigned zerofill NOT NULL,
		  `attention` int(15) unsigned zerofill NOT NULL,
		  `recycle` int(5) unsigned zerofill NOT NULL,
		  `date_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`quote_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=817 ;";
		//echo $sqlQuotes."<br />";
		if(mysql_query($sqlQuotes,$con))
		{
		   echo "<script>console.log('Quotes table built');</script>";
		}
		else{
			echo "<script>console.log('fail Quotes  table building');</script>";
		}		
		
		mysql_close($con);
	}
	
	
	
	    $dbc=mysql_connect('localhost','donahue','090232');
		$con = mysql_connect('localhost','donahue','090232');

if(!$dbc)
{
	die('Could not connect: ' . mysql_error());
}
else{
	echo "<script>console.log('DB connect');</script>";
}

createDB();
createtable();
$dbc=mysql_connect('localhost','donahue','090232');
mysql_select_db('wlzx',$dbc);
?>