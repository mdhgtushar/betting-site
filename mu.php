<?php   $shot = $_POST['leadShot'];

foreach ($shot as $shotall) {
    $leadShot[] = implode(' - ', $shotall);
}

$name = mysql_real_escape_string($name);

mysql_query("INSERT INTO leaderboards (leadName,leadDate,leadScore,leadShot) VALUES ('$name','$date','$score','$shot')")or die(mysql_error()); 

?>

<li class="field"><h2>Hole 1</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 2</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 3</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 4</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 5</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 6</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 7</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 8</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>
    <li class="field"><h2>Hole 9</h2><input class="input" name="leadShot[]" id="leadShot[]" type="text" value="" size="103" /></li>