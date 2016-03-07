CREATE TABLE t_income (
    id INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    amount FLOAT NOT NULL,
    date_added DATE NOT NULL,
    PRIMARY KEY(id)
)