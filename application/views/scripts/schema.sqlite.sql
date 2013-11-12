CREATE TABLE products (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(32) NOT NULL,
    name VARCHAR(32) NOT NULL,
    description TEXT NULL,
    cost INTEGER NOT NULL
);
 
CREATE INDEX "id" ON "products" ("id");