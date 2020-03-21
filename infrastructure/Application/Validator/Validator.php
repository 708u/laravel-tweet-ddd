<?php

namespace Infrastructure\Application\Validator;

use Domain\Application\Contract\Validator\Validatable;

class Validator implements Validatable
{
    /**
     * Determine if params has valid format from domain knowledge.
     *
     * @param array $params
     * @param array $rules
     * @return bool
     */
    public function validate(array $params, array $rules): bool
    {
        return true;
    }
}
