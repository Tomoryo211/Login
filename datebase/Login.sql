

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,   -- 主キー
    email VARCHAR(255) NOT NULL,             -- メールアドレス
    password VARCHAR(255) NOT NULL,          -- パスワード
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);