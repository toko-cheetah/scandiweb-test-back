<?php

// Define the autoloader function
spl_autoload_register(function ($class) {
    // Convert namespace separators to directory separators
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    // Include the file if it exists
    if (file_exists($file)) {
        require_once $file;
    }
});
