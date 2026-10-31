<?php
require_once __DIR__ . "/common.php";

$entity = (string) ($_GET["entity"] ?? $_POST["entity"] ?? "");
$definition = entity_definition($entity);
$values = array_fill_keys(array_keys($definition["fields"]), "");
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$values, $errors] = validate_entity_values($definition);

    if (!$errors) {
        $columns = implode(", ", array_keys($definition["fields"]));
        $placeholders = implode(", ", array_fill(0, count($definition["fields"]), "?"));
        $statement = $koneksi->prepare("INSERT INTO {$definition['table']} ({$columns}) VALUES ({$placeholders})");
        $parameters = array_values($values);
        bind_parameters($statement, str_repeat("s", count($parameters)), $parameters);
        $statement->execute();

        header("Location: " . $definition["page"]);
        exit;
    }
}

$pageTitle = "Tambah " . $definition["label"];
$formAction = "create.php?entity=" . rawurlencode($entity);
$submitLabel = "Simpan";
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
        <?php include __DIR__ . "/form_fields.php"; ?>
        <button type="submit"><?php echo escape_html($submitLabel); ?></button>
    </form>
</body>
</html>