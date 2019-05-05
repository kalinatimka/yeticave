CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL
);

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date DATETIME NOT NULL,
  email VARCHAR(128) NOT NULL,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  avatar_link TEXT,
  contact_data TEXT NOT NULL
);

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  creating_date DATETIME,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image_link TEXT NOT NULL,
  start_price INT NOT NULL,
  end_date DATETIME NOT NULL,
  bet_step INT NOT NULL,
  fav_count INT NOT NULL DEFAULT 0,
  id_creator INT NOT NULL,
  id_winner INT,
  id_category INT NOT NULL,
  FOREIGN KEY (id_creator) REFERENCES user (id) ON DELETE CASCADE,
  FOREIGN KEY (id_winner) REFERENCES user (id) ON DELETE CASCADE,
  FOREIGN KEY (id_category) REFERENCES category (id) ON DELETE CASCADE
);

CREATE TABLE bet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dateNtime DATETIME,
  price INT NOT NULL,
  id_user INT NOT NULL,
  id_lot INT NOT NULL,
  FOREIGN KEY (id_user) REFERENCES user (id) ON DELETE CASCADE,
  FOREIGN KEY (id_lot) REFERENCES lot (id) ON DELETE CASCADE
);

CREATE INDEX name ON lot(name);
CREATE UNIQUE INDEX lot_id ON lot(id);
CREATE UNIQUE INDEX email ON user(email);
