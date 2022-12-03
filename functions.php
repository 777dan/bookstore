<?php
function cmp_author($a, $b)
{
    return ($a->author <=> $b->author);
}
function cmp_name($a, $b)
{
    return ($a->name <=> $b->name);
}
function cmp_price($a, $b)
{
    return ($a->price <=> $b->price);
}
function cmp_genre($a, $b)
{
    return ($a->genre <=> $b->genre);
}
function cmp_year($a, $b)
{
    return ($a->year <=> $b->year);
}
function output($arr)
{
    $sorting = $_POST["sorting"];
    usort($arr, "cmp_$sorting");
    echo "<div class='container'>";
    echo "<table class='table table-hover'>";
    echo "<thead><tr><th>Название</th><th>Автор</th><th>Жанр</th><th>Год издания</th><th>Цена</th><th>Наличие</th><th>Скидка</th></tr></thead>";
    echo "<tbody>";
    array_walk($arr, 'showEverything');
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
function showEverything($books)
{
    echo "<tr>";
    $count = 0;
    $year = 0;
    foreach ($books as $key => $value) {
        if ($key == "year") $year = $value;
        if ($key == "quantity") {
            if ($value == 0) $value = "Нет в наличии";
            if ($value >= 1) $value = "Есть в наличии";
        }
        if ($key == "sum") continue;
        if ($key == "sold") continue;
        if ($key == "sumSold") continue;
        if ($key == "discount" && $year >= 1910) $value = "Есть";
        if ($key == "description") continue;
        if ($count == 0) echo "<td><a href=" . "'" . $books->description . "'" . ">$value</a></td>";
        if ($count >= 1) echo "<td>$value</td>";
        $count++;
    }
    echo "</tr>";
}
function clear()
{
    header("Location:" . $_SERVER['PHP_SELF']);
    ob_end_flush();
    exit;
}
function searchResult($books, $request)
{
    $result = array();
    foreach ($books as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            if (strstr($value2, $request)) {
                $result[] = $key1;
            }
        }
    }
    if (count($result) == 0) {
        print "<p>По вашему запросу ничего не найдено(</p>";
    }
    output(array_intersect_key($books, array_flip(array_unique($result))));
}

function login()
{
    $open_usersArr = fopen("users.json", "r+");
    $content = fread($open_usersArr, filesize("users.json"));
    $users = json_decode($content);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $count = false;
    if ($login == "admin" && $password == "admin") {
        $count = true;
        echo "<h1 id='hello'>Приветствуем вас, $login</h1>";
        echo '<script>
        var input = document.createElement("input");
        var br = document.createElement("br");
        input.type = "submit";
        input.name = "finance";
        input.value = "Финансовый отчёт";
        input.className = "btn btn-outline-success";
        document.getElementById("menu").appendChild(input);
        document.getElementById("menu").appendChild(br);</script>';
    } else {
        if (preg_match_all("#\w{5,15}#", $login) && preg_match_all("#\w{8,17}#", $password)) {
            for ($i = 0; $i < count($users); $i++) {
                if ($login == $users[$i]->login && $password == $users[$i]->password) {
                    $count = true;
                    echo "<h1 id='hello'>Приветствуем вас, $login</h1>";
                    break;
                } else {
                    $count = false;
                }
            }
        }
        if (!preg_match_all("#\w{5,15}#", $login) && !preg_match_all("#\w{8,17}#", $password)) {
            echo "<h1 id='error'>Ошибка! Вы ввели недопустимое количество символов</h1>";
        }
        if ($count == false && preg_match_all("#\w{5,15}#", $login) && preg_match_all("#\w{8,17}#", $password)) {
            echo "<h1 id='error'>Вы не зарегистрированы!</h1>";
        }
    }
}

function finance($arr)
{
    echo "<div class='container'>";
    echo "<table class='table table-hover'>";
    echo "<thead><tr><th>Название</th><th>Автор</th><th>Жанр</th><th>Год издания</th><th>Цена</th><th>Количество экземпляров</th><th>Общая стоимость</th><th>Продано</th><th>Общая стоимость проданого</th><th>Скидка</th></tr></thead>";
    echo "<tbody>";
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += ($arr[0]->quantity) * ($arr[0]->price);
    }
    array_walk($arr, 'showFinanceData');
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<p style='text-align:center;font-size:40px;'>Общая сумма товара: $sum</p>";
}

function showFinanceData($books)
{
    $price = 0;
    $quantity = 0;
    $sold = 0;
    echo "<tr>";
    foreach ($books as $key => $value) {
        if ($key == "price") $price = $value;
        if ($key == "quantity") $quantity = $value;
        if ($key == "sum") $value = $price * $quantity;
        if ($key == "sold") $sold = $value;
        if ($key == "sumSold") $value = $price * $sold;
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
