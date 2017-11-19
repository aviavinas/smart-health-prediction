<?php
/*
 * Author  Avinash Kumar  < toAvinash@clipming.com >
 * Copyright 2016 ClipMing.Com
 *
 *
 * This page handles basic functionality of
 * clipming, so it is mostly required by
 * most of the module.
 */

// - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

/*
* It handles the every Database operation
* and makes error log.
*/

class Database
{
	public $debugOnce = false;
	private $serverhost = "localhost";
	private $username = "root";
	private $password = "";
	public $database ="medical";
	private $con;
	private $mysqli;
	public $database_selected;
	public $failed_query_count = 0;
	public $error_msg = array();

	public function __construct() {
		 $this->connect();
	}

    public function connect() {
        if(!$this->con) {
			$this->mysqli = @new MySQLi($this->serverhost,$this->username,$this->password);

            if($this->mysqli && $this->ping()) {
				$this->con = true;
				if(@$this->runQuery("USE ".$this->database))
				    $this->database_selected = true;
				else
				    $this->database_selected = false;

				return true;
			} else {
				$this->con = false;
				return false;
			}
		}
		else {
			$this->con = true;
            return true;
        }
    } // << End connect()   -----------------------------------------------------

    public function disconnect() {
		if($this->con) {
			$mysqli = $this->mysqli;
			if(@$mysqli->close()) {
			   $this->con = false;
				return true;
			}
			else {
				return false;
			}
		}
	} // << End disconnect()   -----------------------------------------------------

	public function ping() {
		$mysqli = $this->mysqli;
		return @$mysqli->ping();
	} // << End ping()   -----------------------------------------------------

	public function error() {
		$mysqli = $this->mysqli;
		return $mysqli->error;
	} // << End eror()   -----------------------------------------------------

	private function tableExists($table) {
		$table = $this->esc_str($table);
        $tablesInDb = @$this->runQuery('SHOW TABLES FROM '.$this->database.' LIKE "'.$table.'"');
        if($tablesInDb)
        {
            if($tablesInDb->num_rows==1)
                return true;
            else {
				$this->failed_query_count++;
				$this->error_msg[] = "Error : '".$table."' table doesn't exist in Database '".$this->database."' !";
                return false;
			}
        }
    } // << End tableExists()   -----------------------------------------------------

    public function select($table, $rows = '*', $where = null, $order = null, $limit = null) {
		  if($this->tableExists($table)) {
			  $result = array();
			  $q = 'SELECT '.$rows.' FROM '.$table;
			  $debug = false;
			  if($limit==(-121)) { // secret Debugging Mode No.
				  $debug = true;
				  $limit = null;
			  }
			  if($where != null)
				  $q .= ' WHERE '.$where;
			  if($order != null)
				  $q .= ' ORDER BY '.$order;
			  if(($limit != null) && is_int($limit))
				  $q .= ' LIMIT '.$limit;
			  $query = @$this->runQuery($q);
			  if($debug) var_dump($q);
			  if($query) {
				  $numResults = $query->num_rows;
				  for($i = 0; $i < $numResults; $i++) {
					  $r = $query->fetch_array(MYSQLI_ASSOC);
					  $key = array_keys($r);
					  for($x = 0; $x < count($key); $x++) {
						  if($query->num_rows > 1)
							  $result[$i][$key[$x]] = $r[$key[$x]];
						  else if($query->num_rows < 1)
							  $result = null;
						  else
							  $result[$key[$x]] = $r[$key[$x]];
					  }
				  }
				  return $result;
			  }
			  else
				  return false;
		  }
		  else
			  return false;
    } // << End select()   -----------------------------------------------------

    public function insert($table,$values,$rows = null, $debug = 0) {
        if($this->tableExists($table)) {
            $insert = 'INSERT INTO '.$table;
            if($rows != null)
                $insert .= ' ('.$rows.')';

            for($i = 0; $i < count($values); $i++) {
				if(empty($values[$i]))
					$values[$i] = "NULL";
                if(is_string($values[$i]))
                    $values[$i] = '"'.$this->esc_str($values[$i]).'"';
            }
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.')';
   			if($debug==1)
			   echo $insert;

			$ins = @$this->runQuery($insert); //var_dump($insert); # for debugging
			if($ins)
                return true;
            else {
				//if($table =='product') echo("<br>".$insert); # for debugging
                return false;
			}
        }
		else
			return false;
    } // << End insert()   -----------------------------------------------------

    public function delete($table,$where = null) {
        if($this->tableExists($table)) {
			if($where == null)
                $delete = 'DELETE FROM '.$table;
            else
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;

            $del = @$this->runQuery($delete);

            if($del)
                return true;
            else
               return false;
        }
        else
            return false;
    } // << End delete()   -----------------------------------------------------

    public function update($table,$rows,$where,$debugging=0) {
        if($this->tableExists($table)) {
		   for($i = 0; $i < count($where); $i++) {
                if($i%2 != 0) {
					if(@$where[$i+1] != NULL)
						$where[$i] = '"'.$where[$i].'" AND ';
					else
						$where[$i] = '"'.$where[$i].'"';
                }
            }
            $where = implode('=',$where);
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++) {
                if(is_string($rows[$keys[$i]]))
                    $update .= $keys[$i].'="'.$this->esc_str($rows[$keys[$i]]).'"';
                else
                    $update .= $keys[$i].'='.$this->esc_str($rows[$keys[$i]]);

                // Parse to add commas
                if($i != count($rows)-1)
                    $update .= ',';
            }

		    $update .= ' WHERE '.$where;
			if($debugging==1)
			   echo $update;
            $query = @$this->runQuery($update);
            if($query)
                return true;
            else
                return false;
        }
        else
            return false;
    } // << End update()   -----------------------------------------------------

	public function esc_str($str) {
		if(!empty($str)) {
			$mysqli = $this->mysqli;
			return $mysqli->real_escape_string($str);
		}
	} // << End esc_str()   -----------------------------------------------------

	public function disable_auto_commit() {
		$mysqli = $this->mysqli;
		return $mysqli->autocommit(FALSE);
	}

	public function commit_transiction() {
		$mysqli = $this->mysqli;
		return $mysqli->commit();
	}

	public function rollback_transiction() {
		$mysqli = $this->mysqli;
		return $mysqli->rollback();
	}

	public function runQuery($sql_query) {
		if(empty($sql_query))
			   exit(0);
		if($this->debugOnce) {
			echo "<br>".$sql_query."<br>";
		}
		$mysqli = $this->mysqli;
		$mysqli->set_charset('utf8');
		$result = $mysqli->query($sql_query);
		if($result == false) {
			$this->failed_query_count++;
			$this->error_msg[] = $mysqli->error;
		}
		return $result;
	} // << End runQuery()   -----------------------------------------------------

} // << End class Database   ------------------------------------------------------------------------------

$_db = new Database();

?>
