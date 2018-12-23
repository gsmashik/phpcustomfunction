<?php


function file_extension($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}



function exception_handler($e)
{
	echo "Error: {$e->getMessage()}\n";
	echo "Errno: {$e->getCode()}\n";
	echo "Line: {$e->getLine()}\n";
	exit(2);
}




	public function table_exists($table)
	{
		$this->query("SHOW TABLES LIKE '{$table}");
		if( $this->_result->num_rows == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
  
  
public function table_checksum($table)
	{
		$this->query("CHECKSUM TABLE {$table}");
		$row = $this->_result->fetch_assoc();
		
		return $row['Checksum'];
	}
