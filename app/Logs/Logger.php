<?php

namespace App\Logs;
class Logger
{
    public function info($message)
    {
        $this->log('INFO', $message);
    }

    public function error($message)
    {
        $this->log('ERROR', $message);
    }

    public function emergency($message)
    {
        $this->log('EMERGENCY', $message);
    }

    public function alert($message)
    {
        $this->log('ALERT', $message);
    }

    public function critical($message)
    {
        $this->log('CRITICAL', $message);
    }

    public function warning($message)
    {
        $this->log('WARNING', $message);
    }



    private function log($level, $message)
    {
        $storagePath = storage_path('/logs');
        $logFile = $storagePath . '/laravel-' . date('Y-m-d') . '.log';

        // Implementasi log, misalnya simpan ke file atau kirim ke sistem log eksternal
        $logEntry = "[" . date('Y-m-d H:i:s') . "] [$level] $message";
        file_put_contents($logFile, $logEntry . PHP_EOL, FILE_APPEND);

    }
}