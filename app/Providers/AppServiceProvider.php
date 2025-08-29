<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //  foreach (glob(app_path('Helpers') . '/*.php') as $filename) {
        //         require_once $filename;
        //     }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

         // Registra a diretiva Blade personalizada
        Blade::directive('inlineJs', function ($expression) {
            return "<?php echo App\Helpers\AssetHelper::inlineJs({$expression}); ?>";
        });

        require_once app_path('Helpers/Helper.php');
        $this->registerBladeDirectives();
         // se preferir deixar aqui
    }

    private function registerBladeDirectives(): void
    {
        Blade::directive('inlineCssList', fn($files) => "
        <?php
        foreach (explode(',', {$files}) as \$f) {
            \$f = trim(\$f, \" '\");
            \$css = file_get_contents(resource_path('css/'.\$f));
            \$css = minifyCss(\$css);
            echo \"<style>{\$css}</style>\";
        }
        ?>
        ");

        Blade::directive('inlineJsList', fn($files) => "
            <?php
            foreach (explode(',', {$files}) as \$f) {
                \$f = trim(\$f, \" '\");
                \$js = file_get_contents(resource_path('js/'.\$f));
                echo \"<script>{\$js}</script>\";
            }
            ?>
            ");


    }
}
