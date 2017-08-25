<?php
include 'config.php';

$Table_users = "CREATE TABLE IF NOT EXISTS {$config->Table_users} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_users_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_users_first_name varchar(255) NOT NULL,
	$config->COL_users_last_name varchar(255) NOT NULL,
	$config->COL_users_gender boolean NOT NULL,
	$config->COL_users_address TEXT NULL,
	$config->COL_users_city varchar(255) NOT NULL,
	$config->COL_users_state varchar(255) NOT NULL,
	$config->COL_users_country_residence varchar(255) NOT NULL,
	$config->COL_users_zip INT NOT NULL,
	$config->COL_users_mobile_number INT NOT NULL,
	$config->COL_users_date_of_birth DATE,
	$config->COL_users_id_type INT NOT NULL,
	$config->COL_users_id_number INT NOT NULL,
	$config->COL_users_id_issue_date DATE,
	$config->COL_users_id_valid_date DATE, 
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$Table_company = "CREATE TABLE IF NOT EXISTS {$config->Table_company} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_company_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_company_name varchar(255) NOT NULL,
	$config->COL_company_tax_id INT NOT NULL,
	$config->COL_company_address TEXT NULL,
	$config->COL_company_city varchar(255) NOT NULL,
	$config->COL_company_state varchar(255) NOT NULL,
	$config->COL_company_country_residence varchar(255) NOT NULL,
	$config->COL_company_zip INT NOT NULL,
	$config->COL_company_phone_number INT NOT NULL,
	$config->COL_company_url varchar(255) NOT NULL,
	$config->COL_company_bussiness_nature varchar(255) NOT NULL,
	$config->COL_company_customer_type_q TEXT NULL,
	$config->COL_company_info_q TEXT NULL,
	$config->COL_company_bankdetails_q TEXT NULL,
	$config->COL_company_expt_monthvolume_q TEXT NULL,
	$config->COL_company_activity_anture_q TEXT NULL,
	$config->COL_company_others TEXT NULL,
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$Table_usersImage = "CREATE TABLE IF NOT EXISTS {$config->Table_usersImage} (
	id INT NOT NULL AUTO_INCREMENT UNIQUE  KEY,
	$config->COL_usersImage_unique_id varchar(255) NOT NULL PRIMARY  KEY,
	$config->COL_usersImage_users_unique_id VARCHAR (255) NOT NULL,
	$config->COL_usersImage_image VARCHAR (255) NOT NULL, 
	created_date timestamp DEFAULT CURRENT_TIMESTAMP,
    modified_date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT $config->COL_usersImage_users_unique_id FOREIGN KEY ($config->COL_usersImage_users_unique_id) 
    REFERENCES $config->Table_users ($config->COL_users_unique_id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

var_dump($db->executeQuery($Table_users));
var_dump($db->executeQuery($Table_company));
var_dump($db->executeQuery($Table_usersImage));



