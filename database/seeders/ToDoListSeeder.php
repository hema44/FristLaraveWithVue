<?php

namespace Database\Seeders;

use App\Models\ToDolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToDoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "title"=>"TaskTest1",
                "notes"=>"taskNote1",
                "date"=>now()->toDate(),
            ],[
                "title"=>"TaskTest2",
                "notes"=>"taskNote2",
                "date"=>now()->toDate(),
            ],[
                "title"=>"TaskTest3",
                "notes"=>"taskNote3",
                "date"=>now()->toDate(),
            ],[
                "title"=>"TaskTest4",
                "notes"=>"taskNote4",
                "date"=>now()->toDate(),
            ],

        ];

        foreach ($data as $rec){

            ToDolist::create($rec);
        }

    }
}
