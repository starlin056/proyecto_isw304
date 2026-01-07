<?php require_once __DIR__ . '/../config/db.php';
$stmt = $pdo->query("SELECT id, titulo, estado, creado_en FROM tareas ORDER BY id DESC");
$tareas = $stmt->fetchAll();
?>
<!doctype html><html><head><meta charset="utf-8"><title>CRUD Tareas</title></head><body>
<h1>Listado de tareas</h1>
<p><a href="create.php">Crear nueva</a></p>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Título</th><th>Estado</th><th>Creado</th><th>Acciones</th></tr>
  <?php foreach ($tareas as $t): ?>
    <tr>
      <td><?= htmlspecialchars($t['id']) ?></td>
      <td><?= htmlspecialchars($t['titulo']) ?></td>
      <td><?= htmlspecialchars($t['estado']) ?></td>
      <td><?= htmlspecialchars($t['creado_en']) ?></td>
      <td>
        <a href="edit.php?id=<?= $t['id'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $t['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
</body></html>
