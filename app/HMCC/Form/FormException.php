<?php

namespace HMCC\Form;

use Exception;

class FormException extends Exception {

    private $messages;

    public function __construct($messages) {
        $this->messages = $messages;
    }

    /**
     * Returns the messages of the FormException
     * @returns Array Returns an array of all the messages.
     */
    public function getMessages() {
        return $this->messages;
    }

}
