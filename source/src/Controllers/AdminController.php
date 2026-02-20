<?php

class AdminController {
    public function dashboard($output = '', $error = '') {
        $content = __DIR__ . '/../Views/admin.php';
        require __DIR__ . '/../Views/layout.php';
    }

    public function execute() {
        $outputLines = [];
        $returnVar = 0;
        $allowedCommands = ['ls', 'mkdir', 'tee'];
        
        $command = $_POST['command'] ?? '';
        $args = $_POST['args'] ?? '';

        if (!in_array($command, $allowedCommands)) {
            $error = "Command not allowed. Only ls, mkdir, and tee are permitted.";
            $this->dashboard('', $error);
            return;
        }

        $fullCommand = '';
        switch ($command) {
            case 'ls':
                $fullCommand = 'ls -la /var/www/html/filesystem/';
                $output = shell_exec($fullCommand . ' 2>&1');
                $this->dashboard($output, '');
                break;
            case 'mkdir':
                $dir = basename($args);
                if (empty($dir) || $dir === '.' || $dir === '..') {
                    $error = "Invalid directory name";
                    $this->dashboard('', $error);
                    return;
                }
                $fullCommand = "mkdir -p /var/www/html/filesystem/" . escapeshellarg($dir);
                exec($fullCommand . ' 2>&1', $outputLines, $returnVar);
                if ($returnVar !== 0) {
                $error = "Failed to create folder. Error: " . implode("\n", $outputLines);
                $this->dashboard('', $error);
                } else {
                    $output = "Created folder at /var/www/html/filesystem/" . $dir;
                    $this->dashboard($output, '');
                }
                break;
            case 'tee':
                $parts = explode('|', $args, 2);
                if (count($parts) !== 2) {
                    $error = "Invalid tee format. Use: filename|content";
                    $this->dashboard('', $error);
                    return;
                }
                $filename = $parts[0];
                $content = $parts[1];

                if (empty($filename)) {
                    $error = "Invalid filename";
                    $this->dashboard('', $error);
                    return;
                }
                
                $fullCommand = "echo " . escapeshellarg($content) . " | tee /var/www/html/filesystem/" . escapeshellarg($filename);
                exec($fullCommand . ' 2>&1', $outputLines, $returnVar);
                if ($returnVar !== 0) {
                $error = "Failed to create file. Error: " . implode("\n", $outputLines);
                $this->dashboard('', $error);
                } else {
                    $output = "Created file at /var/www/html/filesystem/" . $filename;
                    $this->dashboard($output, '');
                }
                break;
            default: 
                $this->dashboard('', "How'd you even get here?");
                break;
        }
    }
}