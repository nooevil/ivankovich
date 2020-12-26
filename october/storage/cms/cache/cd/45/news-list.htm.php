<?php 
class Cms5fe49146591cc539034417_1f1e0b65a8fe8df98c6cb48f100dbdf2Class extends Cms\Classes\PageCode
{
public function onStart()
{
    $this['path_page_js'] = mix('js/news-list.js', 'themes/lovata-shopaholic-sneakers/assets');
    $this['path_page_css'] = mix('css/news-list.css', 'themes/lovata-shopaholic-sneakers/assets');
}
}
