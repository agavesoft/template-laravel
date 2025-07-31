<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $studlyName = str($name)->studly()->toString();

        // Solo agrega 'Service' si no termina con 'Service'
        if (!str_ends_with($studlyName, 'Service')) {
            $serviceName = $studlyName . 'Service';
        } else {
            $serviceName = $studlyName;
        }

        $path = app_path("Services/{$serviceName}.php");

        if (File::exists($path)) {
            $this->error("El servicio {$serviceName} ya existe.");
            return;
        }

        $namespace = 'App\\Services';

        File::ensureDirectoryExists(app_path('Services'));

        File::put($path, <<<PHP
<?php

namespace {$namespace};

class {$serviceName}
{
    public function __construct()
    {
        //
    }
}
PHP);

        $this->info("Servicio {$serviceName} creado exitosamente.");
    }
}
