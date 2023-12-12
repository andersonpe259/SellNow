<?php

class Querys{
    public $verify = [
        "SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name='tb_User';"
    ];
    public $createTable = [
        "CREATE TABLE tb_User (
            use_id INTEGER PRIMARY KEY AUTOINCREMENT,
            use_user TEXT NOT NULL,
            use_password TEXT NOT NULL
        );
        CREATE TABLE tb_Product (
            pro_id INTEGER PRIMARY KEY AUTOINCREMENT,
            pro_name TEXT NOT NULL,
            pro_value REAL NOT NULL,
            pro_cover TEXT NOT NULL,
            pro_info TEXT NOT NULL
        );
        CREATE TABLE tb_Historic (
            his_id INTEGER PRIMARY KEY AUTOINCREMENT,
            his_pro_id INTEGER NOT NULL,
            his_total REAL NOT NULL
        );
        INSERT INTO tb_User (use_user, use_password) VALUES ('luisdono', '1234')"
    ];

    public $userQuerys = [
        "SELECT use_user, use_password FROM tb_User;"
    ];
    public $insertProduct = [
        "INSERT INTO tb_Product (pro_name, pro_value, pro_cover, pro_info) VALUES (?, ?, 'teste', ?);"
    ];

    public $selectProducts = [
        "SELECT pro_id, pro_name, pro_value, pro_cover, pro_info FROM tb_Product;"
    ];

    public $insertHistoric = [
        "INSERT INTO tb_Historic (his_pro_id, his_total) VALUES (?, ?);"
    ];
    
    public $selectHistoric = [
        "SELECT pro_name, his_total FROM tb_Product JOIN tb_Historic ON tb_Product.pro_id = tb_Historic.his_pro_id;"
    ];

}