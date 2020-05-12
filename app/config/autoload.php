<?php

$pluginsAutoLoad = [
    "alertify" => [
        "js" => ["js/alertify"],
        "css" => ["css/alertify"]
    ],
    "sweetalert" => [
        "js" => ["sweetalert2.all"],
        "css" => null,
    ],
    "mascara" => [
        "js" => ["mascara"],
        "css" => null,
    ],
    "dropify" => [
        "js" => ["js/dropify.min"],
        "css" => ["css/dropify.min"],
    ],
    "selectize" => [
        "js" => ["dist/js/standalone/selectize"],
        "css" => ["dist/css/selectize"]
    ],
    "newsletter" => [
        "js" => ["dist/js/standalone/selectize"],
        "css" => ["dist/css/selectize"]
    ]
];


// Salva como constant
defined("PLGUINS_AUTOLOAD") OR define("PLGUINS_AUTOLOAD", serialize($pluginsAutoLoad));