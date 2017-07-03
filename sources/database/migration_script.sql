-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: dbVipCode
-- Source Schemata: dbVipCode
-- Created: Mon Jul  3 12:09:34 2017
-- Workbench Version: 6.3.9
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema dbVipCode
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `dbVipCode` ;
CREATE SCHEMA IF NOT EXISTS `dbVipCode` ;

-- ----------------------------------------------------------------------------
-- Table dbVipCode.tbEnterprise
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbVipCode`.`tbEnterprise` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(254) NOT NULL,
  `address` TEXT NOT NULL,
  `coords` VARCHAR(254) NULL DEFAULT NULL,
  `telephone` VARCHAR(254) NULL DEFAULT NULL,
  `mobilePhone` VARCHAR(254) NULL DEFAULT NULL,
  `mobilePhoneOptional` VARCHAR(254) NULL DEFAULT NULL,
  `website` VARCHAR(254) NULL DEFAULT NULL,
  `faceBook` VARCHAR(254) NULL DEFAULT NULL,
  `managerName` VARCHAR(254) NULL DEFAULT NULL,
  `managerMobilePhone` VARCHAR(254) NULL DEFAULT NULL,
  `managerEmail` VARCHAR(254) NULL DEFAULT NULL,
  `creationTime` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `enterpriseLegalId` VARCHAR(254) NULL DEFAULT NULL,
  `isActive` TINYINT(1) NULL DEFAULT '1',
  `creationDate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `minDiscount` FLOAT NULL DEFAULT '10',
  `maxDiscount` FLOAT NULL DEFAULT '20',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table dbVipCode.tbInvoice
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbVipCode`.`tbInvoice` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `enterpriseLegarId` VARCHAR(254) NULL DEFAULT NULL,
  `enterpriseId` INT(11) NOT NULL,
  `invoiceValue` FLOAT NOT NULL,
  `numberOfIndications` INT(11) NOT NULL,
  `creationTime` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentDueDate` DATETIME NULL DEFAULT NULL,
  `ATMReference` VARCHAR(500) NULL DEFAULT NULL,
  `invoiceStatus` VARCHAR(254) NULL DEFAULT 'not paid',
  `invoiceToEmail` VARCHAR(254) NOT NULL,
  `invoiceToSMS` VARCHAR(254) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fkEnterpriseInvoice` (`enterpriseId` ASC),
  CONSTRAINT `fkEnterpriseInvoice`
    FOREIGN KEY (`enterpriseId`)
    REFERENCES `dbVipCode`.`tbEnterprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table dbVipCode.tbUser
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbVipCode`.`tbUser` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(254) NOT NULL,
  `mobilePhone` VARCHAR(254) NULL DEFAULT NULL,
  `email` VARCHAR(254) NULL DEFAULT NULL,
  `category` VARCHAR(254) NULL DEFAULT NULL,
  `password` VARCHAR(500) NOT NULL,
  `passwordAttempts` INT(11) NOT NULL DEFAULT '8',
  `hasTochangePassword` TINYINT(1) NULL DEFAULT '1',
  `isActive` TINYINT(1) NULL DEFAULT '1',
  `enterpriseId` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC),
  UNIQUE INDEX `mobilePhone` (`mobilePhone` ASC),
  INDEX `fkEnterpriseUser` (`enterpriseId` ASC),
  CONSTRAINT `fkEnterpriseUser`
    FOREIGN KEY (`enterpriseId`)
    REFERENCES `dbVipCode`.`tbEnterprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table dbVipCode.tbVipCode
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbVipCode`.`tbVipCode` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `vipCode` VARCHAR(254) NOT NULL,
  `credit` FLOAT NOT NULL DEFAULT '10',
  `creationtDate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `modificationDate` DATETIME NULL DEFAULT NULL,
  `validTill` DATETIME NULL DEFAULT NULL,
  `status` VARCHAR(100) NULL DEFAULT 'valid',
  `isPublic` TINYINT(1) NULL DEFAULT '1',
  `enterpriseId` INT(11) NOT NULL,
  `ownerName` VARCHAR(254) NULL DEFAULT NULL,
  `ownerTelephone` VARCHAR(254) NOT NULL,
  `OwnerEmail` VARCHAR(254) NOT NULL,
  `ownerFaceBook` VARCHAR(500) NULL DEFAULT NULL,
  `ownerAddress` TEXT NULL DEFAULT NULL,
  `ownerReturned` TINYINT(1) NULL DEFAULT '0',
  `minDiscount` FLOAT NULL DEFAULT '10',
  `maxDiscount` FLOAT NULL DEFAULT '10',
  `expirationDate` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `vipCode` (`vipCode` ASC),
  INDEX `fkEnterpriseVipCode` (`enterpriseId` ASC),
  CONSTRAINT `fkEnterpriseVipCode`
    FOREIGN KEY (`enterpriseId`)
    REFERENCES `dbVipCode`.`tbEnterprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 69
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table dbVipCode.tbVipCodeAttendee
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbVipCode`.`tbVipCodeAttendee` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `vipCode` VARCHAR(254) NOT NULL,
  `attendeeName` VARCHAR(254) NULL DEFAULT NULL,
  `attendeeTelephone` VARCHAR(254) NOT NULL,
  `attendeeEmail` VARCHAR(254) NULL DEFAULT NULL,
  `creationTime` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `attendedDate` DATETIME NULL DEFAULT NULL,
  `status` VARCHAR(100) NULL DEFAULT 'valid',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 41
DEFAULT CHARACTER SET = latin1;
SET FOREIGN_KEY_CHECKS = 1;
