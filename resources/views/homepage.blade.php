@extends('components.template')

@section('title', 'Homepage')

@section('content')
<div class="w-full bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-400 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 py-8 min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-4">Bianisme Contact App</h1>
        <p class="text-lg text-center text-gray-700 dark:text-gray-300 mb-12">Selamat datang Bianers!</p>

        <!-- Tabel Dosen -->
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Contacts Dosen</h2>
        @include('components.search', ['inputId' => 'search-input-dsn', 'entriesId' => 'entries-dsn'])
        <div class="overflow-hidden shadow-lg rounded-lg bg-white mb-12">
            <table id="contacts-dosen" class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">No.</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Name</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Email</th>
                        <th class="py-3 px-4 text-left font-semibold border-b border-gray-300">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts_dosen as $contact)
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

        <!-- Tabel Mahasiswa -->
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Contacts Mahasiswa</h2>
        @include('components.search', ['inputId' => 'search-input-mhs', 'entriesId' => 'entries-mhs'])
        <div class="overflow-hidden shadow-lg rounded-lg bg-white">
            <table id="contacts-mahasiswa" class="min-w-full border-collapse border border-gray-300">
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
</div>

<script>
    const searchInputDsn = document.getElementById("search-input-dsn");
    const searchInputMhs = document.getElementById("search-input-mhs");
    const entriesSelectDsn = document.getElementById("entries-dsn");
    const entriesSelectMhs = document.getElementById("entries-mhs");
    const contactsTableDsn = document.getElementById("contacts-dosen");
    const contactsTableMhs = document.getElementById("contacts-mahasiswa");

    function filterTable(input, table) {
        const query = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(query) ? "" : "none";
        });
    }

    function changeTableRows(select, table) {
        const rows = table.querySelectorAll("tbody tr");
        const limit = parseInt(select.value, 10);

        rows.forEach((row, index) => {
            row.style.display = index < limit ? "" : "none";
        });

        select.previousElementSibling.value = ""; // Reset search input
    }

    searchInputDsn.addEventListener("keyup", () => filterTable(searchInputDsn, contactsTableDsn));
    searchInputMhs.addEventListener("keyup", () => filterTable(searchInputMhs, contactsTableMhs));
    entriesSelectDsn.addEventListener("change", () => changeTableRows(entriesSelectDsn, contactsTableDsn));
    entriesSelectMhs.addEventListener("change", () => changeTableRows(entriesSelectMhs, contactsTableMhs));

    window.onload = () => {
        changeTableRows(entriesSelectDsn, contactsTableDsn);
        changeTableRows(entriesSelectMhs, contactsTableMhs);
    };
</script>
@endsection
