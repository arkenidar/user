<?php

function request_require_parameters($parameters){
    foreach( $parameters as $parameter )
        if( isset( $_REQUEST[$parameter] ) == false )
            return false;
    return true;
}

function response_exit_message($message){
    header('Content-Type: application/json');
    exit( json_encode( array( 'message' => $message )));
}

function request_valid_parameters_check($parameters){
    if(request_require_parameters($parameters)==false)
        response_exit_message('invalid parameters');
}

?>