<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageType;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oldPages = DB::connection('migration')->table('site_content')->get();

        $standard = PageType::firstWhere('slug','standard');

        foreach ($oldPages as $oldPage) {
            $page = $standard->pages()->create([
                'title' => $oldPage->page,
                'slug' => Str::slug($oldPage->page),
                'preview' => html_entity_decode($oldPage->preview_content),
                'content' => html_entity_decode($oldPage->page_content),
            ]);

            $page->created_at = $oldPage->mod_date;
            $page->updated_at = $oldPage->mod_date;

            $page->save();
        }
    }
}
