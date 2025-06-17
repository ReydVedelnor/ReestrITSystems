<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Редактирование группы</title>
  <link rel="stylesheet" href="styles/style1.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
</head>
<body>
  <div class="header">
    <div>Гарант</div>
    <div>Редактирование группы</div>
    <div>admin</div>
  </div>

  <?php $group = $_GET['group'] ?? 'Группа'; ?>

  <div class="group-name-block">
      <label for="group-name">Название группы</label>
      <input type="text" id="group-name" value="<?= htmlspecialchars($group) ?>">
    </div>

  <div class="edit-container">
    <div class="attributes-block">
      <h3>Атрибуты</h3>

      <label><input type="checkbox" checked> Система</label>
      <label><input type="checkbox" checked> Услуга</label>
      <label><input type="checkbox" checked> Наименование системы</label>
      <label><input type="checkbox" checked> Полное наименование</label>
      <label><input type="checkbox"> Краткое наименование системы</label>
      <label><input type="checkbox"> Мероприятия по импортозамещению</label>

      <button class="add-attr">Добавить атрибут</button>
    </div>
  </div>
    <div class="form-actions">
    <button type="button" class="cancel-button" onclick="window.location.href='index.php'">Отменить</button>
    <button type="submit" class="save-button">Сохранить</button>
</div>
    </div>

</body>
</html>
