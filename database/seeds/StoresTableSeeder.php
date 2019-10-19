<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->delete();

        DB::table('stores')->insert([
            ['id'=>'2389','country'=>'PT','store'=>'Aeroporto Lisboa AIRSIDE','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'2392','country'=>'PT','store'=>'Algarve Planta Alta ','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'2414','country'=>'ES','store'=>'ECI La Vaguada','area'=>'Madrid ','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'2420','country'=>'ES','store'=>'Oasis','area'=>'Canarias','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'2421','country'=>'ES','store'=>'Habaneras ','area'=>'Levante','segment'=>'Gold','concept'=>'Intermediate + RB SIS'],
            ['id'=>'2422','country'=>'ES','store'=>'Espai Girona','area'=>'Cataluña','segment'=>'Gold','concept'=>'Intermediate'],
            ['id'=>'2423','country'=>'ES','store'=>'Las Terrazas','area'=>'Canarias','segment'=>'Outlet','concept'=>'Intermediate'],
            ['id'=>'2428','country'=>'ES','store'=>'Aqua','area'=>'Levante ','segment'=>'Silver','concept'=>'Intermediate '],
            ['id'=>'2430','country'=>'ES','store'=>'Vialia','area'=>'Andalucía','segment'=>'Silver','concept'=>'Intermediate'],
            ['id'=>'2431','country'=>'ES','store'=>"L'Aljub",'area'=>'Levante','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'2435','country'=>'ES','store'=>'Fañabe','area'=>'Canarias','segment'=>'Gold','concept'=>'Intermediate'],
            ['id'=>'2439','country'=>'ES','store'=>'Area Sur ','area'=>'Andalucía','segment'=>'Outlet','concept'=>'3.0 + RB SIS'],
            ['id'=>'2442','country'=>'ES','store'=>'Portal de la Marina','area'=>'Levante','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2443','country'=>'ES','store'=>'El Campanario','area'=>'Canarias','segment'=>'Gold','concept'=>'Basic'],
            ['id'=>'2451','country'=>'ES','store'=>'Getafe','area'=>'Madrid','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'2452','country'=>'ES','store'=>'Outletuy','area'=>'Madrid','segment'=>'Outlet','concept'=>'2.0 + RB SIS'],
            ['id'=>'2454','country'=>'ES','store'=>'Puerto Banús','area'=>'Andalucía','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'2455','country'=>'ES','store'=>'La Cañada','area'=>'Andalucía','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'2461','country'=>'ES','store'=>'Plaza del Duque','area'=>'Canarias','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'2462','country'=>'ES','store'=>'Las Palmeras','area'=>'Canarias','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2463','country'=>'ES','store'=>'Mirador de Jinamar','area'=>'Canarias','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2464','country'=>'ES','store'=>'Bahía Sur','area'=>'Andalucía','segment'=>'Silver','concept'=>'Intermediate + RB SIS'],
            ['id'=>'2465','country'=>'ES','store'=>'Luz Shopping','area'=>'Andalucía','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'2466','country'=>'ES','store'=>'Rambla de Cataluña','area'=>'Cataluña','segment'=>'Platinum','concept'=>'6000 + RB SIS '],
            ['id'=>'2470','country'=>'ES','store'=>'La Maquinista','area'=>'Cataluña','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'2472','country'=>'ES','store'=>'Mataró','area'=>'Cataluña','segment'=>'Gold','concept'=>'Intermediate'],
            ['id'=>'2474','country'=>'ES','store'=>'La Rinconada','area'=>'Andalucía','segment'=>'Outlet','concept'=>'Intermediate + 4.0 + RB SIS + Promo Table'],
            ['id'=>'2476','country'=>'ES','store'=>'Plaza Mayor','area'=>'Andalucía','segment'=>'Gold','concept'=>'Intermediate + RB SIS '],
            ['id'=>'2477','country'=>'ES','store'=>'Diagonal Mar ','area'=>'Cataluña','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2478','country'=>'ES','store'=>'Las Rozas','area'=>'Madrid','segment'=>'Outlet','concept'=>'Intermediate'],
            ['id'=>'2479','country'=>'PT','store'=>'Factory Bonaire ','area'=>'Levante','segment'=>'Outlet','concept'=>'Intermediate + RB SIS + Promo Table'],
            ['id'=>'2481','country'=>'ES','store'=>'Artea','area'=>'Norte','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'2482','country'=>'ES','store'=>'La Morea','area'=>'Norte','segment'=>'Gold','concept'=>'Intermediate'],
            ['id'=>'2485','country'=>'ES','store'=>'Licenciado Pozas ','area'=>'Norte','segment'=>'Gold','concept'=>'6000 + RB SIS'],
            ['id'=>'2489','country'=>'ES','store'=>'Parque Principado','area'=>'Madrid','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2492','country'=>'ES','store'=>'Mirador ','area'=>'Canarias','segment'=>'Platinum','concept'=>'2.0 '],
            ['id'=>'2493','country'=>'ES','store'=>'Fuencarral ','area'=>'Madrid','segment'=>'Platinum','concept'=>'6000 + RB SIS'],
            ['id'=>'2494','country'=>'ES','store'=>'Santa Cruz','area'=>'Canarias','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2495','country'=>'ES','store'=>'Dos Mares','area'=>'Levante','segment'=>'Gold','concept'=>'4.0 + RB SIS'],
            ['id'=>'2496','country'=>'ES','store'=>'Baricentro ','area'=>'Cataluña','segment'=>'Silver','concept'=>'Intermediate '],
            ['id'=>'2497','country'=>'ES','store'=>'Dos Hermanas','area'=>'Andalucía','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'2499','country'=>'ES','store'=>'Valle Real','area'=>'Norte','segment'=>'Silver','concept'=>'2.0 Open Air'],
            ['id'=>'2507','country'=>'PT','store'=>'Dolce Vita Tejo Loja ','area'=>'Portugal 2','segment'=>'Silver','concept'=>'Intermediate '],
            ['id'=>'2508','country'=>'PT','store'=>'Colombo','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'2.0 + RB SIS + Promo table'],
            ['id'=>'2509','country'=>'PT','store'=>'Almada Forum ','area'=>'Portugal 1','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2517','country'=>'PT','store'=>'Norte Shopping','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'2519','country'=>'PT','store'=>'Vasco Da Gama','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'2521','country'=>'PT','store'=>'Braga Parque ','area'=>'Portugal 1','segment'=>'Gold','concept'=>'Intermediate + RB SIS'],
            ['id'=>'2532','country'=>'PT','store'=>'Cascais Shopping','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'2534','country'=>'PT','store'=>'Aeroporto Porto','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'SIS 6000'],
            ['id'=>'2536','country'=>'PT','store'=>'Armazéns Chiado','area'=>'Portugal 1','segment'=>'Gold','concept'=>'4.0 + RB SIS'],
            ['id'=>'2539','country'=>'PT','store'=>'Campera Outlet ','area'=>'Portugal 1','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'2541','country'=>'PT','store'=>'Foz Plaza ','area'=>'Portugal 2','segment'=>'Silver','concept'=>'Intermediate'],
            ['id'=>'2545','country'=>'PT','store'=>'Forum Montijo','area'=>'Portugal 1','segment'=>'Silver','concept'=>'2.0 Open Air'],
            ['id'=>'2546','country'=>'PT','store'=>'Acores','area'=>'Portugal 2','segment'=>'Silver','concept'=>'2.0 Open Air'],
            ['id'=>'2547','country'=>'PT','store'=>'Outlet Freeport ','area'=>'Portugal 1','segment'=>'Outlet','concept'=>'2.0 + RB SIS + Promo Table'],
            ['id'=>'2548','country'=>'PT','store'=>'Dolce Vita Douro','area'=>'Portugal 2','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'2549','country'=>'PT','store'=>'Vila Do Conde','area'=>'Portugal 1','segment'=>'Outlet','concept'=>'3.0 + RB SIS'],
            ['id'=>'2550','country'=>'PT','store'=>'Alma Shopping (Dolce Vita Coimbra)','area'=>'Portugal 2','segment'=>'Gold','concept'=>'3.0 + RB SIS'],
            ['id'=>'2552','country'=>'PT','store'=>'Alameda (Dolce Vita Antas)','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'2554','country'=>'PT','store'=>'Forum  Coimbra ','area'=>'Portugal 2','segment'=>'Gold','concept'=>'Intermediate + RB SIS'],
            ['id'=>'2556','country'=>'PT','store'=>'Arrabida Shopping ','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'2574','country'=>'PT','store'=>'Via Catarina','area'=>'Portugal 2','segment'=>'Gold','concept'=>'Intermediate'],
            ['id'=>'2575','country'=>'PT','store'=>'Mar Shopping','area'=>'Portugal 1','segment'=>'Silver','concept'=>'Intermediate '],
            ['id'=>'2577','country'=>'PT','store'=>'Estacao Viana do Castelo ','area'=>'Portugal 1','segment'=>'Silver','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'2718','country'=>'ES','store'=>'Dehesa Vieja','area'=>'Madrid','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'2720','country'=>'PT','store'=>'Aeroporto Lisboa (LX)','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'6000 + RB SIS '],
            ['id'=>'2771','country'=>'ES','store'=>'ECI 3 de Mayo','area'=>'Canarias','segment'=>'Platinum','concept'=>'SIS 6000 + RB SIS'],
            ['id'=>'2772','country'=>'ES','store'=>'ECI Diagonal','area'=>'Cataluña','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'2773','country'=>'ES','store'=>'ECI Mesa y Lopez','area'=>'Canarias','segment'=>'Platinum','concept'=>'SIS 6000 + RB SIS'],
            ['id'=>'2774','country'=>'ES','store'=>'ECI 7 Palmas','area'=>'Canarias','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'2784','country'=>'ES','store'=>'Sitges','area'=>'Cataluña','segment'=>'Platinum','concept'=>'6000 + RB SIS'],
            ['id'=>'2866','country'=>'ES','store'=>'Ricardo Soriano','area'=>'Andalucía','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'2967','country'=>'ES','store'=>'Aeropuerto BCN T1 Airside','area'=>'Cataluña','segment'=>'Platinum','concept'=>'3.0 '],
            ['id'=>'2998','country'=>'ES','store'=>"L'illa",'area'=>'Cataluña','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'2999','country'=>'ES','store'=>'Maremagnum','area'=>'Cataluña','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'3011','country'=>'ES','store'=>'Aeropuerto Alicante ','area'=>'Levante ','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'3012','country'=>'ES','store'=>'Aeropuerto Málaga Airside ','area'=>'Andalucía','segment'=>'Platinum','concept'=>'2.0 + RB SIS + Promo table'],
            ['id'=>'3060','country'=>'PT','store'=>'Dolce Vita Funchal','area'=>'Portugal 1','segment'=>'Silver','concept'=>'2.0 Open Air'],
            ['id'=>'3064','country'=>'ES','store'=>'Jaume III','area'=>'Baleares','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'3079','country'=>'ES','store'=>'Aeropuerto Fuerteventura ','area'=>'Canarias','segment'=>'Platinum','concept'=>'2.0 '],
            ['id'=>'3093','country'=>'ES','store'=>'Aeropuerto Gran Canaria','area'=>'Canarias','segment'=>'Gold','concept'=>'2.0 '],
            ['id'=>'3098','country'=>'ES','store'=>'Aeropuerto Ibiza ','area'=>'Baleares','segment'=>'Platinum','concept'=>'2.0 '],
            ['id'=>'3102','country'=>'ES','store'=>'Aeropuerto Lanzarote','area'=>'Canarias','segment'=>'Gold','concept'=>'2.0 '],
            ['id'=>'3103','country'=>'ES','store'=>'Aeropuerto Málaga Landside','area'=>'Andalucía','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'3117','country'=>'ES','store'=>'Aeropuerto Mahón Menorca ','area'=>'Baleares','segment'=>'Platinum','concept'=>'2.0 + 6000'],
            ['id'=>'3135','country'=>'ES','store'=>'Siam Mall','area'=>'Canarias','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'3140','country'=>'ES','store'=>'San Sebastian','area'=>'Norte','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'3141','country'=>'ES','store'=>'Aeropuerto Tenerife Norte ','area'=>'Canarias','segment'=>'Gold','concept'=>'6000'],
            ['id'=>'3142','country'=>'ES','store'=>'Aeropuerto Tenerife Sur ','area'=>'Canarias','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'3176','country'=>'PT','store'=>'8 Avenida','area'=>'Portugal 3','segment'=>'Silver','concept'=>'Intermediate '],
            ['id'=>'3177','country'=>'PT','store'=>'Amoreiras','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'3182','country'=>'PT','store'=>'Madeira Shopping','area'=>'Portugal 1','segment'=>'Gold','concept'=>'Intermediate '],
            ['id'=>'3235','country'=>'ES','store'=>'ECI Campo de las Naciones','area'=>'Madrid','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'3258','country'=>'ES','store'=>'Larios','area'=>'Andalucía','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'3575','country'=>'ES','store'=>'Factory Outlet Viladecans','area'=>'Cataluña','segment'=>'Outlet','concept'=>'2.0 + RB SIS + Promo Table'],
            ['id'=>'3768','country'=>'ES','store'=>'Cordoba / Gondomar','area'=>'Andalucía','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'3774','country'=>'ES','store'=>'Aeropuerto Palma de Mallorca Mod D','area'=>'Baleares','segment'=>'Platinum','concept'=>'2.0 '],
            ['id'=>'3775','country'=>'ES','store'=>'Mallorca Fashion Outlet (Festival Park) ','area'=>'Baleares','segment'=>'Outlet','concept'=>'2.0'],
            ['id'=>'3778','country'=>'ES','store'=>'Bilbao Gran Vía','area'=>'Norte','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'3907','country'=>'ES','store'=>'Las Rozas Village ','area'=>'Madrid','segment'=>'Outlet','concept'=>'4.0 + RB SIS'],
            ['id'=>'3908','country'=>'ES','store'=>'Gran Jonquera','area'=>'Cataluña','segment'=>'Outlet','concept'=>'2.0'],
            ['id'=>'3914','country'=>'ES','store'=>'Aeropuerto Madrid T4 LS','area'=>'Madrid ','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'4193','country'=>'ES','store'=>'Aeropuerto Palma de Mallorca Mod A ','area'=>'Baleares','segment'=>'Platinum','concept'=>'2.0 + RB SIS + Promo Table'],
            ['id'=>'4243','country'=>'ES','store'=>'Serrano','area'=>'Madrid','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'4290','country'=>'ES','store'=>'ECI Princesa','area'=>'Madrid','segment'=>'Gold ','concept'=>'SIS 6000'],
            ['id'=>'4298','country'=>'ES','store'=>'ECI Vigo','area'=>'Madrid','segment'=>'Gold','concept'=>'SIS 6000 + RB SIS'],
            ['id'=>'4477','country'=>'PT','store'=>'Rua Augusta','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'3.0 + RB SIS '],
            ['id'=>'4490','country'=>'ES','store'=>'Portaferrissa','area'=>'Cataluña','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'5031','country'=>'ES','store'=>'Recogidas','area'=>'Andalucía','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'5103','country'=>'ES','store'=>'Porto Pi','area'=>'Baleares','segment'=>'Gold','concept'=>'2.0 '],
            ['id'=>'5222','country'=>'PT','store'=>'Aeroporto Funchal','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'Intermediate '],
            ['id'=>'5272','country'=>'PT','store'=>'Leiria','area'=>'Portugal 2','segment'=>'Gold','concept'=>'2.0 Open Air'],
            ['id'=>'5329','country'=>'ES','store'=>'ECI Independencia ','area'=>'Madrid','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5364','country'=>'ES','store'=>'ECI Cornellá','area'=>'Cataluña','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5370','country'=>'ES','store'=>'ECI Badajoz Centro','area'=>'Madrid','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5396','country'=>'ES','store'=>'Aero Girona ','area'=>'Cataluña','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5466','country'=>'ES','store'=>'ECI Tarragona','area'=>'Cataluña','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5527','country'=>'ES','store'=>'ECI Valladolid','area'=>'Madrid','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5553','country'=>'ES','store'=>'ECI Puerto Banús','area'=>'Andalucía','segment'=>'Platinum','concept'=>'SIS 6000 + RB SIS'],
            ['id'=>'5554','country'=>'ES','store'=>'ECI Bahía de Cádiz','area'=>'Andalucía','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'5620','country'=>'ES','store'=>'Juan de Austria','area'=>'Levante','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'5650','country'=>'ES','store'=>'Málaga- Calle Granada','area'=>'Andalucía','segment'=>'Platinum','concept'=>'2.0 + RB SIS '],
            ['id'=>'6541','country'=>'ES','store'=>'Portal del Angel (Flasghip)','area'=>'Cataluña','segment'=>'Platinum','concept'=>'Flagship + RB SIS'],
            ['id'=>'7035','country'=>'ES','store'=>'ECI Preciados','area'=>'Madrid','segment'=>'Platinum','concept'=>'SIS 2.0'],
            ['id'=>'7037','country'=>'ES','store'=>'ECI Palma de Mallorca','area'=>'Baleares','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'7039','country'=>'ES','store'=>'ECI Arabial','area'=>'Andalucía','segment'=>'Gold','concept'=>'SIS 6000'],
            ['id'=>'7044','country'=>'ES','store'=>'ECI Marineda','area'=>'Madrid ','segment'=>'Silver','concept'=>'SIS 6000'],
            ['id'=>'7065','country'=>'ES','store'=>'Aeropuerto Madrid T4 AS ','area'=>'Madrid ','segment'=>'Platinum','concept'=>'2.0 + 6000 +RB SIS'],
            ['id'=>'7068','country'=>'ES','store'=>'Calle Gambo','area'=>'Levante','segment'=>'Platinum','concept'=>'2.0'],
            ['id'=>'7069','country'=>'ES','store'=>'Las Arenas BCN ','area'=>'Cataluña','segment'=>'Platinum','concept'=>'2.0 + RB SIS'],
            ['id'=>'7700','country'=>'PT','store'=>'C.C. Nova Arcada','area'=>'Portugal 1','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'8593','country'=>'ES','store'=>'Logroño','area'=>'Norte','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'8596','country'=>'ES','store'=>'Jerez de la Frontera (Lancería)','area'=>'Andalucía','segment'=>'Silver','concept'=>'2.0'],
            ['id'=>'8597','country'=>'ES','store'=>'Columela ','area'=>'Andalucía','segment'=>'Gold','concept'=>'2.0 + RB SIS'],
            ['id'=>'8603','country'=>'ES','store'=>'Pamplona','area'=>'Norte','segment'=>'Gold','concept'=>'2.0 + ZIGZAG (RB-OO)'],
            ['id'=>'8606','country'=>'ES','store'=>'Santander','area'=>'Norte','segment'=>'Gold','concept'=>'2.0'],
            ['id'=>'8608','country'=>'ES','store'=>'Mahón ','area'=>'Baleares','segment'=>'Gold','concept'=>'2.0 '],
            ['id'=>'8609','country'=>'ES','store'=>'Aeropuerto Palma de Mallorca Mod C','area'=>'Baleares','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'8777','country'=>'PT','store'=>'Aeroporto Faro (Loja)','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'3.0'],
            ['id'=>'8778','country'=>'PT','store'=>'Aeroporto Faro Kiosko','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'3.0 Special'],
            ['id'=>'8779','country'=>'PT','store'=>'Aeroporto Lisboa T2','area'=>'Portugal 2','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'8910','country'=>'ES','store'=>'Aeropuerto Madrid T2','area'=>'Madrid','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'8993','country'=>'ES','store'=>'Aeropuerto MAD T3','area'=>'Madrid ','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9060','country'=>'ES ','store'=>'Tetuan','area'=>'Andalucía','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'9081','country'=>'ES','store'=>'Barakaldo Fashion Outlet','area'=>'Norte','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'9082','country'=>'ES','store'=>'Coruña The Style Outlet','area'=>'Madrid','segment'=>'Outlet','concept'=>'Intermediate '],
            ['id'=>'9128','country'=>'ES','store'=>'Gandía','area'=>'Levante','segment'=>'Silver','concept'=>'3.0 + RB SIS'],
            ['id'=>'9137','country'=>'ES','store'=>'Murcia Gran Vía','area'=>'Levante','segment'=>'Gold','concept'=>'Intermediate + RB SIS + 4.0'],
            ['id'=>'9140','country'=>'PT','store'=>'Rua do Carmo ','area'=>'Portugal 1','segment'=>'Platinum','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'9141','country'=>'ES','store'=>'Aeropuerto Bilbao','area'=>'Norte','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9142','country'=>'ES','store'=>'Jaume II','area'=>'Baleares','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9159','country'=>'ES','store'=>'Plaza Sant Jaume','area'=>'Cataluña','segment'=>'Platinum','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'9160','country'=>'ES','store'=>'El Muelle','area'=>'Canarias','segment'=>'Silver','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'9166','country'=>'ES','store'=>'Aeropuerto Valencia','area'=>'Levante','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9167','country'=>'ES','store'=>'Aeropuerto Santiago','area'=>'Norte','segment'=>'Platinum','concept'=>'3.0 + RB SIS '],
            ['id'=>'9192','country'=>'ES','store'=>'Aeropuerto BCN T1 No Schengen','area'=>'Cataluña','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9193','country'=>'PT','store'=>'Algarve Outlet Inter Ikea','area'=>'Portugal 2','segment'=>'Outlet','concept'=>'3.0 + ZIGZAG (RB-OO)'],
            ['id'=>'9194','country'=>'PT','store'=>'Povoa','area'=>'Portugal 1','segment'=>'Gold','concept'=>'3.0 + RB SIS '],
            ['id'=>'9195','country'=>'ES','store'=>'Algeciras','area'=>'Andalucía','segment'=>'Gold','concept'=>'3.0 + RB SIS '],
            ['id'=>'9206','country'=>'ES','store'=>'Denia','area'=>'Levante','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9276','country'=>'PT','store'=>'Strada Outlet','area'=>'Portugal 2','segment'=>'Outlet','concept'=>'SGH-NXT + RB SIS'],
            ['id'=>'9281','country'=>'ES','store'=>'Outlet alicante','area'=>'Levante','segment'=>'Outlet','concept'=>'3.0 + RB SIS'],
            ['id'=>'9328','country'=>'ES','store'=>'Puigcerdá','area'=>'Cataluña','segment'=>'Gold','concept'=>'3.0 + RB SIS '],
            ['id'=>'9331','country'=>'PT','store'=>'Oeiras','area'=>'Portugal','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'9347','country'=>'ES','store'=>'La Roca Village ','area'=>'Cataluña','segment'=>'Outlet','concept'=>'4.0 + RB SIS'],
            ['id'=>'9348','country'=>'ES','store'=>'Aero BCN T1 Airside Schengen (exAristocrazy)','area'=>'Cataluña','segment'=>'Platinum','concept'=>'3.0 + RB SIS'],
            ['id'=>'9530','country'=>'ES','store'=>'Finestrelles','area'=>'Cataluña','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
            ['id'=>'9999','country'=>'ES','store'=>'ECI Diagonal','area'=>'Cataluña','segment'=>'Platinum','concept'=>'4.0 + RB SIS'],
                    ]);
    }
}
