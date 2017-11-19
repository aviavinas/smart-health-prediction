<?php
session_start();
require_once(__DIR__.'/database.php');

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
 * Provides some most Commonly used Method across
 * the Website, without Creating a object.
 */

class common {
	  public static function getSession() {
		if(!isset($_SESSION))
			   session_start();
	  } // << End getSession()   -----------------------------------------------------

	  public static function arrayMaxDepth($array) {
		if(!is_array($array)) return(0);

		$max_depth = 1;
		foreach ($array as $value) {
			if (is_array($value)) {
				$depth = static::arrayMaxDepth($value) + 1;

				if ($depth > $max_depth) {
					$max_depth = $depth;
				}
			}
		}

		return $max_depth;
	  }

	  public static function getImg($url,$localPath = "../Data/img/") {
		if(!file_exists($localPath)) {
			mkdir($localPath, 0777, true);
		}

		$uniqueName = md5($url).".jpeg";
		$localPath.= $uniqueName;
		clearstatcache();
		if(is_file($localPath)) {return($localPath);} #Skipping Download

		//Get the file
		$content = file_get_contents($url);
		$fp = fopen($localPath, "w");
		fwrite($fp, $content);
		fclose($fp);

		return($localPath);
	  }

	// Function for getting Indian Standard Time
	  public static function ist_time() {
			date_default_timezone_set('Asia/Kolkata');
			$time_now=mktime(date('h'),date('i'),date('s'));
	    		$date = date('Y-m-d H:i:s', $time_now);
	    		return $date;
	      } // << End ist_time()   -----------------------------------------------------

	 public function sec2time($seconds) {
	   $sec = round($seconds);
	   if($sec>=3600) {
		   return sprintf('%02d:%02d:%02d', ($sec/3600),($sec/60%60), $sec%60);
	   } else {
		   return sprintf('%02d:%02d', ($sec/60%60), $sec%60);
	   }
	}

	// Function for Converting youtube time to standard time
	public function covtime($youtube_time) {
    	    preg_match_all('/(\d+)/',$youtube_time,$parts);

    		// Put in zeros if we have less than 3 numbers.
    		if (count($parts[0]) == 1) {
    			array_unshift($parts[0], "0", "0");
    		} elseif (count($parts[0]) == 2) {
    			array_unshift($parts[0], "0");
    		}

    		$sec_init = $parts[0][2];
    		$seconds = $sec_init%60;
    		$seconds_overflow = floor($sec_init/60);

    		$min_init = $parts[0][1] + $seconds_overflow;
    		$minutes = ($min_init)%60;
    		$minutes_overflow = floor(($min_init)/60);

    		$hours = $parts[0][0] + $minutes_overflow;

    		if($hours != 0)
    			return $hours.':'.$minutes.':'.$seconds;
    		else
    			return $minutes.':'.$seconds;
    	} // << End covtime()   -----------------------------------------------------

    	// Function for calculating about time from now in normal english words
    	public function convToAboutTime($date_str) {
    		$dt = strtotime($date_str);
    		$y = date("Y", $dt);
    		$m = date("m", $dt);
    		$d = date("d", $dt);
    		$h = date("H", $dt);
    		$i = date("i", $dt);
    		$s = date("s", $dt);

    		$cy = date("Y", time());
    		$cm = date("m", time());
    		$cd = date("d", time());
    		$ch = date("H", time());
    		$ci = date("i", time());
    		$cs = date("s", time());

    		if($cy > $y)
    		   return abs($cy-$y)." year";
    		else if($cm > $m)
    		   return abs($cm-$m)." month";
    		else if($cd > $d)
    		   return abs($cd-$d)." day";
    		else if($ch > $h)
    		   return abs($ch-$h)." hour";
    		else if($ci > $i)
    		   return abs($ci-$i)." minute";
    		else if($cs > $s)
    		   return abs($cs-$s)." second";
    	} // << End convToAboutTime()   -----------------------------------------------------

	  // To generate a unique set of key
	  public static function keygen($key_length){
		$chars = "abcdefghijklmnopqrstuvwxyz";
		$chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$chars .= "0123456789";
		while(1){
			$key = '';
			srand((double)microtime()*1000000);
			for($i = 0; $i < $key_length; $i++){
				$key .= substr($chars,(rand()%(strlen($chars))), 1);
			}
			break;
		}
		return $key;
	  }

