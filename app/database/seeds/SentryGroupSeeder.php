<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/13/14
 * Time: 3:02 PM
 */

class SentryGroupSeeder extends Seeder {
    public function run()
    {
        DB::table('groups')->delete();

        Sentry::getGroupProvider()->create([
            'name' => 'Users',
            'permissions' => [
                'users.store' => 1,
                'users.show' => 1,
                'users.account' => 1,
                'users.password' => 1
            ]
        ]);

        Sentry::getGroupProvider()->create([
            'name' => 'Admins',
            'permissions' => [
                'users' => 1
            ]
        ]);
    }
}