<?php
require_once __DIR__ . "/koneksi.php";

function escape_html($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function entity_definition($entity)
{
    $definitions = [
        "posts" => [
            "table" => "posts",
            "label" => "Artikel",
            "page" => "posts.php",
            "fields" => [
                "judul" => ["label" => "Judul", "type" => "text", "maxlength" => 100],
                "konten" => ["label" => "Konten (minimal 2 paragraf)", "type" => "textarea", "maxlength" => 1000],
            ],
        ],
    ];

    if (!isset($definitions[$entity])) {
        http_response_code(400);
        exit("Jenis data tidak dikenal.");
    }

    return $definitions[$entity];
}

function validate_entity_values($definition)
{
    $values = [];
    $errors = [];

    foreach ($definition["fields"] as $name => $field) {
        $value = trim((string) ($_POST[$name] ?? ""));
        $values[$name] = $value;

        if ($value === "") {
            $errors[] = $field["label"] . " wajib diisi.";
            continue;
        }

        if (isset($field["maxlength"])) {
            $length = function_exists("mb_strlen") ? mb_strlen($value, "UTF-8") : strlen($value);
            if ($length > $field["maxlength"]) {
                $errors[] = $field["label"] . " maksimal " . $field["maxlength"] . " karakter.";
            }
        }

    }

    if (isset($values["konten"]) && count(preg_split("/\\R\\s*\\R/", $values["konten"])) < 2) {
        $errors[] = "Konten artikel harus terdiri dari minimal dua paragraf yang dipisahkan baris kosong.";
    }

    return [$values, $errors];
}

function bind_parameters($statement, $types, &$values)
{
    $arguments = [$types];
    foreach (array_keys($values) as $key) {
        $arguments[] = &$values[$key];
    }
    call_user_func_array([$statement, "bind_param"], $arguments);
}
