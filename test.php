
<?php
/*function concat($id, $arg_2, $arg_n)
{
    echo "Exemple de fonction.\n";
    return $retval;
}*/

$id = 1;
$DateAndTime = substr(date('Y'),-2);
$stringID = "SPR";
$codeClient= $DateAndTime.$stringID.$id;

echo "The current date and time are $codeClient";
?>
