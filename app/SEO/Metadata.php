<?php

namespace App\SEO;

use App\Models\Blog;
use App\Models\Website_meta_description;
use App\Models\WebsiteMetaTitle;
use Illuminate\Http\Request;

class Metadata
{

    // Global metadata

    const DEFALT_META_DESCRIPTION = 'This is our website';
    // const META_TITLE = self::appMeteData($meta_title);

 // End Global metadata

    public static function onPageMetadata(Blog $blog)
    {
        $meta = new MetadaVariables;
        return $meta->setAttribute('title', $blog->blog_title)
        ->setAttribute('description', $blog->meta_description)
        ->setAttribute('author', $blog->user->name)
        ->setAttribute("og_title", $blog->blog_title)
        ->setAttribute("og_description", $blog->meta_description)
        ->setAttribute('og_url', $blog->blog_url)
        ->setAttribute('og_image', $blog->cover_image)
        ->setAttribute('twitter_card', $blog->cover_image)
        ->setAttribute("twitter_image_alt", $blog->blog_title);
       
    }

    public static function appMetaTitle()
    {
       
        $meta_title = (new WebsiteMetaTitle)->appName();
        $app_title = $meta_title;
        return $app_title;
    }
}
