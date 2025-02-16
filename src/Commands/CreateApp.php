<?php

namespace SimpleW\Commands;

class CreateApp {
    public function generate($appName) {
        $root = getcwd() . "/$appName";

        $folders = [
            'app',
            'app/controllers',
            'app/models',
            'app/views',
            'public',
            'public/css',
            'public/js',
            'public/images',
            'config',
            'core',
            'routes'
        ];

        $files = [
            'public/index.php' => "<?php\nrequire '../core/bootstrap.php';",
            'core/bootstrap.php' => "<?php\n// Initialize the application",
            'app/controllers/HomeController.php' => "<?php\nnamespace App\\Controllers;\n\nclass HomeController {\n    public function index() {\n        echo 'Welcome to SimpleW!';\n    }\n}",
            'app/models/User.php' => "<?php\nnamespace App\\Models;\n\nclass User {\n    public function getUser() {\n        return 'John Doe';\n    }\n}",
            'app/views/home.php' => "<h1>Welcome to SimpleW</h1>",
            'routes/web.php' => "<?php\n// Define your web routes here",
            'config/config.php' => "<?php\nreturn [\n    'db_host' => 'localhost',\n    'db_name' => 'mvc_db',\n    'db_user' => 'root',\n    'db_pass' => ''\n];"
        ];

        // Create folders
        foreach ($folders as $folder) {
            $folderPath = $root . '/' . $folder;
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
        }

        // Create files with default content
        foreach ($files as $file => $content) {
            $filePath = $root . '/' . $file;
            if (!file_exists($filePath)) {
                file_put_contents($filePath, $content);
            }
        }

        echo "✅ SimpleW application '$appName' has been created successfully!\n";
    }
}
