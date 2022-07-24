
CREATE DATABASE IF NOT EXISTS cert_table DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE cert_table;

CREATE TABLE cert_table (
  employee_name text NOT NULL,
  csp text NOT NULL,
  certification_level text NOT NULL,
  certification_name text NOT NULL,
  certification_id varchar(15) NOT NULL,
  doc date NOT NULL,
  exp date NOT NULL,
  validity int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO cert_table (employee_name, csp, certification_level, certification_name, certification_id, doc, `exp`, validity) VALUES
('Pre1', 'Azure', 'cloud', 'assosiate', '1a2b', '2022-07-14', '2024-07-14', 2),
('Pre2', 'Azure', 'cloud', 'associate', '2c3d', '2022-07-14', '2024-07-14', 2);
