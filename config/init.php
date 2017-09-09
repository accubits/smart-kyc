<?php
include 'config.php';

$Table_users = "CREATE TABLE IF NOT EXISTS {$config->Table_users} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_users_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_users_first_name varchar(255) NOT NULL,
	$config->COL_users_last_name varchar(255) NOT NULL,
	$config->COL_users_gender boolean NOT NULL,
	$config->COL_users_verify_status INT(1) NOT NULL DEFAULT 0,
	$config->COL_users_address1 TEXT NULL,
	$config->COL_users_address2 TEXT NULL,
	$config->COL_users_address3 TEXT NULL,
	$config->COL_users_city varchar(255) NOT NULL,
	$config->COL_users_state varchar(255) NOT NULL,
	$config->COL_users_country_residence varchar(255) NOT NULL,
	$config->COL_users_zip INT NOT NULL,
	$config->COL_users_mobile_number varchar(50) NOT NULL,
	$config->COL_users_date_of_birth DATE,
	$config->COL_users_id_type varchar(255) NOT NULL,
	$config->COL_users_id_number INT NOT NULL,
	$config->COL_users_id_issue_date DATE,
	$config->COL_users_id_valid_date DATE, 
	$config->COL_users_userRegistration_unique_id varchar(255) NOT NULL,
	$config->COL_users_account_type int(1) default 0,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT $config->COL_users_userRegistration_unique_id FOREIGN KEY ($config->COL_users_userRegistration_unique_id) 
    REFERENCES $config->Table_userRegistration ($config->COL_userRegistration_unique_id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$Table_company = "CREATE TABLE IF NOT EXISTS {$config->Table_company} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_company_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_company_name varchar(255) NOT NULL,
	$config->COL_company_phone_number INT NOT NULL,
	$config->COL_company_url varchar(255) NOT NULL,
	$config->COL_company_bussiness_nature varchar(255) NOT NULL,
	$config->COL_company_customer_type_q TEXT NULL,
	$config->COL_company_customer_info_q TEXT NULL,
	$config->COL_company_user_url_q varchar(255) NOT NULL,
	$config->COL_company_expt_avgorder_q varchar(255) NOT NULL,
	$config->COL_company_activity_nature_q varchar(255) NOT NULL,
	$config->COL_company_bankdetails_q TEXT NULL,
	$config->COL_users_userRegistration_unique_id varchar(255) NOT NULL,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$Table_usersImage = "CREATE TABLE IF NOT EXISTS usersImage ( 
id INT NOT NULL AUTO_INCREMENT UNIQUE KEY, 
usersImage_unique_id varchar(255) NOT NULL PRIMARY KEY,
 usersImage_userRegistration_unique_id VARCHAR (255) NOT NULL, 
 usersImage_image VARCHAR (255) NOT NULL, created_date timestamp DEFAULT CURRENT_TIMESTAMP, 
 modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
 CONSTRAINT usersImage_userRegistration_unique_id FOREIGN KEY (usersImage_userRegistration_unique_id) 
 REFERENCES userRegistration (userRegistration_uniqueId) ON DELETE CASCADE 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$Table_userRegistration = "CREATE TABLE IF NOT EXISTS {$config->Table_userRegistration} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_userRegistration_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_userRegistration_username varchar(255) NOT NULL,
	$config->COL_userRegistration_email varchar(255) NOT NULL,
	$config->COL_userRegistration_password varchar(255) NOT NULL,
	$config->COL_userRegistration_status int(1) default 0,
	$config->COL_userRegistration_email_verify_status int(1) default 0,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$Table_forgotPassword = "CREATE TABLE IF NOT EXISTS {$config->Table_forgotPassword} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_forgotPassword_token varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_forgotPassword_uniqueId VARCHAR (255) NOT NULL,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT $config->COL_forgotPassword_uniqueId FOREIGN KEY ($config->COL_forgotPassword_uniqueId) 
    REFERENCES $config->Table_userRegistration ($config->COL_userRegistration_unique_id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$Table_emailVerification = "CREATE TABLE IF NOT EXISTS {$config->Table_emailVerification} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_emailVerification_token varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_emailVerification_uniqueId VARCHAR (255) NOT NULL,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT $config->COL_emailVerification_uniqueId FOREIGN KEY ($config->COL_emailVerification_uniqueId) 
    REFERENCES $config->Table_userRegistration ($config->COL_userRegistration_unique_id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$Table_order = "CREATE TABLE IF NOT EXISTS {$config->Table_order} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_order_uniqueId varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_order_user_uniqueId varchar(255) NOT NULL,
	$config->COL_order_name varchar(255) NOT NULL,
	$config->COL_order_message TEXT NULL,
	$config->COL_order_country varchar(255) NOT NULL,
	$config->COL_order_email varchar(255) NOT NULL,
	$config->COL_order_phone varchar(20) NOT NULL,
	$config->COL_order_amount FLOAT NOT NULL,
	$config->COL_order_type varchar(255) NOT NULL,
	$config->COL_order_status int(1) DEFAULT 0 NOT NULL,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT $config->COL_order_user_uniqueId FOREIGN KEY ($config->COL_order_user_uniqueId) 
    REFERENCES $config->Table_userRegistration ($config->COL_userRegistration_unique_id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

var_dump($db->executeQuery($Table_users));
var_dump($db->executeQuery($Table_company));
var_dump($db->executeQuery($Table_userRegistration));
var_dump($db->executeQuery($Table_usersImage));
var_dump($db->executeQuery($Table_forgotPassword));
var_dump($db->executeQuery($Table_emailVerification));
var_dump($db->executeQuery($Table_order));

