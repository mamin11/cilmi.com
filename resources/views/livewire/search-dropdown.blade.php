<div>
        <div class="form-inline my-2 my-lg-0">
            <form action="/search" method="GET">
            <input wire:model.debounce.500ms="search" name="q" class="form-control mr-sm-2 font-12-px" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0 font-12-px"  type="submit">Search</button>
        </form>
        </div>

        
        @if (count($results) >=1 )
        <div class="container position-absolute rounded form-inline bg-dark search-dropdown my-2 py-2">
            <ul>
                @foreach ($results as $result)
                <li class="border-bottom border-gray-700 py-1">
                        <a href="/episode/{{$result->id}}" class="d-inline-block font-12-px text-decoration-none text-truncate font-color-orange">{{ $result->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
</div>
 