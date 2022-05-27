        <div class="card">
            <div class="card-body">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ $content }}
                </form>
            </div>
        </div>
