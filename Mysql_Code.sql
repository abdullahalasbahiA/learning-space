CREATE TABLE users (
	users_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    users_username TINYTEXT not null,
    users_password LONGTEXT not null,
    users_email TINYTEXT not null
);

CREATE TABLE quizzes (
	quizzes_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    quizzes_name VARCHAR(200) not null,
    quizzes_users_id int(11),
    FOREIGN KEY (quizzes_users_id) REFERENCES users(users_id)
)

CREATE TABLE questions (
    questions_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    questions_text LONGTEXT not null,
    questions_quizzes_id int(11),
    FOREIGN KEY (questions_quizzes_id) REFERENCES quizzes(quizzes_id)
)

CREATE TABLE questions (
    questions_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    questions_text LONGTEXT not null,
    questions_quizzes_id int(11),
    FOREIGN KEY (questions_quizzes_id) REFERENCES quizzes(quizzes_id)
)

CREATE TABLE answers (
    answers_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    answers_text LONGTEXT not null,
    answers_correct TINYINT(1) not null,
    questions_id int(11),
    FOREIGN KEY (questions_id) REFERENCES questions(questions_id)
)

CREATE TABLE grades (
    grades_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    grades_correct int(11) not null,
    grades_incorrect int(11) not null,
    users_id int(11),
    questions_id int(11),
    FOREIGN KEY (users_id) REFERENCES users(users_id),
    FOREIGN KEY (questions_id) REFERENCES questions(questions_id)
)

FOREIGN KEY(product_vendor_id) REFERENCES users(users_id)