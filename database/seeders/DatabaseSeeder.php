<?php

namespace Database\Seeders;

use App\Models\Kud;
use App\Models\Dirt;
use App\Models\Role;
use App\Models\User;
use App\Models\Kspot;
use App\Models\Tspot;
use App\Models\Factor;
use App\Models\Method;
use App\Models\Kawalan;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Variety;
use App\Models\Wilayah;
use App\Models\Analysis;
use App\Models\Chemical;
use App\Models\Material;
use App\Models\Indicator;
use App\Models\Pospantau;
use App\Models\Consumable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [ 'name' => 'Administrator' ],
            [ 'name' => 'Kabag' ],
            [ 'name' => 'Kasie' ],
            [ 'name' => 'Kasubsie' ],
            [ 'name' => 'Quality Management' ],
            [ 'name' => 'Koordinator' ],
            [ 'name' => 'Mandor' ],
            [ 'name' => 'Operator' ],
            [ 'name' => 'Pabrik' ],
            [ 'name' => 'User' ],
        ];

        $users = [
            [
                'role_id' => 1,
                'name' => 'Andik Kurniawan',
                'username' => 'andik',
                'password' => bcrypt('andik987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 2,
                'name' => "Muhammad Anas Mu'allif",
                'username' => 'anas',
                'password' => bcrypt('anas987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 3,
                'name' => 'Tofan Andrew Irawan',
                'username' => 'tofan',
                'password' => bcrypt('tofan987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 4,
                'name' => 'Yudi Suyadi',
                'username' => 'yudi',
                'password' => bcrypt('yudi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 5,
                'name' => 'Tutus Agustyn Rafzhanyani',
                'username' => 'tutus',
                'password' => bcrypt('tutus987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 5,
                'name' => 'Riadi',
                'username' => 'riadi',
                'password' => bcrypt('riadi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 5,
                'name' => 'Awaludin Rauf Firmansyah',
                'username' => 'awaludin',
                'password' => bcrypt('awaludin987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 5,
                'name' => 'Fernina Ellen',
                'username' => 'ellen',
                'password' => bcrypt('ellen987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 5,
                'name' => 'Mardiyanto',
                'username' => 'mardiyanto',
                'password' => bcrypt('mardiyanto987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Dwi Wahyu Nugroho',
                'username' => 'dwi',
                'password' => bcrypt('dwi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Nico Aldy Dwi Putra',
                'username' => 'nico',
                'password' => bcrypt('nico987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Muslimin',
                'username' => 'muslimin',
                'password' => bcrypt('muslimin987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Achmad Zauzi Rifqi',
                'username' => 'zauzi',
                'password' => bcrypt('zauzi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Risky Anggara',
                'username' => 'risky',
                'password' => bcrypt('risky987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 6,
                'name' => 'Aris Dedi Setiawan',
                'username' => 'aris',
                'password' => bcrypt('aris987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 7,
                'name' => 'Bambang Sutejo',
                'username' => 'bambang',
                'password' => bcrypt('bambang987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 7,
                'name' => 'Muslimin 2',
                'username' => 'muslimin2',
                'password' => bcrypt('muslimin987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 7,
                'name' => 'Wahyu Santoso',
                'username' => 'wahyu',
                'password' => bcrypt('wahyu987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Dita Putri Pertiwi',
                'username' => 'dita',
                'password' => bcrypt('dita987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Darmaji',
                'username' => 'darmaji',
                'password' => bcrypt('darmaji987'),
                'hmi_access' => 1,
                'is_active' => 1,

            ],
            [
                'role_id' => 8,
                'name' => 'Amrizal Ariansyah',
                'username' => 'amrizal',
                'password' => bcrypt('amrizal987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Yoga Eka Perdana',
                'username' => 'yoga',
                'password' => bcrypt('yoga987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Yossy Prastyo Utomo',
                'username' => 'yossy',
                'password' => bcrypt('yossy987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'M. Ali Nurojikkin',
                'username' => 'm_ali',
                'password' => bcrypt('m_ali987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'A Yohanuddin',
                'username' => 'yohan',
                'password' => bcrypt('yohan987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Ali Mahmudi',
                'username' => 'ali',
                'password' => bcrypt('ali987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Ahmad Dhuha Fauzi',
                'username' => 'dhuha',
                'password' => bcrypt('dhuha987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Imam Sugianto',
                'username' => 'imam',
                'password' => bcrypt('imam987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Irfano Radiant',
                'username' => 'irfano',
                'password' => bcrypt('irfano987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Fernando Martinus',
                'username' => 'fernando',
                'password' => bcrypt('fernando987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Yovi Dwi Kurniawan',
                'username' => 'yovi',
                'password' => bcrypt('yovi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Zainul Arifin',
                'username' => 'zainul',
                'password' => bcrypt('zainul987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'M Nur Hafith',
                'username' => 'hafith',
                'password' => bcrypt('hafith987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Liga Andrean',
                'username' => 'liga',
                'password' => bcrypt('liga987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Suwandi',
                'username' => 'suwandi',
                'password' => bcrypt('suwandi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Fiki Juni',
                'username' => 'fiki',
                'password' => bcrypt('fiki987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Sofi Febri Setiawan',
                'username' => 'sofi',
                'password' => bcrypt('sofi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Danang Candra S',
                'username' => 'danang',
                'password' => bcrypt('danang987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Alfin Musyafa',
                'username' => 'alfin',
                'password' => bcrypt('alfin987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Ivantio Yogatama',
                'username' => 'ivantio',
                'password' => bcrypt('ivantio987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Ari Shan Pradipta',
                'username' => 'ari_shan',
                'password' => bcrypt('ari_shan987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Khrisna Yusuf I',
                'username' => 'khrisna',
                'password' => bcrypt('khrisna987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Fery Ardianto',
                'username' => 'fery',
                'password' => bcrypt('fery987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Agus Setiawan',
                'username' => 'agus',
                'password' => bcrypt('agus987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Asit Maulana',
                'username' => 'asit',
                'password' => bcrypt('asit987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Bagus Pamungkas',
                'username' => 'bagus',
                'password' => bcrypt('bagus987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Ahmad Mahmudi',
                'username' => 'mahmudi',
                'password' => bcrypt('mahmudi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Junjung Ardian Herlambang',
                'username' => 'junjung',
                'password' => bcrypt('junjung987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Dani Oktavianto',
                'username' => 'dani',
                'password' => bcrypt('dani987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'M Robi',
                'username' => 'm_robi',
                'password' => bcrypt('m_robi987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Satrio Bagus Piningit',
                'username' => 'satrio',
                'password' => bcrypt('satrio987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'M Vandra',
                'username' => 'vandra',
                'password' => bcrypt('vandra987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Yudha Ade Pratama',
                'username' => 'yudha',
                'password' => bcrypt('yudha987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Johan Atim Saputra',
                'username' => 'johan',
                'password' => bcrypt('johan987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'One Fentino Reza',
                'username' => 'one',
                'password' => bcrypt('one987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'M Ismail',
                'username' => 'ismail',
                'password' => bcrypt('ismail987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 8,
                'name' => 'Fachrul Syarifulloh',
                'username' => 'fachrul',
                'password' => bcrypt('fachrul987'),
                'hmi_access' => NULL,
                'is_active' => 1,

            ],
            [
                'role_id' => 8,
                'name' => 'Feri Andriyas',
                'username' => 'feri',
                'password' => bcrypt('feri987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 9,
                'name' => 'Hariono',
                'username' => 'hariono',
                'password' => bcrypt('hariono987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
            [
                'role_id' => 10,
                'name' => 'Rahman',
                'username' => 'rahman',
                'password' => bcrypt('rahman987'),
                'hmi_access' => NULL,
                'is_active' => 1,
            ],
        ];

        $stations = [
            ['name' => 'Raw Sugar'],
            ['name' => 'Gilingan'],
            ['name' => 'Pemurnian'],
            ['name' => 'Penguapan'],
            ['name' => 'DRK'],
            ['name' => 'Masakan'],
            ['name' => 'Stroop'],
            ['name' => 'Gula'],
            ['name' => 'Tangki Tetes'],
            ['name' => 'Ketel'],
            ['name' => 'Packer'],
        ];

        $indicators = [
            ['name' => '%Brix'],
            ['name' => '%Pol'],
            ['name' => 'Pol'],
            ['name' => 'HK'],
            ['name' => '%R'],
            ['name' => 'IU'],
            ['name' => '%Air'],
            ['name' => '%Zk'],
            ['name' => 'CaO'],
            ['name' => 'pH'],
            ['name' => 'Turbidity'],
            ['name' => 'TDS'],
            ['name' => 'Sadah'],
            ['name' => 'P2O5'],
            ['name' => 'SO2'],
            ['name' => 'BJB'],
            ['name' => 'TSAI'],
            ['name' => 'Succrose'],
            ['name' => 'Glucose'],
            ['name' => 'Fructose'],
            ['name' => 'Suhu'],
            ['name' => 'PI'],
            ['name' => '%Sabut'],
            ['name' => '%Kapur'],
            ['name' => 'Pol_Ampas'],
        ];

        $materials = [
            ['name' => 'RS Kedatangan', 'station_id' => 1 ],
            ['name' => 'RS Silo', 'station_id' => 1 ],
            ['name' => 'Nira Gilingan 1', 'station_id' => 2 ],
            ['name' => 'Nira Gilingan 2', 'station_id' => 2 ],
            ['name' => 'Nira Gilingan 3', 'station_id' => 2 ],
            ['name' => 'Nira Gilingan 4', 'station_id' => 2 ],
            ['name' => 'Nira Gilingan 5', 'station_id' => 2 ],
            ['name' => 'Ampas Gilingan 1', 'station_id' => 2 ],
            ['name' => 'Ampas Gilingan 2', 'station_id' => 2 ],
            ['name' => 'Ampas Gilingan 3', 'station_id' => 2 ],
            ['name' => 'Ampas Gilingan 4', 'station_id' => 2 ],
            ['name' => 'Ampas Gilingan 5', 'station_id' => 2 ],
            ['name' => 'Tebu Cacah', 'station_id' => 2 ],
            ['name' => 'Nira Mentah', 'station_id' => 3 ],
            ['name' => 'NM Sulfitasi', 'station_id' => 3 ],
            ['name' => 'Nira Tapis', 'station_id' => 3 ],
            ['name' => 'Nira Encer', 'station_id' => 3 ],
            ['name' => 'Blotong RVF 1', 'station_id' => 3 ],
            ['name' => 'Blotong RVF 2', 'station_id' => 3 ],
            ['name' => 'Blotong RVF 3', 'station_id' => 3 ],
            ['name' => 'Blotong RVF 4', 'station_id' => 3 ],
            ['name' => 'Blotong RVF Timur', 'station_id' => 3 ],
            ['name' => 'Blotong RVF Barat', 'station_id' => 3 ],
            ['name' => 'Blotong RVF Truk', 'station_id' => 3 ],
            ['name' => 'Kapur PT Sedar', 'station_id' => 3 ],
            ['name' => 'Nira Kotor', 'station_id' => 3 ],
            ['name' => 'Nira Kental', 'station_id' => 4 ],
            ['name' => 'NK Sulfitasi', 'station_id' => 4 ],
            ['name' => 'Pre-Evaporator 1', 'station_id' => 4 ],
            ['name' => 'Pre-Evaporator 2', 'station_id' => 4 ],
            ['name' => 'Evaporator 1', 'station_id' => 4 ],
            ['name' => 'Evaporator 2', 'station_id' => 4 ],
            ['name' => 'Evaporator 3', 'station_id' => 4 ],
            ['name' => 'Evaporator 4', 'station_id' => 4 ],
            ['name' => 'Evaporator 5', 'station_id' => 4 ],
            ['name' => 'Remelter In', 'station_id' => 5 ],
            ['name' => 'Reaction Tank', 'station_id' => 5 ],
            ['name' => 'Carbonated', 'station_id' => 5 ],
            ['name' => 'Clear Liquor', 'station_id' => 5 ],
            ['name' => 'Cake Head', 'station_id' => 5 ],
            ['name' => 'Cake Mid', 'station_id' => 5 ],
            ['name' => 'Cake End', 'station_id' => 5 ],
            ['name' => 'Masakan A', 'station_id' => 6 ],
            ['name' => 'Masakan A Raw', 'station_id' => 6 ],
            ['name' => 'Masakan C', 'station_id' => 6 ],
            ['name' => 'Masakan D', 'station_id' => 6 ],
            ['name' => 'Masakan R1', 'station_id' => 6 ],
            ['name' => 'Masakan R2', 'station_id' => 6 ],
            ['name' => 'Masakan R3', 'station_id' => 6 ],
            ['name' => 'CVP C', 'station_id' => 6 ],
            ['name' => 'CVP D', 'station_id' => 6 ],
            ['name' => 'Einwuurf C', 'station_id' => 6 ],
            ['name' => 'Einwuurf D', 'station_id' => 6 ],
            ['name' => 'Sogokan C', 'station_id' => 6 ],
            ['name' => 'Sogokan D', 'station_id' => 6 ],
            ['name' => 'Klare SHS', 'station_id' => 7 ],
            ['name' => 'Klare D', 'station_id' => 7 ],
            ['name' => 'Stroop A', 'station_id' => 7 ],
            ['name' => 'Stroop C', 'station_id' => 7 ],
            ['name' => 'R1 Mol', 'station_id' => 7 ],
            ['name' => 'R2 Mol', 'station_id' => 7 ],
            ['name' => 'Remelter A', 'station_id' => 7 ],
            ['name' => 'Remelter CD', 'station_id' => 7 ],
            ['name' => 'Tetes Puteran', 'station_id' => 7 ],
            ['name' => 'Tetes Produk', 'station_id' => 7 ],
            ['name' => 'Magma RS', 'station_id' => 7 ],
            ['name' => 'Gula SHS', 'station_id' => 8 ],
            ['name' => 'Gula A', 'station_id' => 8 ],
            ['name' => 'Gula R1', 'station_id' => 8 ],
            ['name' => 'Gula R2', 'station_id' => 8 ],
            ['name' => 'Gula R3', 'station_id' => 8 ],
            ['name' => 'Gula A Raw', 'station_id' => 8 ],
            ['name' => 'Gula C', 'station_id' => 8 ],
            ['name' => 'Gula D1', 'station_id' => 8 ],
            ['name' => 'Gula D2', 'station_id' => 8 ],
            ['name' => 'Kristal RS', 'station_id' => 8 ],
            ['name' => 'Tetes Tangki 1', 'station_id' => 9 ],
            ['name' => 'Tetes Tangki 2', 'station_id' => 9 ],
            ['name' => 'Tetes Tangki 3', 'station_id' => 9 ],
            ['name' => 'Tetes Tandon', 'station_id' => 9 ],
            ['name' => 'Tetes Kumpulan', 'station_id' => 9 ],
            ['name' => 'Jiangxin Jianglin', 'station_id' => 10 ],
            ['name' => 'Yoshimine 1', 'station_id' => 10 ],
            ['name' => 'Yoshimine 2', 'station_id' => 10 ],
            ['name' => 'WTP', 'station_id' => 10 ],
            ['name' => 'Daert JJ', 'station_id' => 10 ],
            ['name' => 'Daert Yoshimine1', 'station_id' => 10 ],
            ['name' => 'Daert Yoshimine2', 'station_id' => 10 ],
            ['name' => 'HW', 'station_id' => 10 ],
            ['name' => 'Gula Produksi 50Kg', 'station_id' => 11 ],
            ['name' => 'Gula Produksi Retail', 'station_id' => 11 ],
        ];

        $methods = [
            ['material_id' => 3, 'indicator_id' => 1],
            ['material_id' => 3, 'indicator_id' => 2],
            ['material_id' => 3, 'indicator_id' => 3],
            ['material_id' => 3, 'indicator_id' => 4],
            ['material_id' => 3, 'indicator_id' => 5],
            ['material_id' => 13, 'indicator_id' => 22],
            ['material_id' => 13, 'indicator_id' => 23],
            ['material_id' => 25, 'indicator_id' => 24],
            ['material_id' => 26, 'indicator_id' => 1],
            ['material_id' => 26, 'indicator_id' => 10],
            ['material_id' => 26, 'indicator_id' => 21],
        ];

        for($i = 1; $i<= 2; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 15]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 16]);
        }

        for($i = 4; $i<= 7; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
        }

        for($i = 8; $i<= 12; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 25]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 8]);
        }

        for($i = 14; $i<= 17; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 9]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 11]);
        }

        for($i = 18; $i<= 24; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 8]);
        }

        for($i = 27; $i<= 28; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 9]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 11]);
        }

        for($i = 29; $i<= 35; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
        }

        for($i = 36; $i<= 39; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 9]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 11]);
        }

        for($i = 40; $i<= 42; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
        }

        for($i = 43; $i<= 49; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
        }

        for($i = 50; $i<= 55; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
        }

        for($i = 56; $i<= 66; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 3]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
        }

        for($i = 67; $i<= 76; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 2]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 4]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 15]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 16]);
        }

        for($i = 77; $i<= 81; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 1]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 17]);
        }

        for($i = 82; $i<= 84; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 12]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 13]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 14]);
        }

        for($i = 85; $i<= 85; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 12]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 13]);
        }

        for($i = 86; $i<= 89; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 10]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 12]);
        }

        for($i = 90; $i<= 91; $i++)
        {
            array_push($methods, ['material_id' => $i, 'indicator_id' => 6]);
            array_push($methods, ['material_id' => $i, 'indicator_id' => 7]);
        }

        $factors = [
            [
                'name' => 'Mollases',
                'value' => 0.5,
                'description' => 'Faktor Mollase untuk menghitung Rendemen NPP.',
            ],
            [
                'name' => 'Rendemen',
                'value' => 0.7,
                'description' => 'Faktor Rendemen untuk menghitung Rendemen NPP.',
            ],
            [
                'name' => 'Raw Juice',
                'value' => 0.85,
                'description' => 'Faktor untuk mengkoreksi jumlah Nira Mentah.',
            ],
            [
                'name' => 'Imbibition',
                'value' => 1,
                'description' => 'Faktor untuk mengkoreksi jumlah Imbibisi.',
            ],
            [
                'name' => 'Saccharomat',
                'value' => 0.03,
                'description' => 'Faktor untuk mengkoreksi % Pol Saccharomat. % Pol Saccharomat ditambahkan dengan faktor * % Brix.',
            ],
            [
                'name' => 'Pol Ampas',
                'value' => 0.0,
                'description' => 'Faktor untuk mengkoreksi Pol Ampas. Pol Ampas sebelum koreksi, ditambahkan dengan faktor ini.',
            ],
        ];

        $chemicals = [
            ['name' => 'Kapur'],
            ['name' => 'Belerang'],
            ['name' => 'Flocculant'],
            ['name' => 'NaOH'],
            ['name' => 'B894'],
            ['name' => 'B895'],
            ['name' => 'B210'],
            ['name' => 'Blotong'],
        ];

        $consumables = [
            ['name' => 'Form_A'],
            ['name' => 'Form_B'],
        ];

        $kspots = [
            ['name'=>'Tekanan_Pre_Evaporator_1'],
            ['name'=>'Tekanan_Pre_Evaporator_2'],
            ['name'=>'Tekanan_Evaporator_1'],
            ['name'=>'Tekanan_Evaporator_2'],
            ['name'=>'Tekanan_Evaporator_3'],
            ['name'=>'Tekanan_Evaporator_4'],
            ['name'=>'Tekanan_Evaporator_5'],
            ['name'=>'Tekanan_Evaporator_6'],
            ['name'=>'Tekanan_Evaporator_7'],
            ['name'=>'Tekanan_Pan_1'],
            ['name'=>'Tekanan_Pan_2'],
            ['name'=>'Tekanan_Pan_3'],
            ['name'=>'Tekanan_Pan_4'],
            ['name'=>'Tekanan_Pan_5'],
            ['name'=>'Tekanan_Pan_6'],
            ['name'=>'Tekanan_Pan_7'],
            ['name'=>'Tekanan_Pan_8'],
            ['name'=>'Tekanan_Pan_9'],
            ['name'=>'Tekanan_Pan_10'],
            ['name'=>'Tekanan_Pan_11'],
            ['name'=>'Tekanan_Pan_12'],
            ['name'=>'Tekanan_Pan_13'],
            ['name'=>'Tekanan_Pan_14'],
            ['name'=>'Tekanan_Pan_15'],
            ['name'=>'Tekanan_Pan_16'],
            ['name'=>'Tekanan_Pan_17'],
            ['name'=>'Tekanan_Pan_18'],
            ['name'=>'Suhu_Pre_Evaporator_1'],
            ['name'=>'Suhu_Pre_Evaporator_2'],
            ['name'=>'Suhu_Evaporator_1'],
            ['name'=>'Suhu_Evaporator_2'],
            ['name'=>'Suhu_Evaporator_3'],
            ['name'=>'Suhu_Evaporator_4'],
            ['name'=>'Suhu_Evaporator_5'],
            ['name'=>'Suhu_Evaporator_6'],
            ['name'=>'Suhu_Evaporator_7'],
            ['name'=>'Suhu_Heater_1'],
            ['name'=>'Suhu_Heater_2'],
            ['name'=>'Suhu_Heater_3'],
            ['name'=>'Suhu_Air_Injeksi'],
            ['name'=>'Suhu_Air_Terjun'],
            ['name'=>'Tekanan_Pompa_Hampa'],
            ['name'=>'Tekanan_Uap_Baru'],
            ['name'=>'Tekanan_Uap_Bekas'],
            ['name'=>'Tekanan_Uap_3Ato'],
        ];

        $tspots = [
            ['name'=>'Peti_Nira_Mentah'],
            ['name'=>'Pemanas_Nira_Mentah'],
            ['name'=>'Reaction_Tank_Pemurnian'],
            ['name'=>'Defekator'],
            ['name'=>'Clarifier_ST'],
            ['name'=>'Pemanas_Nira_Encer'],
            ['name'=>'Evaporator_1'],
            ['name'=>'Evaporator_2'],
            ['name'=>'Evaporator_3'],
            ['name'=>'Evaporator_4'],
            ['name'=>'Evaporator_5'],
            ['name'=>'Evaporator_6'],
            ['name'=>'Evaporator_7'],
            ['name'=>'Evaporator_8'],
            ['name'=>'Evaporator_9'],
            ['name'=>'NK_Sebelum_Sulfitasi'],
            ['name'=>'NK_Setelah_Sulfitasi_Atas'],
            ['name'=>'NK_Setelah_Sulfitasi_Bawah'],
            ['name'=>'Klare_SHS_Atas'],
            ['name'=>'Klare_SHS_Bawah'],
            ['name'=>'Pan_1'],
            ['name'=>'Pan_2'],
            ['name'=>'Pan_3'],
            ['name'=>'Pan_4'],
            ['name'=>'Pan_5'],
            ['name'=>'Pan_6'],
            ['name'=>'Pan_7'],
            ['name'=>'Pan_8'],
            ['name'=>'Pan_9'],
            ['name'=>'Pan_10'],
            ['name'=>'Pan_11'],
            ['name'=>'Pan_12'],
            ['name'=>'Pan_13'],
            ['name'=>'Pan_14'],
            ['name'=>'Pan_15'],
            ['name'=>'Pan_16'],
            ['name'=>'Pan_17'],
            ['name'=>'Pan_18'],
            ['name'=>'Palung_1'],
            ['name'=>'Palung_2'],
            ['name'=>'Palung_3'],
            ['name'=>'Palung_4'],
            ['name'=>'Palung_5'],
            ['name'=>'Palung_6'],
            ['name'=>'Palung_7'],
            ['name'=>'Palung_8'],
            ['name'=>'Palung_9'],
            ['name'=>'Palung_10'],
            ['name'=>'CVP_C'],
            ['name'=>'Palung_CVP_C'],
            ['name'=>'CVP_D'],
            ['name'=>'Palung_CVP_D'],
            ['name'=>'Distributor_A_Utara'],
            ['name'=>'Distributor_A_Selatan'],
            ['name'=>'Distributor_C_Timur'],
            ['name'=>'Distributor_C_Barat'],
            ['name'=>'Distributor_D1'],
            ['name'=>'Distributor_D2'],
            ['name'=>'Vertical_Crystallizer_Timur'],
            ['name'=>'Vertical_Crystallizer_Barat'],
            ['name'=>'Stroop_A_Atas'],
            ['name'=>'Stroop_A_Bawah'],
            ['name'=>'Klare_D_Atas'],
            ['name'=>'Klare_D_Bawah'],
            ['name'=>'Einwuurf_C'],
            ['name'=>'Einwuurf_D'],
            ['name'=>'Clear_Liquor_1'],
            ['name'=>'Clear_Liquor_2'],
            ['name'=>'Remelt_A/NKL'],
            ['name'=>'R1_Mol_Bawah'],
            ['name'=>'R1_Mol_Atas'],
            ['name'=>'R2_Mol_Bawah'],
            ['name'=>'R2_Mol_Atas'],
            ['name'=>'Remelter_A1'],
            ['name'=>'Remelter_A2'],
            ['name'=>'Remelter_C/D'],
            ['name'=>'Mingler_Atas'],
            ['name'=>'Mingler_Bawah'],
            ['name'=>'Silo_Retail'],
            ['name'=>'Silo_2400'],
            ['name'=>'PP'],
            ['name'=>'Reaction_Tank_DRK'],
            ['name'=>'Talo_Phospatasi'],
            ['name'=>'Deep_Bad_Filter'],
            ['name'=>'CO2_Gas_Carbonator_1'],
            ['name'=>'CO2_Gas_Carbonator_2'],
            ['name'=>'First_Filtrat_Tank'],
            ['name'=>'Clear_Liquor_Tank_1'],
            ['name'=>'Clear_Liquor_Tank_2'],
            ['name'=>'Raw_Liquor_Tank_1'],
            ['name'=>'Raw_Liquor_Tank_2'],
            ['name'=>'Clarifier_Melt_Tank_1'],
            ['name'=>'Clarifier_Melt_Tank_2'],
            ['name'=>'Filtered_Melt_Tank_1'],
            ['name'=>'Filtered_Melt_Tank_2'],
            ['name'=>'Back_Wash_Tank_1'],
            ['name'=>'Back_Wash_Tank_2'],
        ];

        $dirts = [
            ['name' => ucfirst('daduk'), 'value' => 4.5],
            ['name' => ucfirst('akar'), 'value' => 5.6],
            ['name' => ucfirst('tali_pucuk'), 'value' => 8.8],
            ['name' => ucfirst('pucuk'), 'value' => 18.6],
            ['name' => ucfirst('sogolan'), 'value' => 19.8],
            ['name' => ucfirst('tebu_muda'), 'value' => 27.5],
            ['name' => ucfirst('lelesan'), 'value' => 27.5],
            ['name' => ucfirst('terbakar'), 'value' => 27.5],
        ];

        $kuds = [
            [ 'code' => '1', 'name' => 'Gondanglegi' ],
            [ 'code' => '2', 'name' => 'Pagelaran' ],
            [ 'code' => '3', 'name' => 'Dampit' ],
            [ 'code' => '4', 'name' => 'Bantur' ],
            [ 'code' => '5', 'name' => 'Donomulyo' ],
            [ 'code' => 'A', 'name' => 'Lawang' ],
            [ 'code' => 'B', 'name' => 'Dengkol' ],
            [ 'code' => 'C', 'name' => 'Karangploso' ],
            [ 'code' => 'D', 'name' => 'Jabung' ],
            [ 'code' => 'E', 'name' => 'Pakis' ],
            [ 'code' => 'F', 'name' => 'Tumpang Agung' ],
            [ 'code' => 'G', 'name' => 'Poncokusumo' ],
            [ 'code' => 'H', 'name' => 'Wagir' ],
            [ 'code' => 'I', 'name' => 'Tajinan' ],
            [ 'code' => 'J', 'name' => 'Bululawang' ],
            [ 'code' => 'K', 'name' => 'Pakisaji' ],
            [ 'code' => 'L', 'name' => 'Kromengan' ],
            [ 'code' => 'M', 'name' => 'Wonosari' ],
            [ 'code' => 'N', 'name' => 'Sumberpucung' ],
            [ 'code' => 'O', 'name' => 'Ngajum' ],
            [ 'code' => 'P', 'name' => 'Pagak' ],
            [ 'code' => 'Q', 'name' => 'Kalipare' ],
            [ 'code' => 'R', 'name' => 'Sri Sedono' ],
            [ 'code' => 'S', 'name' => 'Rekanan Utara' ],
            [ 'code' => 'T', 'name' => 'Kesamben' ],
            [ 'code' => 'U', 'name' => 'Kedungkandang' ],
            [ 'code' => 'V', 'name' => 'Kepanjen' ],
            [ 'code' => 'W', 'name' => 'Sari Madu' ],
            [ 'code' => 'X', 'name' => 'Rekanan Selatan Timur' ],
            [ 'code' => 'Y', 'name' => 'Rekanan Selatan Barat' ],
            [ 'code' => 'Z', 'name' => 'Tumpang Padita' ],
        ];

        $pospantaus = [
            [ 'code' => 'O', 'name' => 'Banyuglugur' ],
            [ 'code' => 'P', 'name' => 'Tongas' ],
            [ 'code' => 'Q', 'name' => 'Turen' ],
            [ 'code' => 'R', 'name' => 'Purwosari' ],
            [ 'code' => 'S', 'name' => 'Ngoro' ],
            [ 'code' => 'T', 'name' => 'Brongkos' ],
            [ 'code' => 'U', 'name' => 'Talun' ],
            [ 'code' => 'V', 'name' => 'Gumitir' ],
            [ 'code' => 'W', 'name' => 'Gedok' ],
            [ 'code' => 'X', 'name' => 'Peteng' ],
            [ 'code' => 'Y', 'name' => 'Pagak' ],
            [ 'code' => 'Z', 'name' => 'Pronojiwo' ],
            [ 'code' => '1', 'name' => 'Kromengan' ],
            [ 'code' => '2', 'name' => 'Jatikerto' ],
            [ 'code' => '4', 'name' => 'Pagelaran' ],
            [ 'code' => '5', 'name' => 'Singosari' ],
            [ 'code' => '6', 'name' => 'Ngajum' ],
            [ 'code' => '7', 'name' => 'Gondanglegi' ],
            [ 'code' => '8', 'name' => 'Donomulyo' ],
            [ 'code' => '9', 'name' => 'Pakis' ],
        ];

        $wilayahs = [
            [ 'code' => 'A', 'name' => 'Banyuwangi' ],
            [ 'code' => 'B', 'name' => 'Jember' ],
            [ 'code' => 'C', 'name' => 'Situbondo' ],
            [ 'code' => 'D', 'name' => 'Bondowoso' ],
            [ 'code' => 'E', 'name' => 'Probolinggo' ],
            [ 'code' => 'F', 'name' => 'Lumajang' ],
            [ 'code' => 'G', 'name' => 'Pasuruan' ],
            [ 'code' => 'H', 'name' => 'Mojokerto' ],
            [ 'code' => 'I', 'name' => 'Jombang' ],
            [ 'code' => 'J', 'name' => 'Blitar' ],
            [ 'code' => 'K', 'name' => 'Kredit DW TR' ],
            [ 'code' => 'L', 'name' => 'Kediri' ],
            [ 'code' => 'M', 'name' => 'Tulungagung' ],
            [ 'code' => 'N', 'name' => 'Non Kredit DW' ],
            [ 'code' => 'P', 'name' => 'Kebun Benih Datar' ],
            [ 'code' => 'Q', 'name' => 'Kebun Benih Induk' ],
            [ 'code' => 'R', 'name' => 'Kebun Benih Nenek' ],
            [ 'code' => 'S', 'name' => 'Kebun Benih Pokok' ],
            [ 'code' => 'T', 'name' => 'Kebun Persilangan P3GI' ],
            [ 'code' => 'U', 'name' => 'Kebun Percobaan' ],
            [ 'code' => 'V', 'name' => 'Kebun Pengenalan Jenis' ],
            [ 'code' => 'X', 'name' => 'Tebu Giling TS' ],
            [ 'code' => 'Z', 'name' => 'SPT' ],
        ];

        $varieties = [
            ['name' => 'PSKA942'],
            ['name' => 'PS862'],
            ['name' => 'PS881'],
            ['name' => 'PSJK922'],
            ['name' => 'CENING'],
            ['name' => 'PSJT941'],
            ['name' => 'CO617'],
            ['name' => 'PS864'],
            ['name' => 'PS921'],
            ['name' => 'BL'],
            ['name' => 'LAIN2'],
        ];

        $kawalans = [
            ['name' => 'Non VMA'],
            ['name' => 'VMA'],
            ['name' => 'ZPK'],
        ];

        for($i=0; $i<1000; $i++){
            $analyses[$i]["user_id"] = 1;
            $analyses[$i]["material_id"] = rand(1, 50);
            $analyses[$i]["is_verified"] = 1;
            $analyses[$i]["%Brix"] = rand(1, 100);
            $analyses[$i]["%Pol"] = rand(1, 100);
            $analyses[$i]["Pol"] = rand(1, 100);
            $analyses[$i]["HK"] = rand(1, 100);
            $analyses[$i]["%R"] = rand(1, 100);
            $analyses[$i]["IU"] = rand(1, 100);
            $analyses[$i]["%Air"] = rand(1, 100);
            $analyses[$i]["%Zk"] = rand(1, 100);
            $analyses[$i]["CaO"] = rand(1, 100);
            $analyses[$i]["pH"] = rand(1, 100);
            $analyses[$i]["Turbidity"] = rand(1, 100);
            $analyses[$i]["TDS"] = rand(1, 100);
            $analyses[$i]["Sadah"] = rand(1, 100);
            $analyses[$i]["P2O5"] = rand(1, 100);
            $analyses[$i]["SO2"] = rand(1, 100);
            $analyses[$i]["BJB"] = rand(1, 100);
            $analyses[$i]["TSAI"] = rand(1, 100);
            $analyses[$i]["Succrose"] = rand(1, 100);
            $analyses[$i]["Glucose"] = rand(1, 100);
            $analyses[$i]["Fructose"] = rand(1, 100);
            $analyses[$i]["Suhu"] = rand(1, 100);
            $analyses[$i]["PI"] = rand(1, 100);
            $analyses[$i]["%Sabut"] = rand(1, 100);
            $analyses[$i]["%Kapur"] = rand(1, 100);
            $analyses[$i]["Pol_Ampas"] = rand(1, 100);
        }

        // for($i=0; $i<1000; $i++){
        //     $spta = 9270000 + $i;
        //     $posbrixes[$i]["user_id"] = 1;
        //     $posbrixes[$i]["variety_id"] = 10;
        //     $posbrixes[$i]["kawalan_id"] = 1;
        //     $posbrixes[$i]["category"] = "EK";
        //     $posbrixes[$i]["spta"] = "0{$spta}";
        //     $posbrixes[$i]["brix"] = rand(15,17);
        //     $posbrixes[$i]["is_accepted"] = rand(0,3);
        // }

        Role::insert($roles);
        User::insert($users);
        Station::insert($stations);
        Indicator::insert($indicators);
        Material::insert($materials);
        Method::insert($methods);
        Factor::insert($factors);
        Chemical::insert($chemicals);
        Consumable::insert($consumables);
        Kspot::insert($kspots);
        Tspot::insert($tspots);
        Dirt::insert($dirts);
        Kud::insert($kuds);
        Pospantau::insert($pospantaus);
        Wilayah::insert($wilayahs);
        Variety::insert($varieties);
        Kawalan::insert($kawalans);
        Analysis::insert($analyses);
        // Posbrix::insert($posbrixes);

    }
}
