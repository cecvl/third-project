<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-background flex items-center justify-center min-h-screen">
    <div class="bg-secondary p-8 rounded-lg shadow-md w-full max-w-4xl">
        <h1 class="text-2xl font-bold mb-6 text-center text-text">Feedback List</h1>

        <!-- Feedback Table -->
        <table class="w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Message</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody class="text-text">
                @foreach($feedback as $entry)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $entry->name }}</td>
                        <td class="px-4 py-2">{{ $entry->email }}</td>
                        <td class="px-4 py-2">{{ $entry->message }}</td>
                        <td class="px-4 py-2">{{ $entry->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link to Contact Form -->
        <div class="mt-6 text-center">
            <a href="{{ route('contact.form') }}" class="text-accent hover:underline">Submit Feedback</a>
        </div>
    </div>
</body>
</html>

