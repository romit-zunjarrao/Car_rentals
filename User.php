<?php

class User
{
    public $email = NULL;
    public $hash_pw = NULL;
    public $user_id = NULL;

    public $first_name = NULL;
    public $last_name = NULL;
    public $username = NULL;
    public $member_since = NULL;



    //Logout
    public function userLogOut()
    {
        destroySession("ThisUser");
    }
}