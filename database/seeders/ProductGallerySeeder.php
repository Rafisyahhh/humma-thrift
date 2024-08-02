<?php

namespace Database\Seeders;

use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductGallerySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $listData = [
            [
                "product_id" => "1",
                "image" => "produk1/Snapinsta.app_450212961_17939780780837964_5290913863703747422_n_1080.jpg",
            ],
            [
                "product_id" => "1",
                "image" => "produk1/Snapinsta.app_450233545_17939780771837964_1524777694259285611_n_1080.jpg",
            ],
            [
                "product_id" => "1",
                "image" => "produk1/Snapinsta.app_450891160_17939780762837964_5970258811685364774_n_1080.jpg",
            ],
            //
            [
                "product_id" => "2",
                "image" => "produk 2/Snapinsta.app_448375742_850058740270825_8742631364981080060_n_1024.jpg",
            ],
            [
                "product_id" => "2",
                "image" => "produk 2/Snapinsta.app_448384993_972298241103656_799890056537003455_n_1024.jpg",
            ],
            [
                "product_id" => "2",
                "image" => "produk 2/Snapinsta.app_448448262_824736566384071_3984325915638867724_n_1024.jpg",
            ],
            [
                "product_id" => "2",
                "image" => "produk 2/Snapinsta.app_448493361_1023233972563301_8704032207105571913_n_1024.jpg",
            ],
            //
            [
                "product_id" => "3",
                "image" => "produk 3/Snapinsta.app_448578285_17937848393837964_3762391027097602211_n_1024.jpg",
            ],
            [
                "product_id" => "3",
                "image" => "produk 3/Snapinsta.app_448966973_17937848462837964_6783426530919823754_n_1024.jpg",
            ],
            [
                "product_id" => "3",
                "image" => "produk 3/Snapinsta.app_449182565_17937848420837964_5960778636923568993_n_1024.jpg",
            ],
            [
                "product_id" => "3",
                "image" => "produk 3/Snapinsta.app_449299091_17937848435837964_2001940689227144522_n_1024.jpg",
            ],
            //
            [
                "product_id" => "4",
                "image" => "produk 4/Snapinsta.app_426618857_3715843128738814_3922446649891533820_n_1080.jpg",
            ],
            [
                "product_id" => "4",
                "image" => "produk 4/Snapinsta.app_427530831_1046253426468902_1724799332885511327_n_1080.jpg",
            ],
            [
                "product_id" => "4",
                "image" => "produk 4/Snapinsta.app_427644209_2357539927781030_7621400523125119388_n_1080.jpg",
            ],
            //
            [
                "product_id" => "5",
                "image" => "produk 5/Snapinsta.app_448341563_995984298367710_5344656848719840373_n_1080.jpg",
            ],
            [
                "product_id" => "5",
                "image" => "produk 5/Snapinsta.app_448390076_788099483462212_6504698285813878088_n_1080.jpg",
            ],
            [
                "product_id" => "5",
                "image" => "produk 5/Snapinsta.app_448437544_844824604227153_3521984789199440647_n_1080.jpg",
            ],
            //
            [
                "product_id" => "6",
                "image" => "produk 6/Snapinsta.app_448357322_474218735185281_6481241407556896236_n_1080.jpg",
            ],
            [
                "product_id" => "6",
                "image" => "produk 6/Snapinsta.app_448442432_487514730515648_8486651269137328104_n_1080.jpg",
            ],
            [
                "product_id" => "6",
                "image" => "produk 6/Snapinsta.app_448442435_292288267211690_6539131671857000833_n_1080.jpg",
            ],
            //
            [
                "product_id" => "7",
                "image" => "produk 7/Snapinsta.app_448412313_1129009418380140_5646780257140141862_n_1080.jpg",
            ],
            [
                "product_id" => "7",
                "image" => "produk 7/Snapinsta.app_448485840_983509546565262_2816151686033853688_n_1080.jpg",
            ],
            [
                "product_id" => "7",
                "image" => "produk 7/Snapinsta.app_448533646_886688233299663_8410079160200301974_n_1080.jpg",
            ],
            //
            [
                "product_id" => "7",
                "image" => "produk 8/Snapinsta.app_448987849_450540564610886_2396862856574379293_n_1080.jpg",
            ],
            [
                "product_id" => "7",
                "image" => "produk 8/Snapinsta.app_449050932_1005186434288707_5080359412201583731_n_1080.jpg",
            ],
            [
                "product_id" => "7",
                "image" => "produk 8/Snapinsta.app_449141887_3779942368950994_2980229762317577069_n_1080.jpg",
            ],
            //
            [
                "product_id" => "8",
                "image" => "produk 8/Snapinsta.app_448987849_450540564610886_2396862856574379293_n_1080.jpg",
            ],
            [
                "product_id" => "8",
                "image" => "produk 8/Snapinsta.app_449050932_1005186434288707_5080359412201583731_n_1080.jpg",
            ],
            [
                "product_id" => "8",
                "image" => "produk 8/Snapinsta.app_449141887_3779942368950994_2980229762317577069_n_1080.jpg",
            ],
            //
            [
                "product_id" => "9",
                "image" => "produk 9/Snapinsta.app_449082975_3812054335718883_8917552505080386201_n_1080.jpg",
            ],
            [
                "product_id" => "9",
                "image" => "produk 9/Snapinsta.app_449112153_874896254668923_2920512914021014063_n_1080.jpg",
            ],
            [
                "product_id" => "9",
                "image" => "produk 9/Snapinsta.app_449259329_460638863331759_7544158016605075913_n_1080.jpg",
            ],
            //
            [
                "product_id" => "10",
                "image" => "produk 10/Snapinsta.app_450430458_1258055612236881_9135953538045530908_n_1080.jpg",
            ],
            [
                "product_id" => "10",
                "image" => "produk 10/Snapinsta.app_450524182_2229799200700940_3097312920594944612_n_1080.jpg",
            ],
            [
                "product_id" => "10",
                "image" => "produk 10/Snapinsta.app_450531806_3803348233259828_5401716184078300658_n_1080.jpg",
            ],
            //
            [
                "product_id" => "11",
                "image" => "produk 11/Snapinsta.app_449847617_430819669934106_1939761636058342832_n_1080.jpg",
            ],
            [
                "product_id" => "11",
                "image" => "produk 11/Snapinsta.app_450443923_1374436163946799_4644050547430252858_n_1080.jpg",
            ],
            [
                "product_id" => "11",
                "image" => "produk 11/Snapinsta.app_450457586_1623056398550381_417407161173248983_n_1080.jpg",
            ],
            //
            [
                "product_id" => "12",
                "image" => "produk12/Snapinsta.app_449667174_1211170809928022_877366606342498901_n_1080.jpg",
            ],
            [
                "product_id" => "12",
                "image" => "produk12/Snapinsta.app_449835109_504973495212389_7814672844560714966_n_1080.jpg",
            ],
            [
                "product_id" => "12",
                "image" => "produk12/Snapinsta.app_449852802_1625749558269341_6112795416251874384_n_1080.jpg",
            ],
            //
            [
                "product_id" => "13",
                "image" => "produk13/Snapinsta.app_450540922_1063744595095824_3433317237109425880_n_1080.jpg",
            ],
            [
                "product_id" => "13",
                "image" => "produk13/Snapinsta.app_450543243_819633400262442_3178708517097366717_n_1080.jpg",
            ],
            [
                "product_id" => "13",
                "image" => "produk13/Snapinsta.app_450905269_447555374820557_6181911559276463723_n_1080.jpg",
            ],
            //
            [
                "product_id" => "14",
                "image" => "produk14/Snapinsta.app_449702773_17938664798837964_973209378275100224_n_1080.jpg",
            ],
            [
                "product_id" => "14",
                "image" => "produk14/Snapinsta.app_449751234_17938664807837964_6137184352106841507_n_1080.jpg",
            ],
            [
                "product_id" => "14",
                "image" => "produk14/Snapinsta.app_449756252_17938664786837964_8731453474298601518_n_1080.jpg",
            ],
            //
            [
                "product_id" => "15",
                "image" => "produk15/Snapinsta.app_449693521_1025580579080301_2865833230584753689_n_1080.jpg",
            ],
            [
                "product_id" => "15",
                "image" => "produk15/Snapinsta.app_449694833_1182886596246204_4792388900707274676_n_1080.jpg",
            ],
            [
                "product_id" => "15",
                "image" => "produk15/Snapinsta.app_449783714_1000556074786357_8561525263452560396_n_1080.jpg",
            ],
            //
            [
                "product_id" => "16",
                "image" => "produk16/Snapinsta.app_448252614_1195505911889169_7548858787660893140_n_1080.jpg",
            ],
            [
                "product_id" => "16",
                "image" => "produk16/Snapinsta.app_448327613_472791948448308_1163501365549914326_n_1080.jpg",
            ],
            [
                "product_id" => "16",
                "image" => "produk16/Snapinsta.app_448332624_1556629994900976_6596756900969000957_n_1080.jpg",
            ],
        ];

        $publicPath = public_path("asset-thrift/produk/");
        $uploadPath = "uploads/gallery/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["image"];
            $destinationPath = $uploadPath . $data["image"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                ProductGallery::insert([
                    [
                        "product_id" => $data['product_id'],
                        "product_auction_id" => null,
                        "image" => $destinationPath,
                    ],
                    [
                        "product_id" => null,
                        "product_auction_id" => $data['product_id'],
                        "image" => $destinationPath,
                    ]
                ]);
            }
        }
    }
}