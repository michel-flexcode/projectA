<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4 text-white text-center">Create Report</h1>

        @if (session('success'))
            <div class="alert alert-success text-red-500">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('reports.store') }}">
            @csrf

            <div class="mb-4">
                <label for="company_id" class="block text-sm font-medium text-white">Company</label>
                <select name="company_id" id="company_id" class="form-select mt-1 block w-full" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="vulnerabilities" class="block text-sm font-medium text-white">Vulnerabilities</label>
                <input type="text" id="vulnerabilities" class="form-input mt-1 block w-full"
                    placeholder="Start typing to search for vulnerabilities">
                <div id="selected-vulnerabilities" class="mt-2"></div>
            </div>

            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-white">State</label>
                <input type="text" name="state" id="state" class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="recommendations" class="block text-sm font-medium text-white">Recommendations</label>
                <textarea name="recommendations" id="recommendations" class="form-input mt-1 block w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="proposals" class="block text-sm font-medium text-white">Proposals</label>
                <textarea name="proposals" id="proposals" class="form-input mt-1 block w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="conclusions" class="block text-sm font-medium text-white">Conclusions</label>
                <textarea name="conclusions" id="conclusions" class="form-input mt-1 block w-full"></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-[#0086F4] text-white px-4 py-2 rounded hover:bg-blue-600">Create
                    Report</button>
            </div>
        </form>
    </div>

    <!-- Include jQuery and jQuery UI for autocompletion -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(function() {
            var vulnerabilities = [
                @foreach ($vulnerabilities as $vulnerability)
                    {
                        label: "{{ $vulnerability->name }}",
                        value: "{{ $vulnerability->id }}"
                    },
                @endforeach
            ];

            $("#vulnerabilities").autocomplete({
                source: vulnerabilities,
                select: function(event, ui) {
                    $("#selected-vulnerabilities").append(
                        '<div class="selected-vulnerability" data-id="' + ui.item.value + '">' +
                        '<input type="hidden" name="vulnerabilities[]" value="' + ui.item.value +
                        '">' +
                        '<span>' + ui.item.label + '</span>' +
                        '<button type="button" class="remove-vulnerability text-red-500 ml-2">Remove</button>' +
                        '</div>'
                    );
                    $(this).val('');
                    return false;
                }
            });

            // Remove selected vulnerability
            $(document).on('click', '.remove-vulnerability', function() {
                $(this).closest('.selected-vulnerability').remove();
            });
        });
    </script>
</x-app-layout>
