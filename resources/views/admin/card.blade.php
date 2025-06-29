@props(['title', 'icon', 'count' => 0, 'url' => '#'])

<a href="{{ $url }}">
    <div class="bg-white shadow rounded-lg p-6 hover:bg-green-50 transition duration-200">
        <div class="flex items-center space-x-4">
            <div class="text-4xl">{{ $icon }}</div>
            <div>
                <div class="text-lg font-semibold text-gray-700">{{ $title }}</div>
                <div class="text-sm text-gray-500">{{ $count }} éléments</div>
            </div>
        </div>
    </div>
</a>
