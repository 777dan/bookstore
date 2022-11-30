<?php
include "functions.php";
$open_file = fopen("books.json", "r+");
$content = fread($open_file, filesize("books.json"));
$books = json_decode($content);
if (isset($_POST['showEverything'])) {
    output($books);
}
if (isset($_POST['clear'])) {
    clear();
}
if (isset($_POST['searchResult'])) {
    searchResult($books, $_POST['search']);
}
if (isset($_POST['submitLogin'])) {
    login();
}
if (isset($_POST['finance'])) {
    finance($books);
}
?>