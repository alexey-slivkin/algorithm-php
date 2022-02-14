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
                $one = Set::fromArray('ONE', ['ID', 'NV', 'UT',]),
                $two = Set::fromArray('TWO', ['WA', 'ID', 'MT',]),
                $three = Set::fromArray('THREE', ['OR', 'NV', 'CA',]),
                $four = Set::fromArray('FOUR', ['NV', 'UT',]),
                $five = Set::fromArray('FIVE', ['CA', 'AZ',]),
            ],
            Set::fromArray('needles', ['ID', 'NV', 'UT', 'WA', 'MT', 'OR', 'CA', 'AZ']),
        );

        self::assertEquals(
            [$one, $two, $three, $five],
            $result->getElements(),
        );
    }
}