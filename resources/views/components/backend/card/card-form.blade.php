        <div class="card">
            <div class="card-body">
                @if($isfile == true)
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($method)
                    {{ $content }}
                </form>
                @else
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method($method)
                    {{ $content }}
                </form>
                @endif
            </div>
        </div>
