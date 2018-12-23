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

////////////////////////////////////////////////////
class Format{
 public function formatDate($date){
  return date('F j, Y, g:i a', strtotime($date));
 }
 public function title(){
  $path = $_SERVER['SCRIPT_FILENAME'];
  $title = basename($path, '.php');
  //$title = str_replace('_', ' ', $title);
  if ($title == 'index') {
   $title = 'home';
  }elseif ($title == 'contact') {
   $title = 'contact';
  }
  return $title = ucfirst($title);
 }
}


 public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }


 public function textShorten($text, $limit = 400){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text.".....";
  return $text;
 }

//////////////////
This is the basic rule to hide index.php from the URL. Put this in your root .htaccess file. mod_rewrite must be enabled with PHP and this will work for the PHP version higher than 5.2.6.
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php?/$1 [L]
