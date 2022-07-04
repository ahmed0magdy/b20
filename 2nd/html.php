<?php

$name = 'asmaa';

$message = "Welcome";

?>

<h1><?php echo $message . ' ' . $name ?></h1>
<h1><?= $message . ' ' . $name ?></h1>

<?php 
echo "<h1>{$message} {$name}</h1>";
echo "<h1>" . $message . ' ' . $name . '</h1>';

$output = "<h1>";
$output .= $message . ' ';
$output .= $name;
$output .= "</h1>";
echo $output;

$select = "<select>";
$select .= "<option>Cairo</option>";
$select .= "<option>Alex</option>";
$select .= "<option>Giza</option>";
$select .= "</select>";
echo $select;


?>



