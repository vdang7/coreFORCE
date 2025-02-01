<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Ruger American', 'slug' => 'ruger_american', 'description' => 'A reliable, affordable bolt-action hunting rifle. Accurate, lightweight, multi-caliber, adjustable trigger, detachable magazine. Great value for hunters.', 'price' => 519.99, 'quantity' => 10, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/Ruger_American.webp'],
            ['name' => 'AK-47M', 'slug' => 'ak-47m', 'description' => 'Rugged and reliable, the AK-47M is a legendary assault rifle known for its simple design and effectiveness in harsh conditions. Chambered in 7.62x39mm.', 'price' => 765.21, 'quantity' => 5, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/ak47m.webp'],
            ['name' => 'AR-15', 'slug' => 'ar-15', 'description' => 'Modular and customizable, the AR-15 is a popular semi-automatic rifle platform widely used for sport, hunting, and self-defense. Typically chambered in 5.56 NATO/.223 Rem.', 'price' => 1187.58, 'quantity' => 8, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/AR-15.webp'],
            ['name' => 'AR-180', 'slug' => 'ar-180', 'description' => 'A predecessor to the AR-15, the AR-180 is a lightweight, gas-operated semi-automatic rifle. Offers similar functionality to the AR-15 but with a different design.', 'price' => 895.99, 'quantity' => 3, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/AR-180.webp'],
            ['name' => 'Benelli M4', 'slug' => 'benelli_m4', 'description' => 'A high-performance, semi-automatic tactical shotgun known for its reliability and fast cycling. Popular for law enforcement, competition, and home defense. 12 gauge.', 'price' => 1949.99, 'quantity' => 2, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/Benelli+M4.webp'],
            ['name' => 'CZ 527 Carbine', 'slug' => 'cz_527_carbine', 'description' => 'A lightweight bolt-action carbine ideal for hunting and general use. Available in various calibers, offering a classic hunting rifle experience.', 'price' => 575.32, 'quantity' => 7, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/CZ_527_Carbine.webp'],
            ['name' => 'FN SCAR 16S', 'slug' => 'fn_scar_16s', 'description' => 'A modular and adaptable rifle system known for its lightweight design and reliability. Available in various calibers, popular in military and civilian markets.', 'price' => 2682.15, 'quantity' => 1, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/FN_SCAR.webp'],
            ['name' => 'M4 Carbine', 'slug' => 'm4_carbine', 'description' => 'A shorter, lighter variant of the M16, the M4 is a common select-fire assault rifle used by the US military. Also available in semi-auto versions for civilian use.', 'price' => 1425.75, 'quantity' => 6, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/M4_CARBINE.webp'],
            ['name' => 'M4E1', 'slug' => 'm4e1', 'description' => 'A high-quality AR-15 lower receiver known for its enhanced features and compatibility. Often used as a base for custom rifle builds.', 'price' => 139.99, 'quantity' => 15, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/M4E1.webp'],
            ['name' => 'SIG Sauer MCX', 'slug' => 'sig_sauer_mcx', 'description' => 'A modular, multi-caliber rifle system known for its short-stroke piston operation and adaptability. Popular in tactical and sporting roles.', 'price' => 2150.49, 'quantity' => 4, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/SIG_Sauer_MCX.webp'],
            ['name' => 'SIG Sauer CROSS Rifle', 'slug' => 'sig_sauer_cross_rifle', 'description' => 'A lightweight precision rifle designed for long-range shooting. Features a folding chassis and adjustable stock for enhanced portability and ergonomics.', 'price' => 1799.57, 'quantity' => 9, 'image' => 'https://laravelstorebucket.s3.us-east-1.amazonaws.com/public/products/SIG_Sauer_CROSS_rifle.webp']
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'slug' => $product['slug'],
                'description' => $product['description'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'image' => $product['image'],
            ]);
        }
        
    }
}
