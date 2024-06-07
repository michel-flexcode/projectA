<x-app-layout>
    <div class="container mx-auto mt-8 mb-8 px-4 md:px-8 max-w-full overflow-hidden">
        <h1 class="text-3xl font-bold mb-4 text-white text-center">Create Report</h1>

        @if (session('success'))
            <div class="alert alert-success text-green-500 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('reports.store') }}" class="bg-gray-800 p-6 rounded-lg max-w-4xl mx-auto">
            @csrf

            <div class="mb-4">
                <label for="company_id" class="block text-sm font-medium text-white">Company</label>
                <select name="company_id" id="company_id"
                    class="form-select mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="vulnerabilities" class="block text-sm font-medium text-white">Vulnerabilities</label>
                <input type="text" id="vulnerabilities"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600"
                    placeholder="Start typing to search for vulnerabilities">
                <div id="selected-vulnerabilities" class="mt-2"></div>
            </div>

            <div class="mb-4">
                <label for="consultants" class="block text-sm font-medium text-white">Consultants</label>
                <input type="text" id="consultants"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600"
                    placeholder="Start typing to search for consultants">
                <div id="selected-consultants" class="mt-2"></div>
            </div>

            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-white">State</label>
                <input type="text" name="state" id="state"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600">
            </div>

            <div class="mb-4">
                <label for="recommendations" class="block text-sm font-medium text-white">Recommendations</label>
                <textarea name="recommendations" id="recommendations"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600"></textarea>
            </div>

            <div class="mb-4">
                <label for="proposals" class="block text-sm font-medium text-white">Proposals</label>
                <textarea name="proposals" id="proposals"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600"></textarea>
            </div>

            <div class="mb-4">
                <label for="conclusions" class="block text-sm font-medium text-white">Conclusions</label>
                <textarea name="conclusions" id="conclusions"
                    class="form-input mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600"></textarea>
            </div>

            <div class="mb-4 text-center">
                <button type="submit"
                    class="bg-[#0086F4] text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Create
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
                        '<div class="selected-vulnerability flex items-center mt-2" data-id="' + ui
                        .item.value + '">' +
                        '<input type="hidden" name="vulnerabilities[]" value="' + ui.item.value +
                        '">' +
                        '<span class="text-white">' + ui.item.label + '</span>' +
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

            // Consultants autocomplete
            var consultants = [
                @foreach ($consultants as $consultant)
                    {
                        label: "{{ $consultant->name }}",
                        value: "{{ $consultant->id }}"
                    },
                @endforeach
            ];

            $("#consultants").autocomplete({
                source: consultants,
                select: function(event, ui) {
                    $("#selected-consultants").append(
                        '<div class="selected-consultant flex items-center mt-2" data-id="' + ui
                        .item.value + '">' +
                        '<input type="hidden" name="consultants[]" value="' + ui.item.value +
                        '">' +
                        '<span class="text-white">' + ui.item.label + '</span>' +
                        '<button type="button" class="remove-consultant text-red-500 ml-2">Remove</button>' +
                        '</div>'
                    );
                    $(this).val('');
                    return false;
                }
            });

            // Remove selected consultant
            $(document).on('click', '.remove-consultant', function() {
                $(this).closest('.selected-consultant').remove();
            });
        });
    </script>
</x-app-layout>
