<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/3/2017
 * Time: 9:25 PM
 */
$minPrice = $_POST['min'];
$maxPrice = $_POST['max'];

$view = $_POST['view'];

$category = $_POST['Category'];

$condition = $_POST['condition'];

$zip = $_POST['zip'];

echo $minPrice;
echo $maxPrice;
echo $condition;
echo $zip;
echo $view;
echo $category;

header('Location: mainPage.php?min='.urlencode($minPrice)."&max=".urlencode($maxPrice)."&condition=".urlencode($condition)."&zip=".urlencode($zip)."&view=".urlencode($view)."&category=".urlencode($category));

//echo "<a href='index.php?choice=search&cat=".urlencode($cat)."&subcat=".urlencode($subcat)."&srch=".urlencode($srch)."&page=".urlencode($next)."'> Next </a>";



?>