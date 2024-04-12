CREATE TABLE modules(
   id_modules INT AUTO_INCREMENT,
   name VARCHAR(255)  NOT NULL,
   location VARCHAR(150)  NOT NULL,
   created_at DATE NOT NULL,
   PRIMARY KEY(id_modules)
);

CREATE TABLE measurements(
   id_measurements INT AUTO_INCREMENT,
   measurement_value DECIMAL(10,2)   NOT NULL,
   measurement_date DATE NOT NULL,
   id_modules INT NOT NULL,
   PRIMARY KEY(id_measurements),
   FOREIGN KEY(id_modules) REFERENCES modules(id_modules)
);
