<div class='container' id="nav">
    <div class="row">
        <div class="col-sm">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="submit" name="showEverything" value="Показать всё" class="btn btn-outline-success"><br>
                <select name="sorting">
                    <option value="name">Сортировка по названию книги</option>
                    <option value="author">Сортировка по автору</option>
                    <option value="price">Сортировка по цене</option>
                    <option value="genre">Сортировка по жанру</option>
                    <option value="year">Сортировка по году издания</option>
                </select>
                <!-- <form class="form-inline" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> -->
                <div class="input-group">
                    <input type="text" name="search" style="margin-right: 0 !important;" placeholder="Искать" class="form-control mr-sm-2">
                    <!-- <input type="submit" name="searchResult" value="Подтвердить" class="btn btn-outline-success"><br> -->
                    <div class="input-group-prepend">
                        <button class="btn btn-success" name="searchResult" type="submit">&#10003;</button>
                    </div>
                </div>
                <!-- </form> -->
            </form>
        </div>
        <div class="col-sm">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" id="menu" method="POST">
                <input type="submit" name="clear" value="Заново" class="btn btn-outline-success">
            </form>
        </div>
        <!-- <input type="submit" name="finance" value="Финансовый отчёт" class="btn btn-outline-success"><br> -->
        <div class="col-sm">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" id="loginForm" method="POST">
                <input type="text" class="form-control" placeholder="Логин" name="login" required>
                <input type="password" class="form-control" placeholder="Пароль" name="password" required>
                <input type="submit" name="submitLogin" class="btn btn-outline-success" value="Подтвердить">
            </form>
        </div>
    </div>
</div>