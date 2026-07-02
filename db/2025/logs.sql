CREATE TABLE logs (
  id int(30) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id int(30) NOT NULL,
  name varchar(255) NOT NULL,
  transaction_type varchar(100) NOT NULL,
  office varchar(255) NOT NULL,
  date_created datetime NOT NULL DEFAULT current_timestamp(),
  role varchar(100) NOT NULL,
  ip_address varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;