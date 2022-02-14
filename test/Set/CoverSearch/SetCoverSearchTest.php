<?php

declare(strict_types=1);

namespace App\Test\Set\CoverSearch;

use App\Set\CoverSearch\SetCoverSearch;
use App\Set\Set;
use PHPUnit\Framework\TestCase;

final class SetCoverSearchTest extends TestCase
{
    public function testSearchCover(): void
    {
        $coverSearchService = new SetCoverSearch();

        $result = $coverSearchService->search(
            [
                Set::fromArray('ONE', ['ID', 'NV', 'UT',]),
                Set::fromArray('TWO', ['WA', 'ID', 'MT',]),
                Set::fromArray('THREE', ['OR', 'NV', 'CA',]),
                Set::fromArray('FOUR', ['NV', 'UT',]),
                Set::fromArray('FIVE', ['CA', 'AZ',]),
            ],
            $needles = Set::fromArray('needles', ['ID', 'NV', 'UT', 'WA', 'MT', 'OR', 'CA', 'AZ']),
        );

        self::assertSame(
            $needles->getElements(),
            array_map(static fn(Set $element) => $element->getName(), $result->getElements()),
        );
    }
}