<!DOCTYPE html>
<html>
<head>
    <title>Answer Contacts</title>
</head>
<body>
    <h2>Answer Contacts</h2>
    @foreach ($contacts as $contact)
        <p>Name: {{ $contact->name }}</p>
        <p>Email: {{ $contact->email }}</p>
        <p>Message: {{ $contact->message }}</p>
        <form action="{{ route('admin.respondtocontact', ["id" => $contact->id]) }}" method="POST">
            @csrf
            <textarea name="response" placeholder="Your response" cols="30" rows="10"></textarea>
            <button type="submit">Respond</button>
        </form>
        <hr>
    @endforeach
</body>
</html>
