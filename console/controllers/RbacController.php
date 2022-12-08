<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        // add "adminRole" permission
        $adminRole = $auth->createPermission('adminRole');
        $adminRole->description = 'Create a admin Role';
        $auth->add($adminRole);
        
        // add "staffRole" permission
        $staffRole = $auth->createPermission('staffRole');
        $staffRole->description = 'Create a staff Role';
        $auth->add($staffRole);
        
        // add "author" role and give this role the "adminRole" permission
        $staff = $auth->createRole('staff');
        $auth->add($staff);
        $auth->addChild($staff, $staffRole);
        
        // add "admin" role and give this role the "staffRole" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $staff);
        $auth->addChild($admin, $adminRole);
        
        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($staff, 2);
        $auth->assign($admin, 1);
    }
}