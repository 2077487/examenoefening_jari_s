drop DATABASE iF EXISTS examenoefening_jari_s
CREATE DATABASE examenoefening_jari_s;
use examenoefening_jari_s;
CREATE TABLE user(
    id INT AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number
)