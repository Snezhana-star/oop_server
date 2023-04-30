<h3 class="error"><?= $message ?? ''; ?></h3>
<form class="sign" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label for="title">Название </br></label>
    <input type="text" name="title" value="<?= $docs['title'] ?>">


    <label for="discription">Описание</br></label>
    <select id="discription" name="discription" selected="<?= $docs['discription'] ?>">
        <option value="Лекция">Лекция</option>
        <option value="Практика">Практика</option>
        <option value="Презентация">Презентация</option>
    </select>

    <label for="text"> Содержание </br></label>
    <input type="text" name="text" value="<?= $docs['text'] ?>">

    <label for="status">Статус</br></label>
    <select id="status" name="status" selected="<?= $docs['discription'] ?>">
        <option value="Новый">Новый</option>
    </select>

    <label for="date_of_creation">Дата создания </br></label>
    <input type="date" name="date_of_creation" value="<?= $docs['date_of_creation'] ?>"  >


    <label for="author">Автор</br></label>
    <select id="author" name="author" selected="<?= $docs['author'] ?>">
        <option value="Иванова Ивана Ивановна">Иванова Ивана Ивановна</option>
        <option value="Эрдэм Алдарович Санжижапов">Эрдэм Алдарович Санжижапов</option>
    </select>

    <label for="subdivision">Подразделение</br></label>
    <select id="subdivision" name="subdivision" selected="<?= $docs['subdivision'] ?>">
        <option value="Филологическое">Филологическое</option>
        <option value="Экономическое">Экономическое</option>
    </select>

    <label for="discipline">Дисциплина</br></label>
    <select id="discipline" name="discipline" selected="<?= $docs['discipline'] ?>">
        <option value="Философия">Философия</option>
        <option value="ЭВМ">ЭВМ</option>
    </select>


    <button>Изменить</button>
</form>