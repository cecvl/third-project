<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Include Tailwind app.css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-background flex items-center justify-center min-h-screen">
    <div class="bg-secondary p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-text">Contact Us</h2>

        <!-- Display success message if exists -->
        @if(Session::has('message'))
            <div class="bg-accent text-white px-4 py-3 rounded mb-4">
                {{ Session::get('message') }}
            </div>
        @endif

        <!-- Form with Alpine.js Validation -->
        <form 
            action="{{ route('contact.send') }}" 
            method="POST" 
            x-data="{ 
                name: '', 
                email: '', 
                message: '', 
                errors: { name: false, email: false, message: false } 
            }" 
            @submit.prevent="validateForm"
        >
            @csrf

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-text font-medium mb-2">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    x-model="name" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" 
                    :class="{ 'border-red-500': errors.name }"
                >
                <p x-show="errors.name" class="text-red-500 text-sm mt-1">Please enter your name.</p>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-text font-medium mb-2">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    x-model="email" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" 
                    :class="{ 'border-red-500': errors.email }"
                >
                <p x-show="errors.email" class="text-red-500 text-sm mt-1">Please enter a valid email address.</p>
            </div>

            <!-- Message Field -->
            <div class="mb-6">
                <label for="message" class="block text-text font-medium mb-2">Message:</label>
                <textarea 
                    name="message" 
                    id="message"
                    rows="4" 
                    x-model="message" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" 
                    :class="{ 'border-red-500': errors.message }"
                ></textarea>
                <p x-show="errors.message" class="text-red-500 text-sm mt-1">Please enter your message.</p>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-accent focus:outline-none focus:ring-2 focus:ring-primary"
            >
                Send Message
            </button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Reset errors
            this.errors = { name: false, email: false, message: false };

            // Validate name
            if (this.name.trim() === '') {
                this.errors.name = true;
            }

            // Validate email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(this.email)) {
                this.errors.email = true;
            }

            // Validate message
            if (this.message.trim() === '') {
                this.errors.message = true;
            }

            // If no errors, submit the form
            if (!this.errors.name && !this.errors.email && !this.errors.message) {
                this.$el.submit();
            }
        }
    </script>
</body>
</html>