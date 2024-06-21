
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password) VALUES ('antonio', 'antonio@gmail.com', 'abc123');
INSERT INTO users (name, email, password) VALUES ('helena', 'helena@gmail.com', 'he#@@');
INSERT INTO users (name, email, password) VALUES ('giovani', 'giovani@gmail.com', 'gi33');
INSERT INTO users (name, email, password) VALUES ('isabella', 'isabella@gmail.com', 'll1234');