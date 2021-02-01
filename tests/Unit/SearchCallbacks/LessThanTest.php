<?php

declare(strict_types=1);

namespace Asseco\JsonQueryBuilder\Tests\Unit\SearchCallbacks;

use Asseco\JsonQueryBuilder\SearchCallbacks\LessThan;
use Asseco\JsonQueryBuilder\SearchParser;
use Asseco\JsonQueryBuilder\Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;
use Mockery;

class LessThanTest extends TestCase
{
    protected Builder $builder;
    protected SearchParser $searchParser;

    public function setUp(): void
    {
        parent::setUp();

        /**
         * @var Builder $builder
         */
        $this->builder = app(Builder::class);

        $this->searchParser = Mockery::mock(SearchParser::class);
        $this->searchParser->type = 'test';
        $this->searchParser->column = 'test';
    }

    /** @test */
    public function produces_query()
    {
        $this->searchParser->values = ['123'];

        new LessThan($this->builder, $this->searchParser);

        $sql = 'select * where "test" < ?';

        $this->assertEquals($sql, $this->builder->toSql());
    }
}