	public static function countryWidget() {
		return '
<select id="r_CountryCode" class="text sutxt inp" style="width: 37%;" name="CountryCode">
  <option value="AF">  Afghanistan (‫افغانستان‬‎) </option>
  <option value="AX">Åland Islands (Åland) </option>
  <option value="AL">Albania (Shqipëri) </option>
  <option value="DZ">Algeria </option>
  <option value="AS">American Samoa </option>
  <option value="AD">Andorra </option>
  <option value="AO">Angola </option>
  <option value="AI">Anguilla </option>
  <option value="AQ">Antarctica </option>
  <option value="AG">Antigua &amp; Barbuda </option>
  <option value="AR">Argentina </option>
  <option value="AM">Armenia (Հայաստան) </option>
  <option value="AW">Aruba </option>
  <option value="AC">Ascension Island </option>
  <option value="AU">Australia </option>
  <option value="AT">Austria (Österreich) </option>
  <option value="AZ">Azerbaijan (Azərbaycan) </option>
  <option value="BS">Bahamas </option>
  <option value="BH">Bahrain (‫البحرين‬‎) </option>
  <option value="BD">Bangladesh (বাংলাদেশ) </option>
  <option value="BB">Barbados </option>
  <option value="BY">Belarus (Беларусь) </option>
  <option value="BE">Belgium </option>
  <option value="BZ">Belize </option>
  <option value="BJ">Benin (Bénin) </option>
  <option value="BM">Bermuda </option>
  <option value="BT">Bhutan (འབྲུག) </option>
  <option value="BO">Bolivia </option>
  <option value="BA">Bosnia &amp; Herzegovina (Босна и Херцеговина) </option>
  <option value="BW">Botswana </option>
  <option value="BV">Bouvet Island </option>
  <option value="BR">Brazil (Brasil) </option>
  <option value="IO">British Indian Ocean Territory </option>
  <option value="VG">British Virgin Islands </option>
  <option value="BN">Brunei </option>
  <option value="BG">Bulgaria (България) </option>
  <option value="BF">Burkina Faso </option>
  <option value="BI">Burundi (Uburundi) </option>
  <option value="KH">Cambodia (កម្ពុជា) </option>
  <option value="CM">Cameroon (Cameroun) </option>
  <option value="CA">Canada </option>
  <option value="IC">Canary Islands (islas Canarias) </option>
  <option value="CV">Cape Verde (Kabu Verdi) </option>
  <option value="BQ">Caribbean Netherlands </option>
  <option value="KY">Cayman Islands </option>
  <option value="CF">Central African Republic (République centrafricaine) </option>
  <option value="EA">Ceuta &amp; Melilla (Ceuta y Melilla) </option>
  <option value="TD">Chad (Tchad) </option>
  <option value="CL">Chile </option>
  <option value="CN">China (中国) </option>
  <option value="CX">Christmas Island </option>
  <option value="CP">Clipperton Island </option>
  <option value="CC">Cocos (Keeling) Islands (Kepulauan Cocos (Keeling)) </option>
  <option value="CO">Colombia </option>
  <option value="KM">Comoros (‫جزر القمر‬‎) </option>
  <option value="CD">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) </option>
  <option value="CG">Congo (Republic) (Congo-Brazzaville) </option>
  <option value="CK">Cook Islands </option>
  <option value="CR">Costa Rica </option>
  <option value="CI">Côte d&#39Ivoire </option>
  <option value="HR">Croatia (Hrvatska) </option>
  <option value="CU">Cuba </option>
  <option value="CW">Curaçao </option>
  <option value="CY">Cyprus (Κύπρος) </option>
  <option value="CZ">Czech Republic (Česká republika) </option>
  <option value="DK">Denmark (Danmark) </option>
  <option value="DG">Diego Garcia </option>
  <option value="DJ">Djibouti </option>
  <option value="DM">Dominica </option>
  <option value="DO">Dominican Republic (República Dominicana) </option>
  <option value="EC">Ecuador </option>
  <option value="EG">Egypt (‫مصر‬‎) </option>
  <option value="SV">El Salvador </option>
  <option value="GQ">Equatorial Guinea (Guinea Ecuatorial) </option>
  <option value="ER">Eritrea </option>
  <option value="EE">Estonia (Eesti) </option>
  <option value="ET">Ethiopia </option>
  <option value="FK">Falkland Islands (Islas Malvinas) </option>
  <option value="FO">Faroe Islands (Føroyar) </option>

