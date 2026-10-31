<div class="mb-3">
    <label class="form-label">Tiêu đề</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="form-control @error('title') is-invalid @enderror">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Nội dung</label>
    <textarea name="content" rows="8" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Ảnh (jpg, jpeg, png, webp - tối đa 2MB)</label>
    @if (!empty($post->image))
        <div class="mb-2"><img src="{{ asset('storage/' . $post->image) }}" style="max-height:150px" class="rounded"></div>
    @endif
    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror">
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
