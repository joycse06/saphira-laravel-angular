<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 11/13/14
 * Time: 3:07 PM
 */

class SentryUserSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create([
           'email' =>  'admin@admin.com',
            'displayName' => 'Sentry Admin',
            'username' => 'admin',
            'password' => 'sentryadmin',
            'activated' => 1
        ]);

        Sentry::getUserProvider()->create([
            'email' =>  'user@user.com',
            'displayName' => 'Sentry User',
            'username' => 'admin',
            'password' => 'sentryuser',
            'activated' => 1
        ]);

    }
}