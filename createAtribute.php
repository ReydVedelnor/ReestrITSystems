<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание атрибута</title>
    <link rel="stylesheet" href="styles/styleCreateAtribute.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <button id="openModal">Создать атрибут</button>

    <div id="modal" class="modal">
        <div class="modal-content">
            <h3> <span style="color:#71ACFF"> Создание атрибута</h3>
            <hr class="divider">
            
        <div class="input-row">
            <label for="attributeName">Название атрибута</label>
            <input type="text" id="attributeName" placeholder="Введите название атрибута">
        </div>

        <div class="radio-row">
            <span style= "color:#71ACFF;" class="section-label">Тип</span>
            <label><input type="radio" style="transform: scale(1.5)" name="type" value="string" checked> Строка</label>
            <label><input type="radio" style="transform: scale(1.5)" name="type" value="number"> Число</label>
            <label><input type="radio" style="transform: scale(1.5)" name="type" value="list"> Список</label>
            <label><input type="radio" style="transform: scale(1.5)" name="type" value="reference"> Справочник</label>
        </div>


            <p> <span style="color:#71ACFF;"> Кто видит</p>
            <label><input style="transform: scale(1.5)" type="checkbox" checked> Пользователь Предприятия</label>
            <label><input style="transform: scale(1.5)" type="checkbox" checked> Служба заказчика Предприятия</label>
            <label><input style="transform: scale(1.5)" type="checkbox"> Техническая поддержка обслуживающей организации</label>

            <p> <span style="color:#71ACFF;"> Кто может редактировать</p>
            <label><input style="transform: scale(1.5)" type="checkbox" checked> Пользователь Предприятия</label>
            <label><input style="transform: scale(1.5)" type="checkbox" checked> Служба заказчика Предприятия</label>
            <label><input style="transform: scale(1.5)" type="checkbox"> Техническая поддержка обслуживающей организации</label>

            <div class="buttons">
                <button class="cancel" id="closeModal">Отменить</button>
                <button class="save">Сохранить</button>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
