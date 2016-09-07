<?php
use \Step\Acceptance;

/**
 * @group roles
 */
class DifferentRolesCest
{

    function roleGsmeditor( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('gsmeditor@gustr.com');
        $role->gsmeditor();
        $role->logout();
    }

    function roleMauthor( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('gsmauthor@gustr.com');
        $role->gsmeditor();
        $role->logout();
    }

    function roleMsourcer( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('gsmsourcer@gustr.com');
        $role->gsmeditor();
        $role->logout();
    }
    
    function roleAdmin( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('gsmadmin@gustr.com');
        $role->gsmadmin();
        $role->logout();
    }

    function roleSdsAdmin( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('sdspadmin@gustr.com');
        $role->sdsAdmin();
        $role->logout();
    }

    function roleSdspAuthor( \Page\DifferentRoles $role, \Step\Acceptance\Steps $I)
    {
        $role->roleUsers('sdspauthor@gustr.com');
        $role->sdspAuthor();
        $role->logout();
    }


    function error403( \Page\DifferentRoles $role)
    {
        $role->invalidUrl403();
    }





    



}

