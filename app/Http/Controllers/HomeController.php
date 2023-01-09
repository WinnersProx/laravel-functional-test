<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{

    public function exportData(): BinaryFileResponse
    {
        $connection = config('database.connections.mysql');
        $exportId = uniqid();

        $pathToFile = "uploads/boards-$exportId.sql";

        \Spatie\DbDumper\Databases\MySql::create()
            ->setDumpBinaryPath(config('database.path_to_dump'))
            ->setHost($connection['host'])
            ->setDbName($connection['database'])
            ->setUserName($connection['username'])
            ->setPassword($connection['password'])
            ->dumpToFile($pathToFile);

        return response()->download($pathToFile);
    }
}
