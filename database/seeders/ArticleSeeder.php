<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil admin pertama
        $admin = User::where('role', 'admin')->first();

        // Jika admin belum ada, hentikan seeder
        if (!$admin) {
            return;
        }

        $articles = [
            // ===== ARTIKEL ILMIAH =====
            [
                'judul' => 'Pengaruh Teknologi Informasi terhadap Pendidikan',
                'jenis' => 'ilmiah',
                'konten' => 'Artikel ini membahas peran teknologi informasi dalam meningkatkan kualitas pendidikan melalui media digital dan e-learning.',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Implementasi Sistem Informasi Akademik Berbasis Web',
                'jenis' => 'ilmiah',
                'konten' => 'Penelitian ini mengkaji implementasi sistem informasi akademik berbasis web untuk meningkatkan efisiensi pengelolaan data mahasiswa.',
                'user_id' => $admin->id,
            ],

            // ===== ARTIKEL POPULER =====
            [
                'judul' => 'Tips Menulis Artikel yang Menarik',
                'jenis' => 'populer',
                'konten' => 'Menulis artikel yang menarik membutuhkan ide yang kuat, bahasa sederhana, dan alur yang mudah dipahami pembaca.',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Manfaat Membaca Artikel Setiap Hari',
                'jenis' => 'populer',
                'konten' => 'Membaca artikel secara rutin dapat menambah wawasan, meningkatkan kemampuan berpikir kritis, dan memperluas sudut pandang.',
                'user_id' => $admin->id,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
