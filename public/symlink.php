<?php

$targetFolder = 'D:\mamin\Programming Projects\cilmi.com\storage\app\public'; 

$linkFolder = 'D:\mamin\Programming Projects\cilmi.com\public';

symlink($targetFolder,$linkFolder);

echo 'process completed';

?>