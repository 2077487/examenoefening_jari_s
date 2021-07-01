drop DATABASE iF EXISTS examenoefening_jari_s;
CREATE DATABASE examenoefening_jari_s;
use examenoefening_jari_s;
CREATE TABLE user(
    id INT UNSIGNED AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number INT(12) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN,
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY(id)
);

CREATE TABLE groups(
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE group_members(
    group_id INT,
    member_id INT UNSIGNED,
    is_moderator BOOLEAN,
     FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
      FOREIGN KEY (member_id) REFERENCES user(id) 
);

CREATE TABLE post(
    id INT AUTO_INCREMENT,
    content VARCHAR(255) NOT NULL,
    poster_id INT UNSIGNED NOT NULL,
    group_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (poster_id) REFERENCES user(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)
    
);

CREATE TABLE comment(
    id INT AUTO_INCREMENT,
    content VARCHAR(255) NOT NULL,
    commenter_id INT UNSIGNED NOT NULL,
    post_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (commenter_id) REFERENCES user(id),
     FOREIGN KEY (post_id) REFERENCES post(id)
);

CREATE TABLE likes(
    liked_id INT UNSIGNED NOT NULL,
    liked_type VARCHAR(255) NOT NULL,
    liker_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (liker_id) REFERENCES user(id)
);

CREATE TABLE friends(
    friend_1 INT UNSIGNED NOT NULL,
    friend_2 INT UNSIGNED NOT NULL,
    is_verified BOOLEAN,
    FOREIGN KEY (friend_1) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (friend_2) REFERENCES user(id) ON DELETE CASCADE
);