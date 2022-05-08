<?php

namespace Database\Seeders;

use App\Models\AdminPage;
use App\Models\Artwork;
use App\Models\ArtworkCategory;
use App\Models\BrandPage;
use App\Models\User;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function convert($string){
        return str_replace(' ', '-', strtolower($string));
    }

    public function run()
    {
        $adminPages = [
            [
                'name' => 'Kumnit',
                'logo_url' => 'assets/general-assets/seeder/admin-page-logo/kumnit.svg',
                'brandPages' => [
                    [
                        'name' => 'Kumnit',
                        'logo_url' => 'assets/general-assets/seeder/brand-page-logo/kumnit/kumnit.svg',
                        'artworkCategories' => [
                            [
                                'name' => 'General Social Media Post',
                                'artworks' => 5
                            ],
                            [
                                'name' => 'General Content Thumbnail',
                                'artworks' => 2
                            ],
                            [
                                'name' => 'General Video Thumbnail',
                                'artworks' => 2
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kumnit Tech',
                        'logo_url' => 'assets/general-assets/seeder/brand-page-logo/kumnit/kumnit-tech.svg',
                        'artworkCategories' => [
                            [
                                'name' => 'Social Media Post',
                                'artworks' => 3
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kumnit Finance',
                        'logo_url' => 'assets/general-assets/seeder/brand-page-logo/kumnit/kumnit-finance.svg',
                        'artworkCategories' => [
                            [
                                'name' => 'Social Media Post',
                                'artworks' => 3
                            ],
                        ]
                    ],
                ],
                'users' => [
                    [
                        'name' => 'Mon Boren',
                        'email' => 'borenmon5@gmail.com',
                        'password' => '$2y$10$JW8FdYy9FnjTYF9ulVkiSOlXrUkWpbiesV7L6jZYWKhF5QNf9wURe',
                        'role' => 'admin',
                    ],
                    [
                        'name' => 'Kimthong Hak',
                        'email' => 'kimthong168@gmail.com',
                        'password' => '$2y$10$p5YFO.Jh9.QRreVPit9hCObXPbZIxWgUcHSmO2Lf9GniOiiK3/LXK',
                        'role' => 'admin',
                    ],
                    [
                        'name' => 'Navy',
                        'email' => 'hanavyrin709@gmail.com',
                        'password' => '$2y$10$9xiYVTNf9r.Tuzt7/P2HQOg64UMqepoMLzaLgLs0EI.e0JJQ4AKR2',
                        'role' => 'user',
                    ],
                    [
                        'name' => 'thaven',
                        'email' => 'thavensan1828@gmail.com',
                        'password' => '$2y$10$CYSXsBCs7hNEKqD7KPRpr.xaUretBgyUWGe70rsG4g.5xJhRJhguW',
                        'role' => 'user',
                    ],
                    [
                        'name' => 'changpengleng@gmail.com',
                        'email' => 'changpengleng@gmail.com',
                        'password' => '$2y$10$DmPSKZtJYQ2J6CQc9H.yC.wX1m4NDP6iBKy3OiO4ZKpRzxGrtf0eC',
                        'role' => 'user',
                    ],
                ]
            ],
        ];

        foreach($adminPages as $adminPage){
            $newAdminPage = AdminPage::create([
                'name' => $adminPage['name'],
                'folder_name' => $this->convert($adminPage['name']),
                'is_active' => '1',
                'logo_url' => $adminPage['logo_url'],
            ]); 

            foreach($adminPage['brandPages'] as $brandPage){
                $newBrandPage = BrandPage::create([
                    'name' => $brandPage['name'],
                    'folder_name' => $this->convert($brandPage['name']),
                    'is_active' => '1',
                    'logo_url' => $brandPage['logo_url'],
                    'admin_page_id' => $newAdminPage->id,
                ]);

                foreach($brandPage['artworkCategories'] as $artworkCategory){
                    $newArtworkCategory = ArtworkCategory::create([
                        'name' => $artworkCategory['name'],
                        'folder_name' => $this->convert($artworkCategory['name']),
                        'brand_page_id' => $newBrandPage->id,
                    ]);

                    for($i = 1; $i <= $artworkCategory['artworks']; $i++){
                        Artwork::create([
                            'image_preview_url' => "assets/general-assets/seeder/artwork-image-preview/$newAdminPage->folder_name/$newBrandPage->folder_name/$newArtworkCategory->folder_name/$i.jpeg",
                            'number' => "$i",
                            'artwork_category_id' => $newArtworkCategory->id,
                        ]);
                    }
                }
            }

            foreach($adminPage['users'] as $user){
                $user['admin_page_id'] = $newAdminPage->id;
                User::create($user);
            }
        }
    }
}
