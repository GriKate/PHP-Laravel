<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index() {
        return <<<php
        <a href="/" style="margin: 4px;">Главная</a>
        <a href="/news/" style="margin: 4px;">Новости</a>
        <br><br>
        <h1>Главная страница</h1>
php;
    }
}