  <option value="FJ">Fiji </option>
  <option value="FI">Finland (Suomi) </option>
  <option value="FR">France </option>
  <option value="GF">French Guiana (Guyane française) </option>
  <option value="PF">French Polynesia (Polynésie française) </option>
  <option value="TF">French Southern Territories (Terres australes françaises) </option>
  <option value="GA">Gabon </option>
  <option value="GM">Gambia </option>
  <option value="GE">Georgia (საქართველო) </option>
  <option value="DE">Germany (Deutschland) </option>
  <option value="GH">Ghana (Gaana) </option>
  <option value="GI">Gibraltar </option>
  <option value="GR">Greece (Ελλάδα) </option>
  <option value="GL">Greenland (Kalaallit Nunaat) </option>
  <option value="GD">Grenada </option>
  <option value="GP">Guadeloupe </option>
  <option value="GU">Guam </option>
  <option value="GT">Guatemala </option>
  <option value="GG">Guernsey </option>
  <option value="GN">Guinea (Guinée) </option>
  <option value="GW">Guinea-Bissau (Guiné-Bissau) </option>
  <option value="GY">Guyana </option>
  <option value="HT">Haiti </option>
  <option value="HM">Heard &amp; McDonald Islands </option>
  <option value="HN">Honduras </option>
  <option value="HK">Hong Kong (香港) </option>
  <option value="HU">Hungary (Magyarország) </option>
  <option value="IS">Iceland (Ísland) </option>
  <option value="IN" selected="">India (भारत) </option>
  <option value="ID">Indonesia </option>
  <option value="IR">Iran (‫ایران‬‎) </option>
  <option value="IQ">Iraq (‫العراق‬‎) </option>
  <option value="IE">Ireland </option>
  <option value="IM">Isle of Man </option>
  <option value="IL">Israel (‫ישראל‬‎) </option>
  <option value="IT">Italy (Italia) </option>
  <option value="JM">Jamaica </option>
  <option value="JP">Japan (日本) </option>
  <option value="JE">Jersey </option>
  <option value="JO">Jordan (‫الأردن‬‎) </option>
  <option value="KZ">Kazakhstan (Казахстан) </option>
  <option value="KE">Kenya </option>
  <option value="KI">Kiribati </option>
  <option value="XK">Kosovo (Kosovë) </option>
  <option value="KW">Kuwait (‫الكويت‬‎) </option>
  <option value="KG">Kyrgyzstan (Кыргызстан) </option>
  <option value="LA">Laos (ລາວ) </option>
  <option value="LV">Latvia (Latvija) </option>
  <option value="LB">Lebanon (‫لبنان‬‎) </option>
  <option value="LS">Lesotho </option>
  <option value="LR">Liberia </option>
  <option value="LY">Libya (‫ليبيا‬‎) </option>
  <option value="LI">Liechtenstein </option>
  <option value="LT">Lithuania (Lietuva) </option>
  <option value="LU">Luxembourg </option>
  <option value="MO">Macau (澳門) </option>
  <option value="MK">Macedonia (FYROM) (Македонија) </option>
  <option value="MG">Madagascar (Madagasikara) </option>
  <option value="MW">Malawi </option>
  <option value="MY">Malaysia </option>
  <option value="MV">Maldives </option>
  <option value="ML">Mali </option>
  <option value="MT">Malta </option>
  <option value="MH">Marshall Islands </option>
  <option value="MQ">Martinique </option>
  <option value="MR">Mauritania (‫موريتانيا‬‎) </option>
  <option value="MU">Mauritius (Moris) </option>
  <option value="YT">Mayotte </option>
  <option value="MX">Mexico (México) </option>
  <option value="FM">Micronesia </option>
  <option value="MD">Moldova (Republica Moldova) </option>
  <option value="MC">Monaco </option>
  <option value="MN">Mongolia (Монгол) </option>
  <option value="ME">Montenegro (Crna Gora) </option>
  <option value="MS">Montserrat </option>
  <option value="MA">Morocco </option>
  <option value="MZ">Mozambique (Moçambique) </option>
  <option value="MM">Myanmar (Burma) (မြန်မာ) </option>
  <option value="NA">Namibia (Namibië) </option>
  <option value="NR">Nauru </option>
  <option value="NP">Nepal (नेपाल) </option>
  <option value="NL">Netherlands (Nederland) </option>
  <option value="NC">New Caledonia (Nouvelle-Calédonie) </option>
  <option value="NZ">New Zealand </option>
  <option value="NI">Nicaragua </option>
  <option value="NE">Niger (Nijar) </option>
  <option value="NG">Nigeria </option>
  <option value="NU">Niue </option>
  <option value="NF">Norfolk Island </option>
  <option value="MP">Northern Mariana Islands </option>
  <option value="KP">North Korea (조선민주주의인민공화국) </option>
  <option value="NO">Norway (Norge) </option>
  <option value="OM">Oman (‫عُمان‬‎) </option>
  <option value="PK">Pakistan (‫پاکستان‬‎) </option>
  <option value="PW">Palau </option>
  <option value="PS">Palestine (‫فلسطين‬‎) </option>
  <option value="PA">Panama (Panamá) </option>
  <option value="PG">Papua New Guinea </option>
  <option value="PY">Paraguay </option>
  <option value="PE">Peru (Perú) </option>
  <option value="PH">Philippines </option>
  <option value="PN">Pitcairn Islands </option>
  <option value="PL">Poland (Polska) </option>
  <option value="PT">Portugal </option>
  <option value="PR">Puerto Rico </option>
  <option value="QA">Qatar (‫قطر‬‎) </option>
  <option value="RE">Réunion (La Réunion) </option>
  <option value="RO">Romania (România) </option>
  <option value="RU">Russia (Россия) </option>
  <option value="RW">Rwanda </option>
  <option value="WS">Samoa </option>
  <option value="SM">San Marino </option>
  <option value="ST">São Tomé &amp; Príncipe (São Tomé e Príncipe) </option>
  <option value="SA">Saudi Arabia (‫المملكة العربية السعودية‬‎) </option>
  <option value="SN">Senegal </option>
  <option value="RS">Serbia (Србија) </option>
  <option value="SC">Seychelles </option>
  <option value="SL">Sierra Leone </option>
  <option value="SG">Singapore </option>
  <option value="SX">Sint Maarten </option>
  <option value="SK">Slovakia (Slovensko) </option>
  <option value="SI">Slovenia (Slovenija) </option>
  <option value="SB">Solomon Islands </option>
  <option value="SO">Somalia (Soomaaliya) </option>
  <option value="ZA">South Africa </option>
  <option value="GS">South Georgia &amp; South Sandwich Islands </option>
  <option value="KR">South Korea (대한민국) </option>
  <option value="SS">South Sudan (‫جنوب</option>
</select>';
    } // << End countryWidget()   -----------------------------------------------------


