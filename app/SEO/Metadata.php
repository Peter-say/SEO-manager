<?php

namespace App\SEO;

use App\Models\Blog;

class Metadata
{

    // Global metadata

    const DEFALT_META_DESCRIPTION = 'This is our website';
    const DEFALT_META_TITLE = 'Web Crawler';

 // End Global metadata

    public static function onPageMetadata(Blog $blog)
    {
        $meta = new MetadaVariables;
        return $meta->setAttribute('title', $blog->blog_title ?? self::DEFALT_META_TITLE)
        ->setAttribute('description', $blog->meta_description ?? self::DEFALT_META_DESCRIPTION)
        ->setAttribute('author', $blog->user->name)
        ->setAttribute("og_title", $blog->blog_title)
        ->setAttribute("og_description", $blog->meta_description)
        ->setAttribute('og_url', $blog->blog_url)
        ->setAttribute('og_image', $blog->cover_image)
        ->setAttribute('twitter_card', $blog->cover_image)
        ->setAttribute("twitter_image_alt", $blog->blog_title);
       
    }

    public static function welcomePage()
    {
        $meta = new MetaData(); 
        $meta_description =  self::DEFALT_META_DESCRIPTION ;

    }
}
