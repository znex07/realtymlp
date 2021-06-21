<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
       \App\User::create([
            'user_type' => '2',
            'user_code' => 'RM' . time(),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('minad')]
        );
        \App\User::create([
            'user_type' => '1',
            'user_code' => 'RM' . time(),
            'email' => 'tertorbela@gmail.com',
            'password' => bcrypt('Angel09093769148')]
        );

       \App\UserSubscribe::create([
            'name' => 'Free',
            'user_code' => 'RM' . time(),
        ]);

        \App\UserSubscribe::create([
            'name' => 'Free',
            'user_code' => 'RM' . time(),
              'listings' => 10,
                'requirements' => 10,
        ]);

        \App\User::create([
                'user_type' => '1',
                'user_code' => 'RM' . time(),
                'user_lname' => 'user',
                'user_fname' => 'RM' . time(),
                'email' => 'user@gmail.com',
                'password' => bcrypt('user')]
        );

        \App\UserSubscribe::create([
            'name' => 'User',
            'user_code' => 'RM' . time(),
        ]);
        \App\Subscription::create([
            'name' => 'Free',
            'price' => 0,
            'lifespan' => 6,
            'uom' => 'month',
            'listings' => 10,
            'requirements' => 10,
            'affiliates' => 10,
            'shared_to_me' => 10,
            'no_img' => 10,
            'no_att' => 10,
            'size_img_mb' => 10,
            'size_att_mb' => 10,
            'single_msg' => 'Yes',
            'group_msg' => 'Yes',
            'library' => 'Yes',
            'group' => 10,
            'auto_matching' => 10,
            'status' => 10,
            'created_at' => \Carbon\Carbon::now()
        ]);

        \App\Subscription::create([
            'name' => 'Premium',
            'price' => 500,
            'lifespan' => 6,
            'uom' => 'cal_days_in_month(calendar, month, year)',
            'listings' => 100,
            'requirements' => 100,
            'affiliates' => 100,
            'shared_to_me' => 100,
            'no_img' => 100,
            'no_att' => 100,
            'size_img_mb' => 100,
            'size_att_mb' => 100,
            'single_msg' => 'Yes',
            'group_msg' => 'Yes',
            'library' => 'Yes',
            'group' => 100,
            'auto_matching' => 100,
            'status' => 100,
            'created_at' => \Carbon\Carbon::now()
        ]);
        \App\Subscription::create([
            'name' => 'Premium+',
            'price' => 1000,
            'lifespan' => 6,
            'uom' => 'month',
            'listings' => 1000,
            'requirements' => 1000,
            'affiliates' => 1000,
            'shared_to_me' => 1000,
            'no_img' => 1000,
            'no_att' => 1000,
            'size_img_mb' => 1000,
            'size_att_mb' => 1000,
            'single_msg' => 'Yes',
            'group_msg' => 'Yes',
            'library' => 'Yes',
            'group' => 1000,
            'auto_matching' => 1000,
            'status' => 1000,
            'created_at' => \Carbon\Carbon::now()
        ]);

        Model::reguard();
    }
}
