<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Añadiendo macro para agregar con una función las 6 columnas de seguimiento de registros.
         *  El booleano useTimezone define si las columnas de timestamps y softdelete creadas manejara timezone.
         *  Al final la función creara las columnas:
         *      created_at: Fecha de creación del registro.
         *      updated_at: Fecha de ultima modificación del registro.
         *      deleted_at: Fecha de borrado logico seguro del registro.
         *      restored_at: Fecha de restauración del registro.
         *      created_by: Valor entero que recogera el id del usuario que crea el registro.
         *      updated_by: Valor entero que recogera el id del ultimo usuario que modifica el registro.
         *      deleted_by: Valor entero que recogera el id del usuario que hace el borrado logico seguro del registro.
         *      restored_by: Valor entero que recogera el id del usuario que restaura el registro.
         */
        //Schema::defaultStringLength(125);
        Blueprint::macro('userTimestamps', function ($useTimezone = true) {
            if ($useTimezone) {
                $this->timestampsTz();
                $this->softDeletesTz();
                $this->timestampTz('restored_at')->nullable();
            } else {
                $this->timestamps();
                $this->softDeletes();
                $this->timestamp('restored_at')->nullable();
            }
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->unsignedBigInteger('deleted_by')->nullable();
            $this->unsignedBigInteger('restored_by')->nullable();
        });
    }
}
