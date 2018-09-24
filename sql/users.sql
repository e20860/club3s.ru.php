CREATE TABLE `club3s`.`users` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `type` ENUM('admin','member') NOT NULL DEFAULT 'member' , `email` VARCHAR(80) NOT NULL , `pass` VARCHAR(50) NOT NULL , `username` VARCHAR(45) NOT NULL , `family` VARCHAR(30) NOT NULL , `name` VARCHAR(30) NOT NULL , `surname` VARCHAR(30) NOT NULL , `birthday` DATE NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_expires` DATE NOT NULL , `date_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `club_position` VARCHAR(30) NOT NULL DEFAULT 'член правления' , `photo_path` VARCHAR(255) NOT NULL , INDEX `fam_index` (`family`(10))) ENGINE = InnoDB;
