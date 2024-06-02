<x-layout>
    <x-page-heading>Results</x-page-heading>

    <div class="space-y-6">
        @forelse ($jobs as $job)
            <x-job-card-wide :$job />
        @empty
            <x-card>
                <p>No job founds.</p>
            </x-card>
        @endforelse
    </div>
</x-layout>
