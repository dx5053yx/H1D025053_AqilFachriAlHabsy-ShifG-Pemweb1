<?php
require_once __DIR__ . "/common.php";

$entity = (string) ($_GET["entity"] ?? $_POST["entity"] ?? "");
$definition = entity_definition($entity);
$id = filter_var($_GET["id"] ?? $_POST["id"] ?? "", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID data tidak valid.");
}

$statement = $koneksi->prepare("SELECT * FROM {$definition['table']} WHERE id = ?");
$statement->bind_param("i", $id);
$statement->execute();
$record = $statement->get_result()->fetch_assoc();
if (!$record) {
    http_response_code(404);
    exit("Data tidak ditemukan.");
}

$values = [];
foreach ($definition["fields"] as $name => $field) {
    $values[$name] = $record[$name];
}
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$values, $errors] = validate_entity_values($definition);

    if (!$errors) {
        $assignments = [];
        foreach (array_keys($definition["fields"]) as $name) {
            $assignments[] = $name . " = ?";
        }
        $statement = $koneksi->prepare(
            "UPDATE {$definition['table']} SET " . implode(", ", $assignments) . " WHERE id = ?"
        );
        $parameters = array_values($values);
        $parameters[] = $id;
        bind_parameters($statement, str_repeat("s", count($values)) . "i", $parameters);
        $statement->execute();

        header("Location: " . $definition["page"]);
        exit;
    }
}

$pageTitle = "Ubah " . $definition["label"];
$formAction = "update.php?entity=" . rawurlencode($entity) . "&id=" . (int) $id;
$submitLabel = "Simpan perubahan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_html($pageTitle); ?></title>
</head>
<body>
    <h1><?php echo escape_html($pageTitle); ?></h1>
    <p><a href="<?php echo escape_html($definition["page"]); ?>">Kembali ke daftar</a></p>
    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?><li><?php echo escape_html($error); ?></li><?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="<?php echo escape_html($formAction); ?>" method="post">
        <input type="hidden" name="entity" value="<?php echo escape_html($entity); ?>">
        <input type="hidden" name="id" value="<?php echo (int) $id; ?>">
        <?php include __DIR__ . "/form_fields.php"; ?>
        <button type="submit"><?php echo escape_html($submitLabel); ?></button>
    </form>
</body>
</html>