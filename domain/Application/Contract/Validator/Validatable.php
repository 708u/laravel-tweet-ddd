<?php

namespace Domain\Application\Contract\Validator;

interface Validatable
{
    /**
     * Determine if params has valid format from domain knowledge.
     *
     * @return bool
     */
    public function validate(array $params, array $rules): bool;
}
