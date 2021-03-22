<?php

require_once("DB.php");


$database = new DB("localhost", "mysql", "mysql", "work-1");
$response = $database->get('categories');


function сreateTree($categories, $index = 0)
{
    $array = [];
    foreach($categories as $category)
    {
        if($index == $category['parent_id'])
        {
            $recursion = сreateTree($categories, $category['categories_id']);
            if(!empty($recursion))
            {
            	$array[$category['categories_id']] = $recursion;
            }
            else
            	{
				$array[$category['categories_id']] = $category['categories_id'];
            }
        }
    }
    return $array;
}

echo "<pre>";
print_r(сreateTree($response));
?>