<?php 
# CONNECT TO MySQL DATABASE.


# Connect  on 'localhost' for user 'mike' with password 'easysteps' to database 'limbo_db'.

# Otherwise fail gracefully and explain the error. 

$dbc = @mysqli_connect ( 'localhost', 'root', '', 'foxTalkDB' ) OR die ( mysqli_connect_error() ) ;


# Set encoding to match PHP script encoding.

mysqli_set_charset( $dbc, 'utf8' ) ;
