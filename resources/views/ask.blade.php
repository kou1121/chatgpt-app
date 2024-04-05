<!DOCTYPE html>
<html>
<head>
    <title>Ask ChatGPT</title>
</head>
<body>
    <form action="/ask" method="post">
        @csrf
        <label for="question">Ask a question:</label>
        <input type="text" id="question" name="question" required>
        <button type="submit">Ask</button>
    </form>
</body>
</html>