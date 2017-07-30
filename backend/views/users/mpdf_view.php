<?php

use yii\helpers\Html;
        $data="<table border='1' class='table table-bordered table-striped'>
            <thead>
                <th>Sr.No.</th>
                <th>Username</th>
                <th>Contact No.</th>
                <th>Email ID</th>
            </thead>
            <tbody>";

$i = 1;
foreach($users as $users){

                $data.="<tr>
                    <td> $i </td>
                    <td> $users->username </td>
                    <td> $users->contact </td>
                    <td> $users->email </td>
                </tr>";


$i++;
}

        $data.="</tbody>
        </table>";
echo "Total Number of users : ".$i;
echo $data;
