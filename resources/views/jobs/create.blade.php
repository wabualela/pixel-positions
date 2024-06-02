<x-layout>
    <x-page-heading>Create a Job</x-page-heading>

    <x-forms.form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <x-forms.input label="Title" name="title" placeholder="CTO" />
        <x-forms.input label="Salary" name="salary" placeholder="$6000 USD" />
        <x-forms.input label="Location" name="location" placeholder="Kampala, Uganda" />

        <x-forms.select label="Schedule" name="schedule">
            @forelse ($schedules as $schedule)
                <option class="bg-black" value="{{ $schedule }}">{{ $schedule }}</option>
            @empty
                <option> No schedule founds.</option>
            @endforelse
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://career.izdiad.net" />
        <x-forms.checkbox label="Featured (costs extra)" name="featured" value="true" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="Laravel, Moodle, WordPress" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
