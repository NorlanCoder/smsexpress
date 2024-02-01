<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insérer les packs
        for($i=1; $i<=5; $i++) {
            $nom = '';
            $prix = 0;
            $sms = 0;
            switch ($i) {
                case '1':
                    $nom = '1';
                    $prix = 4500;
                    $sms = 10;
                    break;
                case '2':
                    $nom = '2';
                    $prix = 9000;
                    $sms = 30;
                    break;
                case '3':
                    $nom = '3';
                    $prix = 23000;
                    $sms = 100;
                    break;
                case '4':
                    $nom = '4';
                    $prix = 46000;
                    $sms = 250;
                    break;
                case '5':
                    $nom = 'Pro';
                    $prix = 100000;
                    $sms = 1000;
                    break;

                default:
                    break;
            }

            DB::table('packs')->insert([
                'nom' => $nom,
                'code' => Str::random(100) ,
                'prix' => $prix,
                'sms' => $sms,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
