<?php
  function _count($table, $key, $value, $db)
  {
    #Get number of Administrative courses
  	$q = $db->prepare("select count(id) from $table where $key = ?");
  	$q->bind_param('s',$value);
  	$q->execute();
  	$q->bind_result($number);
  	$q->fetch();
  	$q->close();
    return $number;
  }
?>
