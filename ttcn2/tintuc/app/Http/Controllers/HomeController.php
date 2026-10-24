<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $featured = [
            'category' => 'Công nghệ',
            'title'    => 'Tiêu đề bài viết nổi bật nhất của ngày hôm nay',
            'summary'  => 'Đoạn mô tả ngắn của bài viết nổi bật.',
        ];

        $subFeatured = [
            ['category' => 'Thể thao',  'title' => 'Tin nổi bật thứ hai'],
            ['category' => 'Giải trí', 'title' => 'Tin nổi bật thứ ba'],
        ];

        $posts = [
            ['category' => 'Thời sự',   'title' => 'Tiêu đề bài viết số 1', 'summary' => 'Mô tả ngắn...', 'date' => '24/10/2026', 'author' => 'Admin'],
            ['category' => 'Công nghệ', 'title' => 'Tiêu đề bài viết số 2', 'summary' => 'Mô tả ngắn...', 'date' => '23/10/2026', 'author' => 'Admin'],
            ['category' => 'Thể thao',  'title' => 'Tiêu đề bài viết số 3', 'summary' => 'Mô tả ngắn...', 'date' => '22/10/2026', 'author' => 'Admin'],
        ];

        $categories = ['Thời sự' => 12, 'Công nghệ' => 8, 'Thể thao' => 5];
        $popular    = ['Bài xem nhiều số 1', 'Bài xem nhiều số 2', 'Bài xem nhiều số 3'];
        $tags       = ['PHP', 'Laravel', 'Bootstrap'];

        return view('home', compact('featured', 'subFeatured', 'posts', 'categories', 'popular', 'tags'));
    }
}