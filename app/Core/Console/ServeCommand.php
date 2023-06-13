<?php

namespace app\Core\Console;

class ServeCommand extends Command
{
    protected $name = 'serve';
    protected $description = 'Menjalankan server lokal';

    public function run(array $input)
    {
        $port = isset($input[1]) ? $input[1] : 8000;

        $host = 'localhost';
        $docRoot = __DIR__ . '/../../../public';

        $serverCommand = sprintf('php -S %s:%d -t %s', $host, $port, $docRoot);

        echo "Server berjalan di http://$host:$port" . PHP_EOL;
        echo "Tekan CTRL+C untuk menghentikan server." . PHP_EOL;

        exec($serverCommand);
    }
}
