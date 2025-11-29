<?php

function getConfigDB(): array {
    return [
        "database" => [
            "dev" => [
                // Mengambil nilai dari .env
                "path" => "mysql:host=localhost:3306;dbname=jmk25",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                // Biasanya prod punya env sendiri, tapi logikanya sama
                "path" => "mysql:host=" . getenv('PROD_DB_HOST') . ";dbname=" . getenv('PROD_DB_NAME'),
                "username" => getenv('PROD_DB_USER'),
                "password" => getenv('PROD_DB_PASS')
            ]
        ]
    ];
}