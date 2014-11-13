<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/13/14
 * Time: 3:32 PM
 */

class SentryUserGroupSeeder extends Seeder {

    public function run() {
        DB::table('user_groups')->delete();

        $userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
        $adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');

        $userGroup = Sentry::getGroupProvider()->findByName('Users');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admins');

        $userUser->addGroup($userGroup);
        $adminUser->addGroup($userGroup);
        $adminUser->addGroup($adminGroup);
    }
}