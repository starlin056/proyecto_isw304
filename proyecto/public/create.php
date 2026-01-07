<?php require_once __DIR__ . '/../config/db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = trim($_POST['titulo'] ?? '');
  $descripcion = trim($_POST['descripcion'] ?? '');
  if ($titulo === '') { $msg = 'El título es requerido'; }
  else {
    $stmt = $pdo->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
    $stmt->execute([$titulo, $descripcion !== '' ? $descripcion : null]);
    header('Location: index.php'); exit;
  }
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Crear tarea</title></head><body>
<h1>Crear tarea</h1>
<?php if ($msg) echo "<p style='color:red'>".htmlspecialchars($msg)."</p>"; ?>
<form method="post">
  <label>Título: <input name="titulo" required></label><br><br>
  <label>Descripción: <textarea name="descripcion"></textarea></label><br><br>
  <button type="submit">Guardar</button> <a href="index.php">Volver</a>
</form>
</body></html>
