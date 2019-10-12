<?php

use Illuminate\Database\Seeder;

class MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medidas')->delete();

        DB::table('medidas')->insert([
            ['medida'=>'1381x392 mm'],
            ['medida'=>'361x842 mm'],
            ['medida'=>'387x44 mm'],
            ['medida'=>'1000x1000 x 2000 mm '],
            ['medida'=>'1000x2100 mm'],
            ['medida'=>'1000x396 mm'],
            ['medida'=>'1000x752 mm'],
            ['medida'=>'1008x393 mm'],
            ['medida'=>'102x75 mm'],
            ['medida'=>'1060x2485 '],
            ['medida'=>'1100x2730 mm'],
            ['medida'=>'1116x1950 mm'],
            ['medida'=>'1120x1950 mm'],
            ['medida'=>'1200x480 mm'],
            ['medida'=>'1250x2000 mm'],
            ['medida'=>'1250x3270 mm'],
            ['medida'=>'1376x392 mm'],
            ['medida'=>'1381 x 392 mm'],
            ['medida'=>'1381x392 mm'],
            ['medida'=>'1450x1970 mm'],
            ['medida'=>'1458x2300mm'],
            ['medida'=>'1497x2497 mm'],
            ['medida'=>'1500x3260 mm'],
            ['medida'=>'152x71 mm'],
            ['medida'=>'162x72 mm'],
            ['medida'=>'1630x2750 mm'],
            ['medida'=>'164x75 mm'],
            ['medida'=>'165x51 mm'],
            ['medida'=>'167x60 mm'],
            ['medida'=>'1760x1860 mm'],
            ['medida'=>'1770x2820 mm'],
            ['medida'=>'178x178 mm'],
            ['medida'=>'180x275 mm'],
            ['medida'=>'180x88 mm'],
            ['medida'=>'184x82 mm'],
            ['medida'=>'189x45 mm'],
            ['medida'=>'190x45 mm'],
            ['medida'=>'193x44 mm'],
            ['medida'=>'195x44 mm'],
            ['medida'=>'195x48 mm'],
            ['medida'=>'195x80 mm'],
            ['medida'=>'200x30 mm'],
            ['medida'=>'200x55 mm'],
            ['medida'=>'215x124 mm'],
            ['medida'=>'230x48 mm'],
            ['medida'=>'251x124 mm(visible 200x114 mm)'],
            ['medida'=>'253x176 mm'],
            ['medida'=>'254x254 mm'],
            ['medida'=>'254x37 mm'],
            ['medida'=>'255x795 mm'],
            ['medida'=>'280x710 mm'],
            ['medida'=>'292x1163 mm'],
            ['medida'=>'300x300 mm'],
            ['medida'=>'3050x2600 mm'],
            ['medida'=>'313x313 mm'],
            ['medida'=>'3345x2500 mm'],
            ['medida'=>'343x795 mm'],
            ['medida'=>'343x795 mm(visible 320x772 mm)'],
            ['medida'=>'343x795 mm(visible 320x772)'],
            ['medida'=>'348x348 mm'],
            ['medida'=>'348x542 mm'],
            ['medida'=>'352x352 mm'],
            ['medida'=>'352x572 mm'],
            ['medida'=>'352x766 mm'],
            ['medida'=>'352x960 mm'],
            ['medida'=>'359x354 mm'],
            ['medida'=>'359x359 mm'],
            ['medida'=>'361x842 mm'],
            ['medida'=>'362x932'],
            ['medida'=>'364x480mm'],
            ['medida'=>'375x178 mm'],
            ['medida'=>'376x377 mm'],
            ['medida'=>'376x402 mm'],
            ['medida'=>'380x380 mm'],
            ['medida'=>'3870x3260 mm'],
            ['medida'=>'387x387 mm'],
            ['medida'=>'387x44 mm'],
            ['medida'=>'3880x2940 mm'],
            ['medida'=>'390x86mm'],
            ['medida'=>'394x820 mm'],
            ['medida'=>'394x972 mm'],
            ['medida'=>'395x545 mm '],
            ['medida'=>'395x895 mm '],
            ['medida'=>'400X400 mm'],
            ['medida'=>'406x63 mm'],
            ['medida'=>'410x124 mm(visible 398x114 mm)'],
            ['medida'=>'424 x 600 mm'],
            ['medida'=>'424 x 600 mm / 848x600 mm'],
            ['medida'=>'430x1800 mm '],
            ['medida'=>'435X725 mm'],
            ['medida'=>'460x1360 mm'],
            ['medida'=>'477x1425 mm'],
            ['medida'=>'500x1210 mm'],
            ['medida'=>'500x214,54 mm'],
            ['medida'=>'505x1800 mm'],
            ['medida'=>'542x352 mm'],
            ['medida'=>'557x358 mm'],
            ['medida'=>'577x1800 mm'],
            ['medida'=>'591x682(visible 570x661)'],
            ['medida'=>'610x2600 mm'],
            ['medida'=>'635x1800 mm '],
            ['medida'=>'650x1120 mm'],
            ['medida'=>'670x1650 mm'],
            ['medida'=>'725X435 mm'],
            ['medida'=>'750x1900 mm'],
            ['medida'=>'760x1699 mm'],
            ['medida'=>'770x2530 mm'],
            ['medida'=>'835x835x835   x 1800 mm '],
            ['medida'=>'914X2134 mm'],
            ['medida'=>'915x2014 mm'],
            ['medida'=>'915x2014mm'],
            ['medida'=>'997x2497 mm'],
            ['medida'=>'info no necesaria'],
        ]);
    }
}
