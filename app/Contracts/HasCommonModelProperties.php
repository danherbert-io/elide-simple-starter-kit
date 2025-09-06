<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Model;
use Carbon\CarbonInterface;

/**
 * @mixin Model
 *
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property int $id
 */
interface HasCommonModelProperties {}
