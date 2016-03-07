<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 5/03/2016
 * Time: 15:28
 */

$username = "bjorngv155";
$password = "7gc7e3qn";
$dbh = new PDO('mysql:host=46.21.173.249;dbname=bjorngv155_Craved', $username, $password);

/*
* We need this function cause I'm lazy
**/
function pdo_query_excute( $sql )
{
    global $dbh;

    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    return $result = $stmt->fetchObject();
}

/*
* get the user data from database by email and password
**/
 function get_user_by_username_and_password( $username, $password )
{
    return pdo_query_excute( "SELECT * FROM users WHERE username = '$username' AND password = '$password'" );
}
 function get_user_by_username( $username )
{
    return pdo_query_excute( "SELECT * FROM users WHERE username = '$username'" );

}

/*
* get the user data from database by provider name and provider user id
**/
function get_user_by_provider_and_id( $provider_name, $provider_user_id )
{
    return pdo_query_excute( "SELECT * FROM users WHERE hybridauth_provider_name = '$provider_name' AND hybridauth_provider_uid = '$provider_user_id'" );
}

/*
* get the user data from database by provider name and provider user id
**/
function create_new_hybridauth_user( $username, $first_name, $last_name, $email, $provider_name, $provider_user_id )
{
    // let generate a random password for the user
    $password = md5( str_shuffle( "0123456789abcdefghijklmnoABCDEFGHIJ" ) );

    pdo_query_excute(
        "INSERT INTO users
		(
		    username,
			email,
			password,
			first_name,
			last_name,
			hybridauth_provider_name,
			hybridauth_provider_uid,
			created_at
		)
		VALUES
		(
		    '$username',
			'$email',
			'$password',
			'$first_name',
			'$last_name',
			$provider_name,
			$provider_user_id,
			NOW()
		)"
    );
}