<?php

declare(strict_types=1);

namespace GHBJayce\Weapons;

/**
 * Class Random
 * @package GHBJayce\Weapon
 */
class Paginate
{
    public static function calcTotalPage(int $rows, int $page = 1, int $perPage = 15, int $firstPageRows = 0): int
    {
        $total = $firstPageRows && $rows && $page > 1 ? $rows - $firstPageRows : $rows;
        return (int) ceil(($total <= 0 ? 0 : $total) / $perPage);
    }

    public static function calcOffset(int $page = 1, int $perPage = 15, int $firstPageRows = 0): int
    {
        if ($firstPageRows) {
            if ($page === 2) {
                return ($page - 1) * $firstPageRows;
            }
            if ($page > 2) {
                return ($page - 2) * $perPage + $firstPageRows;
            }
        }
        return ($page - 1) * $perPage;
    }
}
