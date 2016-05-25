<?php

namespace Leoalmar\CodeTags\Testing;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Leoalmar\CodeTags\Models\Tag;

class AdminCategoriesTest extends \TestCase
{

    use DatabaseTransactions;
    
    public function test_can_visit_admin_tags()
    {
        $this->visit('/admin/tags')
            ->see('Categories');
    }

    public function test_tags_listing()
    {
        Tag::create(['name'=>'Tag 1','active'=>true]);
        Tag::create(['name'=>'Tag 2','active'=>true]);
        Tag::create(['name'=>'Tag 3','active'=>true]);
        Tag::create(['name'=>'Tag 4','active'=>true]);

        $this->visit('/admin/tags')
            ->see('Tag 1')
            ->see('Tag 2')
            ->see('Tag 3')
            ->see('Tag 4')
        ;
    }

    public function test_click_create_new_tag()
    {
        $this->visit('/admin/tags')
            ->click('Create Tag')
            ->seePageIs('/admin/tags/create')
            ->see('Create Tag')
        ;
    }

    public function test_create_new_tag()
    {
        $this->visit('/admin/tags/create')
            ->type('Tag Teste', 'name')
            ->press('Submit')
            ->seePageIs('/admin/tags')
            ->see('Tag Test')
        ;
    }
}