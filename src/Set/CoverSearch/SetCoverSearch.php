<?php

declare(strict_types=1);

namespace App\Set\CoverSearch;


use App\Set\Set;

final class SetCoverSearch
{
    /**
     * @param array<Set> $all
     */
    public function search(array $all, Set $needles): Set
    {
        $needles = clone $needles;

        $final = Set::fromArray('final');

        while (count($needles) > 0) {
            $best       = null;
            $covered = Set::fromArray('covered');

            foreach ($all as $currentSet) {
                $newCovered = $needles->intersect($currentSet);
                if (count($newCovered) > count($covered)) {
                    $best       = $currentSet;
                    $covered = $newCovered;
                }
            }

            if ($best === null) {
                throw new \RuntimeException('Cover not found');
            }

            $needles->diff($covered);

            $final->add($best);
        }

        return $final;
    }
}