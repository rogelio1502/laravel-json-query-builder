<?php

declare(strict_types=1);

namespace Voice\JsonQueryBuilder\RequestParameters;

class ReturnsParameter extends AbstractParameter
{
    public static function getParameterName(): string
    {
        return 'returns';
    }

    public function appendQuery(): void
    {
        $this->builder->select($this->arguments);
    }
}
