<?php
require_once(__DIR__.'/database.php');
require_once(__DIR__.'/query.php');
require_once(__DIR__.'/data.values.php');

/*
 * Author  Avinash Kumar  < toAvinash@clipming.com >
 * Copyright 2016 ClipMing.Com
 */

// - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

/*
 * Use for Installing the Root Database called 'dbpro', 
 * It will overwrite any previous Installation.
 */

 class Installer {
	  private $decimalPos = 5;
	  public function makeInstall() {
			 global $_db, $sql;
			 $before_count = $_db->failed_query_count;

			 require_once(__DIR__.'/query.php');
			 $_db->disable_auto_commit();

			 foreach($sql as $query) {
				 @$_db->runQuery($query);
			 }
		     echo '-- Database Schema Created <br><br>';

			 $this->Insert_data();
		     echo '-- Record Inserted <br><br>';
		     $this->calInput();
		     $this->calOutput();
		     echo '-- Result Calculated <br><br>';
			 $fail_count = ($_db->failed_query_count) - $before_count;
			 if($fail_count == 0) {
				$_db->commit_transiction();
				echo '<span style="color: green;"><b>Database created successfully</b></span>';
			 }
			 else if($fail_count>0) {
				$_db->rollback_transiction(); 
				echo '<span style="color: deeppink;"><b>Total '.$fail_count.' errors occured during execution of basic installation query: <br><br></b></span><span style="color: darkred;">';
				var_dump($_db->error_msg);
				echo'</span>';
			 }
	  } // << End makeInstall()   -----------------------------------------------------
	  
      private function Insert_data() {
		global $_db, $BitVal, $col, $diseases;
		foreach($BitVal as $tableName => $tableData) {
			foreach($tableData as $dis => $values) {
				array_unshift($values,$dis);
				$_db->insert($tableName,$values,$col[$tableName]);
			}
		}
		foreach($diseases as $dis) {
			$_db->insert('final',array($dis,0,0,0,0,0,0),$col['final']);
			$_db->insert('finalOutput',array($dis,0,0,0,0,0,0,0),$col['finalOutput']);
		}
	   } // << End Insert_data()   -----------------------------------------------------
	 
       public function calInput() {
		   global $_db, $tables;
		   foreach($tables as $t) {
			   $tableData = $_db->select($t);
			   foreach($tableData as $desease) {
				   $deseaseName = array_shift($desease);
				    // Decimal calculation
				   $countSym = count($desease);
				   $Dec = 0;
				   foreach($desease as $symptons) {
					   $countSym-=1;
					   $Dec+= (pow(2,$countSym)*$symptons);
				   }
				   $res = $Dec/(pow(2,count($desease)));
				   $res = number_format((float)$res, $this->decimalPos, '.', '');
				   $_db->update('final',array($t=>$res), array('Disease', $deseaseName));
			   }
		   }
	   } // << End calculate()   -----------------------------------------------------
	 
	   public function calOutput() {
		   global $_db, $diseases;
		   $tableData = $_db->select("final", "*", null, null, 1);
		   $rowInd = 1;
		   foreach($tableData as $desease) {
			   $deseaseName = $desease[0];
			   $data = array();
			   $colInd = 1;
			   foreach($diseases as $col) {
				   $data[$col] = $this->addCol($tableData, $colInd, $rowInd);
				   $colInd++;
			   }
			   $_db->update('finalOutput',$data, array('Disease', $deseaseName));
			   $rowInd++;
		   }
	   } // << End calculate()   -----------------------------------------------------
	 
	   private function addCol($tabData, $rowA, $rowB) {
		   $rowA = $tabData[$rowA-1];
		   $rowB = $tabData[$rowB-1];
		   $cellCount = count($rowA);
		   $resSum = 0;
		   $skipCount = 0;
		   for($i=1; $i<$cellCount; $i++) {
			   if($rowB[$i]>0) {
				   $resSum+= $rowA[$i]/$rowB[$i];
			   } else {
				   $resSum+= 0; // Skip Cell
				   $skipCount++;
			   }
		   }
		   $res = $resSum/(($cellCount-$skipCount)-1);
		   $res =  number_format((float)$res, $this->decimalPos, '.', '');
		   return($res);
	   } // << End calculate()   -----------------------------------------------------
	 
 
 } // << End class Installer
$installManager = new Installer();
?>
