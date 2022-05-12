<?php

namespace Amauchar\Core\Models;

use CodeIgniter\Shield\Models\LoginModel as SparkLogin;

class LoginOverrideModel extends SparkLogin
{

    const ORDERABLE = [
        1 => 'ip_address',
        2 => 'email',
        3 => 'date',
    ];

    public static $orderable = ['ip_address', 'email', 'date'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('auth_logins')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('email', $search)
                ->orLike('user_id', $search)
                ->orLike('ip_address', $search)
                ->orLike('date', $search)
            ->groupEnd();

        return $condition;
    }
}
