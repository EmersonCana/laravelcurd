<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Testimonial</title>
</head>
<body>
    <form method="POST">
        @csrf
        <input type="text" name="testimonial">
        <button type="submit">Submit</button>
    </form>
    <ul>
        @foreach($testimonials as $testi)
        <li>{{ "Testimonial: " . $testi->testimonial . " Created By: " . $users->where('id', $testi->created_by)->first()->name }}
        @if($auth->id == $testi->created_by)
            <a href="edit-testimonial/{{$testi->id}}">Edit</a> | 
            <a href="#" onclick="document.getElementById('delete-testimonial-{{$testi->id}}').submit();">Delete</a>
            <form id="delete-testimonial-{{$testi->id}}" action="delete-testimonial/{{$testi->id}}" method="POST">
                @csrf
                @method("DELETE")
            </form>
        @endif
        </li>
        @endforeach
    </ul>
</body>
</html>