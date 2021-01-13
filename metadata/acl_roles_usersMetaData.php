<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * ICTCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by ICTCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by ICTCRM".
 */

$dictionary['acl_roles_users'] = array(

    'table' => 'acl_roles_users',

    'fields' => array(
        array(
            'name' => 'id',
            'type' => 'varchar',
            'len' => '36',
        ),
        array(
            'name' => 'role_id',
            'type' => 'varchar',
            'len' => '36',
        ),
        array(
            'name' => 'user_id',
            'type' => 'varchar',
            'len' => '36',
        )
      , array('name' => 'date_modified','type' => 'datetime'),
        array(
            'name' => 'deleted',
            'type' => 'bool',
            'len' => '1',
            'default' => '0'
        ),
    ),
    
    'indices' => array(
        array(
            'name' => 'acl_roles_userspk',
            'type' => 'primary',
            'fields' => array( 'id' )
        ),
        array(
            'name' => 'idx_aclrole_id',
            'type' => 'index',
            'fields' => array('role_id')
        ),
        array(
            'name' => 'idx_acluser_id',
            'type' => 'index',
            'fields' => array('user_id')
        ),
        array('name' => 'idx_aclrole_user', 'type'=>'alternate_key', 'fields'=>array('role_id','user_id'))
    ),
    'relationships' => array('acl_roles_users' => array('lhs_module'=> 'ACLRoles', 'lhs_table'=> 'acl_roles', 'lhs_key' => 'id',
                              'rhs_module'=> 'Users', 'rhs_table'=> 'users', 'rhs_key' => 'id',
                              'relationship_type'=>'many-to-many',
                              'join_table'=> 'acl_roles_users', 'join_key_lhs'=>'role_id', 'join_key_rhs'=>'user_id')),
    
);
