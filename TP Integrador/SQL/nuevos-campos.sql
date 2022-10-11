ALTER TABLE `tpeg-horariosconsulta`.`alumnos` 
ADD COLUMN `rol` VARCHAR(45) NOT NULL DEFAULT 'alumnos' AFTER `idUsuario`;

ALTER TABLE `tpeg-horariosconsulta`.`profesores` 
ADD COLUMN `rol` VARCHAR(45) NOT NULL DEFAULT 'profesores' AFTER `idUsuario`;

ALTER TABLE `tpeg-horariosconsulta`.`administradores` 
ADD COLUMN `rol` VARCHAR(45) NOT NULL DEFAULT 'administradores' AFTER `idUsuario`;