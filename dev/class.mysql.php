<?
// /dev/class.mysql.php
	class db {
		protected $MySQLlink = false;
		protected $QueryResult = null;
		protected $dbhost = null;
		protected $dbuser = null;
		protected $dbpass = null;
		protected $dbname = null;
		protected $debug = null;

		function __construct($db_host, $db_user, $db_pass, $db_name, $debug = true) {
			$this->host = $db_host;
			$this->user = $db_user;
			$this->pass = $db_pass;
			$this->dbname = $db_name;
			$this->debug = $debug;

			if (!($this->MySQLlink = @mysqli_connect($this->host, $this->user, $this->pass)) && $this->debug == '1')
        {
            $this->error(@mysqli_connect_error(), @mysqli_connect_errno());
        }


			if (!(@mysqli_select_db( $this->MySQLlink, $this->dbname )))
				{
				if ($this->debug) {
					$this->error( @mysqli_error($this->MySQLlink ), @mysqli_errno($this->MySQLlink ) );
				} 
				else {
					return false;
				}
			}


			if ($this->debug) {
				
			}


			if (!defined( 'COLLATE' )) {
				define( 'COLLATE', 'utf8' );
			}


			if ($this->MySQLlink) {
				@mysqli_query( $this->MySQLlink,'SET NAMES ' . COLLATE . ''  );
			}

			return true;
		}

		function close() {
			if ($this->MySQLlink) {
				if ($this->QueryResult) {
					@mysqli_free_result( $this->QueryResult );
				}
				$result = @mysqli_close($this->MySQLlink);
				return $result;
			}
			else
			{
				return false;
			}
		}

		function query($query = '') {
			if ($this->dbname != '') {
				$dbselect = @mysqli_select_db($this->MySQLlink, $this->dbname  );

				if (!$dbselect) {
					@mysqli_close( $this->MySQLlink );
					$this->MySQLlink = $dbselect;
					return false;
				}
			}

			$this->QueryResult = null;

			if ($query != '') {
				$this->QueryResult = @mysqli_query($this->MySQLlink, $query );

				if (( $this->debug && @mysqli_errno( $this->MySQLlink ) )) {
					$this->error( @mysqli_error( $this->MySQLlink ), @mysqli_errno( $this->MySQLlink ), $query );
				}
			}

			return $this->QueryResult;
		}
		
		function num_rows($query_id = null)
		{
			if ($query_id == null)
			   $query_id = $this->QueryResult;
			return @mysqli_num_rows($query_id);
		}
		
		function fetch($query_id = null)
		{
			if ($query_id == null)
				$query_id = $this->QueryResult;
			return @mysqli_fetch_array($query_id);
		}

		function fetchAll($query_id = null)
		{
			if ($query_id == null)
				$query_id = $this->QueryResult;
			return @mysqli_fetch_all($query_id, MYSQLI_ASSOC);
		}
		
		function result($query_id = null, $rownum = 0)
		{
			if ($query_id == null)
				$query_id = $this->QueryResult;
			return @mysqli_data_seek($query_id, $rownum);
		}
		
		function affected()
		{
			if ($this->MySQLlink)
			{
				$result = @mysqli_affected_rows($this->MySQLlink);
				return $result;
			}
			else
			{
				return FALSE;
			}
		}

		function safe($sql)
		{
			if ($this->MySQLlink)
				return mysqli_real_escape_string($this->MySQLlink, $sql);
			else
				return addcslashes($sql, "'");
		}

		function lastId() 
		{
			if ($this->MySQLlink) 
			{
				$result = @mysqli_insert_id($this->MySQLlink);
				return $result;
			}
			else
			{
				return FALSE;
			}
		}

		function SuperQuery($query = '', $param = array()) {
			return $this->query( $this->buildQuery( $query, $param ) );
		}

		function SuperResult($query = '', $param = array()) {
			return $this->result( $this->SuperQuery( $query, $param ), 0 );
		}

		function SuperFetchArray($query = '', $param = array()) {
			return $this->fetch( $this->SuperQuery( $query, $param ) );
		}

		function buildQuery($query = '', $param = array()) 
		{
			if (( !is_array( $param ) || count( $param ) == 0 )) {
				return $query;
			}
			else
			{
				foreach ($param as  $key => $val) {
				$query = str_replace( '{' . $key . '}', $val, $query );
				}

				return $query;
			}
		}

		function error($error, $error_num, $query = '') {
			if ($query) {
				
				$query = preg_replace( '/([0-9a-f]){32}/', '********************************', $query );
			}

			echo '<?xml version="1.0" encoding="iso-8859-1"?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<title>MySQL Fatal Error</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
		<style type="text/css">
		<!--
		body { font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; font-style: normal; color: #000000; }
		-->
		</style>
		</head>
		<body align="center">
			<font size="4">Ошибка MySQL!</font> 
			<br />========================<br />
			<br />			
			<u>MySQL вернул ошибку:</u> 
			<br /><strong>' . $error . '</strong>
			<br /><br />
			<u>Номер ошибки:</u> 
			<br /><strong>' . $error_num . '</strong>
			<br /><br />			
			<textarea name="" style="width: 600px; height: 250px;" wrap="virtual">' . $query . '</textarea><br />
		</body>
		</html>';
			exit(  );
		}
	}