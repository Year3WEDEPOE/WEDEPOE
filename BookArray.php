<?php
//Opens Text file
$open = fopen('txtbooks.txt','r');
//read file and convert each line in array php
$lines = file($BookID, $BookName , $AuthorName ,$ISBN ,$BAvailability ,$Content , FILE_IGNORE_NEW_LINES);

//php read text file into array 
while (!feof($open)) 
{
    $file = file("C:\Users\lab_services_student\Desktop/txtbooks.txt");
    echo $file[0]; 
    echo $file[1]; 
    echo $file[2];
    echo $file[3];
    echo $file[4];
}
?>