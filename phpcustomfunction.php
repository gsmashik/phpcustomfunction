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
	
	
////////////// Get Remote IP Address in PHP////////////

	function getRemoteIPAddress(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}
 
/* If your visitor comes from proxy server you have use another function
to get a real IP address: */
function getRealIPAddress(){   
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
////////////////////// Detect Browser with PHP///////////////
 $useragent = $_SERVER['HTTP_USER_AGENT'];
    echo "<b>Your User Agent is</b>: ".$useragent;


////////////Unzip a Zip File ///////////////
function unzip($location,$new_location){
    if(exec("unzip $location",$arr)){
        mkdir($new_location);
        for($i = 1;$i< count($arr);$i++){
            $file = trim(preg_replace("~inflating: ~","",$arr[$i]));
                    copy($location."/".$file,$new_location."/".$file);
                    unlink($location."/".$file);
            }
        return true;
    }
    return false;      
}
 
// usage of this code
if(unzip('ziped_files/test.zip','unziped_files/newfile')){
    echo 'Successfully unzipped!';
}else{
    echo 'Error while processing your file!';
}

///////// HTTP Redirection in PHP  ///////////
  // stick your url here
    header('Location: http://you_address/url.php');
    exit;

////////// SEO Friendly Links in PHP //////////
function makeMyUrlFriendly($url){
    $output = preg_replace("/\s+/" , "_" , trim($url));
    $output = preg_replace("/\W+/" , "" , $output);
    $output = preg_replace("/_/" , "-" , $output);
    return strtolower($output);
}

///////////// Highlight Specific Words in a Phrase with PHP  /////////
function highlight($str, $words){
    if(!is_array($words) || empty($words) || !is_string($str)){
        return false;
    }
    $arr_words = implode('|', $words);
    return preg_replace(
        '@\b('.$arr_words.')\b@si',
        '<strong style="background-color:yellow">$1</strong>',
        $str
    );
}

//////////Highlight PHP Code///////////
highlight_string('<?php phpinfo(); ?>');

/////////////// Get File Path Data in PHP ///////////////
// pathinfo() constants parameter list
// PATHINFO_DIRNAME  => directory name
// PATHINFO_BASENAME => name of file (w/out extension)
// PATHINFO_EXTENSION => file extension
// PATHINFO_FILENAME   => file name w/ extension
 
$path = '/images/thumbs/my_avatar.gif';
 
//outputs '/images/thumbs/'
echo pathinfo($path, PATHINFO_DIRNAME);
 
//outputs 'my_avatar'
echo pathinfo($path, PATHINFO_BASENAME);
 
//outputs 'my_avatar.gif'
echo pathinfo($path, PATHINFO_FILENAME);
 
//outputs 'gif'
echo pathinfo($path, PATHINFO_EXTENSION);

///////////Get File Extension in PHP//////////
function get_file_extension($file_name)
{
    /* may contain multiple dots */
    $string_parts = explode('.', $file_name);
    $extension = $string_parts[count($string_parts) - 1];
    $extension = strtolower($extension);
    return $extension;
}

//////// Get Country By IP Address in PHP ///////
function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}

///////// Validate IP Address in PHP /////////
$ip_address = '127.0.0.1';
 
if(preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $ip_address)){
   echo 'IP address is valid!';
}else{
   echo 'IP address is NOT valid!';
}

/// Creating and Parsing JSON Data in PHP ////////
$json_data = array(
   'id'=>1,'name'=>'jackson','country'=>'usa','office'=>array('google','oracle')
);
echo json_encode($json_data);
/////// Calculate Age Using a Birth Date //////////
function age($date){
    $time = strtotime($date);
    if($time === false){
      return '';
    }
 
    $year_diff = '';
    $date = date('Y-m-d', $time);
    list($year,$month,$day) = explode('-',$date);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0) $year_diff-;
 
    return $year_diff;
}

////////// Count files recursive in PHP /////////
function count_files($path) {
    // (Ensure that the path contains an ending slash)
    $file_count = 0;
    $dir_handle = opendir($path);
    if (!$dir_handle) return -1;
    while ($file = readdir($dir_handle)) {
        if ($file == "." || $file == "..") continue;
        if (is_dir($path . $file)){      
            $file_count += count_files($path . $file . DIRECTORY_SEPARATOR);
        }
        else {
            $file_count++; // increase file count
        }
    }
 
    closedir($dir_handle);
 
    return $file_count;
}
 
count_files("./my_folder/");





