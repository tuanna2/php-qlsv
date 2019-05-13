-- up
CREATE SCHEMA `qlsv` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

CREATE TABLE `qlsv`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(50) NOT NULL,
  `sex` VARCHAR(10) NOT NULL,
  `birthday` DATE NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `class` VARCHAR(10) NOT NULL,
  `photo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);

--down
DROP DATABASE `qlsv`;