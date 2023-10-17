<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        SocialTableSeeder::class,
        MenuTableSeeder::class,
        SettingTableSeeder::class,
        PaginasTableSeeder::class,
        PrazoTableSeeder::class,
        BannerTableSeeder::class,
        PageBannerTableSeeder::class,
        SizesTableSeeder::class,
        ColorsTableSeeder::class,
        CategoriaTableSeeder::class,
        SubcategoriaTableSeeder::class,
        FamiliaTableSeeder::class,
        SubfamiliaTableSeeder::class,
        ProdutoTableSeeder::class,
        BannerProdutoTableSeeder::class,
        NewsletterSeeder::class,
        OrcamentoTableSeeder::class,
        ContactoTableSeed::class,
        RoleTableSeeder::class,
        UserTableSeeder::class,
        ArticlesTableSeeder::class,
        CategoriablogTableSeeder::class,
        ReviewTableSeeder::class,
     ]);
    }
}
