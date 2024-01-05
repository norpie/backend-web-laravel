@extends ('layouts.default')

@section('content')
    <h1>New Idea</h1>
    <form method="post" action="{{ route('ideas.add') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label><br>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="Enter title"
                value="{{ old('title') }}"
            ><br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
        <label for="description">Description</label><br>
            <textarea
                class="form-control"
                id="description"
                name="description"
                placeholder="Enter description"
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
        <label for="bounty">Bounty (in €)</label><br>
            <input
                type="number"
                class="form-control"
                id="bounty"
                name="bounty"
                placeholder="Enter bounty"
                value="{{ old('bounty') }}"
            ><br>
            @error('bounty')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="deadline">Deadline</label><br>
            <input
                type="date"
                class="form-control"
                id="deadline"
                name="deadline"
                placeholder="Enter deadline"
                value="{{ old('deadline') }}"
            ><br>
            @error('deadline')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
