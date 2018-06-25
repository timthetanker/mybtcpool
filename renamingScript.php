<?php
#TODO match teamID with teamName
if($handle = opendir('team-logos')){
    while (false !== ($fileName = readdir($handle))) {

        $string1 = substr($fileName, 0, 2);
        $append = '.';
        $string2 = substr($fileName, 2, 3);
        $newString = $string1 . $append . $string2;
        // echo $newString;
        echo '<br />';
        echo $fileName;
        rename('bru-team-logos/' . $fileName, $newString);
        //echo $newName;
        //rename($fileName, $newName);
    }
    closedir($handle);
}
?>