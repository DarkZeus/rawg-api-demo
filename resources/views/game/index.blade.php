@extends ('layout')

@section ('content')
    <h4>Games from <a href="https://rawg.io/">RAWG.io</a></h4>

    <form action="/games" style="margin-bottom: 10px;">
        <div class="field has-addons">
          <div class="control">
            <input class="input" type="text" name="game" value="{{ request('game') }}">
          </div>
          <div class="control">
            <input class="button is-link" type="submit" value="Найти!">
          </div>
          <div class="control">
              <a class="button is-danger" href="/games">Сбросить</a>
          </div>
        </div>
    </form>

    <div class="content">
        <ul>
            @if (request('game'))
            @foreach ($response->results as $game)
                <li><a href="/games/{{ $game->slug }}">{{ $game->name }}</a></li>
            @endforeach
            @endif
        </ul>
    </div>
@endsection
