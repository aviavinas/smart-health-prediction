<?php
require_once('lib/data.values.php');
require_once("lib/installer.php");
require_once('lib/client.php');

/*
 * Author  Avinash Kumar  < toAvinash@clipming.com >
 * Copyright 2017 ClipMing.Com
 *
 *
 * This module provides communication with
 */

// - -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

class layout {
	public $tabHtm = "";
	public $disease = "";
	public $chW = 0;
	public $chH = 0;

	public function getTab() {
		global $tables, $col, $alias, $_db;

		foreach($tables as $table) {
			$sym = explode(",", $col[$table]);
			array_shift($sym);
			$tr = "";
			$numCol = 4;
			$colI = 1;
			$tr.= '<div class="row">';
			foreach($sym as $symtom) {
				$tr.= '<div class="col-md-3 sm">
					<button type="button" class="btn btn-outline-primary ds-bt" data-toggle="button" onClick="tgChk(this)" aria-pressed="false" autocomplete="off">
						<input type="checkbox" id="'.$table.'_'.$symtom.'" name="'.$table.'__'.$symtom.'">
						<label for="'.$table.'_'.$symtom.'"><span></span>'.$alias[$table][$symtom].'</label>
					</button>
				</div>';
				if((($colI%$numCol) == 0) && $colI!=0 && $colI<count($sym))
					$tr.= '</div><div class="row">';
				$colI++;
			}
			$tr.= '</div>';

			$head['symptons'] = "What Symptoms You are Having ?";
			$head['history'] = "Any Past Disease ?";
			$head['lab'] = "What your Lab Sample Says?";
			$head['cognitive'] = "Any Cognitive Ability Problems?";
			$head['physical_exm'] = "Status of Your Physical Exmine?";
			$head['physiological'] = "Any Physiological Disorder?";

			$this->tabHtm.= '
			<div id="'.$table.'" class="tabcontent">
			  <div class="display-4">'.$head[$table].'</div>
			  <div class="jumbotron">'
				  .$tr.
			  '</div>
			</div>';
		}
		return $this->tabHtm;
	}

	public function bmiCalc() {
		// Assuming units as Feet and Kg's
		$heightInch = ($_POST['ht-ft']*12) + $_POST['ht-in'];
		$heightMtr = $heightInch/(39.37);
		$weightKg = $_POST['wt-kg'];
		$this->chW = ((($weightKg-40)*100)/90)*0.82;
		$this->chH = ((($heightInch-55)*100)/22)*0.88;
		if($this->chW<1) {$this->chW = 0;}
		if($this->chH<1) {$this->chH = 0;}
		$bmi = ($weightKg)/($heightMtr*$heightMtr);
		return $bmi;
	}

	public function calInput($decimalPos) {
		global $tables, $col, $_db, $_user;
		# Let this code execute, only if user has submitted the data
		if(!(isset($_POST) && !empty($_POST)))
			return;

		# Fill User Local-virtual table with default as '0' value for each table's symptons
		$bmi = $this->bmiCalc();
		$userData = array();
		foreach($tables as $table) {
			$syms = explode(",",$col[$table]);
			array_shift($syms);
			foreach($syms as $sym) {
				$userData[$table][$sym] = 0;
			}
		}

		# Now update with the data received from user
		foreach($_POST as $check => $val ) {
			$check = explode("__",$check);
			$table = $check[0];
			@$sym = $check[1];
			if(isset($userData[$table][$sym]) && ($userData[$table][$sym]==0)) {
				$userData[$table][$sym] = 1;
			}
		}

		# add a new User to database
		$u = $_user->getInfo();
		$userId = $u['UserID'];
		$_db->insert('userRecord',array($userId),"UserId");

		# Calculate decimal value for each table
		$chances = array();
		$dbFinalTab = $_db->select("final","*");
		$tabCount = 0;
		foreach($userData as $tabName => $symptons) {
			// Decimal calculation
			$tabCount++;
			$countSym = count($symptons);
			$Dec = 0;
			foreach($symptons as $sym) {
			   $countSym-=1;
			   $Dec+= (pow(2,$countSym)*$sym);
			}
			$res = $Dec/(pow(2,count($symptons)));
			$res = number_format((float)$res, $decimalPos, '.', '');
			$update = $_db->update('userRecord',array($tabName=>$res), array('UserId', $userId));

			# Comapare calculated table from standard Final table of Database
			foreach($dbFinalTab as $disease) {
				$diseaseName = $disease['Disease'];
				$dif = abs($disease[$tabName]-$res);
				if(isset($chances[$diseaseName]) && ($chances[$diseaseName]>=0))
					$chances[$diseaseName] += $dif;
				else
					$chances[$diseaseName] = $dif;
			}
		}

		# Now divide all disease chances by no of Tables for getting average
		$result = array();
		foreach($chances as $des => $val) {
			$result[$des] = $val;
		}
		asort($result);
		$update = $_db->update('userRecord',array("result"=>key($result)), array('UserId', $userId));

		//var_dump($result);  # <<-- uncomment this for debugging
		echo '<div id="result" class="display-4 result"><span>Patient has : </span>'.key($result).'</div><br>';
		$this->disease = key($result);
		echo '<div id="result" class="display-4 result"><span>BMI : </span>'.sprintf('%0.2f', $bmi).'</div>';
	} // << End calculate()   -----------------------------------------------------
}

$_L = new layout();
?>
