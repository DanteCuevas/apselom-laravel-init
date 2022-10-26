<?php
//dd($users);
foreach ($users as $key => $user) {
    echo $user->name.', '.$user->email.'<br>';
}