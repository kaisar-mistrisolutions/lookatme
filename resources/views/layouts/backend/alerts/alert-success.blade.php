@if (session()->get('success'))
    <div class="rounded-md bg-green-50 p-4 mb-5">
        <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: solid/check-circle -->
            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <div class="text-sm text-green-700">
            <p>
                {{ session()->get('success') }}
            </p>
            </div>
        </div>
        </div>
    </div>
@else
<div class="rounded-md bg-red-50 p-4">
    <div class="flex">
    <div class="ml-3">
        <div class="mt-2 text-sm text-red-700">
        <p>
            {{ session()->get('danger') }}
        </p>
        </div>
    </div>
    </div>
</div>
@endif
