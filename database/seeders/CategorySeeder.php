<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $date = Carbon::now();
        $data = [
            ['module'=>'General_Old','name'=>'General','parent_id'=>0,'status'=>1,"created_at"=>$date],

            ['module'=>'CCMQ','name'=>'Balanced','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Sensitive','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Qi Deficient','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Yang Deficient','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Yin Deficient','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Phlegm Damp','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Damp-Heat','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Blood Stagnant','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ','name'=>'Qi Stagnant','parent_id'=>0,'status'=>1,"created_at"=>$date],
            

            ['module'=>'CCMQ-SF','name'=>'Normal','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Qi deficiency','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Yang deficiency','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Yin deficiency','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Phlegm damp','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Damp heat','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Blood stasis','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Qi stagnation','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'CCMQ-SF','name'=>'Sensitive','parent_id'=>0,'status'=>1,"created_at"=>$date],
            

            ['module'=>'BCQ_Negative','name'=>'Yin-Xu','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Negative','name'=>'Head','parent_id'=>20,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Negative','name'=>'Limbs','parent_id'=>20,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Negative','name'=>'Gastrointestinal Tract','parent_id'=>20,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Negative','name'=>'Body Surface','parent_id'=>20,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Negative','name'=>'Abdominal Cavity','parent_id'=>20,'status'=>1,"created_at"=>$date],
            
            ['module'=>'BCQ_Positive','name'=>'Yang-Xu','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Positive','name'=>'Head','parent_id'=>26,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Positive','name'=>'Chest','parent_id'=>26,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Positive','name'=>'Four Limbs','parent_id'=>26,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Positive','name'=>'Body Surface','parent_id'=>26,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQ_Positive','name'=>'Abdominal Cavity','parent_id'=>26,'status'=>1,"created_at"=>$date],

            ['module'=>'BCQs','name'=>'Stasis','parent_id'=>0,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQs','name'=>'Trunk','parent_id'=>32,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQs','name'=>'Body','parent_id'=>32,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQs','name'=>'Head','parent_id'=>32,'status'=>1,"created_at"=>$date],
            ['module'=>'BCQs','name'=>'Gastrointestinal','parent_id'=>32,'status'=>1,"created_at"=>$date]
        ];
        \App\Models\Category::insert($data);
    }
}
