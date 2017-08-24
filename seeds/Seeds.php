<?php

/**
 * Created by PhpStorm.
 * User: reshman
 * Date: 1/8/17
 * Time: 12:20 PM
 */
class Seeds
{

    function __construct(DataBaseHandler $dataBaseHandler, dbconfig $config, Error $error){

        $this->db          = $dataBaseHandler;
        $this->config      = $config;
        $this->error       = $error;

    }

    public function addSuperAdmin($roleId) {
        $data = array(
            $this->config->COL_users_unique_id  => TagdToUtils::getUniqueId(),
            $this->config->COL_users_name       => 'admin',
            $this->config->COL_users_email      => 'admin@admin.com',
            $this->config->COL_users_password   => TagdToUtils::createPasswordHash("admin"),
            $this->config->COL_users_role_id    => $roleId
        );
        $sqlSuperadmin    = $this->db->createInsertQuery($this->config->Table_users,$data);
        $resultSuperadmin = $this->db->executeQuery($sqlSuperadmin);

        if ($resultSuperadmin['CODE'] != 1) {
            $this->error->internalServer();
        }
    }

    public function rolesCheckByName($roleName) {
        $sqlRole = sprintf("select {$this->config->COL_roles_unique_id} from {$this->config->Table_roles} where 
          {$this->config->COL_roles_name} = '%s'", $roleName);

        $resultRole = $this->db->executeQuery($sqlRole);

        if ($resultRole['CODE'] != 1) {
            $this->error->internalServer();
        }

        if ($resultRole['RESULT'] != NULL) {
            return $resultRole['RESULT'][0][$this->config->COL_roles_unique_id];
        }
        return false;
    }
    public function addRoles($roles = array()) {
        if (!empty($roles)) {
            foreach ($roles as $role) {
                $data = array(
                    $this->config->COL_roles_unique_id => TagdToUtils::getUniqueId(),
                    $this->config->COL_roles_name      => $role
                );

                if ($this->rolesCheckByName($role)) {
                    continue;
                }

                $sql    = $this->db->createInsertQuery($this->config->Table_roles,$data);
                $result = $this->db->executeQuery($sql);
                if ($result['CODE'] != 1) {
                    $this->error->internalServer();
                }
            }
        }
    }
}