	public static function dateWidget() {
		$maxY = date("Y")-5;
		$minY = $maxY-100;
		$yr = '';
		for($i=$maxY;$i>=$minY;$i--) {
			$yr .= '<option value="'.$i.'">'.$i.'</option>';
		};

		return '
<select id="form_dob_day" name="dob_day" class="inp">
	<option value="-">Day</option>
	<option value="01">1</option>
	<option value="02">2</option>
	<option value="03">3</option>
	<option value="04">4</option>
	<option value="05">5</option>
	<option value="06">6</option>
	<option value="07">7</option>
	<option value="08">8</option>
	<option value="09">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>
<select id="form_dob_month" name="dob_month" class="inp">
	<option value="-">Month</option>
	<option value="01">January</option>
	<option value="02">Febuary</option>
	<option value="03">March</option>
	<option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
 </select>
 <select id="form_dob_year" name="dob_year" class="inp">
	<option value="-">Year</option>
	'.$yr.'
</select>';
    } // << End dateWidget()   -----------------------------------------------------

} // << End class common

function el() {	echo "<br><br>"; }

function v($data) { echo "<br>";var_dump($data); }

function j($data) { echo "<br>".json_encode($data)."<br><br>"; }

function t($txt = "Testing ") { echo($txt); }

function seoTxt($txt,$s=0,$e=50) {
	if(is_string($txt)) {
		return(
			urlencode(
				preg_replace('/--/','-',preg_replace('/[^a-zA-Z0-9.]/', '-',substr($txt,$s,$e)))
			)
		);
	}
}

function fixArray($indexErrorArray) {
	if((is_array($indexErrorArray) || is_object($indexErrorArray)) && is_string(key($indexErrorArray))) {
		# Let remove the index problem when single result comes
		$fixedArray[0] = $indexErrorArray;
	} else {
		$fixedArray = $indexErrorArray;
	}
	return $fixedArray;
}

function readable_num($n) {
	// first strip any formatting;
	$n = (0+str_replace(",","",$n));

	// is this a number?
	if(!is_numeric($n)) return false;

	// now filter it;
	if($n>1000000000000) return round(($n/1000000000000),1).' T';
	else if($n>1000000000) return round(($n/1000000000),1).' B';
	else if($n>1000000) return round(($n/1000000),1).' M';
	else if($n>1000) return round(($n/1000),1).' K';

	return number_format($n);
}

?>
