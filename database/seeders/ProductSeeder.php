<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=> 'Gas',
                'price'=> "1000 Usd",
                'description'=> 'The best Gas ever in our company',
                "category"=>"Gas",
                "gallery"=>"https://media.istockphoto.com/photos/set-of-different-industrial-liquefied-gas-containers-picture-id611328502?k=20&m=611328502&s=612x612&w=0&h=lgvSFWkueaeCNoKznd-C-Nnza42njlwvO0wZePfMxyU=",
                  
            ],
            [
            'name'=> 'engine',
            'price'=> "10000 Usd",
            'description'=> 'These engines take over 10 years with the original parts',
            "category"=>"engine",
            "gallery"=>"https://www.ugandacarrentalservices.com/wp-content/uploads/2020/09/car-engine.jpg",
           
            ],
            [
            'name'=> 'mower',
            'price'=> "2000 Usd",
            'description'=> 'For a perfect  Home!!',
            "category"=>"mower",
            "gallery"=>"https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/mowing-with-roy-0368-1646166222.jpg ",
           
            ],
          
        ]);
    }
}
