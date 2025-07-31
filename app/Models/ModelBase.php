<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Clase base para los modelos de la aplicación.
 *
 * @OA\Schema(
 *      title="Modelo Base",
 *      description="Clase base para los modelos de la aplicación",
 *      @OA\Xml(
 *          name="ModelBase"
 *      )
 * )
 */
class ModelBase extends Model
{
     /**
     * Traits utilizados por el modelo.
     */
    use HasFactory;

    /**
     * Identificador primario default para cada tabla.
     * @OA\Property(
     *      property="primaryKey",
     *      type="string",
     *      description="Nombre del campo que se usara como identificador primario",
     *      example="id"
     * )
     */
    protected $primaryKey = 'id';

    /**
     * @OA\Property(
     *      property="timestamps",
     *      type="boolean",
     *      description="Indicador de que no se manejaran las fechas de registro automatizadas",
     * )
     */
    public $timestamps = false;
}
