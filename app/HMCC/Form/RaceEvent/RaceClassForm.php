<?php namespace HMCC\Form\RaceEvent;

use HMCC\Validation\RaceEvent\RaceClassValidator;
use HMCC\Repository\RaceEvent\RaceClassRepository;
use HMCC\Form\Form;

class RaceClassForm extends Form {

    public function __construct(RaceClassRepository $repository, RaceClassValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

}
