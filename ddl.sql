CREATE TABLE modules(
   id_modules INT AUTO_INCREMENT,
   name VARCHAR(200)  NOT NULL,
   description TEXT,
   measurement_type VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_modules)
);

CREATE TABLE module_data(
   id_module_data INT AUTO_INCREMENT,
   module_value DECIMAL(10,2)  ,
   module_timestamp DATETIME,
   id_modules INT NOT NULL,
   PRIMARY KEY(id_module_data),
   UNIQUE(id_modules),
   FOREIGN KEY(id_modules) REFERENCES modules(id_modules)
);

CREATE TABLE module_status(
   id_module_status INT AUTO_INCREMENT,
   is_operational BOOLEAN,
   duration SMALLINT,
   data_count SMALLINT,
   updated_at DATETIME,
   id_modules INT NOT NULL,
   PRIMARY KEY(id_module_status),
   UNIQUE(id_modules),
   FOREIGN KEY(id_modules) REFERENCES modules(id_modules)
);
