<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>

