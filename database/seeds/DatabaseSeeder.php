<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $images = 
        [
            ["id"=>1, "name"=>"img1", "src"=>"/images/add-img-1.png", "type"=>"image"],
            ["id"=>2, "name"=>"img2", "src"=>"/images/add-img-2.png", "type"=>"image"],
            ["id"=>3, "name"=>"img3", "src"=>"/images/add-img-3.png", "type"=>"image"],
            ["id"=>4, "name"=>"img4", "src"=>"/images/add-img-4.png", "type"=>"image"],
            ["id"=>5, "name"=>"img5", "src"=>"/images/add-img-5.png", "type"=>"image"],
        ];

        $videos = 
        [
            ["id"=>1, "name"=>"vid1", "src"=>"/videos/1.mp4", "type"=>"video"],
            ["id"=>2, "name"=>"vid2", "src"=>"/videos/2.mp4", "type"=>"video"],
            ["id"=>3, "name"=>"vid3", "src"=>"/videos/3.mp4", "type"=>"video"],
            ["id"=>4, "name"=>"vid4", "src"=>"/videos/4.mp4", "type"=>"video"],
            ["id"=>5, "name"=>"vid5", "src"=>"/videos/5.mp4", "type"=>"video"],
        ];

        $texts = 
        [
            ["id"=>1, "name"=>"text1", "src"=>"/texts/1.png", "type"=>"text", "txttype"=>"normal"],
            ["id"=>2, "name"=>"text2", "src"=>"/texts/2.png", "type"=>"text", "txttype"=>"question1"],
        ];

        DB::table('images')->insert($images);
        DB::table('videos')->insert($videos);
        DB::table('texts')->insert($texts);

        $animations = 
        [
            ["id"=>1, "name"=>"anim1", "src"=>"/images/girl-1.png", "type"=>"anim"],
            ["id"=>2, "name"=>"anim2", "src"=>"/images/girl-2.png", "type"=>"anim"],
            ["id"=>3, "name"=>"anim3", "src"=>"/images/girl-3.png", "type"=>"anim"],
        ];
        $presentations = 
        [
            ["id"=>1, "name"=>"pres1", "src"=>"/images/add-pres-1.png", "type"=>"presentation"],
            ["id"=>2, "name"=>"pres2", "src"=>"/images/add-pres-2.png", "type"=>"presentation"],
            ["id"=>3, "name"=>"pres3", "src"=>"/images/add-pres-3.png", "type"=>"presentation"],
        ];
        $linkvideos = 
        [
            ["id"=>1, "name"=>"link1", "src"=>"/images/add-link-1.png", "type"=>"linkvideo"],
            ["id"=>2, "name"=>"link2", "src"=>"/images/add-link-2.png", "type"=>"linkvideo"],
            ["id"=>3, "name"=>"link3", "src"=>"/images/add-link-3.png", "type"=>"linkvideo"],
        ];

        DB::table('animations')->insert($animations);
        DB::table('presentations')->insert($presentations);
        DB::table('linkvideos')->insert($linkvideos);
    }
}
