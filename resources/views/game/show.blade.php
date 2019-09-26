@extends ('layout')

@section ('content')
    <a href="/games">Назад</a>
      <h1 class="is-size-1">{{ $response->name }}</h1>
    <table class="table is-bordered is-narrow is-striped is-hoverable is-fullwidth">
        <tbody>
            <tr>
                <th>Description</th>
                <td>{{ $response->description_raw }}</td>
            </tr>
            <tr>
                <th>Released</th>
                <td>{{ \Carbon\Carbon::parse($response->released)->isoFormat('Do MMMM YYYY') }}</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>{{ $response->rating }}</td>
            </tr>
            <tr>
                <th>Metacritic</th>
                <td>{{ $response->metacritic }}</td>
            </tr>
            <tr>
                <th>Gengres</th>
                <td>
                    <ul class="tags">
                        @foreach($response->genres as $genre)
                            <li class="tag is-info">{{ $genre->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Developers</th>
                <td>
                    <ul class="tags">
                        @foreach ($response->developers as $developer)
                            <li class="tag is-primary">{{ $developer->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Stores</th>
                <td>
                    <div class="tags">
                        @foreach ($response->stores as $store)
                            <a class="tag is-link" href="{{ $store->url }}">{{ $store->store->name }}</a>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <th>Tags</th>
                <td>
                    <ul class="tags">
                        @foreach ($response->tags as $tag)
                            <li class="tag is-success">{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Publishers</th>
                <td>
                    <ul class="tags">
                        @foreach ($response->publishers as $publisher)
                            <li class="tag is-warning">{{ $publisher->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Platforms</th>
                <td>
                    <ul class="tags">
                        @foreach ($response->platforms as $platform)
                            <li class="tag is-danger">{{ $platform->platform->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <img style="max-width: 350px;" src="{{ $response->background_image }}" alt="">
@endsection
