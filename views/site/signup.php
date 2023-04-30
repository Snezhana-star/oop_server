
<h3 class="error"><?= $message ?? ''; ?></h3>

<form class="sign" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label for="full_name">ФИО </br></label>
    <input type="text" name="full_name">

    <label for="sex">Пол</br></label>
        <select id="sex" name="sex">
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
        </select>

    <label for="date_of_birth">Дата рождения </br></label>
    <input type="date" name="date_of_birth">

    <label for="address">Адрес регистрации </br></label>
    <input type="text" name="address">

    <label for="role">Роль</br></label>
    <select id="role" name="role">
        <option value="Админ">Админ</option>
        <option value="Методист">Методист</option>
        <option value="Преподаватель">Преподаватель</option>
    </select>

    <label for="subdivision">Подразделение</br></label>
    <select id="subdivision" name="subdivision">
        <option value="Филологическое">Филологическое</option>
        <option value="Экономическое">Экономическое</option>
    </select>

    <label for="login">Логин </br></label>
    <input type="text" name="login">

    <label for="password">Пароль </br></label>
    <input type="password" name="password">

    <button>Создать</button>
</form>