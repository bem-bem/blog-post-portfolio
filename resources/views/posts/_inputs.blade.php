
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title' , optional($post ?? null)->title) }}" id="title">
    <x-span>
      @error('title')
          {{ $message }}
      @enderror
    </x-span>
  </div>
  
  <div class="mb-3">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"
      id="thumbnail">
  <x-span>
    @error('thumbnail')
    {{ $message }}
    @enderror
  </x-span>
  </div>
  
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
      rows="3">{{ old('content' , optional($post ?? null)->content) }}</textarea>
    <x-span>
      @error('content')
      {{ $message }}
      @enderror
    </x-span>
  </div>