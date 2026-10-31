<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(6);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $post = new Post($data);
        $post->user_id = $request->user()->id; // luôn lấy từ người đăng nhập
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }
        $post->save();

        return redirect()->route('posts.show', $post)->with('success', 'Đã tạo bài viết.');
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post); // 403 nếu không phải chủ bài

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $this->validated($request);
        $post->fill($data);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('posts', 'public');
        }
        $post->save();

        return redirect()->route('posts.show', $post)->with('success', 'Đã cập nhật bài viết.');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Đã xóa bài viết.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'content.min' => 'Nội dung tối thiểu 10 ký tự.',
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh chỉ chấp nhận định dạng jpg, jpeg, png, webp.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'image.uploaded' => 'Tải ảnh lên thất bại (có thể ảnh quá lớn).',
        ]);
    }
}
