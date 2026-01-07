<?php require_once __DIR__ . '/../config/db.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM tareas WHERE id=?");
$stmt->execute([$id]);
$t = $stmt->fetch();
if (!$t) { http_response_code(404); exit('No encontrado'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = trim($_POST['titulo'] ?? '');
  $descripcion = trim($_POST['descripcion'] ?? '');
  $estado = $_POST['estado'] ?? 'pendiente';
  $stmt = $pdo->prepare("UPDATE tareas SET titulo=?, descripcion=?, estado=? WHERE id=?");
  $stmt->execute([$titulo, $descripcion !== '' ? $descripcion : null, $estado, $id]);
  header('Location: index.php'); exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Editar tarea</title></head><body>
<h1>Editar tarea #<?= htmlspecialchars($t['id']) ?></h1>
<form method="post">
  <label>Título: <input name="titulo" value="<?= htmlspecialchars($t['titulo']) ?>" required></label><br><br>
  <label>Descripción: <textarea name="descripcion"><?= htmlspecialchars($t['descripcion'] ?? '') ?></textarea></label><br><br>
  <label>Estado:
    <select name="estado">
      <?php foreach (['pendiente','en_proceso','completada'] as $s): ?>
        <option value="<?= $s ?>" <?= $t['estado']===$s?'selected':'' ?>><?= $s ?></option>
      <?php endforeach; ?>
    </select>
  </label><br><br>
  <button type="submit">Actualizar</button> <a href="index.php">Volver</a>
</form>
</body></html>
