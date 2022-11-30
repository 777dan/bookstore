    <form action="<?= $_SERVER['PHP_SELF'] ?>" id="menu" method="POST">
        <input type="submit" name="showEverything" value="Показать всё" class="btn btn-outline-success"><br>
        <input type="submit" name="clear" value="Заново" class="btn btn-outline-success"><br>
        <input type="text" name="search" placeholder="Искать" class="form-control form-control-sm">
        <input type="submit" name="searchResult" value="Поиск" class="btn btn-outline-success"><br>
        <!-- <input type="submit" name="finance" value="Финансовый отчёт" class="btn btn-outline-success"><br> -->
        <select name="sorting">
            <option value="name">Сортировка по названию книги</option>
            <option value="author">Сортировка по автору</option>
            <option value="price">Сортировка по цене</option>
            <option value="genre">Сортировка по жанру</option>
            <option value="year">Сортировка по году издания</option>
        </select><br>
    </form>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" id="loginForm" method="POST">
        <input type="text" class="form-control" placeholder="Логин" name="login" required>
        <input type="password" class="form-control" placeholder="Пароль" name="password" required>
        <input type="submit" name="submitLogin" class="btn btn-outline-success" value="Подтвердить">
    </form>