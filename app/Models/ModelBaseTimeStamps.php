<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelActionBy;
/**
 * @OA\Schema(
 *     schema="ModelBaseTimeStamps",
 *     title="Modelo Base con TimeStamps",
 *     description="Modelo base para todos los modelos del proyecto.",
 * )
 */
class ModelBaseTimeStamps extends ModelBase
{
    /**
     * Traits utilizados por el modelo.
     */
    use ModelActionBy;

    /**
     * @OA\Property(
     *      property="timestamps",
     *      type="boolean",
     *      description="Indicador de que se manejaran las fechas de registro automatizadas",
     * )
     */
    public $timestamps = true;
}