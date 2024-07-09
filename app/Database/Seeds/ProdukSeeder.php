<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $dataset = [
            [
                'kode_produk' => 'RBY',
                'nama_produk' => 'Ruby',
                'deskripsi'   => 'RUBY merupakan parfum dengan kesan manis dan lembut, yang berasal dari kandungan Buah Ceri, Vanilla, Sandalwood, Chamomile, Gula dan juga Susu yang menjadi favorit pria & wanita. Aroma manis dan hangat yang dikeluarkan oleh RUBY ini cocok digunakan saat berkumpul dengan keluarga atau hangout bersama teman-teman.',
            ],
            [
                'kode_produk' => 'DIA',
                'nama_produk' => 'Diamond',
                'deskripsi'   => 'DIAMOND merupakan parfum yang beraroma kuat dan dapat menggambarkan keberanian serta kemewahan dari pesona eleganmu. DIAMOND diracik dengan kandungan seperti Jasmine, Daffron, Amberwood hingga Ambergris, yang akan menghasilkan aroma menawan sepanjang hari.',
            ],
            [
                'kode_produk' => 'AMTHYS',
                'nama_produk' => 'Aemthys',
                'deskripsi'   => 'AMETHYS merupakan parfum dengan aroma yang elegan karena karakternya yang Oriental Spicy ini akan menghasilkan wangi yang segar, bersemangat, namun tetap Calm. Aroma itu berasal dari kandungan Black Currant, Mandarin Orange, Jasmine serta Rose. AMETHYS juga akan setia menemani anda untuk acara formal baik di luar maupun di dalam ruangan.',
            ],
            [
                'kode_produk' => 'SPHR',
                'nama_produk' => 'Sapphire',
                'deskripsi'   => 'SHAPPIRE merupakan parfum yang memiliki aroma bunga dan buah yang kaya, seperti Wild Berries, Juicy Mandarin, Honeysuckle, Gardenia, dan Melati. Aroma bunga tersebut kemudian dikombinasikan dengan aroma dasar parfum yang lebih hangat dan earthy. SHAPPIRE akan membuatmu lebih Fresh dan bersemangat dalam melakukan kegiatan sehari-hari.',
            ],
            [
                'kode_produk' => 'ZRC',
                'nama_produk' => 'Zircon',
                'deskripsi'   => 'ZIRCON merupakan parfum beraroma segar yang berasal dari bau Manis Semangka dan Kiwi dengan Fruitiness Tart dari Rhubarb, Zesty pohon Lemon dan aroma Bunga Cyclamen, yang dikombinasikan untuk menciptakan aroma siang hari yang menggoda. ZIRCON juga cocok digunakan saat sore hingga malam hari.',
            ],
            [
                'kode_produk' => 'ZMRD',
                'nama_produk' => 'Zamrud',
                'deskripsi'   => 'ZAMRUD merupakan parfum beraroma segar segar, energik, serta liar dengan komposisinya yang alami seperti Grapefruit, Mojito, Cardamom Cedar, Geranium, hingga Black Pepper. Ciri khas Sporty pada ZAMRUD cocok untuk orang yang berjiwa bebas, senang beraktivitas diluar ruangan dan suka akan tantangan.',
            ],
            [
                'kode_produk' => 'ROM',
                'nama_produk' => 'Romeo',
                'deskripsi'   => 'Parfum dengan aroma khas Musk dan Ambergris ini menciptakan aroma Woody yang menangkan. Mengandung Orange Mandarin, Pineapple dan Apricot yang menyegarkan, serta dipadukan dengan Freesia, Ginger, dan Peach yang menciptakan aroma mewah.',
            ],
            [
                'kode_produk' => 'JUL',
                'nama_produk' => 'Juliet',
                'deskripsi'   => 'Parfum beraroma manis khas Vanilla dan Praline ini merupakan bahan dasar dari coklat. Mengandung Nectarine dan Cashmere Wood yang khas manis dari alam, dipadukan dengan Violet, Orchid dan Rose yang melambangkan manis dan mewahnya bunga-bunga..',
            ],
        ];

        for ($i = 0; $i < count($dataset); $i++) {
            $data = [
                'kode_produk' => $dataset[$i]['kode_produk'],
                'nama_produk' => $dataset[$i]['nama_produk'],
                'deskripsi'   => $dataset[$i]['deskripsi'],
                'harga_umum'  => $faker->randomNumber(6),
                'jumlah'      => $faker->randomNumber(5),
            ];

            // Using Query Builder
            $this->db->table('produk')->insert($data);
        }
    }
}
