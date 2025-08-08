<?php

use Illuminate\Support\Facades\File;


test('make service command creates service successfully', function () {
    $serviceName = 'Pest1244TestService';
    $servicePath = app_path("Services/{$serviceName}.php");
    
    // Asegurar que el archivo no existe antes del test
    if (File::exists($servicePath)) {
        File::delete($servicePath);
    }

    $this->artisan("make:service {$serviceName}")
        ->expectsOutput("Servicio {$serviceName} creado exitosamente.")
        ->assertExitCode(0);

    expect(File::exists($servicePath))->toBeTrue();
    
    // Verificar el contenido del archivo generado
    $content = File::get($servicePath);
    expect($content)->toContain('namespace App\\Services;');
    expect($content)->toContain("class {$serviceName}"); // Corregido: sin punto y coma
    expect($content)->toContain('public function __construct()');

    // Limpiar después del test
    File::delete($servicePath);
});


