<?php

use Illuminate\Database\Seeder;

class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'The Mall Ngamwongwan';
        $parking->address = '30/39-50 M.2 Ngamwongwan Rd, Bangken,Nonthaburi, 11000';
        $parking->photo = '/storage/mall.png';
        $parking->save();


        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Pantip Pratunam';
        $parking->address = '604/3 Phetchaburi Rd, Khwaeng Thanon Phetchaburi, Khet Ratchathewi, Krung Thep Maha Nakhon 10400';
        $parking->photo = '/storage/pantip.jpg';
        $parking->save();


        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Major Cineplex Ratchayothin';
        $parking->address = '1839 Phahonyothin Rd, Khwaeng Lat Yao, Khet Chatuchak, กรุงเทพมหานคร 10900';
        $parking->photo = '/storage/major.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'CentralPlaza Grand Rama IX';
        $parking->address = '9/9 พระราม 9 Khwaeng Huai Khwang, Khet Huai Khwang, Krung Thep Maha Nakhon 10310';
        $parking->photo = '/storage/CentralRama9-1.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'CentralPlaza WestGate';
        $parking->address = '199/3 หมู่ที่ 6 Rattanathibet Rd, Tambon Sao Thong Hin, Amphoe Bang Yai, Chang Wat Nonthaburi 11140';
        $parking->photo = '/storage/central-westgate-690x364.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Siam Paragon';
        $parking->address = 'สยามพารากอน 991 Rama I Rd, Khwaeng Pathum Wan, Khet Pathum Wan, Krung Thep Maha Nakhon 10330';
        $parking->photo = '/storage/siamParagon.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Siam Square One';
        $parking->address = '991 ถนน พระราม 1 Wang Mai, Khet Pathum Wan, Krung Thep Maha Nakhon 10330';
        $parking->photo = '/storage/siamsquareone.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Tops Market MBK';
        $parking->address = '444 Phayathai Rd, Patumwan, Wangmai, Krung Thep Maha Nakhon 10330';
        $parking->photo = '/storage/top-Market.png';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Big C Supercenter';
        $parking->address = '97/11 Ratchadamri Rd, Khwaeng Lumphini, Khet Pathum Wan, กรุงเทพมหานคร 10330';
        $parking->photo = '/storage/destination-Big-C.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'บิ๊กซี ราชดำริ';
        $parking->address = '97/11 ถนน ราชดำริ แขวง ลุมพินี เขต ปทุมวัน กรุงเทพมหานคร 10330';
        $parking->photo = '/storage/bigC.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'Esplanade Ngamwongwan – Khae Rai';
        $parking->address = 'อาคารศูนย์การค้าเอสพลานาด Rattanathibet Rd, Tambon Bang Kraso, Amphoe Mueang Nonthaburi, Chang Wat Nonthaburi 11000';
        $parking->photo = '/storage/explanadeRattana.jpg';
        $parking->save();

        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'CentralPlaza Rattanathibet';
        $parking->address = '562, 566 Rattanathibet Rd, Tambon Bang Kraso, Amphoe Mueang Nonthaburi, Chang Wat Nonthaburi 11000';
        $parking->photo = '/storage/cen.jpg';
        $parking->save();


    }
}
