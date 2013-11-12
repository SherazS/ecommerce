
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cms_article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_article`;

CREATE TABLE `cms_article`
(
    `art_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_user_id` INTEGER NOT NULL,
    `art_cat_id` TINYINT NOT NULL,
    `art_title` VARCHAR(64) NOT NULL,
    `art_text` TEXT NOT NULL,
    PRIMARY KEY (`art_id`),
    INDEX `FI_egory2article` (`art_cat_id`),
    INDEX `FI_r2article` (`art_user_id`),
    CONSTRAINT `category2article`
        FOREIGN KEY (`art_cat_id`)
        REFERENCES `cms_category` (`cat_id`),
    CONSTRAINT `user2article`
        FOREIGN KEY (`art_user_id`)
        REFERENCES `user_main` (`user_id`)
) ENGINE=InnoDB;

INSERT INTO cms_article (art_user_id, art_cat_id, art_title, art_text)
VALUES (123, 1, 'New article', 'This is the first article added to the database');

-- ---------------------------------------------------------------------
-- cms_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_category`;

CREATE TABLE `cms_category`
(
    `cat_id` TINYINT NOT NULL AUTO_INCREMENT,
    `cat_name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB;

INSERT INTO cms_category (cat_name)
VALUES ('Initiation');

-- ---------------------------------------------------------------------
-- user_main
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_main`;

CREATE TABLE `user_main`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(32) NOT NULL,
    `user_pass` VARCHAR(32) NOT NULL,
    `user_email` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

INSERT INTO user_main (user_id, user_name, user_pass, user_email)
VALUES (123, 'New Name', 'Password', 'name@email.com');
# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
