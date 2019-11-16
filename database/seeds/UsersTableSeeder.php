<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $base_url = config('app.url');
        $faker = app(Faker\Generator::class);
        $avatars = [
            $base_url . '/static/images/avatars/1.jpg',
            $base_url . '/static/images/avatars/2.jpg',
            $base_url . '/static/images/avatars/3.jpg',
            $base_url . '/static/images/avatars/4.jpg',
            $base_url . '/static/images/avatars/5.jpg',
            $base_url . '/static/images/avatars/6.jpg',
            $base_url . '/static/images/avatars/7.jpg',
            $base_url . '/static/images/avatars/8.jpg',
            $base_url . '/static/images/avatars/9.jpg',
        ];
        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function($user, $index) use ($faker, $avatars){
                $user->avatar = $faker->randomElement($avatars);
            });
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);
        $user->name = 'test1';
        $user->email = 'test1@qq.com';
        $user->avatar = $base_url . '/static/images/avatars/2.jpg';
        $user->save();
        // 将1号用户指定为站长
        $user->assignRole('Founder');
        //将2号用户指定为管理员
        $user = User::find(2);
        $user->assignRole('Maintainer');

    }
}
