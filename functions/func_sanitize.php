<?php
/**
* @package    NetZone Base CMS 2.0
* @author     Sam Walsh, Tomahawk Brand Management
* @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
* @copyright  Tomahawk Brand Management Ltd.
* @version    2.0
* @since      File available since version 1.0
*/
  
/**
* Sanitize only one variable .
* Returns the variable sanitized according to the desired type or true/false 
* 
* NOTE: True/False is returned only for telephone, pin, id_card data types
*
* @param mixed The variable itself
* @param string A string containing the desired variable type
* @return The sanitized variable or true/false
*/
function sanitizeOne($var, $type = 'sqlsafe'){       
  
  switch($type){
    
    /** integer */
    case 'int': 
      $var = (int)$var;
      break;

    /** trim string */
    case 'str': 
      $var = trim($var);
      break;

    /** trim string, no HTML allowed */
    case 'noHtml': 
      $var = htmlentities(trim($var),ENT_QUOTES);
      break;

    /** trim string, no HTML allowed, plain text */
    case 'plain': 
      $var =  htmlentities(trim($var),ENT_NOQUOTES)  ;
      break;

    /** make string safe from sql injection */
    case 'sqlSafe': 
      $var = filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES);
      break;

    /** trim string, upper case words */
    case 'ucWord': 
      $var = ucwords(strtolower(trim($var)));
      break;

    /** trim string, upper case first word */
    case 'ucFirst': 
      $var = ucfirst(strtolower(trim($var)));
      break;
    
    /** trim string, lower case words */
    case 'lower': 
      $var = strtolower(trim($var));
      break;

    /** Trim string, url decoded */
    case 'trimUrl': 
      $var = urldecode(trim($var));
      break;
    
    /** True/False for a telephone number */
    case 'telephone': 
      $size = strlen($var) ;
      
      for ($x=0;$x<$size;$x++) {
        
        if (!((ctype_digit($var[$x]) 
          || ($var[$x] == '+') 
          || ($var[$x] == '*') 
          || ($var[$x] == 'p') 
          || ($var[$x] == '(') 
          || ($var[$x] == ')')))) {
            
            return false;

        }

      }
      return true;
      break;
    
    /** True/False for a PIN */
    case 'pin':
      if ((strlen($var) != 13) || (ctype_digit($var) != true)) {
          
          return false;
      }

      return true;
      break;
    
    /** True/False for an ID CARD */
    case 'id_card': 
      if ((ctype_alpha(substr($var,0,2))!= true) 
        || (ctype_digit(substr($var,2,6))!=true) 
        || (strlen($var)!=8)) {
          
          return false;
      
      }
      
      return true;
      break;
   
    /** True/False if the given string is SQL injection safe */
    case 'sql': 
      return mysql_real_escape_string($var);
      break;
  }

  return $var; 

}

/**
 * Sanitize an array.
 * 
 * sanitize($_POST, array('id'=>'int', 'name' => 'str'));
 * sanitize($customArray, array('id'=>'int', 'name' => 'str'));
 *
 * @param array $data
 * @param array $whatToKeep
 */
function sanitizeArray( &$data, $whatToKeep )
{
  $data = array_intersect_key( $data, $whatToKeep ); 
  
  foreach ($data as $key => $value) {

    $data[$key] = sanitizeOne( $data[$key] , $whatToKeep[$key] );

  }
}

/**
* Sanitize Input
*
* @param  string  $var
* @return string
*/

function sanitizeOutput($var)
{
  $search    = array();
  
  $search[]  = '/\>[^\S ]+/s'; /** strip whitespaces after tags */
  $search[]  = '/[^\S ]+\</s'; /** strip whitespaces before tags */
  $search[]  = '/(\s)+/s';     /** shorten multiple whitespace sequences */

  $replace = array('>', '<', '\\1');

  return preg_replace($search, $replace, $var);
}

/**
* Sanitize Input
*
* @param  string  $var
* @param  string  $filterType
* @param  string  $method
* @return string
*/

