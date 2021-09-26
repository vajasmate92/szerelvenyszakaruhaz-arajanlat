CREATE DATABASE `arajanlatok`
CHARACTER SET = 'utf8'
COLLATE = `utf8_hungarian_ci`;

CREATE TABLE `arajanlatok`.`felhasznalok`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `nev` VARCHAR(255) NOT NULL,
    `jelszo` VARCHAR(255) NOT NULL,
    `jelszo_salt` VARCHAR(255) NOT NULL,
    `jogosultsag` INT(1) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`)
);

CREATE TABLE `arajanlatok`.`adminisztratorok`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `FK_felhasznalo_id` INT(8) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_felhasznalo_id`) REFERENCES `arajanlatok`.`felhasznalok`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`partnerek`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `ceg_nev` VARCHAR(255) NOT NULL,
    `ceg_telefonszam` INT(11) NOT NULL,
    `ceg_cim_adoszam` INT(11) NOT NULL,
    `ceg_cim_irsz` INT(4) NOT NULL,
    `ceg_cim_varos` VARCHAR(255) NOT NULL,
    `ceg_cim_utca_hazszam` VARCHAR(255) NOT NULL,
    `ceg_szallitolevel_limit` INT(8) NOT NULL,
    `ceg_kedvezmeny_merteke` INT(3) NOT NULL,
    `FK_felhasznalo_id` INT(8) NOT NULL,
    `FK_letrehozo_admin_id` INT(8) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_felhasznalo_id`) REFERENCES `arajanlatok`.`felhasznalok`(`PK_id`),
    FOREIGN KEY (`FK_letrehozo_admin_id`) REFERENCES `arajanlatok`.`adminisztratorok`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`gyartok`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `gyarto` VARCHAR(255) NOT NULL,
    `FK_letrehozo_admin_id` INT(8) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_letrehozo_admin_id`) REFERENCES `arajanlatok`.`adminisztratorok`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`termekkategoriak`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `termekkategoria` VARCHAR(255) NOT NULL,
    `FK_letrehozo_admin_id` INT(8) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_letrehozo_admin_id`) REFERENCES `arajanlatok`.`adminisztratorok`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`termekcsoportok`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `termekcsoport` VARCHAR(255) NOT NULL,
    `FK_letrehozo_admin_id` INT(8) NOT NULL,
    `FK_gyarto_id` INT(8) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_letrehozo_admin_id`) REFERENCES `arajanlatok`.`adminisztratorok`(`PK_id`),
    FOREIGN KEY (`FK_gyarto_id`) REFERENCES `arajanlatok`.`gyartok`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`termekek`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `FK_letrehozo_admin_id` INT(8) NOT NULL,
    `FK_gyarto_id` INT(8) NOT NULL,
    `FK_termekcsoport_id` INT(8) NOT NULL,
    `FK_termekkategoria_id` INT(8) NOT NULL,
    `termeknev` VARCHAR(255) NOT NULL,
    `ar` INT(10) NOT NULL,
    `allapot` INT(1) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_letrehozo_admin_id`) REFERENCES `arajanlatok`.`adminisztratorok`(`PK_id`),
    FOREIGN KEY (`FK_gyarto_id`) REFERENCES `arajanlatok`.`gyartok`(`PK_id`),
    FOREIGN KEY (`FK_termekcsoport_id`) REFERENCES `arajanlatok`.`termekcsoportok`(`PK_id`),
    FOREIGN KEY (`FK_termekkategoria_id`) REFERENCES `arajanlatok`.`termekkategoriak`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`arajanlat`(
    `PK_id` INT(8) NOT NULL AUTO_INCREMENT,
    `FK_letrehozo_partner_id` INT(8) NOT NULL,
    `arajanlat_nev` VARCHAR(255) NOT NULL,
    `allapot` INT(1) NOT NULL,
    `arajanlat_cimzett_nev` VARCHAR(255) NOT NULL,
    `arajanlat_cimzett_varos` VARCHAR(255) NOT NULL,
    `arajanlat_cimzett_irsz` INT(4) NOT NULL,
    `arajanlat_cimzett_cim_utca_hazszam` INT(4) NOT NULL,
    PRIMARY KEY (`PK_id`),
    FOREIGN KEY (`FK_letrehozo_partner_id`) REFERENCES `arajanlatok`.`partnerek`(`PK_id`)
);

CREATE TABLE `arajanlatok`.`arajanlat_tartalom_id=`(
    `FK_termek_id` INT(8) NOT NULL,
    FOREIGN KEY (`FK_termek_id`) REFERENCES `arajanlatok`.`gyartok`(`PK_id`)
)

