<?php

$arr = array("lola", "Jax","Dex","Sam", "Jordan");

$selind = array(1,2,5);
$i = 0;
echo '<select multiple>';

foreach ($arr as $key => $value) {
        $i = $i+1;
    echo '<option value="pv'.$i.'" ';
    foreach ($selind as $indkey => $val) 
    {
        if($i == $val)
        {
            echo 'selected';
        }
    }
    echo '>'.$value.'</option>';

}
echo '</select>';


















?>