function sanitizeInput(
    $var, 
    $filterType = FILTER_SANITIZE_MAGIC_QUOTES,  
    $method = 'post')
{
    
  $outputMethod = ($method == 'post') ? INPUT_POST : INPUT_GET;
  
  $varOutput = filter_input($outputMethod, $var, $filterType);
  $varOutput = stripslashes(strip_tags(htmlentities($varOutput, ENT_QUOTES)));
 
  return $varOutput;
}

/**
* Sanitize Input
*
* @param  string  $var
* @param  string  $filterType
* @param  string  $method
* @return string
*/

function validateInput(
    $var, 
    $filterType = FILTER_SANITIZE_MAGIC_QUOTES,  
    $method = 'post')
{
    
  $outputMethod = ($method == 'post') ? INPUT_POST : INPUT_GET;
  
  $varOutput = filter_input($outputMethod, $var, $filterType);
  $varOutput = stripslashes(strip_tags(htmlentities($varOutput, ENT_QUOTES)));

  $varOutput = getNullIfEmpty($varOutput);
 
  return $varOutput;
}


/**
* Sanitize variable
*
* @param  string  $var
* @param  string  $filterType
* @return string
*/

function sanitizeVar($var, $filterType = FILTER_SANITIZE_MAGIC_QUOTES)
{

  $varOutput = filter_var($var, $filterType);

  return stripslashes(strip_tags(htmlentities($varOutput, ENT_QUOTES)));

}

/**
 * Sanitize string SQLSAFE.
 * 
 * @param string $var
 * @return string
 */
function sanitizeSqlSafe($var)
{
  $var = filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES);

  return $var;
}

/**
* Sanitize Input with callback
*
* @param  string  $var
* @param  array   $options
* @param  string  $filterType
* @return string
*/
function sanitizeCallback(
    $var, 
    $options = array('options' => 'isLowerAlpha'), 
    $filterType = FILTER_CALLBACK)
{

  $varOutput = filter_var( $var, $filterType, $options);

  return stripslashes(strip_tags(htmlentities($varOutput, ENT_QUOTES)));

}

/**
* Sanitize eMAIL
*
* @param  string  $var
* @return string
*/
function sanitizeEmail($var)
{
  return filter_var($var, FILTER_SANITIZE_EMAIL);
}

/**
* Sanitize integer
*
* @param  integer  $var
* @return integer
*/
function sanitizeInt($var)
{
  return filter_var($var, FILTER_SANITIZE_NUMBER_INT);
}

/**
* Sanitize Float
*
* @param  integer  $var
* @return integer
*/
function sanitizeFloat($var)
{
  return filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT);
}

/**
* Sanitize string
*
* @param  string $var
* @return string
*/
function sanitizeString($var)
{
    return filter_var($var, FILTER_SANITIZE_STRIPPED);
}

/**
* Sanitize sanitize alpha numeric value
*
* @param  string $var
* @return string
*/
function sanitizeAlphaNum($var)
{
    return preg_replace('/[^a-zA-Z0-9]/', '', $var);
}

/**
* Sanitize sanitize URL
*
* @param  string $var
* @return string
*/
function sanitizeUrl($var)
{
  return filter_var($var, FILTER_SANITIZE_URL);
}

/**
* Sanitize sanitize SQL
*
* @param  mixed $var
* @return mixed
*/
function sanitizeSql($var)
{    
  if (is_array($var)) {
  
    $output = array_map('_clean', $var);
  
  } else {

    $var = (get_magic_quotes_gpc()) ? stripslashes($var) : $var ;

    $output = str_replace('\\', '\\\\', htmlspecialchars($var, ENT_QUOTES));
  }

  return $output;
}

/**
* Sanitize sanitize XSS
*
* @param  mixed $var
* @return mixed
*/
function sanitizeXss($var)
{

  if (is_array($var)) {
  
    array_map('_clean', $str);
  
  } else {
    
    $var = (get_magic_quotes_gpc()) ? stripslashes($var) : $var;
    $var = htmlspecialchars($var , ENT_QUOTES);
    $var = str_replace('\\', '\\\\', strip_tags(trim($var)));

    $output = str_replace('\\', '\\\\', htmlspecialchars($var, ENT_QUOTES));
  }

  return $output;
}

?>