@if (session('status'))
    <div id="toast-undo" class="flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="text-sm font-normal">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
@endif