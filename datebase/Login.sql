

CREATE TABLE users (
    id INT AUTO_INCRMENT PRIMARY  KEY,   ---- 主キー
    email VARCHAR(255) NOT NULL UNIQUE,  ---- メールアドレス
    password VARCHAR(255) NOT NULL       ---- パスワード
);