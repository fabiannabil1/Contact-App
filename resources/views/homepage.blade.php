@extends('components.template')

@section('title', 'Homepage')

@section('content')
<div class="w-full bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-400 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 py-8 min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-4">Bianisme Contact App</h1>
        <p class="text-lg text-center text-gray-700 dark:text-gray-300 mb-12">Selamat datang Bianers!</p>

        <!-- Search Input and Table Display Options -->
        <div class="flex justify-between items-center mb-4">
            <input
                type="text"
                id="search-input"
                placeholder="Search contacts..."
                class="w-1/3 p-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            >
            <div class="flex items-center">
                <label for="entries" class="mr-2 text-gray-700 dark:text-gray-300">Show:</label>
                <select
                    id="entries"
                    class="p-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>

        <!-- Tabel Kontak -->
        <div class="overflow-hidden shadow-lg rounded-lg bg-white">
            <table id="contacts-table" class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">No.</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Name</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Email</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                            <td class="py-3 px-4 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $contact['name'] }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $contact['email'] }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $contact['phone'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <!-- Form Kontak -->
    <section class="bg-white dark:bg-gray-900 mt-16 rounded-xl shadow-lg p-8">
        <h2 class="mb-4 text-4xl font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 text-center text-gray-500 dark:text-gray-400 sm:text-lg">
            Got a technical issue? Want to send feedback or need details about our Business plan? Let us know.
        </p>

        <form action="#" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input
                    type="email"
                    id="email"
                    placeholder="name@example.com"
                    class="block w-full p-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required
                >
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <input
                    type="text"
                    id="subject"
                    placeholder="Let us know how we can help you"
                    class="block w-full p-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required
                >
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your message</label>
                <textarea
                    id="message"
                    rows="6"
                    placeholder="Leave a comment..."
                    class="block w-full p-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                ></textarea>
            </div>
            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition-colors"
            >
                Send message
            </button>
        </form>
    </section>
</div>

<script>
    const searchInput = document.getElementById("search-input");
    const entriesSelect = document.getElementById("entries");
    const contactsTable = document.getElementById("contacts-table");

    function filterTable() {
        const query = searchInput.value.toLowerCase();
        const rows = contactsTable.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(query) ? "" : "none";
        });
    }

    function changeTableRows() {
        const rows = contactsTable.querySelectorAll("tbody tr");
        const limit = parseInt(entriesSelect.value, 10);

        rows.forEach((row, index) => {
            row.style.display = index < limit ? "" : "none";
        });

        searchInput.value = ""; // Reset search input on change
    }

    searchInput.addEventListener("keyup", filterTable);
    entriesSelect.addEventListener("change", changeTableRows);

    // Apply default row limit on page load
    window.onload = changeTableRows;
</script>
@endsection
