
<?php
if (!isset($myObj)) $myObj =  new stdClass(); // check whether the object already exists
   $myObj->name = "John";

    // we define some property for the object
   $myObj->age = 30 ;
   $myObj->city = "New York";
   $myJSON =   json_encode($myObj);

    // json_encode() Returns the JSON representation of a value
   echo $myJSON;

?>