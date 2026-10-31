<?php
require_once __DIR__ . "/koneksi.php";

function escape_html($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function entity_definition($entity)
{
    $definitions = [
        "barang" => [
            "table" => "barang",
            "label" => "Barang",
            "page" => "barang.php",
            "fields" => [
                "nama" => ["label" => "Nama barang", "type" => "text", "maxlength" => 100],
                "harga" => ["label" => "Harga", "type" => "number", "min" => "0", "step" => "0.01"],
            ],
        ],
        "pembeli" => [
            "table" => "pembeli",
            "label" => "Pembeli",
            "page" => "pembeli.php",
            "fields" => [
                "nama" => ["label" => "Nama pembeli", "type" => "text", "maxlength" => 100],
                "no_hp" => ["label" => "Nomor HP", "type" => "tel", "maxlength" => 20],
                "alamat" => ["label" => "Alamat", "type" => "textarea", "maxlength" => 255],
            ],
        ],
        "kurir" => [
            "table" => "kurir",
            "label" => "Kurir",
            "page" => "kurir.php",
            "fields" => [
                "nama" => ["label" => "Nama kurir", "type" => "text", "maxlength" => 100],
                "no_hp" => ["label" => "Nomor HP", "type" => "tel", "maxlength" => 20],
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

        if ($field["type"] === "number" && (!is_numeric($value) || (float) $value < 0)) {
            $errors[] = $field["label"] . " harus berupa angka nol atau lebih.";
        }
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
