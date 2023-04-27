
<h3><?= $message ?? ''; ?></h3>

<form class="sign" method="post">

    <label for="full_name">ФИО </br></label>
    <input type="text" name="full_name">

    <label for="sex">Пол </br></label>
    <input type="checkbox" name="sex">

    <label for="date_of_birth">Дата рождения </br></label>
    <input type="date" name="date_of_birth">

    <label for="address">Адрес регистрации </br></label>
    <input type="text" name="address">

    <label for="pole">Роль</br></label>
    <input type="checkbox" name="pole">

    <label for="subdivision">Подразделение</br></label>
    <input type="checkbox" name="subdivision">

    <label for="login">Логин </br></label>
    <input type="text" name="login">

    <label for="password">Пароль </br></label>
    <input type="password" name="password">

    <button>Создать</button>
</form>