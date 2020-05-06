<?php
/**
 * @param String $typeMessage
 * @param String $message
 */
function toastr(String $typeMessage, String $message)
{
    session()->flash('message', [
        'type-message' => $typeMessage,
        'message' => $message
    ]);
}